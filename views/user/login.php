<h1>Login</h1>
<?php
$msg = '';
if(isset($data['msg'])){
    if($data['msg'] == 1){
        $msg = 'Please check username';
    }elseif($data['msg'] == 2){
        $msg = 'Please check password';
    }else{
        $msg = 'Error';
    }
}
?>
<form action="?controller=user&function=auth" method="post">
    <span class="text-danger"><?= $msg; ?></span>
    <label for="user_pseudonyme">Pseudonyme</label>
    <input type="text" name="user_pseudonyme" id="user_pseudonyme">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" id="user_password">
    <input type="submit" value="Login" class="btn">
</form>
