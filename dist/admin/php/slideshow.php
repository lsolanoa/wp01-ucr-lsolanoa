<?php session_start();
//If no admin
if (isset($_SESSION['admin'])) {
  //New Entry form admin_nav.php
  if (isset($_POST['save'])) {
    //Page Data
    $id_page = $_POST['id_page'];


    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "INSERT INTO `slideshow`(`id_slide`,`id_page`) VALUES (NULL,'$id_page')";

    if ($db->query($sql)) {
      $sql = "UPDATE `pages` SET `type_page`=2 WHERE `id_page`='$id_page';";
      header('Location: ../admin_show.php');
      $db->close();
      exit();
    } else {
        header("http/1.1 500 internal server error");
        $db->close();
        exit();
          }



  } else if (isset($_POST['delete'])) {
    $id_page = $_POST['id_page'];
    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "DELETE FROM slideshow WHERE id_page = '$id_page';";

    if ($db->query($sql)) {
        header('Location: ../admin_show.php');
        $db->close();
        exit();
    } else {
        header("http/1.1 500 internal server error");
        $db->close();
        exit();
          }

  } else {
    //Kick the user
    header('Location: logout.php?error_user');
    exit();
  }
} else {
  //Kick the user
  header('Location: logout.php?error_user');
  exit();
}

 ?>
