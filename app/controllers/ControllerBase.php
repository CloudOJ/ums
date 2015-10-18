<?php

namespace Ums\Controllers;


use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

use Ums\ControllerI18nInterface;
use Ums\ControllerSecureInterface;
use Ums\ControllerPjaxInterface;
use Ums\ControllerCookieInterface;

class ControllerBase extends Controller {
    use ControllerI18nInterface,
        ControllerPjaxInterface,
        ControllerSecureInterface,
        ControllerCookieInterface;

    protected function initialize() {
        $this->_checkSecure();
        $this->_processi18n();

        $this->tag->setTitle(" - " . $this->config->site->i18n[$this->i18n->locale]);

        $this->view->setTemplateAfter('main');

        $this->_processPjax();
        $this->_processCookie();
    }

    protected function forward($uri) {
        $uriParts = explode('/', $uri);
        $params = array_slice($uriParts, 2);
        return $this->dispatcher->forward(
            array(
                'controller' => $uriParts[0],
                'action' => $uriParts[1],
                'params' => $params
            )
        );
    }
}
