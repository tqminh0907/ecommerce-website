<?php
    $cartQty = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $cartQty += $value;
        }
    } 
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark bg-gradient sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?controller=home&action=index">MINH STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"> <a class="nav-link" href="javascript:void(0)">products</a> </li>
                <li class="nav-item"> <a class="nav-link" href="javascript:void(0)">contacts</a> </li>
                <li class="nav-item"> <a class="nav-link" href="javascript:void(0)">about</a> </li>
            </ul>
            <form class="d-flex" action="index.php?controller=home" method="get">
                <input class="form-control me-2" name="word" type="text" placeholder="Search..." value="<?php if(isset($_GET['word'])) echo $_GET['word'];  ?>">
                <input class="btn btn-primary btn-gradient" type="submit" name="click" value="search">
            </form>     
        </div>
    </div> 
</nav>
<div class="d-flex container-fluid bg-light bg-gradient justify-content-end">
        <?php
        if (!isset($_SESSION["account"])) {
            ?>
                <a href="index.php?controller=account&action=signin" class="nav-link link-dark lh-lg"><i class="bi bi-person-circle"></i> sign in</a>
            <?php
        } else {
            ?>
                <div class="dropdown">
                    <p class="nav-link link-dark fw-bold dropdown- mb-0" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> <?php echo $_SESSION['account'][0]['user_name'] ?> <i class="bi bi-chevron-compact-down"></i>
                    </p>
                    <ul class="dropdown-menu bg-dark bg-gradient" aria-labelledby="accountDropdown">
                        <li><a href="index.php?click=profile" class="nav-link link-info dropdown-item">my profile</a></li>
                        <li><a href="index.php?controller=cart&action=listorder" class="nav-link link-info dropdown-item">Orders</a></li>
                <?php
                    if ($_SESSION['account'][0]['administrator'] != 0) : ?>
                        <li><a href="./admin/index.php" class="nav-link link-warning dropdown-item">Administrator</a></li>
                <?php endif; ?>
                        <li><a href="index.php?controller=account&click=signout" class="nav-link link-danger dropdown-item">sign out</a></li>
                    </ul>
                </div>
            <?php
        }
        ?>
        <a href="index.php?controller=cart&action=index" class="nav-link link-dark fw-bold">
            <i class="bi bi-cart"></i> cart
            <span class="badge bg-dark rounded-pill"><?php echo $cartQty ?></span>
        </a>
</div>
