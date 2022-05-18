<?
  // *** Настройка обязательности полей, в случае если они присутствуют в вашей форме
 
  // Имя
  const NAMEISREQUIRED = true;
  const MSGSNAMEERROR = "Поле обязательно для заполнения";
 
  // Телефон
  const TELISREQUIRED = false;
  const MSGSTELERROR = "Поле обязательно для заполнения";
 
  // Email
  const EMAILISREQUIRED = false;
  const MSGSEMAILERROR = "Поле обязательно для заполнения";
  const MSGSEMAILINCORRECT = "Некорректный почтовый адрес";
 
  // Текстовое поле
  const TEXTISREQUIRED = false;
  const MSGSTEXTERROR = "Поле обязательно для заполнения";
 
  // Файл
  const FILEISREQUIRED = false;
  const MSGSFILEERROR = "Поле обязательно для заполнения";
 
  // Соглашение
  const AGGREMENTISREQUIRED = false;
  const MSGSAGGREMENTERROR = "Поле обязательно для заполнения"; 
 
  // Сообщение об успешной отправке
  const MSGSSUCCESS = "Сообщение успешно отправлено";
 
  // *** SMTP *** //
 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/phpmailer/smtp.php');
    const HOST = 'smtp.gmail.com';
    const LOGIN = 'elizabeth5335west@gmail.com';
    const PASS = 'KW5335kw';
    const PORT = '465';
 
  // *** /SMTP *** //
 
        // Почта с которой будет приходить письмо
  const SENDER = 'elizabeth5335west@gmail.com';
   
  // Почта на которую будет приходить письмо
  const CATCHER = 'seleznevaa2211@gmail.com';
   
  // Тема письма
  const SUBJECT = 'Заявка с сайта';
   
  // Кодировка
  const CHARSET = 'UTF-8';
<?php
 
// mb_internal_encoding("UTF-8");
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
 
  use PHPMailer\PHPMailer\PHPMailer;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/phpmailer/phpmailer.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/php/config.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/mail/php/valid.php');
 
    if(defined('HOST') && HOST != '') {
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = HOST;
      $mail->SMTPAuth = true;
      $mail->Username = LOGIN;
      $mail->Password = PASS;
      $mail->SMTPSecure = 'ssl';
      $mail->Port = PORT;
      $mail->AddReplyTo(SENDER);
    } else {
      $mail = new PHPMailer;
    }
 
    $mail->setFrom(SENDER);
    $mail->addAddress(CATCHER);
    $mail->CharSet = CHARSET;
    $mail->isHTML(true);
    $mail->Subject = SUBJECT;
    $mail->Body = "$name $tel $email"; 
    if(!$mail->send()) {
    } else {
      echo json_encode($msgs);
    }
   
  } else{
          header ("Location: /"); // главная страница вашего лендинга
  }