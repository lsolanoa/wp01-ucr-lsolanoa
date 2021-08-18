<?php session_start();
//If no admin
if (isset($_SESSION['admin'])) {
  if (isset($_POST['save'])) {
    //Page Data
    $title_link = htmlentities($_POST['title_link'], ENT_QUOTES, "UTF-8");
    $url_link = htmlentities($_POST['url_link'], ENT_QUOTES, "UTF-8");
    

    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "INSERT INTO `links`(`id_link`, `title_link`, `url_link`) VALUES (NULL,'$title_link','$url_link')";

    if ($db->query($sql)) {
      $sql = "UPDATE `pages` SET `type_page`=2 WHERE `id_page`='$id_page';";
      header('Location: ../admin_links.php');
      $db->close();
      exit();
    } else {
        header("http/1.1 500 internal server error");
        $db->close();
        exit();
          }



  } else if (isset($_POST['delete'])) {
    $id_link = $_POST['id_link'];
    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "DELETE FROM links WHERE id_link = '$id_link';";

    if ($db->query($sql)) {
        header('Location: ../admin_links.php');
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
