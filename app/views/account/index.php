<?php

if (!isset($_SESSION['account']))
    include './app/views/account/signin.php';
else {
    include './app/views/account/profile.php';
}

?>