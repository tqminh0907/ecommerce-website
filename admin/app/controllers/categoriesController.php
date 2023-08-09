<?php

class categoriesController extends baseController {

    public function index() {
        include "../app/models/catModel.php";

        return $this->view("categories/index", [
            'dataCat' => $dataCat
        ]);
    }

    public function add() {
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
                    categoryRecusive($dataCat, $parent_id, $value['cat_id'], $text.'|--- ');
                }
            }
        }

        return $this->view('categories/add', [
            'dataCat' => $dataCat,
            'cat_name' => $cat_name,
            'parent_id' => $parent_id
        ]);
    }

    public function edit() {
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
                    categoryRecusive($dataCat, $parent_id, $value['cat_id'], $text.'|--- ');
                }
            }
        }

        $Cat = $cat->getById($cat_id);

        return $this->view("categories/edit", [
            'dataCat' => $dataCat,
            'Cat' => $Cat,
            'cat_id' => $cat_id
        ]);
    }
}
?>