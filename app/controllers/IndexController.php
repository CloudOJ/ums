<?php

namespace CloudOJ\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Db\RawValue;
use Phalcon\Mvc\Model\Query;

use CloudOJ\i18n;

class IndexController extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle($this->i18n->title_welcome);
        parent::initialize();
    }
    public function indexAction() {
    }
}
