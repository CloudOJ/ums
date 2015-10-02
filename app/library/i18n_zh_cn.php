<?php

namespace Ums;

require "i18n_zh_cn/title.php";
require "i18n_zh_cn/user.php";
require "i18n_zh_cn/navbar.php";
require "i18n_zh_cn/footer.php";

class i18n_zh_cn {
    use i18n_title, i18n_user, i18n_navbar, i18n_footer;
    
    public $lang = "zh";
    public $locale = "zh-cn";
    public $security_csrf_error = "验证信息失效。";
    public $dropdown_signedin = "以 <strong>%s</strong> 登录";
}
