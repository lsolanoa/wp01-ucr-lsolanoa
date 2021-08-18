<?php session_start();
//If no admin
if (isset($_SESSION['admin'])) {
  //New Entry form admin_nav.php
  if (isset($_POST['save'])) {
    //Page Data
    $id_page = $_POST['id_page'];
    $icon_imp = $_POST['icon_imp'];
    $color_imp = $_POST['color_imp'];


    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "INSERT INTO `imp`(`id_imp`, `icon_imp`, `pos_imp`, `color_imp`, `id_page`) VALUES (NULL,'$icon_imp','1','$color_imp','$id_page')";

    if ($db->query($sql)) {
      $sql = "UPDATE `pages` SET `type_page`=2 WHERE `id_page`='$id_page';";
      header('Location: ../admin_section.php');
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
    $sql = "DELETE FROM imp WHERE id_page = '$id_page';";

    if ($db->query($sql)) {
        header('Location: ../admin_section.php');
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
