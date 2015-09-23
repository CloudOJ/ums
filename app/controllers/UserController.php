<?php

namespace CloudOJ\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Model\Query;

use CloudOJ\i18n;

class UserController extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle($this->i18n->title_user);
        parent::initialize();
    }
    public function indexAction() {
    }
    public function loginAction() {
    }
    public function registerAction() {
    }
}
