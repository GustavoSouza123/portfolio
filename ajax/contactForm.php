<?php
    require '../config/config.php';
    $data = [];
    
    // sending email using PHPMailer
    $phpmailer = new Email(SMTP_HOST, SMTP_USERNAME, SMTP_PASSWORD);
    $name = (isset($_POST['name'])) ? $_POST['name'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $message = (isset($_POST['message'])) ? $_POST['message'] : '';
    
    if($name == '' || $email == '' || $message == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $data['success'] = false;
    } else {
        $phpmailer->setFrom($email, $name); // sender
        $data['success'] = true;
    }

    if($data['success']) {
        $phpmailer->addAddress('contato@gustavo-souza.com', 'Gustavo'); // recipient
        $body= '';
        foreach($_POST as $key => $value) {
            if($key != 'form_name') {
                $body .= ucfirst($key).': '.$value.'<hr>';
            }
        }
        $phpmailer->formatEmail(array('subject'=>'New email from my portfolio', 'body'=>$body));

        if($phpmailer->sendMail()) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
    }

    die(json_encode($data));
?>
