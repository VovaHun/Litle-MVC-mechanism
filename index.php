<?php
session_start();
define("ROOT_DIR",dirname(__FILE__).'/');

require_once "vendor/autoload.php"; //автозагрузчик классов
require_once "vendor/main.php"; //основной класс приложения


$application = new Application();	
$application->run();


$rout = new Routing();
$rout -> url('GET','/','HomeController@index');
$rout -> url('GET','admin','AdminController@admin');
$rout -> url('GET','out','AdminController@out');



