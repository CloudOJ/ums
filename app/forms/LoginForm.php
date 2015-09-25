<?php

namespace Ums\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Numericality;

class LoginForm extends Form {
    public function initialize($entity = null, $options = array()) {
        //Username
        $username = new Text("username", array(
            "class" => "form-control",
            "placeholder" => $this->i18n->user_login_username
        ));
        $username->setFilters(array('striptags', 'string'));
        $username->addValidators(
            array(
                new PresenceOf(
                    array(
                        'message' => $this->i18n->user_login_usernamerequired
                    )
                )
            )
        );
        $this->add($username);

        //Password
        $password = new Password("password", array(
            "class" => "form-control",
            "placeholder" => $this->i18n->user_password
        ));
        $password->setFilters(array('striptags', 'string'));
        $password->addValidators(
            array(
                new PresenceOf(
                    array(
                        'message' => $this->i18n->user_login_passwordrequired
                    )
                )
            )
        );
        $this->add($password);
    }
}
