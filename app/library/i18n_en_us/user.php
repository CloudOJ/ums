<?php
namespace Ums;

trait i18n_user {
    public $user_login_title = "Log In";
    public $user_login_username = "Username/E-mail";
    public $user_username = "Username";
    public $user_password = "Password";
    public $user_email    = "E-mail";
    public $user_signup_title = "Sign Up";
    public $user_signup_emailinvaild_same = "Sorry, The email was registered by another user.";
    public $user_signup_usernameinvaild_same = "Sorry, The username was registered by another user.";
    public $user_login_usernamerequired = "Username is required.";
    public $user_login_passwordrequired = "Password is required.";
    public $user_login_wrongdata = "Wrong Username/Email or Wrong Password.";
    public $user_login_success = "Welcome, %s!";
    public $user_login_remember_me = "Remember me for 7 days";
    public $user_register_usernamerequired = "Please enter your desired username.";
    public $user_register_username_maximum = "Username must have at most %d characters.";
    public $user_register_username_minimum = "Username must have at least %d characters.";
    public $user_register_emailrequired    = "E-mail is required.";
    public $user_register_emailinvaild     = "Invaild E-mail.";
    public $user_register_passwordrequired = "Password is required.";
    public $user_register_password_maximum = "Password must have at most %d characters.";
    public $user_register_password_minimum = "Password must have at least %d characters.";
    public $user_register_repeatpassword = "Confirm Password";
    public $user_register_repeatpasswordrequired = "Password Confirmation is required.";
    public $user_register_differentrepeatpassword = "Confirmation Password is different.";
    public $user_register_succeed = "Thanks for sign-up! Log in to start your Advanture.";
    public $user_register_passwordpattern = "Invaild characters present in Password.";
    public $user_register_usernamepattern = "Invaild characters present in Username.";
    public $user_register_captcha_error = "Please solve reCAPTCHA";
    public $user_logout_succeed = "You are logged out.";
    public $user_notloggedin = "You haven't logged in.";
    public $user_alreadyloggedin = "You've already logged in.";
    public $user_login_auto_success = "Welcome back! You're automatically logged in.";
    public $user_logout = "Log Out";
    public $user_profile = "Profile";
    public $user_notification = "Notification";
}
