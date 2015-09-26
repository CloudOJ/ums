<?php

namespace Ums;

use Phalcon\Mvc\View\Engine;

class MarkdownAdapter extends Engine {

    protected $_options;
    public function __construct($view, $di) {
        parent::__construct($view, $di);
    }

    public function setOptions($options = null) {
        $this->_options = $options;
    }

    public function getOptions() {
        return $this->_options;
    }

    public function render($path, $params) {
        $view    = $this->_view;
        $options = $this->_options;
        $Extra = new \ParsedownExtra();
        echo $Extra->text(file_get_contents($path));
    }
}
