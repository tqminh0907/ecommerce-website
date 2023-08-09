<?php

class Customer extends Db {

    //Tạo khách hàng mới
    function create($cus_email, $cus_name, $cus_phone, $cus_address) {
        $arr = [
            ':cus_email' => $cus_email,
            ':cus_name' => $cus_name,
            ':cus_phone' => $cus_phone,
            ':cus_address' => $cus_address,
        ];
        return $this->updateQuery(
            'INSERT INTO `customers` (`cus_email`, `cus_name`, `cus_phone`, `cus_address`) VALUES (:cus_name, :cus_email, :cus_phone, :cus_address)',
            $arr
        );
    }

    //lấy thông tin customer
    function getById($cus_email, $cus_pass) {
        $arr = [
            ':cus_email' => $cus_email, 
            ':cus_pass' => $cus_pass
        ];
        return $this->selectQuery(
            'SELECT * FROM `customers` WHERE `customers`.`cus_id` = :cus_id',
            $arr
        );      
    }
}