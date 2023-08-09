<?php
    $email = isset($_SESSION['account'][0]['user_email'])?$_SESSION['account'][0]['user_email']:'';
    $name = isset($_SESSION['account'][0]['user_name'])?$_SESSION['account'][0]['user_name']:'';
    $phone = isset($_SESSION['account'][0]['user_phone'])?$_SESSION['account'][0]['user_phone']:'';
    $address = isset($_SESSION['account'][0]['user_address'])?$_SESSION['account'][0]['user_address']:'';
?>

<div class="container">
    <h2 class="m-3 text-center">ORDER</h2>
    <h4 class="py-2">Customer information</h4>
    <form action="index.php" method="post">
        <input type="hidden" name="controller" value="cart">

        <div class="form-group mb-3">
            <label class="fw-bold">Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter customer email..." name="cus_email" value="<?php echo $email ?>">
        </div>

        <div class="form-group mb-3">
            <label class="fw-bold">Name</label>
            <input type="text" class="form-control" placeholder="Enter customer name..." name="cus_name" value="<?php echo $name ?>">
        </div>
    
        <div class="form-group mb-3">
            <label class="fw-bold">Phone</label>
            <input type="tel" class="form-control" placeholder="Enter customer phone..." name="cus_phone" value="<?php echo $phone ?>">
        </div>
    
        <div class="form-group mb-3">
            <label class="fw-bold">Address</label>
            <input type="text" class="form-control" placeholder="Enter Cosignee address..."  name="cus_address" value="<?php echo $address ?>">
        </div>

        <div class="form-group mb-3">
            <label class="fw-bold">Note</label>
            <textarea class="form-control" placeholder="Enter note..." name="note"></textarea>
        </div>
        
        <input type="hidden" name="action" value="order">

        <button type="submit" class="btn btn-dark" name="click" value="addorder">Complete</button>
    </form>

</div>