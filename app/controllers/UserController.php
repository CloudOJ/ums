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

    public function loginAction() {
        $form = new LoginForm();
        if ($this->request->isPost()) {
            if (!$form->isValid($_POST)) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            }
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = User::findUserByName($email);
            if ($user) {
                if ($this->security->checkHash($password, $user->password)) {
                    $this->_registerSession($user);
                    $this->flash->success(sprintf($this->i18n->user_login_success, $user->username));
                    return $this->forward('index/index');
                }
            }
            $this->flash->error($this->i18n->user_login_wrongdata);
        }
        $this->view->setVar("form", $form);
    }
    public function registerAction() {
        $form = new RegisterForm();
        if ($this->request->isPost()) {
            $password = $this->request->getPost("password");
            $repeatPassword = $this->request->getPost("repeatPassword");
            if ($password != $repeatPassword) {
                $this->flash->error($this->i18n->user_register_differentrepeatpassword);
            } else {
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
                        return $this->forward('user/login');
                    }
                }
            }
        }
        $this->view->setVar("form", $form);
    }
}
