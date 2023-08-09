<?php

$cat = new Cat();
$dataCat = [];

$actionName = isset($_REQUEST["action"])?$_REQUEST["action"]:"index";
$click = isset($_REQUEST["click"])?$_REQUEST["click"]:"";
$cat_id = isset($_REQUEST["cat_id"])?$_REQUEST["cat_id"]:"";
$cat_name = isset($_REQUEST["cat_name"])?$_REQUEST["cat_name"]:"";
$parent_id = isset($_REQUEST["parent_id"])?$_REQUEST["parent_id"]:0;

$dataCat = $cat->getAll();

switch ($click) {
    case 'add':
        $cat->create($cat_name, $parent_id);
        ?>
        <script>
            alert('Add category successfull!!!');
            window.location='index.php?controller=categories&action=add';
        </script>
        <?php
        break;
    case 'edit':
        $cat->edit($cat_name, $parent_id, $cat_id);
        ?><script>
            alert('Edit category successfull!!!');
            window.location='index.php?controller=categories';
        </script><?php
        break;
    case 'delete':
        $cat->delete($cat_id);
        ?><script>
            alert('Delete category successfull!!!');
            window.location='index.php?controller=categories';
        </script><?php
        break;
}

?>