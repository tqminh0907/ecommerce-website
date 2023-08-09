<?php

class Images extends Db
{
    //Lấy tất cả hình ảnh
    function getAll() {
        return $this->selectQuery(
            'SELECT * FROM `product_images`'
        );
    }

    //Lấy hình ảnh theo mã sản phẩm
    function getByProId($pro_id) {
        $arr = [
            ':pro_id' => $pro_id
        ];

        return $this->selectQuery(
            'SELECT * FROM `product_images` WHERE `product_images`.`pro_id` = :pro_id',
            $arr
        );
    }

    //Xóa hình ảnh
    function delete($img_id) {
        $arr = [
            ':img_id' => $img_id
        ];

        return $this->updateQuery(
            'DELETE FROM `product_images` WHERE `product_images`.`img_id` = :img_id',
            $arr
        );
    }

    //Tạo hình ảnh mới
    function create($pro_id, $img_name) {
        $arr = [
            ':pro_id' => $pro_id,
            ':img_name' => $img_name
        ];

        return $this->updateQuery(
            "INSERT INTO `product_images` (`pro_id`, `img_name`) VALUES (:pro_id, :img_name)",
            $arr
        );
    }
}

?>