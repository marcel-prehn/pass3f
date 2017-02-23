<?php
session_start();
include("../modules/mysql.php");
include("../modules/secure.php");

if($_POST['new-password'] == $_POST['new-password-retype']) {
  $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);

  $id = $_SESSION['id'];
  $salt = $_SESSION['salt'];
  $password = md5($_POST['new-password'] . $salt);
  
  $query = $mysqli->prepare("UPDATE users SET password = ? AND active = 1 WHERE id = ?");
  $query->bind_param('si', $password, $id);
  $query->execute();
  
  $_SESSION['password'] = $password;
  $_SESSION['active'] = 1;
  
  header("Location: ../index.php?do=update-password&msg=success");
}
else {
  header("Location: ../index.php?do=update-password&msg=failed");
}
?>