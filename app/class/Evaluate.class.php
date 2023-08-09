<?php

class Evaluate extends Db
{
    //Lấy các đánh giá theo id sản phẩm
    function getByProId($pro_id) {
        $arr = [
            ':pro_id' => $pro_id
        ];

        return $this->selectQuery(
            'SELECT * FROM `evaluates` JOIN `users` ON `evaluates`.`user_id` = `users`.`user_id` WHERE `evaluates`.`pro_id` = :pro_id', 
            $arr
        );
    }

    function getByProIdAndUserId($pro_id, $user_id) {
        $arr = [
            ':pro_id' => $pro_id,
            ':user_id' => $user_id,
        ];

        return $this->selectQuery(
            'SELECT * FROM `evaluates` WHERE `evaluates`.`pro_id` = :pro_id AND `evaluates`.`user_id` = :user_id', 
            $arr
        );
    }

    //tạo đánh giá mới
    function create($pro_id, $user_id, $rate, $review) {
        $arr = [
            ':pro_id' => $pro_id,
            ':user_id' => $user_id,
            ':rate' => $rate,
            ':review' => $review
        ];

        return $this->updateQuery(
            'INSERT INTO `evaluates` (`pro_id`,`user_id`, `rate`, `review`) VALUES (:pro_id, :user_id, :rate, :review)',
            $arr
        );
    }
}

?>