<?php
/**
 * Created by JetBrains PhpStorm.
 * User: SaphirAngel
 * Date: 15/03/13
 * Time: 16:01
 * To change this template use File | Settings | File Templates.
 */

ini_set('display_errors', '1');
error_reporting(E_ALL);

include 'constants.php';
include 'views/engine/ViewControler.php';
include 'views/engine/CompositeView.php';
include 'views/engine/View.php';
include 'views/engine/Layout.php';


include 'Request.php';
include 'Response.php';

include 'views/NewsView.php';
include 'views/layouts/DefaultLayout.php';

/*
 * Données de test
 */
$response = new Response();
$response->add('title', 'Ceci est un titre');

$dataNews[]['title'] = 'titre news';
$dataNews[]['title'] = 'titre news 2';
$dataNews[]['title'] = 'titre news 3';

$response->add('newsList', $dataNews);
$response->add('add_status', true);
$response->add('message', "OK");

//Rendu test
$compositeView = ViewControler::render('News', 'delete', $response);
var_dump($compositeView->json_render());
var_dump(json_decode($compositeView->json_render()));
