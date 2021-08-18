<?php session_start();
//If no admin
if (isset($_SESSION['admin'])) {
  //New Entry form admin_nav.php
  if (isset($_POST['save'])) {
    //Page Data
    $id_page = $_POST['id_page'];
    $date_timeline = $_POST['date_timeline'];


    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "INSERT INTO `timeline`(`id_timeline`, `date_timeline`,`id_page`) VALUES (NULL, '$date_timeline','$id_page')";

    if ($db->query($sql)) {
      $sql = "UPDATE `pages` SET `type_page`=2 WHERE `id_page`='$id_page';";
      header('Location: ../admin_timeline.php');
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
    $sql = "DELETE FROM timeline WHERE id_page = '$id_page';";

    if ($db->query($sql)) {
        header('Location: ../admin_timeline.php');
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
