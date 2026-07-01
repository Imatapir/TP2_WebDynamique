<?php

function user_select(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM user ORDER BY user_pseudonyme ASC;"; 
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;
}

function user_store($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, ['cost' => 10]);
    $sql = "INSERT INTO user (user_name, user_pseudonyme, user_birthdate, user_password) VALUES ('$user_name', '$user_pseudonyme', '$user_birthdate', '$user_password')";    
    if(mysqli_query($connex, $sql)){
        return true;
    }else{
        return false;
    }
}

function user_auth($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "SELECT * FROM user WHERE user_pseudonyme = '$user_pseudonyme'";
    $result = mysqli_query($connex, $sql);
    $count = mysqli_num_rows($result);
    if($count === 1){
        $user = mysqli_fetch_assoc($result);
        if(password_verify($user_password, $user['user_password'])){
            session_regenerate_id();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_pseudonyme'] = $user['user_pseudonyme'];
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
            header('location:?controller=forum');
        }else{
            header('location:?controller=user&function=login&msg=2');
        }
    }else{
        header('location:?controller=user&function=login&msg=1');
    }
}

?>
