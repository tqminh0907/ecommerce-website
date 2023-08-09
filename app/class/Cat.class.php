<?php

class Cat extends Db
{
    //Lấy tất cả danh mục
    function getAll() {
        return $this->selectQuery(
            'SELECT * FROM `categories`'
        );
    }

    //Lấy danh mục theo mã
    function getById($cat_id) {
        $arr = [
            ':cat_id' => $cat_id
        ];

        return $this->selectQuery(
            'SELECT * FROM `categories` WHERE `categories`.`cat_id` = :cat_id',
            $arr
        );
    }

    //Xóa danh mục
    function delete($cat_id) {
        $arr = [
            ':cat_id' => $cat_id
        ];

        return $this->updateQuery(
            'DELETE FROM `categories` WHERE `categories`.`cat_id` = :cat_id',
            $arr
        );
    }

    //Sửa danh mục
    function edit($cat_name, $parent_id, $cat_id) {
        $arr = [ 
            'cat_name' => $cat_name,
            'parent_id' => $parent_id,
            'cat_id' => $cat_id
        ];
        return $this->updateQuery(
            'UPDATE `categories` SET `cat_name` = :cat_name, `parent_id` = :parent_id WHERE `categories`.`cat_id` = :cat_id',
            $arr
        );
    }

    //Tạo danh mục mới
    function create($cat_name, $parent_id) {
        $arr=[
            'cat_name' => $cat_name,
            'parent_id' => $parent_id
        ];

        return $this->updateQuery(
            'INSERT INTO `categories` (`cat_name`, `parent_id`) VALUES (:cat_name, :parent_id)',
            $arr
        );
    }
}

?>