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

class ProfileController extends ControllerBase {
    public function initialize() {
        parent::initialize();
        $this->tag->prependTitle($this->i18n->title_profile);
    }

    public function avatarAction($uid = null) {
        if($uid) {
            $user = User::findUserByID($uid);
            if($user) {
                $this->response->redirect($user->getUserprofile()->avatar);
            }
        }
    }
}
