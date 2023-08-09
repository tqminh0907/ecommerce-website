<?php

class ordersController extends baseController {

    public function index() {
        include "../app/models/orderModel.php";

        $dataOrder = $order->getAll();

        $dataOrders = [];

        foreach ($dataOrder as $key=>$value) {
            if ($value['user_id'] != '') {
                $dataOrders[$key]['order_id'] = $value['order_id'];
                $dataOrders[$key]['cus_id'] = $value['user_id'];
                $dataOrders[$key]['name'] = $value['user_name'];
                $dataOrders[$key]['email'] = $value['user_email'];
                $dataOrders[$key]['phone'] = $value['user_phone'];
                $dataOrders[$key]['address'] = $value['user_address'];
                $dataOrders[$key]['note'] = $value['note'];
                $dataOrders[$key]['status'] = $value['status'];
            } else {
                $dataOrders[$key]['order_id'] = $value['order_id'];
                $dataOrders[$key]['cus_id'] = $value['cus_id'];
                $dataOrders[$key]['name'] = $value['cus_name'];
                $dataOrders[$key]['email'] = $value['cus_email'];
                $dataOrders[$key]['phone'] = $value['cus_phone'];
                $dataOrders[$key]['address'] = $value['cus_address'];
                $dataOrders[$key]['note'] = $value['note'];
                $dataOrders[$key]['status'] = $value['status'];
            }
        }

        return $this->view("orders/index", [
            'dataOrders' => $dataOrders
        ]);
    }

    public function add() {
        
    }

    public function edit() {
        
    }
}
?>