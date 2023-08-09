<?php

class Account
{
    private $account;

    //Khởi tạo session tài khoản
    function __construct()
    {
        $this->account = isset($_SESSION['account'])?$_SESSION['account']:[];
    }

    //Xử lý đăng xuất
    function signout() {
        unset($_SESSION['account']);
    }

    //Xứ lý đằng nhập tài khoản
    function signin($user_email, $user_pass) {
        $user = new User();
        $_SESSION['account'] = $user->signin($user_email, $user_pass);
        if ($_SESSION['account'] == null)
            unset($_SESSION['account']);
    }

    //đăng ký tài khoản user
    function signup($user_email, $user_pass, $user_name, $user_phone, $user_address, $administrator) {
        $user = new User();
        $user->signup($user_email, $user_pass, $user_name, $user_phone, $user_address, $administrator);
    }
}