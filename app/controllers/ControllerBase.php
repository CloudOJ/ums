<?php

namespace CloudOJ\Controllers;


use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller {
    protected function initialize() {
        $this->tag->prependTitle($this->config["site"]["name"] . '::');
        $this->view->setTemplateAfter('main');

        if($this->request->isAjax()) {
            $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        } else {
            $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        }
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
