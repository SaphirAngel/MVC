<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 13:25
 * To change this template use File | Settings | File Templates.
 */

class ViewControler
{
    protected $response;
    private $compositeView;

    public static function render($module, $part, Response $response, $format = 'html', $layout = 'default')
    {
        $compositeView = new CompositeView();

        $viewClass = $module.'View';
        $partialView = new $viewClass($response);
        $partialView->$part();

        return $compositeView->attach_view($partialView->get_composite());
    }

    public function __construct(Response $response)
    {
        $this->response = $response;
        $this->compositeView = new CompositeView();
    }

    public function attach($partialView, $partialViewId = '', $position = PUSH_VIEW)
    {
        $this->compositeView->attach_view($partialView, $partialViewId, $position);
    }

    public function set_layout($layoutName) {
        $class = $layoutName.'Layout';
        $layout = new $class($this->response);
        $this->attach($layout->get_before_content(), 'terra_header');
        $this->attach($layout->get_after_content(), 'terra_footer');
    }

    public function get_composite()
    {
        return $this->compositeView;
    }

}