<?php
$cart = new Cart();
$dataCart=[];

$click = isset($_REQUEST['click'])?$_REQUEST['click']:'';
$pro_id = isset($_REQUEST['pro_id'])?$_REQUEST['pro_id']:'';
$quantity = isset($_REQUEST['quantity'])?$_REQUEST['quantity']:1;

$dataCart = $cart->get();

//Thêm sản phẩm vào giỏ hàng
if ($click == 'add' && $pro_id != '' && $quantity > 0) {
    $cart->add($pro_id, $quantity);
    ?><script>
        window.location='index.php?controller=home'
    </script><?php
}

//Xóa sản phẩm khỏi giỏ hàng
if ($click == 'delete' && $pro_id != '') {
    $cart->delete($pro_id);
    ?><script>
        window.location='index.php?controller=cart'
    </script><?php
}

foreach ($dataCart as $key => $value) {
    $dataCart[$key][0]['quantity'] = $dataCart[$key]['quantity'];
    $dataCart[$key] = $dataCart[$key][0];
}
?>