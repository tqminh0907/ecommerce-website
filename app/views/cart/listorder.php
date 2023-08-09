<div class="container">
    <h2>List Order</h2>
    <table class="table text-center">
        <tr>
            <thead>
                <td>#</td>
                <td>Order ID</td>
                <td>user name</td>
                <td>user phone</td>
                <td>Total payment</td>
                <td>Order status</td>
            </thead>
        </tr>
        <?php
            foreach ($dataOrder as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value["order_id"] ?></td>
                    <td><?php echo $value["user_name"] ?></td>
                    <td><?php echo $value["user_phone"] ?></td>
                    <td><?php echo number_format($value["totalpayment"]) ?> ₫</td>
                    <td>
                        <?php
                            if ($value['status'] == 0) {
                                ?><p class="text-danger fw-bold">Processing</p><?php
                            } else {
                                ?><p class="text-success fw-bold">Completed</p><?php
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['status'] == 0) {
                            ?><a class="btn btn-dark">Pay</a><?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>