<?php

function user_controller_create(){
    render("user/create.php");
}

function user_controller_store($request){
    require_once(MODEL_DIR."/user.php");
    $data = user_store($request);
    header('location:?controller=user&function=login');
}

function user_controller_login(){
    $data = array('msg' => isset($_REQUEST['msg']) ? $_REQUEST['msg'] : null);
    render("user/login.php", $data);
}

function user_controller_auth($request){
    require_once(MODEL_DIR."/user.php");
    user_auth($request);
}

function user_controller_logout(){
    session_destroy();
    header('location:?controller=user&function=login');
}

?>
