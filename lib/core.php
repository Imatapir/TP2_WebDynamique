<?php
session_start();

function safe($param){
    return addslashes($param);
}

function check_session(){
    if(!isset($_SESSION['fingerPrint']) || $_SESSION['fingerPrint'] !== md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
        header('location:?controller=user&function=login');
        exit();
    }
}

function render($file, $data = null){
    $layout_file = VIEW_DIR."/layouts/layout.php";
    ob_start();
    include_once(VIEW_DIR."/".$file);
    $content = ob_get_clean();
    include_once($layout_file);
}

?>
