<?php

// init session
if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['account'])) {
    if ($_SESSION['account'][0]['administrator'] != 1 && $_SESSION['account'][0]['administrator'] != 1) {
        header('location:../index.php?controller=account&action=signin');
        exit;
    }
}

// load database
include "../config/database.php";

date_default_timezone_set('Asia/Saigon');

// auto load class
function loadClass($className)
{
    include "../app/class/$className.class.php";
}
spl_autoload_register('loadClass');

// load controller
include "./app/controllers/baseController.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    
    <?php include './assets/links/links.php' ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

      <?php include 'app/views/partials/header.php' ?>

      <?php include 'app/views/partials/sidebar.php' ?>

      <?php include "../routes/route.php" ?>

      <?php include 'app/views/partials/control.php' ?>

      <?php include 'app/views/partials/footer.php' ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include './assets/scripts/scripts.php' ?>
</body>
</html>
