<?php

class accountController extends baseController 
{
    public function __construct() {
        include './app/models/accountModel.php';
    }

    //Trang đăng nhập
    public function signin() {
        return $this->view("account/signin");
    }

    //Trang đắng ký
    public function signup() {
        return $this->view("account/signup");
    }

    //Trang Thông tin user
    public function profile() {
        return $this->view("account/index");
    }
}