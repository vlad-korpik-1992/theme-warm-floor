<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require './phpmailer/PHPMailer.php';
    
    $CategoryName = $_POST['categoryName'];
    $name = $_POST['firstname'];
    $phone = $_POST['phone'];
    $messages = $_POST['messages'];
    
    $title = "Пришла заявка на консультацию (radiator.by)";
     
    $mail = new PHPMailer();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'v.korpik2015@gmail.com';
    $mail->Password = 'Aingeepoy3';
    $mail->Subject = $title;
    $mail->setFrom('v.korpik2015@gmail.com', 'Radiator');
    $mail->msgHTML("
    <h2>Запись на консультацию</h2>
    <b>Имя:</b> $name<br>
    <b>Телефон:</b> $phone<br>
    <b>Интересует категория товара:</b> $CategoryName<br/>
    <b>Обращение:</b> $messages<br/>
    ");
    $mail->addAddress('v.korpik2010@yandex.by');
    $mail->send();
?>