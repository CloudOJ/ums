<?php

namespace Ums\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query;

use Ums\i18n;
use Ums\Forms\LoginForm;
use Ums\Forms\RegisterForm;
use Ums\Models\User;
use Ums\Models\Userprofile;
use Ums\Models\Usertoken;

class UserController extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle($this->i18n->title_user);
        parent::initialize();
    }

    private function _registerSession(User $user) {
        $this->session->set('auth', array(
            'id' => $user->uid,
            'name' => $user->username,
            'groupid' => $user->groupid
        ));
    }
    protected function getSyncLogin($sessionData, $remember = false) {
        $ret = "<script>";
        foreach ($this->config->ums as $site) {
            $token = new Usertoken;
            $token->authdata = $sessionData;
            if ($token->save() == false) {
                foreach ($token->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $ret .= sprintf("$.ajax({url:\"%s/saveAuth/%s/%s\",xhrFields:{withCredentials:true},crossDomain:true});", $site->umsUri, $token->tokenid, strval($remember));
            }
        }
        $ret .= "</script>";
        return $ret;
    }
    protected function getSyncLogout() {
        $ret = "<script>";
        foreach ($this->config->ums as $site) {
            $ret .= sprintf("$.ajax({url:\"%s/removeAuth/%s/\",xhrFields:{withCredentials:true},crossDomain:true});", $site->umsUri, $token->tokenid);
        }
        $ret .= "</script>";
        return $ret;
    }
    protected function isLoggedin() {
        return $this->session->has('auth');
    }
    public function loginAction() {
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
                                $this->cookies->set('remember-me', $ser_authData, time() + 7 * 86400);
                            }
                            $this->flash->success(sprintf($this->i18n->user_login_success, $user->username) . $this->getSyncLogin($ser_authData, ($this->request->getPost('remember-me') != null) ? true : false));
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
        $this->flash->success($this->i18n->user_logout_succeed . $this->getSyncLogout());
        $this->session->remove('auth');
        if($this->cookies->has('remember-me')) {
            $this->cookies->get('remember-me')->delete();
        }
        return $this->forward('index/index');
    }
}
