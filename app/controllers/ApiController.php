<?php

namespace Ums\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
use Phalcon\Db\RawValue;
use Phalcon\Mvc\Model\Query;

use Ums\i18n;
use Ums\Models\Usertoken;

class ApiController extends ControllerBase {
    public function initialize() {
        parent::initialize();
        $this->view->setRenderLevel(View::LEVEL_NO_RENDER);
        $this->response->setHeader("Content-Type", "application/json;charset=UTF-8");
    }
    private function rest_error($jsonArray) {
        $jsonArray["status"] = "error";
        echo json_encode($jsonArray);
        $this->response->setStatusCode(400, "Bad Request");
    }
    private function rest_success($jsonArray) {
        $jsonArray["status"] = "ok";
        echo json_encode($jsonArray);
    }
    protected function checkAuthKey($key) {
        foreach ($this->config->ums as $site) {
            if($key == $site->key) return true;
        }
        return false;
    }
    public function getAuthAction($token = null, $key = null) {
        if($key) {
            if($this->checkAuthKey($key)) {
                if($token) {
                    $usertoken = Usertoken::findTokenByID($token);
                    if($usertoken) {
                        $this->rest_success(array(
                            "authdata" => unserialize($usertoken->authdata)
                        ));
                        $usertoken->delete();
                    } else {
                        $this->rest_error(array(
                            "name" => "Invaild Parameter",
                            "message" => "Token not found"
                        ));
                    }
                } else {
                    $this->rest_error(array(
                        "name" => "Invaild Parameter",
                        "message" => "Token is null"
                    ));
                }
            } else {
                $this->rest_error(array(
                    "name" => "Invaild Parameter",
                    "message" => "Invaild Api Key"
                ));
            }
        } else {
            $this->rest_error(array(
                "name" => "Invaild Parameter",
                "message" => "Key is null"
            ));
        }
    }
}
