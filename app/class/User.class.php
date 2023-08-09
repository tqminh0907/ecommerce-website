<?php

class User extends Db {

    //Đăng ký tài khoản user mới
    function signup($user_email, $user_pass, $user_name, $user_phone, $user_address, $administrator = 0) {
        $arr = [
            ':user_email' => $user_email, 
            ':user_pass' => $user_pass, 
            ':user_name' => $user_name, 
            ':user_phone' => $user_phone, 
            ':user_address' => $user_address, 
            ':administrator' => $administrator
        ];
        return $this->updateQuery(
            'INSERT INTO `users` (`user_email`, `user_pass`, `user_name`, `user_phone`, `user_address`, `administrator`) 
             VALUES (:user_email, :user_pass, :user_name, :user_phone, :user_address, :administrator)',
            $arr
        );
    }

    //lấy thông tin user
    function signin($user_email, $user_pass) {
        $arr = [
            ':user_email' => $user_email, 
            ':user_pass' => $user_pass
        ];
        return $this->selectQuery(
            'SELECT * 
             FROM `users` 
             WHERE `users`.`user_email` = :user_email AND `users`.`user_pass` = :user_pass',
            $arr
        );      
    }

    function getAll() {
        return $this->selectQuery('SELECT * FROM `users`');
    }
}