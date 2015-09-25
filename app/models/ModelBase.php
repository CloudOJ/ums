<?php

namespace Ums\Models;

use Phalcon\Mvc\Model;
use Ums\i18n;

class ModelBase extends Model {
    public function initialize() {
        $this->hasOne("uid", "Userprofile", "uid");
    }

    protected function i18n() {
        return $this->getDI()["i18n"];
    }
}
