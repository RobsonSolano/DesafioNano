<?php 
session_start();
require_once("vendor/autoload.php");

$app = new Slim\Slim();

use \Challenge\Page;
use \Challenge\Model\Product;
use \Challenge\Model\Category;
use \Challenge\Model\Cart;
use \Challenge\Model\Address;
use \Challenge\Model\User;
use \Challenge\Model\Order;
use \Challenge\Model\OrderStatus;

$app->config('debug', true);

$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");

});

$app->run();

 ?>