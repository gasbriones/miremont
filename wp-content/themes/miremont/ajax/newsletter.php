<?
$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$mensaje = $_GET['message'];


$destinatario = "gabrielmiremont@gmail.com";
$asunto = "Nueva consulta";
$cuerpo = "
<html>
    <head>
       <title>$asunto</title>
    </head>
    <body>
    <img src='http://miremont.com.ar/wp-content/themes/miremont/images/logo-miremont.png' />
    <h1>Nueva consulta:</h1>
    <p>
    <hr>
    <b>Name:</b> $name <br/><br/>
    <b>Email:</b> $email <br/><br/>
    <b>Teléfono:</b> $phone <br/><br/>
    <b>Mensaje:</b> $mensaje <br/><br/>
    </p>
    </body>
</html>
";

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";

//dirección del remitente
$headers .= "From: $nombre  <$email>\r\n";

mail($destinatario,$asunto,$cuerpo,$headers);



