<?php

namespace Ums\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;

class RegisterForm extends Form {
    const Setting_Username_Maximum_Length = 20;
    const Setting_Username_Minimum_Length = 5;
    const Setting_Password_Maximum_Length = 20;
    const Setting_Password_Minimum_Length = 5;

    public function initialize($entity = null, $options = null) {
        //Username
        $username = new Text('username', array(
            "class" => "form-control",
            'placeholder' => $this->i18n->user_username
        ));
        $username->setFilters(array('striptags', 'string'));
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => $this->i18n->user_register_usernamerequired
            )),
            new StringLength(array(
                'max' => RegisterForm::Setting_Username_Maximum_Length,
                'min' => RegisterForm::Setting_Username_Minimum_Length,
                'messageMaximum' => sprintf($this->i18n->user_register_username_maximum, RegisterForm::Setting_Username_Maximum_Length),
                'messageMinimum' => sprintf($this->i18n->user_register_username_minimum, RegisterForm::Setting_Username_Minimum_Length)
            ))
        ));
        $this->add($username);

        //E-mail
        $email = new Text('email', array(
            "class" => "form-control",
            'placeholder' => $this->i18n->user_email
        ));
        $email->setFilters('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => $this->i18n->user_register_emailrequired
            )),
            new Email(array(
                'message' => $this->i18n->user_register_emailinvaild
            ))
        ));
        $this->add($email);

        //Password
        $password = new Password('password', array(
            "class" => "form-control",
            'placeholder' => $this->i18n->user_password
        ));
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => $this->i18n->user_register_passwordrequired
            )),
            new StringLength(array(
                'max' => RegisterForm::Setting_Password_Maximum_Length,
                'min' => RegisterForm::Setting_Password_Minimum_Length,
                'messageMaximum' => sprintf($this->i18n->user_register_password_maximum, RegisterForm::Setting_Password_Maximum_Length),
                'messageMinimum' => sprintf($this->i18n->user_register_password_minimum, RegisterForm::Setting_Password_Minimum_Length)
            ))
        ));
        $this->add($password);

        //RepeatPassword
        $repeatPassword = new Password('repeatPassword', array(
            "class" => "form-control",
            'placeholder' => $this->i18n->user_register_repeatpassword
        ));
        $repeatPassword->addValidators(array(
            new PresenceOf(array(
                'message' => $this->i18n->user_register_repeatpasswordrequired
            ))
        ));
        $this->add($repeatPassword);
    }
}
