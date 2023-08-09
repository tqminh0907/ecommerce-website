<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">
<?php
    if ($dataPro == null) {
    ?>
        <p class="text-muted h3 text-center w-100">Don't have products</p>
    <?php
    }
    foreach ($dataPro as $key=>$value) {
    ?>
        <div class="col g-2">
            <div class="card h-100 p-2 bg-light">
                <div class="card-img-top h-100">
                    <a href="index.php?action=details&pro_id=<?php echo $value['pro_id'] ?>">
                        <img src="./assets/images/products/<?php echo $value['pro_avatar'] ?>" class="w-100"  alt="<?php echo $value['pro_name'] ?>">
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-title fs-6 fw-bold"><?php echo $value['pro_name'] ?></p>
                    <p>category: <?php echo $value['cat_name'] ?></p>
                    <p class="text-disable">#<?php echo $value['pro_id'] ?></p>
                    <p class="card-text fw-bold fs-5"><?php echo number_format($value["pro_price"]) ?> ₫</p>
                </div>
                <div class="card-footer">
                    <div class="row row-cols">
                        <div class="col">
                            <a href="index.php?controller=cart&click=add&pro_id=<?php echo $value['pro_id'] ?>" class="btn btn-dark bg-gradient m-1"><i class="bi bi-cart-plus-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
?>
</div>
