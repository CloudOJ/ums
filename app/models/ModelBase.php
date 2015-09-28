<?php

namespace Ums\Models;

use Phalcon\Mvc\Model;
use Ums\i18n;

class ModelBase extends Model {
    public function initialize() {
    }

    protected function i18n() {
        return $this->getDI()["i18n"];
    }
}
