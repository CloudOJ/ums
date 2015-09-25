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
                        $this->flash->success(sprintf($this->i18n->user_login_success, $user->username));
                        return $this->forward('index/index');
                    }
                }
            }
            $this->flash->error($this->i18n->user_login_wrongdata);
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
                        return $this->forward('index/index');
                    }
                }
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
        return $this->forward('index/index');
    }
}
