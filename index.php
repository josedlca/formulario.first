<?php
    $errores = '';
    $enviado = '';

    if(isset($_POST['submit'])){
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $mensaje=$_POST['mensaje'];

        if(!empty($nombre)){
            $nombre = trim($nombre);
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        }else{
            $errores .= "Por favor ingresa un nombre <br />";
        }

        if(!empty($correo)){
            $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
            // esto retorna false si no es un correo y si si lo es, retorna le correo en si
            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $errores .= 'Por favor ingresa un correo valido <br />';
            }
        }else{
            $errores .= "Por favor ingresa un correo <br />";
        }

        if(!empty($mensaje)){
            $mensaje = htmlspecialchars($mensaje);
            $mensaje = trim($mensaje);
            $mensaje = stripslashes($mensaje);
        }else{
            $errores .= "Por favor ingresa el mensaje <br />";
        }

        if(!$errores){
            // $enviar_a = 'davidlcruz94@gmail.com';
            // $asunto = 'Enviado desde';
            // $mensaje_preparado = "De: $nombre \n";
            // $mensaje_preparado .= "Correo: $correo \n";
            // $mensaje_preparado .= "Mensaje: " . $mensaje; 

            // $mailVerification = mail($enviar_a, $asunto, $mensaje_preparado);
            // var_dump(mail('davidlcruz94@gmail.com', 'Mi título', 'hola'));
            // $enviado = 'true';

            $para      = 'armando.muerete1@gmail.com';
            $titulo    = 'El título';
            $mensaje   = 'Hola';
            $cabeceras = 'From: webmaster@example.com' . "\r\n" .
                        'Reply-To: webmaster@example.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

            mail($para, $titulo, $mensaje, $cabeceras);

            $enviado = 'true';
        }
    }

    require 'index.view.php';
?>