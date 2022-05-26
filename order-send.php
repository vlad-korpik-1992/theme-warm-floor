<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require './phpmailer/PHPMailer.php';
    
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $name = $_POST['firstname'];
    $phone = $_POST['phone'];
    $messages = $_POST['messages'];
    
    $title = "Заказ с сайта (radiator.by)";
     
    $mail = new PHPMailer();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'v.korpik2015@gmail.com';
    $mail->Password = 'Aingeepoy3';
    $mail->Subject = $title;
    $mail->setFrom('v.korpik2015@gmail.com', 'Radiator');
    $mail->msgHTML("
    <h2>Данные заказа</h2>
    <b>Имя:</b> $name<br>
    <b>Телефон:</b> $phone<br>
    <b>Продукт:</b> $productName<br/>
    <b>Цена:</b> $productPrice<br/>
    <b>Комментарий:</b> $messages<br/>
    ");
    $mail->addAddress('v.korpik2010@yandex.by');
    $mail->send();
?>