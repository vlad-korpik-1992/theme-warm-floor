<?php
    use PHPMailer\PHPMailer\PHPMailer;

    use PHPMailer\PHPMailer\Exception;

    use PHPMailer\PHPMailer\SMTP;



    require './phpmailer/Exception.php';

    require './phpmailer/PHPMailer.php';

    require './phpmailer/SMTP.php';
    
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $name = $_POST['firstname'];
    $phone = $_POST['phone'];
    $messages = $_POST['messages'];
    
    $title = "Заказ с сайта (radiator.by)";

    $mail = new PHPMailer();

    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 

    $mail->isSMTP(); 

    $mail->Host = 'smtp.yandex.ru';

    $mail->SMTPAuth = true;

    //$mail->SMTPDebug = 2;

    $mail->Username = 'pinroll@yandex.ru';

    $mail->Password = 'gxoexxdnzxwkdmwk';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    $mail->Port = 465;

    $mail->CharSet = 'UTF-8';

    $mail->Subject = $title;

    $mail->setFrom('pinroll@yandex.ru', 'radiator');

    $mail->msgHTML("

    <h2>Данные заказа</h2>

    <b>Имя:</b> $name<br>
    
    <b>Телефон:</b> $phone<br>
    
    <b>Продукт:</b> $productName<br/>
    
    <b>Цена:</b> $productPrice<br/>
    
    <b>Комментарий:</b> $messages<br/>

    ");

    $mail->addAddress('v.korpik2010@yandex.com');

    if(!$mail->send()) {

        echo 'Сообщение не может быть отправлено.';

        echo 'Ошибка: ' . $mail->ErrorInfo;

        exit;

    }

    else{

        echo 'Сообщение отправлено.';

    }
?>