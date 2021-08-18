<?php session_start();
//Simple Check Login
if (isset($_POST['admin'])) {
  $user = $_POST['user'];
  $pass = $_POST['password'];

  $hash = '$2y$10$D950g/WiV2LJ6VKewJIN7u47fYsgCsWhvj/bo4Ubtu3.tCHYPtxbm';

  if ($user === 'adrian.vergara@ucr.ac.cr' && password_verify($pass, $hash)) {
    $_SESSION['admin'] = 'open';
    header('Location: ../admin_page.php');
    exit;
  } else {
    header('Location: ../../index.php');
    exit;
  }

} else {
  header('Location: ../../index.php');
  exit;
}

 ?>
