<?php
require_once '../model/ClienteGateway.php';
require_once '../model/Connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once 'GeraLog.php';

$conn = Connection::open('database');
ClienteGateway::setConnection($conn);

$clientes = ClienteGateway::all('MONTH(dtnasc) = MONTH(NOW()) AND DAY(dtnasc) = DAY(NOW())');

try {
    $filename = "vendedor.txt";
    $handle = fopen($filename, "r");
    $email = fread ($handle, filesize ($filename));
    fclose ($handle);
    $filename = "vendedorsenha.txt";
    $handle = fopen($filename, "r");
    $senha = fread ($handle, filesize ($filename));
    fclose ($handle);
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->setLanguage('pt_br', '../PHPMailer/language/phpmailer.lang-pt_br.php');
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'ssl://smtp.googlemail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $email;                 // SMTP username
    $mail->Password = $senha;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mauriciodssantosds@gmail.com', 'Maurício dos Santos');
    $mail->addAddress('mauriciodssantosds@gmail.com', 'Maurício dos Santos');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Clientes de aniversário';
    $htmlcli = '';
    foreach ($clientes as $cli) {
        $htmlcli .= $cli->nome . "<br>";
    }
    $html = '<h3>O(s) cliente(s):<br><br>'.$htmlcli.'<br> está (estão) de aniversário hoje!<h3>';
    $mail->Body    = $html;
    $mail->AltBody = $html;
    if($mail->send()){
        //classe responsavel por armazenar log
        $gl = new GeraLog('../logs/enviaEmail.txt');
        $gl->log('E-mail enviado');
        //header("Location: ../view/clientes.php");
    } else {
        //classe responsavel por armazenar log
        $gl = new GeraLog('../logs/enviaEmail.txt');
        $gl->log($mail->ErrorInfo);
        //header("Location: ../view/clientes.php");
    }
     
} catch (Exception $e) {
    //classe responsavel por armazenar log
    $gl = new GeraLog('../logs/enviaEmail.txt');
    $gl->log($e);
}