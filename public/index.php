<?php
session_start();
require_once '../config/Auth.php';

function getParams(){
    $params = array();
    foreach($_GET as $key => $param){
        if($key != 'controller' && $key != 'action'){
            $params[$key] = $param;
        }
    }
    return $params;
}
if($_GET['action'] == 'logout'){
    session_destroy();
    echo json_encode(['msg' => 'YOUR SESSION HAS BEEN CLOSED']);
}

if($_GET['controller'] && $_GET['action']){
    if(Auth::isLogged()){
        $controller = ucfirst($_GET['controller'])."Controller";
        $action = $_GET['action'];
        require "../Controllers/$controller.php";
        $controller = new $controller();
        call_user_func_array(array($controller, $action), getParams());
    }else{
        exit;
    }
}