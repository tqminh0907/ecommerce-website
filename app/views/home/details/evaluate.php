<?php
// hàm in star
function star($rate) {
    for ($i = 0; $i < 5; $i++) {
        if ($rate > 0.5) {
            ?><i class="bi bi-star-fill"></i><?php
        }
        if ($rate <= 0.5 && $rate > 0) {
            ?><i class="bi bi-star-half"></i><?php
        }
        if ($rate <= 0) {
            ?><i class="bi bi-star"></i><?php
        }
        $rate--;
    }
}
?>
<h2 class="fw-bold">Rates & Reviews</h2>
<div class="col-lg-3">
    <p class="fw-bold"><?php echo count($dataEvaluate); ?> Reviews</p>
    <div class="bg-success d-flex justify-content-center h3 pt-4 pb-4 p-2">
    <?php
        $rateAverage = 0;
        if (count($dataEvaluate) != 0) {
            //tính điểm rate trung bình
            $sum = 0;
            for ($i = 0; $i < count($dataEvaluate); $i++) {
                $sum += $dataEvaluate[$i]["rate"];
            }
            $rateAverage = $sum/count($dataEvaluate);
        }
        star($rateAverage);
    ?>
    <h3 class="fw-bold ms-2"><?php echo round($rateAverage, 1) ?></h3>
    </div>
</div>
<div class="col-lg-9">
    <?php
    foreach ($dataEvaluate as $key=>$value) {
        ?>
            <div class="bg-light p-2 m-2">
                <p class="fw-bold"><?php echo $value['user_name'] ?></p>
                <p><?php star($value['rate']) ?></p>
                <p><?php echo $value['review'] ?></p>
            </div>
        <?php
    }
    ?>
</div>