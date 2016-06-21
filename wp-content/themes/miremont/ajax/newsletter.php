<?
$name = $_GET['name'];
$email = $_GET['email'];
$mensaje = $_GET['msg'];


$destinatario = "briones.gaston@gmail.com";
$asunto = "Nueva consulta";
$cuerpo = "
<html>
    <head>
       <title>$asunto</title>
    </head>
    <body>
    <img src='http://gasbriones.com/demos/lotteri/wp-content/themes/lotteri/images/logo-2.png' />
    <h1>Nueva consulta:</h1>
    <p>
    <hr>
    <b>Name:</b> $name <br/><br/>
    <b>Email:</b> $email <br/><br/>
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



00.
12102}}
                6t6t rddd
