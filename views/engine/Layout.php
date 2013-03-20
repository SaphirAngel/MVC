<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 14:25
 * To change this template use File | Settings | File Templates.
 */

class Layout {

    private $path;
    private $response;

    private $compositeViewBefore;
    private $compositeViewAfter;


    public function __construct($response) {
        $this->compositeViewAfter = new CompositeView();
        $this->compositeViewBefore = new CompositeView();
        $this->response = $response;
    }

    public function add_after($view) {
        $this->compositeViewAfter->attach_view($view);
    }

    public function add_before($view) {
        $this->compositeViewBefore->attach_view($view);
    }

    public function get_before_content() {
        return $this->compositeViewBefore;
    }

    public function get_after_content() {
        return $this->compositeViewAfter;
    }
}