<?php

namespace Ums\Models;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Db\RawValue;

use Ums\i18n;



class Useroption extends ModelBase {
    public $uid;
    public $type;
    public $detail;


    public function initialize() {
        $this->belongsTo("uid", "\Ums\Models\User", "uid", array(
            'alias' => 'User'
        ));
    }

    const Option_Locale = 1;
    const Option_Locale_Default = "zh-cn";

    public static function getOption($uid, $type, $value = "") {
        $option = Useroption::findFirst(array(
            "uid = :uid: AND type = :type:",
            'bind' => array(
                'uid' => $uid,
                'type' => $type
            )
        ));
        if(!$option) {
            $option = Useroption::createOption($uid, $type, $value);
        }
        return $option;
    }
    protected static function createOption($uid, $type, $value) {
        $option = new Useroption;
        $option->uid = $uid;
        $option->type = $type;
        $option->detail = $value;
        $option->save();
        return $option;
    }
    public function setOption($uid, $type, $value) {
        $option = Useroption::findFirst(array(
            "uid = :uid: AND type = :type:",
            'bind' => array(
                'uid' => $uid,
                'type' => $type
            )
        ));
        if(!$option) {
            return $this->createOption($uid, $type, $value);
        } else {
            $option->detail = $value;
            $option->save();
            return $option;
        }
    }
    public static function getLocale($uid) {
        return Useroption::getOption($uid, Option_Locale, Option_Locale_Default)->detail;
    }
}
