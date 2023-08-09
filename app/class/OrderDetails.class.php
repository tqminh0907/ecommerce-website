<?php

class OrderDetails extends Db
{
    //Tạo mới chi tiết đơn hàng
    public function create($order_id, $pro_id, $quantity) {
        $arr = [
            ':order_id' => $order_id,
            ':pro_id' => $pro_id,
            ':quantity' => $quantity];
        return $this->updateQuery(
            'INSERT INTO `order_details` (`order_id`, `pro_id`, `quantity`) VALUES (:order_id, :pro_id, :quantity)',
            $arr
        );
    }

    //Lấy chi tiết đơn hàng theo mã đơn hàng
    public function getByOrderId($order_id) {
        $arr = [
            ':order_id' => $order_id
        ];
        return $this->selectQuery(
            'SELECT * FROM `order_details` JOIN `products` ON `order_details`.`pro_id` = `products`.`pro_id` WHERE `order_details`.`order_id` = :order_id',
            $arr
        );
    }
}

?>