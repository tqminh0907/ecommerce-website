<?php

class cartController extends baseController {

    //Trang giỏ hàng
    public function index() {
        include "./app/models/cartModel.php";
        return $this->view("cart/index", ["dataCart" => $dataCart]);
    }

    //Trang tạo đơn hàng
    public function order() {
        include "./app/models/orderModel.php";
        return $this->view("cart/order");
    }

    //Trang danh sách đơn hàng
    public function listorder() {
        include "./app/models/orderModel.php";

        $dataOrder = $order->getByEmail($user_email);

        foreach ($dataOrder as $key => $value) {
            $dataOrderDetails = $orderDetails->getByOrderId($value['order_id']);
            $total = 0;
            foreach ($dataOrderDetails as $keys => $values) {
                $total += ($values['pro_price']*$values['quantity']);
            }
            $dataOrder[$key]['totalpayment'] = $total;
        }

        return $this->view("cart/listorder", [
            'dataOrder' => $dataOrder
        ]);
    }
}

?>