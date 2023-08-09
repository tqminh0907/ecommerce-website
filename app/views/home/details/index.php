<div class="container mt-5">

    <div class="row text-start border-bottom border-top border-dark">
        <div class="col-md-3 g-2">
            <img src="./assets/images/products/<?php echo $dataPro[0]['pro_avatar'] ?>" class="w-100 p-4" alt="">
        </div>
        <div class="col-md-7 g-2 text-dark">
            <p class="h4 fw-bold mt-3"><?php echo $dataPro[0]['pro_name']?></p>
            <p class="text-secondary">#<?php echo $dataPro[0]['pro_id'] ?></p>
            Price:<p class="h3 fw-bold text-danger"> <?php echo number_format($dataPro[0]['pro_price']) ?> ₫</p>
        </div>
        <div class="col-md-2 g-2 text-center mb-3">
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="cart">
                <input type="hidden" name="pro_id" value="<?php echo $dataPro[0]['pro_id'] ?>">
                <div class="d-flex">
                    <input type="number" class="form-control" name="quantity" value="1">
                    <button type="submit" name="click" value="add" class="btn btn-dark bg-gradient m-1"><i class="bi bi-cart-plus-fill"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="row text-start border-bottom border-dark">
        <p class="h5 fw-bold">Description</p>
        <div class="container w-100">
            <pre class="p-2"><?php echo $dataPro[0]['pro_content'] ?></pre>
        </div>
    </div>

    <div class="row">
        <?php include './app/views/home/details/evaluate.php' ?>
    </div>

    <?php if (isset($_SESSION['account']) && $checkEvaluate != 1) : ?>
        <div class="row">
            <form action="index.php" method="post">
                <p class="mt-2 mb-0">Rate</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rate" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="3">
                    <label class="form-check-label" for="inlineRadio2">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="4">
                    <label class="form-check-label" for="inlineRadio2">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="5">
                    <label class="form-check-label" for="inlineRadio2">5</label>
                </div>

                <p class="mt-2 mb-0">Review</p>
                <textarea name="review" class="form-control" id="review"></textarea>

                <input type="hidden" name="action" value="details">
                <input type="hidden" name="pro_id" value="<?php echo $dataPro[0]['pro_id'] ?>">
                <button type="submit" name="click" value="sendEvaluate" class="btn btn-primary m-1">Send</button>
            </form>
        </div>
    <?php endif; ?>
</div>