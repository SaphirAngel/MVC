<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 13:40
 * To change this template use File | Settings | File Templates.
 */

class View {
    private $template;
    private $fields;
    private $blockList = array();

    public function __construct($template, $fields = array()) {
        $this->template = $template;
        $this->fields = $fields;
    }

    public function add_fields($fieldName, $fieldValue) {
        if (isset($this->fields[$fieldName]))
            echo 'Ecrasement de la valeur contenue dans '.$fieldName;

        $this->fields[$fieldName] = $fieldValue;
    }

    public function block($key) {
        if (isset($this->blockLis[$key])) {
            return $this->blockList[$key]->render();
        }
    }

    public function render($blockList = array()) {
        $this->blockList = $blockList;

        extract($this->fields);
        ob_start();
        include TEMPLATE_DIR.$this->template;
        return ob_get_clean();
    }

    public function json_render() {
        return json_encode($this->fields);
    }

    public function js_render() {
        return $this->render();
    }
}