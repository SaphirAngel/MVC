<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

class Response {
    private $values;
    public function add($key, $value) {
        $this->values[$key] = $value;
    }

    public function get_all() {

    }

    public function get($key, $default = '') {
        if (isset($this->values[$key])) return $this->values[$key];
        else return $default;
    }
}