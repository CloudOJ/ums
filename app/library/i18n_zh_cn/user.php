<?php
namespace Ums;

trait i18n_user {
    public $user_login_title = "登录";
    public $user_login_username = "用户名/邮箱";
    public $user_username = "用户名";
    public $user_password = "密码";
    public $user_email    = "邮箱";
    public $user_signup_title = "注册";
    public $user_signup_emailinvaild_same = "很抱歉，这个邮箱已经被其他用户注册过了。";
    public $user_signup_usernameinvaild_same = "很抱歉，这个用户名已经被其他用户注册过了。";
    public $user_login_usernamerequired = "请填写用户名。";
    public $user_login_passwordrequired = "请填写密码。";
    public $user_login_wrongdata = "用户名、邮箱或密码错误。";
    public $user_login_success = "%s, 欢迎您!";
    public $user_login_remember_me = "七天内免登录";
    public $user_register_usernamerequired = "请输入用户名。";
    public $user_register_username_maximum = "用户名最多 %d 个字符。";
    public $user_register_username_minimum = "用户名最少 %d 个字符。";
    public $user_register_emailrequired    = "请填写邮箱。";
    public $user_register_emailinvaild     = "邮箱格式错误。";
    public $user_register_passwordrequired = "请填写密码。";
    public $user_register_password_maximum = "密码最多 %d 个字符。";
    public $user_register_password_minimum = "密码最少 %d 个字符。";
    public $user_register_repeatpassword = "确认密码";
    public $user_register_repeatpasswordrequired = "请再次确认密码。";
    public $user_register_differentrepeatpassword = "重复密码不相同。";
    public $user_register_succeed = "感谢您注册！登录开始全新旅程。";
    public $user_register_passwordpattern = "密码中含有非法字符。";
    public $user_register_usernamepattern = "用户名中含有非法字符。";
    public $user_register_captcha_error = "请填写验证码。";
    public $user_logout_succeed = "您已经退出登录。";
    public $user_notloggedin = "您还没有登录。";
    public $user_alreadyloggedin = "您已经登录了。";
    public $user_login_auto_success = "欢迎回来!";
    public $user_logout = "退出登录";
    public $user_profile = "用户信息";
    public $user_notification = "通知";
}
