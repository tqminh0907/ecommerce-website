<?php
class homeController extends baseController {

    //Trang chính sản phẩm
    public function index() {
        include './app/models/catModel.php';
        include './app/models/proModel.php';

        return $this->view("home/index", [
            'dataCat' => $dataCat,
            'dataPro' => $dataPro
        ]);  
    }

    //Trang chi tiết sản phẩm
    public function details() {
        include './app/models/proModel.php';
        include './app/models/evaluateModel.php';

        $dataPro = $pro->getById($pro_id);

        return $this->view("home/details/index", [
            'dataPro' => $dataPro,
            'dataEvaluate' => $dataEvaluate,
            'checkEvaluate' => $checkEvaluate
        ]);
    }
}

?>