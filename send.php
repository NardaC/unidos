<?php
function send_email($from, $to, $subject, $message_html, $message_txt = '')
{

    $email = $to;

    //create a boundary for the email. This 
    $boundary = uniqid('np');

    //headers - specify your from email address and name here
    //and specify the boundary for the email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "From: $from \r\n";
    $headers .= "To: $email\r\n";
    //'Reply-To: ' . $from,
    //'Return-Path: ' . $from,
    $headers .= 'Date: ' . date('r', $_SERVER['REQUEST_TIME']) . "\r\n";
    $headers .= 'Message-ID: <' . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME'] . $subject) . '@' . $_SERVER['SERVER_NAME'] . '>' . "\r\n";
    $headers .= 'X-Mailer: PHP v' . phpversion() . "\r\n";
    $headers .= 'X-Originating-IP: ' . $_SERVER['SERVER_ADDR'] . "\r\n";

    $headers .= "Content-Type: multipart/alternative;boundary=" . $boundary . "\r\n";

    //here is the content body
    $message = "This is a MIME encoded message.";

    //Plain text body
    $message .= "\r\n\r\n--" . $boundary . "\r\n";
    $message .= "Content-type: text/plain;charset=iso-8859-1\r\n\r\n";

    
    if ($message_txt == '') {
        $message_txt = nl2br($message_html);
        $message_txt = strip_tags($message_txt);
    }
    $message .= $message_txt;
    //Html body
    $message .= "\r\n\r\n--" . $boundary . "\r\n";
    $message .= "Content-type: text/html;charset=uiso-8859-1\r\n\r\n";
    $message .= $message_html;

    $message .= "\r\n\r\n--" . $boundary . "--";

    //invoke the PHP mail function
    mail('', $subject, $message, $headers);
}

if ( ! isset($_POST['email']) ) {
	exit;
}

// Construimos el mensaje
$to = 'narda@henribarrett.com';
$reply1 = 'hola@henribarrett.com';
$reply2 = 'UNIDOS EN LA MESA';
$user_email = $_POST['email'];
$subject1 = 'Protocolos de reactivación - Unidos en la mesa';
$subject2 = 'JUNTOS EN ESTA NUEVA ERA';

$message1 = '  <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse; background-color: black;">
<tr>
    <td style=" text-align: left; padding-top: 2rem;">
            <img width="70%" style="display:block; margin: auto" src="https://henribarrett.com/unidos-en-la-mesa/banner1.png">
    </td>
</tr>

<tr>
    <td style="">
        <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
            <h2 style="color: #c4a330; text-align: center;">¡Hola ' . $_POST['name'] . '  Confirmamos tu  participación!</h2>
            <p style="text-align: center; font-size: 0.8rem; color:white; font-weight: 700;font-style: italic;">
                Pronto nos estaremos comunicando contigo para enviarte el link del evento.
            </p>
        
            <p style="text-align: center; font-size: 0.7rem; color:white; font-weight: 700;font-style: italic;">
                Para mas información puedes escribir a <a href="mailto:hola@henribarrett.com">hola@henribarrett.com</a> o a través de nuestras redes sociales.
            </p>
            <hr>
        </div>
    </td>
</tr>
    
<tr>
    <td style="padding-bottom: 2rem;">
        <img style="padding: 0; display: block; margin: auto;" src="https://henribarrett.com/unidos-en-la-mesa/footer.png" width="50%">
    </td>
</tr>

</table>';

$message2 = '<div> <h3>Hay una persona que se ha registrado protocolos de reactivación - Unidos en la mesa.</h3><table> <tr><td>Nombre: </td><td>' . $_POST['name'] . '</td></tr><tr><td>Email: </td><td>' . $_POST['email'] . '</td></tr><tr><td>Localidad: </td><td>' . $_POST['localidad'] . '</td></tr><tr><td>Cliente Backus: </td><td>' . $_POST['cliente'] . '</td></tr><tr><td>Código: </td><td>' . $_POST['codigo'] . '</td></tr><tr><td>Horario elegido: </td><td>' . $_POST['lunes1'] . '</td></tr></table></div>';


echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Refresh" content="4;url=https://www.henribarrett.com/unidos-en-la-mesa">
    <link  rel="icon"   href="img/fav1.jpg" type="image/jpg" />
    <title>Estás Registrado</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        @font-face {
            font-family: "hudson";
            src: url("css/fonts/HUDSON\ NY\ SERIF.TTF");
        }
       
        * {
            box-sizing: border-box;
        }
        html {
            font-size: 0.94vw;
        }
        section {
            width: 100vw;
            height: 100vh;
            background: ##E5E5E5;
        }
        .pop-up {
            width: 35.74rem;
            height: 26.04rem;
            background:#fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }
        h1 {
            font-family: "hudson";
            width: 26.09rem;
            font-size: 3.88rem;
            text-align: center;
            margin: auto;
            margin-top: 2.9rem
        }
        img {
            display: block;
            width: 80%;
            margin: 0rem auto;
        }
        h2 {
            font-family: "hudson";
            color: #9C252D;
            text-transform: uppercase;
            text-align: center;
            width: 27.09rem;
            margin: 1.5rem auto;
            font-size: 1.11rem
        }
        @media (max-width: 768px) {
            .pop-up {
                width: 85.74rem;
                height: 66.04rem;
            }
            h1 {
                font-size: 8rem;
                width: 66.09rem;
                margin-top: 6rem
            }
            h2 {
                font-size: 4.11rem;
                width: 57.09rem;
            }
        }
    </style>
</head>
<body>
    <section>
        <div class="pop-up">
            <h1>
                ¡gracias
                por participar!
            </h1>
            <img src="img/linea1.svg" alt="">
            <h2>En breve le llegará una confirmación a su correo.</h2>
        </div>
    </section>
</body>
</html>';

if($_POST['ocupacion']==="consumidor"){
    send_email($reply1, $user_email, $subject1, $message1);
} else {
    send_email($reply1, $user_email, $subject1, $message3);
}

send_email($reply2, $to, $subject2, $message2);



?>

