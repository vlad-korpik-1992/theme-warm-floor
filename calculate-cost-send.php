<?php
    use PHPMailer\PHPMailer\PHPMailer;

    use PHPMailer\PHPMailer\Exception;

    use PHPMailer\PHPMailer\SMTP;



    require './phpmailer/Exception.php';

    require './phpmailer/PHPMailer.php';

    require './phpmailer/SMTP.php';
    
    $typeTermostat = $_POST['typeTermostat'];
    $name = $_POST['firstname'];
    $phone = $_POST['phone'];
    $social = $_POST['social'];
    
    $title = "Пришла заявка на рассчет стоимости (radiator.by)";

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

    <h2>Данные на рассчет стоимости</h2>
    
    <b>Имя:</b> $name<br>
    
    <b>Телефон:</b> $phone<br>
    
    <b>Тип термостата:</b> $typeTermostat<br/>
    
    <b>Желательно связаться через</b> $social<br/>

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