<?php

function forum_select(){
    require(CONNEX_DIR);
    $sql = "SELECT forum.forum_id, forum_title, forum_article, forum_date, user_pseudonyme FROM forum 
    INNER JOIN user ON forum.user_id = user.user_id
    ORDER BY forum_date;"; 
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function forum_select_id($id){
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $id);
    $sql = "SELECT forum.forum_id, forum_title, forum_article, forum_date, user_pseudonyme, forum.user_id FROM forum 
    INNER JOIN user ON forum.user_id = user.user_id WHERE forum.forum_id = '$id';"; 
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $result;
}

function forum_insert($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $user_id = mysqli_real_escape_string($connex, $_SESSION['user_id']);
    $sql = "INSERT INTO forum (forum_title, forum_article, user_id) VALUES ('$forum_title', '$forum_article', '$user_id')";    
    if(mysqli_query($connex, $sql)){
        return mysqli_insert_id($connex);
    }else{
        return false;
    };
}

function forum_delete($request){
    require(CONNEX_DIR);
    $id = mysqli_real_escape_string($connex, $request['id']);
    $user_id = mysqli_real_escape_string($connex, $_SESSION['user_id']);
    $check = mysqli_query($connex, "SELECT forum_id FROM forum WHERE forum_id = '$id' AND user_id = '$user_id'");
    if(mysqli_num_rows($check) === 0){
        header('location:?controller=forum');
        exit();
    }
    $sql = "DELETE FROM forum WHERE forum_id = '$id'";
    if(mysqli_query($connex, $sql)){
        return true;
    }else{
        return false;
    };
}

function forum_update($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $user_id = mysqli_real_escape_string($connex, $_SESSION['user_id']);
    $check = mysqli_query($connex, "SELECT forum_id FROM forum WHERE forum_id = '$id' AND user_id = '$user_id'");
    if(mysqli_num_rows($check) === 0){
        header('location:?controller=forum');
        exit();
    }
    $sql = "UPDATE forum SET forum_title = '$forum_title', forum_article = '$forum_article', user_id = '$user_id' WHERE forum_id = '$id'";   
    if(mysqli_query($connex, $sql)){
        return true;
    }else{
        return false;
    };
}

?>
