<?php
namespace Ums;

trait ControllerSecureInterface {
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
}
