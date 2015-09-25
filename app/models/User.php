<?php

namespace Ums\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Db\RawValue;

use Ums\i18n;

class User extends ModelBase {
    public $uid;
    public $username;
    public $email;
    public $password;
    public $groupid;

    public function initialize() {
        $this->hasOne("uid", "Userprofile", "uid");
    }
    public function validation() {
        $this->validate(new UniquenessValidator(array(
            'field' => 'email',
            'message' => $this->i18n()->user_signup_emailinvaild_same
        )));
        $this->validate(new UniquenessValidator(array(
            'field' => 'username',
            'message' => $this->i18n()->user_signup_usernameinvaild_same
        )));
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    public function beforeValidationOnCreate() {
        $this->groupid = 2;
    }

    public static function findUserByName($username) {
        $user = User::findFirst(array(
            "(email = :email: OR username = :email:)",
            'bind' => array('email' => $username)
        ));
        return $user;
    }

    public static function findUserByID($uid) {
        $user = User::findFirst(array(
            "uid = :uid:", 'bind' => array('uid' => $uid)));
        return $user;
    }
}
