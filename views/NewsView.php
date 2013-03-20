<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 13:29
 * To change this template use File | Settings | File Templates.
 */

class NewsView extends ViewControler {

    public function read() {
    }

    public function listing() {
        $this->set_layout('Default');

        $compositeView = new CompositeView();
        foreach($this->response->get('newsList', array()) as $dataNews) {
            $compositeView->attach_view(new View('news/news.php', $dataNews));
        }

        $this->attach($compositeView);
    }

    public function delete_confirm() {
        $this->delete_confirm_js();
        $this->listing();
    }

    public function delete_confirm_js() {
        $partialView = new View('message/confirm.php');
        $partialView->add_fields('message', 'Êtes vous sûr de vouloir supprimer cette news ?');
        $partialView->add_fields('okUrl', 'suppression_news_'.$this->response['idNews'].'_confirmation.html');
        $partialView->add_fields('nokUrl', 'liste_news.html');

        $this->attach($partialView);
    }

    public function delete() {
        $templateName = 'success';
        if ($this->response->get('add_status', false) === false)
            $templateName = 'error';

        $partialViewError  = new View('messages/'.$templateName.'.php');
        $partialViewError->add_fields('message', $this->response->get('message'));
        $this->attach($partialViewError, 'message');

        $this->listing();
    }

    public function delete_json() {
        return $this->response->get('delete_message');
    }
}