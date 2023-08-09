<?php

class productsController extends baseController {

    public function index() {
        include "../app/models/proModel.php";

        return $this->view("products/index", [
            'dataPro' => $dataPro
        ]);
    }

    public function add() {
        include '../app/models/proModel.php';
        include '../app/models/catModel.php';

        function categoryRecusive($dataCat, $parent_id = 0, $id = 0, $text = '') {
            foreach ($dataCat as $key => $value) {  
                $select= '';
                if ($value["parent_id"] == $id) {
                    if ($value["cat_id"] == $parent_id) {
                        $select = 'selected';
                    }
                    echo '<option value="' . $value['cat_id'] . '" ' . $select . '>';
                    echo $text . $value['cat_name'];
                    echo '</option>';
                    unset($dataCat[$key]);
                    categoryRecusive($dataCat, $parent_id, $value['cat_id'], $text.'|---');
                }
            }
        }

        return $this->view('products/add', [
            'dataCat' => $dataCat,
        ]);
    }

    public function edit() {
        include '../app/models/proModel.php';
        include '../app/models/catModel.php';

        function categoryRecusive($dataCat, $parent_id = 0, $id = 0, $text = '') {
            foreach ($dataCat as $key => $value) {  
                $select= '';
                if ($value["parent_id"] == $id) {
                    if ($value["cat_id"] == $parent_id) {
                        $select = 'selected';
                    }
                    echo '<option value="' . $value['cat_id'] . '" ' . $select . '>';
                    echo $text . $value['cat_name'];
                    echo '</option>';
                    unset($dataCat[$key]);
                    categoryRecusive($dataCat, $parent_id, $value['cat_id'], $text.'|---');
                }
            }
        }

        $dataPro = $pro->getById($pro_id);
        $dataImg = $images->getByProId($pro_id);

        return $this->view("products/edit", [
            'dataCat' => $dataCat,
            'dataPro' => $dataPro,
            'dataImg' => $dataImg
        ]);
    }
}
?>