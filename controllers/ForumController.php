<?php

function forum_controller_index(){
    require_once(MODEL_DIR."/forum.php");
    $data = forum_select();
    render("forum/index.php", $data);
}

function forum_controller_create(){
    check_session();
    render("forum/create.php");
}

function forum_controller_show($request){
    // print_r($request);
    $id = $request['id'];
    // echo $id;
    require_once(MODEL_DIR."/forum.php");
    $data = forum_select_id($id);
    // print_r($data);
    render("forum/show.php", $data);
}

function forum_controller_edit($request){
    check_session();
    $id = $request['id'];
    require_once(MODEL_DIR."/forum.php");
    $forum = forum_select_id($id);

    $data = array('forum' => $forum);

    render("forum/edit.php", $data);
}

function forum_controller_store($request){
    check_session();
    // print_r($request);
    require_once(MODEL_DIR."/forum.php");
    $data = forum_insert($request);
    //echo $data;
    header('location:?controller=forum&function=show&id='.$data);
}

function forum_controller_delete($request){
    check_session();
    // print_r($request);
    require_once(MODEL_DIR."/forum.php");
    $data = forum_delete($request);
    if($data){
        header('location:?controller=forum');
        exit();
    }else{
        echo "error";
    }
}

function forum_controller_update($request){
    check_session();
    // print_r($request);
    require_once(MODEL_DIR."/forum.php");
    $data = forum_update($request);
    if($data){
        header('location:?controller=forum');
        exit();
    }else{
        echo "error";
    }
}

?>
