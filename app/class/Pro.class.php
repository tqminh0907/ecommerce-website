<?php

class Pro extends Db
{
    //Lấy tất cả sản phẩm
    function getAll() {
        return $this->selectQuery("SELECT * FROM `products` JOIN `categories` ON `products`.`cat_id` = `categories`.`cat_id`");
    }

    //Lấy sản phẩm theo mã sản phẩm
    function getById($pro_id) {
        $arr = [
            ':pro_id' => $pro_id
        ];

        return $this->selectQuery(
            'SELECT * FROM `products` WHERE `products`.`pro_id` = :pro_id',
            $arr
        );
    }

    //Lấy sản phẩm theo mã danh mục
    function getByCat($cat_id) {
        $arr = [
            ':cat_id' => $cat_id
        ];
        return $this->selectQuery(
            'SELECT * FROM `products` JOIN `categories` ON `products`.`cat_id` = `categories`.`cat_id` WHERE `products`.`cat_id` = :cat_id OR `categories`.`parent_id` = :cat_id',
            $arr
        );
    }

    //Lấy sản phẩm theo từ khóa tìm kiếm
    function getSearch($word) {
        $word = "%$word%";
        $arr = [
            ':word' => $word,
        ];
        return $this->selectQuery(
            'SELECT * FROM `products` JOIN `categories` ON `products`.`cat_id` = `categories`.`cat_id` WHERE `products`.`pro_id` LIKE :word OR `products`.`pro_name` LIKE :word OR `products`.`pro_price` LIKE :word OR `categories`.`cat_name` LIKE :word GROUP BY `products`.`pro_id`',
            $arr
        );
    }

    
    function getAvatarById($pro_id) {
        $arr = [
            ':pro_id' => $pro_id
        ];
        return $this->selectQuery(
            'SELECT `pro_avatar` FROM `products` WHERE `products`.`pro_id` = :pro_id',
            $arr
        );
    }

    //Xóa sản phẩm
    function delete($pro_id) {
        $arr = [
            ':pro_id' => $pro_id
        ];
        return $this->updateQuery(
            'DELETE FROM `products` WHERE `products`.`pro_id` = :pro_id',
            $arr
        );
    }

    //Sửa sản phẩm
    function edit($pro_name, $pro_avatar, $pro_content, $pro_price, $cat_id, $pro_id) {
        $arr = [
            'pro_name' => $pro_name,
            'pro_avatar' => $pro_avatar,
            'pro_content' => $pro_content,
            'pro_price' => $pro_price,
            'cat_id' => $cat_id,
            'pro_id' => $pro_id
        ];
        return $this->updateQuery(
            'UPDATE `products` SET `pro_name` = :pro_name, `pro_avatar` = :pro_avatar, `pro_content` = :pro_content, `pro_price` = :pro_price, `cat_id` = :cat_id WHERE `products`.`pro_id` = :pro_id',
            $arr
        );
    }

    //Tạo sản phẩm mới
    function create($pro_name, $pro_avatar, $pro_content, $pro_price, $cat_id) {
        $arr = [
            'pro_name' => $pro_name,
            'pro_avatar' => $pro_avatar,
            'pro_content' => $pro_content,
            'pro_price' => $pro_price,
            'cat_id' => $cat_id
        ];
        return $this->updateQuery(
            'INSERT INTO `products` (`pro_name`, `pro_avatar`, `pro_content`, `pro_price`, `cat_id`) VALUES (:pro_name, :pro_avatar, :pro_content, :pro_price, :cat_id)',
            $arr
        );
    }
}

?>