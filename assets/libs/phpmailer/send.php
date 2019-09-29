<?php

  // Os arquivos do PHPMailer foram extraidos na pasta /mail

    require 'class.phpmailer.php';
    require 'class.smtp.php';

    $mail = new PHPMailer();
    $mail->setLanguage('pt');

  //Variaveis de configuração do servidor do GMAIL

    $host     = 'mail.eduardolasmarbuffet.com.br';
    $username = 'falecom@eduardolasmarbuffet.com.br';
    $password = 'lasmar19***';
    $port     = 465;
    $secure   = 'ssl';

    $from     = $username;
    $fromName = 'Eduardo Lasmar Buffet';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $mail->isSMTP();
    $mail->Host = $host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $username;
    $mail->Password   = $password;
    $mail->Port       = $port;
    $mail->SMTPSecure = $secure;

    $mail->From       = $from;
    $mail->FromName   = $fromName;
    $mail->addReplyTo($from, $fromName);

    $mail->addAddress('falecom@eduardolasmarbuffet.com.br', 'Eduardo Lasmar');

    $mail->isHTML(true);
    $mail->CharSet     = 'utf-8';
    $mail->WordWrap    = 70;

    $mail->Subject     = "Nova mensagem enviada através do site";
    $mail->Body        = "<h3>Dados do contato:</h3>
                          <p><strong>Nome: </strong>$nome<br />
                          <p><strong>E-mail: </strong>$email<br />
                          <p><strong>Mensagem: </strong>$mensagem<br />";

  // Faz a validação se a mensagem foi enviada para o servidor.
    $send = $mail->Send();

?>