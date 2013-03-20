<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 13:56
 * To change this template use File | Settings | File Templates.
 */

class CompositeView
{
    private $viewList = array();
    private $blockList = array();

    public function attach_view($view, $key = '')
    {
        if (!empty($key) && !in_array($view, $this->blockList))
            $this->blockList[$key] = $view;
        else if (empty($key) && !in_array($view, $this->viewList)) {
            $this->viewList = $view;
        }

        return $this; //On retourne l'objet pour pouvoir chainer les attach
    }

    public function render()
    {
        $output = "";
        //Si on détecte un header on l'affiche avant tout
        if (isset($this->blockList['terra_header']))
            $output .= $this->blockList['terra_header']->render();

        foreach ($this->viewList as $view) {
            $output .= $view->render($this->blockList);
        }

        //Si on détecte un header on l'affiche après tout
        if (isset($this->blockList['terra_footer']))
            $output .= $this->blockList['terra_footer']->render();

        return $output;
    }

    public function json_render() {
        $output = array();
        foreach ($this->viewList as $key => $view) {
            if ($key === 'terra_header' || $key === 'terra_footer') continue;
            $output[] = $view->json_render();
        }
        return $output;
    }

    public function js_render() {
        $output = '';
        foreach ($this->viewList as $key => $view) {
            if ($key === 'terra_header' || $key === 'terra_footer') continue;
            $output .= $view->js_render();
        }
        return $output;
    }
}