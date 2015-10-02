<?php

namespace Ums;

require "i18n_en_us/title.php";
require "i18n_en_us/user.php";
require "i18n_en_us/navbar.php";
require "i18n_en_us/footer.php";

class i18n_en_us {
    use i18n_title, i18n_user, i18n_navbar, i18n_footer;
    
    public $lang = "en";
    public $locale = "en-us";
    public $security_csrf_error = "CSRF Token Error.";
    public $dropdown_signedin = "Signed in as <strong>%s</strong>";
}
