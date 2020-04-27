<?php
require './PHPMailer/PHPMailerAutoload.php';
$email = new PHPMailer();
$sucesso = null;
class Mensagem
{
    private $remetente = null;
    private $assunto = null;
    private $conteudo = null;

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    function __get($atributo)
    {
        return $this->$atributo;
    }
    public function validaCapos()
    {
        if (empty($this->remetente) || empty($this->assunto) || empty($this->conteudo)) {
            return false;
        } else {
            return true;
        }
    }
}

$mens = new Mensagem();
$mens->__set('remetente', $_POST['email']);
$mens->__set('assunto', $_POST['assunto']);
$mens->__set('conteudo', $_POST['mensagem']);

if ($mens->validaCapos()) {
    // $email->SMTPDebug = 3;                               // Enable verbose debug output

    $email->isSMTP();                                      // Set mailer to use SMTP
    $email->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $email->SMTPAuth = true;                               // Enable SMTP authentication
    $email->Username = '';                 // SMTP username
    $email->Password = '';                           // SMTP password
    $email->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $email->Port = 587;                                    // TCP port to connect to

    $email->setFrom('', '');
    $email->addAddress($mens->remetente);     // Add a recipient
    //$email->addAddress('ellen@example.com');               // Name is optional
    //$email->addReplyTo('info@example.com', 'Information');
    //$email->addCC('cc@example.com');
    //$email->addBCC('bcc@example.com');

    //$email->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$email->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $email->isHTML(true);                                  // Set email format to HTML

    $email->Subject = $mens->assunto;
    $email->Body    = $mens->conteudo;
    $email->AltBody = $mens->conteudo;

    if (!$email->send()) {
        // echo 'Message could not be sent.';
        // echo 'Mailer Error: ' . $email->ErrorInfo;
        header('location: index.php?erro');
        // $sucesso = false;
    } else {
        //echo 'Message has been sent';
        header('location: index.php?sucesso');
        // $sucesso = true;
    }
} else {
    header('location: index.php?errovalidacao');
}
