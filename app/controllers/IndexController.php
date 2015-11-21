<?php

namespace Ums\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Db\RawValue;
use Phalcon\Mvc\Model\Query;

use Ums\i18n;

class IndexController extends ControllerBase {
    public function initialize() {
        parent::initialize();
        $this->tag->prependTitle($this->i18n->title_welcome);
    }
    public function indexAction() {
    }
}
