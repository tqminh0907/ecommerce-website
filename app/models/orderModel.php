<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './app/PHPMailer/src/Exception.php';
require './app/PHPMailer/src/PHPMailer.php';
require './app/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
$customer = new Customer();
$order = new Order();
$orderDetails = new OrderDetails();
$dataOrder = [];
$dataOrderDetails = [];
$cart = new Cart();
$dataCart = $cart->get();

foreach ($dataCart as $key => $value) {
    $dataCart[$key][0]['quantity'] = $dataCart[$key]['quantity'];
    $dataCart[$key] = $dataCart[$key][0];
}

$click = isset($_REQUEST['click'])?$_REQUEST['click']:'';

$order_id = isset($_REQUEST['order_id'])?$_REQUEST['order_id']:0;

$user_id = isset($_SESSION['account'][0]['user_id'])?$_SESSION['account'][0]['user_id']:null;
$user_email = isset($_SESSION['account'][0]['user_email'])?$_SESSION['account'][0]['user_email']:'';
$user_name = isset($_SESSION['account'][0]['user_name'])?$_SESSION['account'][0]['user_name']:'';

$cus_id = isset($_REQUEST['cus_id'])?$_REQUEST['cus_id']:null;
$cus_email = isset($_REQUEST['cus_email'])?$_REQUEST['cus_email']:'';
$cus_name = isset($_REQUEST['cus_name'])?$_REQUEST['cus_name']:'';
$cus_phone = isset($_REQUEST['cus_phone'])?$_REQUEST['cus_phone']:'';
$cus_address = isset($_REQUEST['cus_address'])?$_REQUEST['cus_address']:'';
$note = isset($_REQUEST['note'])?$_REQUEST['note']:'';
$status = isset($_REQUEST['status'])?$_REQUEST['status']:0;
// $order_date =  date('Y-m-d H:i:s');

switch ($click) {
    case 'addorder':
        if(!isset($_SESSION['account'])) {
            $customer->create($cus_email, $cus_name, $cus_phone, $cus_address);
            $cus_id = $customer->lastId();
        } 
        $order->create($user_id, $cus_id, $note, $status);
        $order_id = $order->lastId();
        foreach ($dataCart as $key => $value) {
            $orderDetails->create($order_id, $value['pro_id'], $value['quantity']);
        }

        include './app/views/cart/invoice.php';
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tqminh.0907@gmail.com';                     //SMTP username
            $mail->Password   = 'gsiffllijanealgq';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = 'UTF-8';
    
            //Recipients
            $mail->setFrom('PCstore@gmail.com', 'PCstore');
            if(!isset($_SESSION['account'])) {
                $mail->addAddress($cus_email, $cus_name);     //Add a recipient
            } else {
                $mail->addAddress($user_email, $user_name);     //Add a recipient
            }
            $mail->addReplyTo('tqminh.0907@gmail.com', 'PCstore');
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = '[PCstore] - [invoice]';
            $mail->Body    =  $mailHtml;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    
        ?><script>
            alert('Order successful!!!');
            window.location='index.php?controller=cart&action=listorder';
        </script><?php
        break;
    case 'changestatus':
        $order->editStatus($status, $order_id);
        ?><script>
            alert('Change status successful!!!');
            window.location='index.php?controller=orders';
        </script><?php
        break;
    case 'delete':
        $order->delete($order_id);
        ?><script>
            alert('Delete order successful!!!');
            window.location='index.php?controller=orders';
        </script><?php
        break;
}

?>