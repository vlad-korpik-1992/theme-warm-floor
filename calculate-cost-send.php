<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require './phpmailer/PHPMailer.php';
    
    $typeTermostat = $_POST['typeTermostat'];
    $name = $_POST['firstname'];
    $phone = $_POST['phone'];
    $social = $_POST['social'];
    
    $title = "Пришла заявка на рассчет стоимости (radiator.by)";
     
    $mail = new PHPMailer();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->Username = 'v.korpik2015@gmail.com';
    $mail->Password = 'Aingeepoy3';
    $mail->Subject = $title;
    $mail->setFrom('v.korpik2015@gmail.com', 'Radiator');
    $mail->msgHTML("
    <h2>Данные на рассчет стоимости</h2>
    <b>Имя:</b> $name<br>
    <b>Телефон:</b> $phone<br>
    <b>Тип термостата:</b> $typeTermostat<br/>
    <b>Желательно связаться через</b> $social<br/>
    ");
    $mail->addAddress('v.korpik2010@yandex.by');
    $mail->send();
?>