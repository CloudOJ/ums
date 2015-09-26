<?php

namespace Ums\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Db\RawValue;

use Ums\i18n;

class Userprofile extends ModelBase {
    public $uid;
    public $score;
    public $avatar;

    public function initialize() {
        $this->belongsTo("uid", "\Ums\Models\User", "uid", array(
            'alias' => 'User'
        ));
    }

    public function beforeValidationOnCreate() {
        $this->score = 0;
    }

    public static function getAvatar($email) {
        return "https://cdn.v2ex.com/gravatar/" . md5(strtolower($email));
    }
}
