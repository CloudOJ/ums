<?php

namespace Ums\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Db\RawValue;

class Usertoken extends Model {
    public $tokenid;
    public $authdata;
    public $expire_at;

    public static function findTokenByID($tokenID) {
        $token = Usertoken::findFirst(array(
            "tokenid = :tokenid:", 'bind' => array('tokenid' => $tokenID)));
        return $token;
    }
}
