<?php 

//echo phpinfo();

require_once("framework/model.php");
require_once('model.php');
require_once('controller.php');

session_start();

$controller = "index";
//var_dump($_GET);

if (isset($_GET["page"])) {
    $controller = $_GET["page"];
}

$flash=null;
if (isset($_SESSION['flash'])) {
    $flash=$_SESSION['flash'];
    unset($_SESSION['flash']);
}

$data = call_user_func($controller);

// var_dump($data);

if (isset($_GET["f"]) && $_GET["f"]=="json") {
    header('Content-type: text/json');
    echo json_encode($data);
} else {
    include("view/layout.php");
}

?>