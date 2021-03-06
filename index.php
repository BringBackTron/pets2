<?php

//This is my CONTROLLER
/** Create a pet order form */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//require the autoload file
require_once('vendor/autoload.php');

//Create an instance of Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function() {
    //echo "Hello";
    $view = new Template();
    echo $view->render('views/home.html');
});

//define an order route
$f3->route('GET /order', function () {
    $view = new Template();
    echo $view->render('views/pet-order.html');
});

//define an order 2  route
$f3->route('POST /order2', function () {

    //var_dump($_POST);
    if(isset($_POST['pet'])) {
        $_SESSION['pet'] = $_POST['pet'];
    }
    if(isset($_POST['color'])) {
        $_SESSION['color'] = $_POST['color'];
    }
    $view = new Template();
    echo $view->render('views/pet-order2.html');
});

//define an order 3 route
$f3->route('POST /order3', function () {

    //var_dump($_POST);
    if(isset($_POST['name'])) {
        $_SESSION['name'] = $_POST['name'];
    }
    $view = new Template();
    echo $view->render('views/pet-order3.html');
});

//define a summary  route
$f3->route('POST /summary', function () {

    //var_dump($_POST);
    if(isset($_POST['additions'])) {
        $_SESSION['additions'] = implode(" ", $_POST['additions']);
    }

    $view = new Template();
    echo $view->render('views/summary.html');
});

//run fat free
$f3->run();