<?php session_start();
//If no admin
if (isset($_SESSION['admin'])) {
  //New Entry form admin_nav.php
  if (isset($_POST['save'])) {
    //Page Data
    $pos_nav = $_POST['pos_nav'];
    $id_page = $_POST['id_page'];
    $struc_nav = $_POST['struc_nav'];

    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "INSERT INTO `nav`(`id_nav`, `pos_nav`, `struc_nav`, `id_page`) VALUES (NULL,'$pos_nav','$struc_nav','$id_page')";

    if ($db->query($sql)) {
      $sql = "UPDATE `pages` SET `type_page`=2 WHERE `id_page`='$id_page';";

      if ($db->query($sql)) {
          header('Location: ../admin_nav.php');
          $db->close();
          exit();
      } else {
          header("http/1.1 500 internal server error");
          $db->close();
          exit();
            }
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
    $sql = "DELETE FROM nav WHERE id_page = '$id_page' OR struc_nav='$id_page';";

    if ($db->query($sql)) {
      $sql = "UPDATE `pages` SET `type_page`=1 WHERE `id_page`='$id_page';";

      if ($db->query($sql)) {
          header('Location: ../admin_nav.php');
          $db->close();
          exit();
      } else {
          header("http/1.1 500 internal server error");
          $db->close();
          exit();
            }
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
