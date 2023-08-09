<?php
    $invoice = $order->getById($order_id);

    if (isset($invoice[0]['user_id'])) {
        $invoice['order_id'] =  $invoice[0]['order_id'];
        $invoice['cus_id']   =  $invoice[0]['user_id'];
        $invoice['name']     =  $invoice[0]['user_name'];
        $invoice['email']    =  $invoice[0]['user_email'];
        $invoice['phone']    =  $invoice[0]['user_phone'];
        $invoice['address']  =  $invoice[0]['user_address'];
        $invoice['note']     =  $invoice[0]['note'];
        $invoice['created_at'] = $invoice[0]['created_at'];
        $invoice['status']   =  $invoice[0]['status'];
    } else {
        $invoice['order_id'] =  $invoice[0]['order_id'];
        $invoice['cus_id']   =  $invoice[0]['cus_id'];
        $invoice['name']     =  $invoice[0]['cus_name'];
        $invoice['email']    =  $invoice[0]['cus_email'];
        $invoice['phone']    =  $invoice[0]['cus_phone'];
        $invoice['address']  =  $invoice[0]['cus_address'];
        $invoice['note']     =  $invoice[0]['note'];
        $invoice['created_at'] = $invoice[0]['created_at'];
        $invoice['status']   =  $invoice[0]['status'];
    }

    $invoiceDetails = $orderDetails->getByOrderId($order_id);

$p1 ='
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PCstore invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
        body {
        background-color: #ffe8d2;
        font-family: "Montserrat", sans-serif
        }

        .card {
        border: none
        }

        .logo {
        background-color: #eeeeeea8
        }

        .totals tr td {
        font-size: 13px
        }

        .footer {
        background-color: #eeeeeea8
        }

        .footer span {
        font-size: 12px
        }

        .product-qty span {
        font-size: 12px;
        color: #dedbdb
        }
    </style>
</head>
<body oncontextmenu="return false" class="snippet-body">
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="invoice p-5">
                        <h5>Your order Confirmed!</h5>
                        <span class="fw-bold d-block mt-4">Hello, '.$invoice["name"].'</span>
                        <span>You order has been confirmed and will be shipped in next two days!</span>
                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span>'.$invoice["created_at"].'</span> </div>
                                        </td>
                                        <td>
                                            <div class="py-2"> <span class="d-block text-muted">Order No</span> <span>'.$invoice["order_id"].'</span> </div>
                                        </td>
                                        <td>
                                            <div class="py-2"> <span class="d-block text-muted">Payment</span> <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /></span> </div>
                                        </td>
                                        <td>
                                            <div class="py-2"> <span class="d-block text-muted">Shiping Address</span> <span>'.$invoice["address"].'</span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="product border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>';
                                    $p2 = '';
                                    $total=0;
                                    foreach ($invoiceDetails as $key => $value):
                                        $sum = 0;
                                        $sum = $value['quantity']*$value['pro_price'];
                                        $total += $sum;
                                        $p2 .= ' 
                                            <tr>
                                                <td width="100%"> <span class="font-weight-bold">'.$value["pro_name"].'</span>
                                                    <div class="product-qty">
                                                        <span class="d-block">Quantity:'.$value["quantity"].'</span>
                                                    </div>
                                                </td>
                                                <td width="20%">
                                                    <div class="text-right">
                                                        <span class="font-weight-bold">
                                                        '.number_format($sum).'₫
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>';
                                    endforeach;
                                
                                $p3 ='
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-5">
                                <table class="table table-borderless">
                                    <tbody class="totals">
                                        <tr>
                                            <td>
                                                <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                            </td>
                                            <td>
                                                <div class="text-right"> <span>'.number_format($total).'₫</span> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-left"> <span class="text-muted">Shipping Fee</span> </div>
                                            </td>
                                            <td>
                                                <div class="text-right"> <span>0₫</span> </div>
                                            </td>
                                        </tr>
                                        <tr class="border-top border-bottom">
                                            <td>
                                                <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                            </td>
                                            <td>
                                                <div class="text-right"> <span class="font-weight-bold">'.number_format($total).'₫</span> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                        <p class="font-weight-bold mb-0">Thanks for shopping with us!</p> <span>PCstore Team</span>
                    </div>
                    <div class="d-flex justify-content-between footer p-3">
                        <span>Need Help? visit our <a href="#"> help center</a></span>
                        <span>'.$invoice["created_at"].'</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
';
$mailHtml = $p1.$p2.$p3;
?>