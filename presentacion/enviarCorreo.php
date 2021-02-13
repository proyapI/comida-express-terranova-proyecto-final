<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;    
    require_once "Composer/vendor/autoload.php";      
    $cambio = new cambioClave($_GET["correo"]);
    $cambio ->crear();
    $mail = new PHPMailer();
    $mail ->IsSMTP();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port= 465;
    $mail->Username = "comidaexpressterranova@gmail.com";
    $mail->Password = "comidaexpressterranova2021";
    $mail->SetFrom('comidaexpressterranova@gmail.com', 'COMIDA EXPRESS TERRANOVA');
    $mail->AddReplyTo("proyectoapidm@gmail.com", "proyecto api");
    $mail->Subject = "CAMBIO DE CONTRASEÑA";
    $mail->MsgHTML("Hola, " . $_GET["nombre"] . " " . $_GET["apellido"] . "<br><br>Ha solicitado un cambio de contraseña.<br><br>Por favor hacer click en en link para cambiar tu contraseña.<br>" . 'http://localhost/Comida%20express%20terranova/index.php?pid=' . base64_encode("presentacion/cambioContraseña.php") . "<br><br>Cordial saludo,<br><b>COMIDA EXPRESS TERRANOVA</b>");    
    $address = $_GET["correo"];
    
    $mail->AddAddress($address);
    try {
        $mail->send();
        echo "<script>window.location = 'index.php';</script>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    
?>