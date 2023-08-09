<?php

class Order extends Db
{
    public function create($user_id = null, $cus_id = null, $note, $status = 0) {
        $arr = [
            ':user_id' => $user_id,
            ':cus_id' => $cus_id,
            ':note' => $note,
            ':status' => $status
        ];

        return $this->updateQuery(
            'INSERT INTO `orders` (`user_id`, `cus_id`, `note`, `status`) VALUES (:user_id, :cus_id, :note, :status)',
            $arr
        );
    }

    public function getByEmail($user_email) {
        $arr = [
            ':user_email' => $user_email
        ];
        
        return $this->selectQuery(
            'SELECT * FROM `orders` JOIN `users` ON `orders`.`user_id` = `users`.`user_id` WHERE `users`.`user_email` = :user_email',
            $arr
        );
    }

    public function getOrderId() {
        return $this->selectQuery(
            'SELECT `order_id` FROM `orders`'
        );
    }

    public function getAll() {
        return $this->selectQuery(
            'SELECT * FROM `orders` 
             LEFT JOIN `users` ON `orders`.`user_id` = `users`.`user_id` 
             LEFT JOIN `customers` ON `orders`.`cus_id` = `customers`.`cus_id`'
        );
    }

    public function editStatus($status, $order_id) {
        $arr = [
            ':status' => $status,
            ':order_id' => $order_id
        ];
        return $this->updateQuery(
            'UPDATE `orders` SET `status` = :status WHERE `orders`.`order_id` = :order_id',
            $arr
        );
    }

    public function delete($order_id) {
        $arr = [
            ':order_id' => $order_id
        ];
        return $this->updateQuery(
            'DELETE FROM `orders` WHERE `orders`.`order_id` = :order_id',
            $arr
        );
    }

    public function getById($order_id) {
        $arr = [
            ':order_id' => $order_id
        ];
        return $this->selectQuery(
            'SELECT
                 *
             FROM
                 `orders`
             LEFT JOIN `users` ON `orders`.`user_id` = `users`.`user_id`
             LEFT JOIN `customers` ON `orders`.`cus_id` = `customers`.`cus_id`
             WHERE `orders`.`order_id` = :order_id',
             $arr
        );
    }
}

?>