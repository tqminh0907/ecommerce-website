<?php

class usersController extends baseController {

    public function index() {
        include '../app/models/userModel.php';

        return $this->view('users/index', [
            'dataUser' => $dataUser
        ]);
    }

    public function add() {
        include '../app/models/userModel.php';
        return $this->view('users/add');
    }

    public function edit() {
        
    }
}
?>