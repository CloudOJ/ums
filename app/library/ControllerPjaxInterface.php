<?php
namespace Ums;

use Phalcon\Mvc\View;

trait ControllerPjaxInterface {
    protected function _processPjax() {
        if($this->request->getHeader("X-PJAX") == "true") {
            $this->view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);
        } else {
            $this->view->setRenderLevel(View::LEVEL_MAIN_LAYOUT);
        }
    }
}
