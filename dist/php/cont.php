<?php
session_start();

//Connect to the Data Base
include 'conn.php';

$name_cont = htmlentities($_POST['name_cont'], ENT_QUOTES, "UTF-8");
$email_cont = htmlentities($_POST['email_cont'], ENT_QUOTES, "UTF-8");
$desc_cont = htmlentities($_POST['desc_cont'], ENT_QUOTES, "UTF-8");
date_default_timezone_set('America/Costa_Rica');
$date_cont = date('Y-m-d');

if (!filter_var($email_cont, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format, pleade try again later.";
  } else {
    //Add user to the subscription list
    //Create a SESSION just to avoid bots
    if(isset($_SESSION['ip_ad'])) {
        echo "Ya hemos recibido un comentario de su parte. Por favor, intente nuevamente más tarde.";
    } else {
        $_SESSION['ip_ad'] = $_SERVER['REMOTE_ADDR'];
            $sql = "INSERT INTO `cont` (`id_cont`, `name_cont`, `email_cont`, `date_cont`, `desc_cont`) VALUES (NULL, '$name_cont', '$email_cont', '$date_cont', '$desc_cont')";
            $db->query($sql);

        echo "Gracias por su mensaje. El Administrador lo contactará si se requiere.";    
    }    
  }
?>