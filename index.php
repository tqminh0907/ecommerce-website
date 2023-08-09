<?php

// init session
if (!isset($_SESSION)) session_start();

// load database
include "./config/database.php";

date_default_timezone_set('Asia/Saigon');

// auto load class
function loadClass($className)
{
    include "./app/class/$className.class.php";
}
spl_autoload_register('loadClass');

// load controller
include "./app/controllers/baseController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <title>webstore</title>
</head>
<body>

    <!-- HEADER -->
    <?php include "./app/views/partials/header.php" ?>

    <!-- BODY -->
    <?php include "./routes/route.php" ?>

    <!-- FOOTER -->
    <?php include "./app/views/partials/footer.php" ?>


    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>