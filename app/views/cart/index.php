<?php 
    $totalQty = 0;
    foreach ($dataCart as $key => $value) {
        $totalQty += ($value['quantity']);
    }
?>
<div class="container">
    <p class="h1 w-100 text-start m-3 fw-bold">Cart</p>
    <div class="row m-1">
        <div class="col-md-7 col-xs-12">
            <?php
            $sum = 0;
            foreach ($dataCart as $key => $value) {
            ?>
                <div class="card mb-3 bg-light border border-dark" >
                    <div class="card-header d-flex justify-content-end">
                        <a href="index.php?controller=cart&click=delete&pro_id=<?php echo $value['pro_id'] ?>" class="btn btn-close" aria-label="Close"></a>
                    </div>
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./assets/images/products/<?php echo $value['pro_avatar'] ?>" class="img-fluid rounded-start p-4" alt="<?php echo $value["pro_name"] ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value['pro_name'] ?></h5>
                                <p class="card-text"><small class="text-muted">Price: <?php echo number_format($value['pro_price']) ?> ₫/1</small></p>
                                <p class="card-text">quantity: <input type="number" value="<?php echo $value['quantity'] ?>"> </p>
                            </div>
                            <div class="card-body text-end border-top">
                                Total: <p class="fw-bold"><?php echo number_format($value['quantity']*$value['pro_price']); 
                                        $sum+=($value['quantity']*$value['pro_price']); ?> ₫</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-5 col-xs-12 h-100">
            <div class="card border-2 border-dark bg-light p-2">
                <div class="card-header text-center h2 border-bottom">Order Summary</div>
                <div class="card-body">
                    <div class="jusitfy-content-between text-start w-100 row"><p class="col">Have</p><p class="col text-end"><?php echo $totalQty ?> items</p></div>
                    <div class="jusitfy-content-between text-start w-100 row"><p class="col">Delivery</p><p class="col text-end">FREE</p></div>
                    <div class="jusitfy-content-between text-start w-100 row border-top border-dark"><p class="col">Toltal:</p><p class="col text-end"><?php echo number_format($sum) ?> ₫</p></div>
                </div>
                <div class="card-footer">   
                    <a href="index.php?controller=cart&action=order" class="btn btn-dark w-100 fw-bold">CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
</div>