<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../env.php";
require_once "../vendor/autoload.php";
require_once "logger.php";

header("Content-type: application/json");

if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
    echo json_encode(array(
        "error" => true,
        "msg"   => "NOPE!"
    ));
    return;
}

$req_body = json_decode(file_get_contents('php://input'), true);

$from_name = "Kontaktformular";
$from_mail = $req_body["mail"];

$to_name = "Stefan Eideloth-Karger";
//$to_mail = "info@e-k-fotos.de";
$to_mail = "stefan.eideloth@gmail.com";

$subject = "Kontaktformular";
$content = $req_body["content"];

$mail = new PHPMailer(true);
$mail->Debugoutput = $log;

$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_CONNECTION;   
$mail->SMTPAuth = true; 
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //TLS

$mail->Host = Env::MAIL_HOST;
$mail->Username = Env::MAIL_USER;
$mail->Password = Env::MAIL_PASS;
$mail->Port = Env::MAIL_PORT; 

$mail->isHTML(true);
$mail->CharSet = "utf-8";
$mail->Encoding = "base64";

$mail->setFrom($from_mail, $from_name);
$mail->addAddress($to_mail, $to_name);
$mail->Subject = $subject;
$mail->Body = $content;
 
try {
    $log->info("try");
    $mail->send();
    $log->info("done");
    echo json_encode(array(
        "error" => false,
        "msg"   => "E-Mail erfolgreich versendet."
    ));
} catch (Exception $e) {
    $log->info($mail->ErrorInfo);
    echo json_encode(array(
        "error" => true,
        "msg"   => "Fehler beim Versand: {$mail->ErrorInfo}"
    ));
}

?>

