<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 14:10
 * To change this template use File | Settings | File Templates.
 */

class DefaultLayout extends  Layout{

    public function __construct($response) {
        parent::__construct($response);
        $this->path = 'layouts/default/';
        $this->response = $response;

        $this->before_content();
        $this->after_content();
    }

    public function before_content() {
        $headerView = new View($this->path.'header.php');
        $headerView->add_fields('title', $this->response->get('title'));
        $menuView = new View($this->path.'menu.php');

        $this->add_before($headerView);
        $this->add_before($menuView);
    }

    public function after_content() {
        $footerView = new View($this->path.'footer.php');
        $this->add_after($footerView);
    }
}