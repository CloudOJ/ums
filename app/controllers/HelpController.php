<?php

namespace CloudOJ\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Db\RawValue;
use Phalcon\Mvc\Model\Query;

use CloudOJ\i18n;

class HelpController extends ControllerBase {
    public function initialize() {
        $this->tag->setTitle($this->i18n->title_help);
        parent::initialize();
    }
    public function indexAction($filename = null) {
        return $this->forward("help/view");
    }

    public function viewAction($filename = null) {
        if(!$filename) {
            $filename = "index";
        }
        $locale = $this->i18n->locale;
        $path = "help/content-{$locale}/{$filename}";
        if(!file_exists(APP_PATH . "/app/views/{$path}.md")) {
            $this->flash->error("Page not Found!");
            return $this->forward("index/index");
        }
        $this->view->setVars(array(
            "isIndex" => ($filename == "index"),
            "path" => "help/content-{$locale}/{$filename}"
        ));
    }
}
