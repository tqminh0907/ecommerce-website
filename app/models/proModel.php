<?php

$pro = new Pro();
$images = new Images();
$dataPro = [];
$err = '';

$word = isset($_REQUEST['word'])?$_REQUEST['word']:'';
$click = isset($_REQUEST['click'])?$_REQUEST['click']:'';
$pro_id = isset($_REQUEST['pro_id'])?$_REQUEST['pro_id']:'';
$pro_name = isset($_REQUEST['pro_name'])?$_REQUEST['pro_name']:'';
$pro_price = isset($_REQUEST['pro_price'])?$_REQUEST['pro_price']:0;
$pro_content = isset($_REQUEST['pro_content'])?$_REQUEST['pro_content']:'';
$cat_id = isset($_REQUEST['cat_id'])?$_REQUEST['cat_id']:'';
$img_id = isset($_REQUEST['img_id'])?$_REQUEST['img_id']:'';
$img_name = isset($_REQUEST['img_name'])?$_REQUEST['img_name']:'';

$pro_avatar = '';
if (isset($_FILES['pro_avatar'])) {
    if ($_FILES['pro_avatar']['error'] == 0) {
        $pro_avatar = $_FILES['pro_avatar']['name'];
        move_uploaded_file($_FILES['pro_avatar']['tmp_name'], '../assets/images/products/'.$pro_avatar);
    }
}

$temp = array();
$img_name = array();
$type = array();
$errFile = array();
$arrImg = array("image/png", "image/jpeg", "image/bmp", "image/jpg");

if (isset($_FILES['pro_images'])) :
    foreach ($_FILES['pro_images']['error'] as $file) {
        $errFile[] = $file;
    }
    foreach ($_FILES['pro_images']['name'] as $file) {
        $img_name[] = $file;
    }
    foreach ($_FILES['pro_images']['tmp_name'] as $file) {
        $temp[] = $file;
    }
    foreach ($_FILES['pro_images']['type'] as $file) {
        $type[] = $file;
    }
endif;

$dataPro = $pro->getAll();

if ($cat_id != "") {
    $dataPro = $pro->getByCat($cat_id);
}

switch ($click) :
    case 'addPro':
        $pro->create($pro_name, $pro_avatar, $pro_content, $pro_price, $cat_id);
        $pro_id = $pro->lastId();
        for ($i = 0; $i < count($img_name); $i++) {
            if ($errFile[$i]>0) {
                $err .="Error image file <br>";
            } else {
                if (!in_array($type[$i], $arrImg))
                    $err .="don't image file";
                else
                {	
                    if (!move_uploaded_file($temp[$i], '../assets/images/products/'.$img_name[$i]))
                        $err .="Không thể lưu file<br>";
                    else
                        $images->create($pro_id, $img_name[$i]);
                }
            }
        }
        ?>
        <script>
            alert('Add product successful!!!');
            window.location='index.php?controller=products';
        </script>
        <?php
        break;

    case 'editPro':
        if ($pro_avatar == '') {
            $prod = [];
            $prod = $pro->getAvatarById($pro_id);
            $pro_avatar = $prod[0]['pro_avatar'];
        }
        $pro->edit($pro_name, $pro_avatar, $pro_content, $pro_price, $cat_id, $pro_id);
        for ($i = 0; $i < count($img_name); $i++) {
            if ($errFile[$i]>0) {
                $err .="Error image file <br>";
            } else {
                if (!in_array($type[$i], $arrImg)) {
                    $err .="don't image file";
                } else {	
                    if (!move_uploaded_file($temp[$i], '../assets/images/products/'.$img_name[$i])) {
                        $err .="Không thể lưu file<br>";
                    } else {
                        $images->create($pro_id, $img_name[$i]);
                    }
                }
            }
        }
        ?><script>
            alert('Edit product successful!!!');
            window.location='index.php?controller=products';
        </script><?php
        break;

    case 'deletePro':
        $pro->delete($pro_id);
        ?><script>
            alert('Delete product successful!!!');
            window.location='index.php?controller=products';
        </script><?php
        break;

    case 'deleteImg':
        $images->delete($img_id);
        ?><script>
            alert('Delete image successful!!!');
            window.location='index.php?controller=products&action=edit&pro_id=<?php echo $pro_id ?>';
        </script><?php
        break;

    case 'search':
        if ($word == '') :
            $dataPro = $pro->getAll();
        else :
            $dataPro = $pro->getSearch($word);
        endif;
        break;
endswitch;
?>