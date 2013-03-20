<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

class Request {

    private $values;

    public function __construct() {
        $this->values['controller'] = '';
        $this->values['action'] = '';
    }

    public function get_param($key) {
        if (isset($this->values[$key])) return $this->values[$key];
        else return null;
    }

}