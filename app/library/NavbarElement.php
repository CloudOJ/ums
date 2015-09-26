<?php

namespace Ums;

use Phalcon\Mvc\User\Component;

class NavbarElement extends Component{
    public function render() {
        $this->partial("partials/nav/navbar_left");
        if($this->session->has("auth")) {
            $this->partial("partials/nav/navbar_right_login");
        } else {
            $this->partial("partials/nav/navbar_right_not_login");
        }
    }

    private function partial($path = "") {
        echo $this->view->partial($path, array(
            "Nav" => $this
        ));
    }
    public function isControllerCurrent($Controller = "") {
        return ($Controller == $this->view->getControllerName()) ? "active" : "";
    }
    public function isActionCurrent($Controller = "", $Action = "") {
        return ($Controller == $this->view->getControllerName() &&
                $Action == $this->view->getActionName()) ? "active" : "";
    }
}
