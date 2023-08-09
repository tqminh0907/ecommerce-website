<?php

$evaluate = new Evaluate();
$dataEvaluate = [];
$checkEvaluate = 0;

$click = isset($_REQUEST['click'])?$_REQUEST['click']:'';
$pro_id = isset($_REQUEST['pro_id'])?$_REQUEST['pro_id']:'';
$rate = isset($_REQUEST['rate'])?$_REQUEST['rate']:0;
$review = isset($_REQUEST['review'])?$_REQUEST['review']:'';
$user_id = isset($_SESSION['account'][0]['user_id'])?$_SESSION['account'][0]['user_id']:0;

//lấy tất cả đánh giả từ mã sản phẩm
$dataEvaluate = $evaluate->getByProId($pro_id);

$checkEvaluate = count($evaluate->getByProIdAndUserId($pro_id, $user_id));

if ($click == 'sendEvaluate') {
    $evaluate->create($pro_id, $user_id, $rate, $review);
    ?><script>
        alert('Evaluated successful!!!');
        window.location='index.php?action=details&pro_id=<?php echo $pro_id ?>';
    </script><?php
}
?>

