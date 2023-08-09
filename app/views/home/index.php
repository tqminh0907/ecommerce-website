<div class="row mt-3 container-fluid">
    <div class="col-12 col-md-3">
    <p class="h2">Categories</p>
    <?php include './app/views/home/categories.php' ?>
    </div>
    <div class="col-12 col-md-9">
    <?php
    $click = isset($_GET['click'])?$_GET['click']:'';
    if ($click == 'search') {
        $word = isset($_GET['word'])?$_GET['word']:'';
        ?>
            <h2 class="text-center"><?php echo $click ?></h2>
            <h5 class="text-center text-secondary">word: <?php echo $word ?></h5>
        <?php
    } else {
        $cat_name = isset($_GET['cat_name'])?$_GET['cat_name']:'All Products'
    ?>
        <h2>
            <?php echo $cat_name;
    }?></h2>
        <?php include './app/views/home/products.php' ?>
    </div>
</div>

