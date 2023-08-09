<?php

$user = new User();
$dataUser = [];

$click = isset($_REQUEST['click'])?$_REQUEST['click']:'';
$user_email = isset($_REQUEST['user_email'])?$_REQUEST['user_email']:'';
$user_pass = isset($_REQUEST['user_pass'])?$_REQUEST['user_pass']:'';
$user_pass = MD5($user_pass);
$user_name = isset($_REQUEST['user_name'])?$_REQUEST['user_name']:'';
$user_phone = isset($_REQUEST['user_phone'])?$_REQUEST['user_phone']:'';
$user_address = isset($_REQUEST['user_address'])?$_REQUEST['user_address']:'';
$administrator = isset($_REQUEST['administrator'])?$_REQUEST['administrator']:0;

$dataUser = $user->getAll();

//Đăng ký tk user
if ($click == 'signup') {
    $user->signup($user_email, $user_pass, $user_name, $user_phone, $user_address, $administrator);
    ?><script>
        alert('Sign up successful!!!');
        window.location="index.php?controller=users";
    </script><?php
}

?>