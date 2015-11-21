<?php
namespace Ums;

trait ControllerCookieInterface {
    protected function _processCookie() {
        if(!$this->session->has("cookie-checked")) {
            if(!$this->session->has("auth")) {
                if ($this->cookies->has('remember-me')) {
                    $rememberMe = $this->cookies->get('remember-me');
                    $this->session->set("auth", unserialize($rememberMe->getValue()));
                    $this->flash->notice($this->i18n->user_login_auto_success);
                    return true;
                }
            }
            $this->session->set("cookie-checked", true);
        }
        return false;
    }
}
