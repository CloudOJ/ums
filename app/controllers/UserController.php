<?php

namespace Ums\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query;

use \Firebase\JWT\JWT;

use Ums\i18n;
use Ums\Forms\LoginForm;
use Ums\Forms\RegisterForm;
use Ums\Models\User;
use Ums\Models\Userprofile;
use Ums\Models\Usertoken;

use Ums\ControllerCookieInterface;

class UserController extends ControllerBase {
    use ControllerCookieInterface;

    public function initialize() {
        parent::initialize();
        $this->tag->prependTitle($this->i18n->title_user);
    }

    private function _registerSession(User $user) {
        $this->session->set('auth', array(
            'id' => $user->uid,
            'name' => $user->username,
            'groupid' => $user->groupid
        ));
    }
    protected function isLoggedin() {
        return $this->session->has('auth');
    }
    protected function generateToken($appId) {
        return JWT::encode($this->session->get("auth"), $this->config->ums[$appId - 1]->key);
    }
    public function tokenAction($appId = 0) {
        if(!$this->isLoggedin()) {
            return $this->forward("user/login");
        }
        if(!$this->request->isPost()) {
            $this->view->additional_code = "
            <form id='redirectForm' method='post'></form>
            <script>
              document.getElementById('redirectForm').submit();
            </script>
            ";
        } else if($this->request->isPost()) {
            if($this->isLoggedin()) {
                $token = $this->generateToken($appId);
                $redirect_to = "";
                if($appId != 0) {
                    $redirect_to = $this->config->ums[$appId - 1]->umsUri . "/token/" . $token;
                }
                $this->view->additional_code = "
                <script>
                  window.location.href = ". json_encode($redirect_to) ."
                </script>
                ";
            } else {
                return $this->forward("user/login");
            }
        }
    }
    public function loginAction() {
        if($this->_processCookie()) return $this->forward("index/index");
        if($this->isLoggedin()) {
            $this->flash->error($this->i18n->user_alreadyloggedin);
            return $this->forward("index/index");
        }
        $form = new LoginForm();
        if ($this->request->isPost()) {
            if ($this->security->checkToken()) {
                if (!$form->isValid($this->request->getPost())) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                } else {
                    $username = $this->request->getPost('username');
                    $password = $this->request->getPost('password');
                    $user = User::findUserByName($username);
                    if ($user) {
                        if ($this->security->checkHash($password, $user->password)) {
                            $this->_registerSession($user);
                            $ser_authData = serialize($this->session->get("auth"));
                            if($this->request->getPost('remember-me')) {
                                $this->cookies->set('remember-me', $ser_authData, time() + 7 * 86400, "/", $this->config->application->secure);
                            }
                            $this->flash->success(sprintf($this->i18n->user_login_success, $user->username));
                            return $this->forward('index/index');
                        }
                    }
                }
                $this->flash->error($this->i18n->user_login_wrongdata);
            } else {
                $this->flash->error($this->i18n->security_csrf_error);
            }
        }
        $this->view->setVar("form", $form);
    }
    protected function __verifyCaptcha($token) {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'secret' => $this->config->recaptcha->secretkey,
            'response' => $token
        ));
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
    protected function checkCaptcha() {
        if($this->config->recaptcha->enabled) {
            if($this->request->hasPost("g-recaptcha-response")) {
                $verifyStatus = $this->__verifyCaptcha($this->request->getPost("g-recaptcha-response"));
                if($verifyStatus) {
                    $json_status = json_decode($verifyStatus);
                    if($json_status->success == true) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
    public function registerAction() {
        if($this->isLoggedin()) {
            $this->flash->error($this->i18n->user_alreadyloggedin);
            return $this->forward("index/index");
        }
        $form = new RegisterForm();
        if ($this->request->isPost()) {
            if ($this->security->checkToken()) {
                    $user = new User();
                    if (!$form->isValid($this->request->getPost(), $user)) {
                        foreach ($form->getMessages() as $message) {
                            $this->flash->error((string) $message);
                        }
                    } else {
                        if($this->checkCaptcha()) {
                            $user->password = $this->security->hash($user->password);
                            $userprofile = new Userprofile;
                            $userprofile->avatar = Userprofile::getAvatar($user->email);
                            $user->userprofile = $userprofile;
                            if ($user->save() == false) {
                                foreach ($user->getMessages() as $message) {
                                    $this->flash->error((string) $message);
                                }
                            } else {
                                $this->flash->success($this->i18n->user_register_succeed);
                                $this->tag->setDefault("username", "");
                                $this->tag->setDefault("password", "");
                                return $this->forward('index/index');
                            }
                        } else {
                            $this->flash->error($this->i18n->user_register_captcha_error);
                        }
                    }
            } else {
                $this->flash->error($this->i18n->security_csrf_error);
            }
        }
        $this->view->setVar("form", $form);
    }
    public function logoutAction() {
        if(!$this->isLoggedin()) {
            $this->flash->error($this->i18n->user_notloggedin);
            return $this->forward("index/index");
        }
        $this->flash->success($this->i18n->user_logout_succeed);
        $this->session->remove('auth');
        if($this->cookies->has('remember-me')) {
            $this->cookies->get('remember-me')->delete();
        }
        $script = '';
        $sitecount = 0;
        foreach($this->config->ums as $site) {
            $script .= "
            <iframe id='iframe-logout-" . strval($site->id) . "' class='iframe-logout' src='" . $site->umsUri . "/logout" . "'>
            </iframe>
            ";
            $sitecount++;
        }
        $this->view->script = $script;
        $this->view->site_count = $sitecount;
    }
}
