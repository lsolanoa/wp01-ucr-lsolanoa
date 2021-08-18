<?php session_start();
//If no admin
if (isset($_SESSION['admin'])) {
  //New Entry form new_entry.php
  if (isset($_POST['new_entry'])) {
    //Page Data
    $title_page = htmlentities($_POST['title_page'], ENT_QUOTES, "UTF-8");
    $desc_page = htmlentities($_POST['desc_page'], ENT_QUOTES, "UTF-8");
    $cont_page = htmlentities($_POST['cont_page'], ENT_QUOTES, "UTF-8");
    date_default_timezone_set('America/Costa_Rica');
    $date_page = date('Y-m-d');
    $labels_page = htmlentities($_POST['labels_page'], ENT_QUOTES, "UTF-8");

    //Image
    if (isset($_FILES['img_page'])) {

      if ($_FILES['img_page']['size'] != 0) {
        $temp = explode(".", $_FILES["img_page"]["name"]);
        $img_page = 'banner_' . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["img_page"]["tmp_name"], "../../images/" . $img_page);

      } else {
        $img_page = 'none_banner.jpg';
      }

    } else {
      $img_page = 'none_banner.jpg';
    }

    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "INSERT INTO `pages`(`id_page`, `title_page`, `desc_page`, `cont_page`, `date_page`, `labels_page`, `type_page`, `img_page`)
            VALUES (NULL,'$title_page','$desc_page','$cont_page','$date_page','$labels_page', 1,'$img_page')";

    if ($db->query($sql)) {
        header('Location: ../admin_page.php');
        $db->close();
        exit();
    } else {
        header("http/1.1 500 internal server error");
        $db->close();
        exit();
          }


  } else if (isset($_POST['edit'])) {

    //Page Data
    $id_page = $_POST['id_page'];
    $title_page = htmlentities($_POST['title_page'], ENT_QUOTES, "UTF-8");
    $desc_page = htmlentities($_POST['desc_page'], ENT_QUOTES, "UTF-8");
    $cont_page = htmlentities($_POST['cont_page'], ENT_QUOTES, "UTF-8");
    date_default_timezone_set('America/Costa_Rica');
    $date_page = date('Y-m-d');
    $labels_page = htmlentities($_POST['labels_page'], ENT_QUOTES, "UTF-8");

    //Image
    if (isset($_FILES['img_page'])) {

      if ($_FILES['img_page']['size'] != 0) {
        $temp = explode(".", $_FILES["img_page"]["name"]);
        $img_page = 'banner_' . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["img_page"]["tmp_name"], "../../images/" . $img_page);

      } else {
        $img_page = $_POST['org_img_page'];
      }

    } else {
      $img_page = $_POST['org_img_page'];
    }

    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "UPDATE `pages` SET `title_page`='$title_page',`desc_page`='$desc_page',`cont_page`='$cont_page',`date_page`='$date_page',`labels_page`='$labels_page', `img_page`='$img_page' WHERE `id_page`='$id_page';";

    if ($db->query($sql)) {
        header('Location: ../admin_page.php');
        $db->close();
        exit();
    } else {
        header("http/1.1 500 internal server error");
        $db->close();
        exit();
          }



  } else if (isset($_POST['view'])) {
    $id_page = $_POST['id_page'];

    //Connect to the Data Base
    include 'conn.php';

    //Run SQL Command
    $sql = "SELECT `type_page` FROM `pages` WHERE `id_page`='$id_page';";

    if ($db->query($sql)) {

      $result = $db->query($sql);
      $row = $result->fetch_assoc();

      if ($row['type_page'] == 1) {
        header('Location: ../../posts.php?id='.$id_page);
        $db->close();
        exit();
      } else {
        header('Location: ../../pages.php?id='.$id_page);
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
    $sql = "DELETE FROM pages WHERE id_page = '$id_page';";

    if ($db->query($sql)) {
        header('Location: ../admin_page.php');
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
