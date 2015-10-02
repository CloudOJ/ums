<?php

namespace Ums\Controllers;


use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class ControllerBase extends Controller {
    protected function _processCookie() {
        if(!$this->session->has("cookie-checked")) {
            if(!$this->session->has("auth")) {
                if ($this->cookies->has('remember-me')) {
                    $rememberMe = $this->cookies->get('remember-me');
                    $this->session->set("auth", unserialize($rememberMe->getValue()));
                    $this->flash->notice($this->i18n->user_login_auto_success);
                }
            }
            $this->session->set("cookie-checked", true);
        }
    }
    protected function _checkSecure() {
        if($this->config->application->secure) {
            if($this->request->isSecureRequest()) {
                return;
            } else {
                $response = new \Phalcon\HTTP\Response();
                $response->redirect("https://" . $this->request->getHttpHost() . $this->request->getURI(), true);
                $response->send();
                exit;
            }
        }
    }
    protected function initialize() {
        $this->_checkSecure();

        $this->tag->prependTitle($this->i18n->site_name . '::');
        $this->view->setTemplateAfter('main');

        if($this->request->getHeader("X-PJAX") == "true") {
            $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        } else {
            $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        }
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
