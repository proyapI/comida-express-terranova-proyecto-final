<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;    
    require_once "Composer/vendor/autoload.php";      
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
    $mail->Subject = "BIENVENIDO";
    $mail->MsgHTML("Hola, " . $_GET["nombre"] . " " . $_GET["apellido"] . "." . "<br><br>Le queremos dar la bienvenida a COMIDA EXPRESS 
                    TERRANOVA.<br>Estamos felices de informarle que ha sido aceptado para trabajar con nosotros como domiciliario.<br><br>
                    Puede acceder al sistema con los siguientes datos:<br><br><b>CORREO: </b>" . $_GET["correo"] ."<br><b>CLAVE: </b>"
                    . $_GET["clave"] . "<br>POR FAVOR CAMBIAR LA CONTRASEÑA POR SEGURIDAD.<br><br>Cordial saludo,<br><b>COMIDA EXPRESS TERRANOVA</b>");    
    $address = $_GET["correoP"];
    
    $mail->AddAddress($address);
    try {
        $mail->send();
        echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/domiciliario/consultarDomiciliario.php") . "';</script>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    
?>