<?php

class homeController extends baseController {

    //trang chính admin
    public function index() {
        return $this->view("home/index");  
    }

}

?>