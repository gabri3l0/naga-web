<?php

// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['city'])     ||
   empty($_POST['country'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$city = strip_tags(htmlspecialchars($_POST['city']));
$country = strip_tags(htmlspecialchars($_POST['country']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'info@nagaservicios.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "NAGA Servicios Consulta:  $name";
$email_body = "Un cliente solicito información.\n\n"."Aquí estan los detalles:\n\nNombre: $name\n\nCorreo: $email_address\n\nTeléfono: $phone\n\nCiudad: $city\n\nPaís: $country\n\nMensaje:\n$message";
$headers = "From: noreply@NAGAServicios.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);

header('Location: ../contacts.html');
?>
