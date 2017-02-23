<?php
session_start();
include("../modules/mysql.php");
include("../modules/secure.php");
include("../modules/log.php");

if(md5($_POST['user-password'] . $_SESSION['salt']) == $_SESSION['password']) {
  $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
  $e_user = ENCRYPT($_POST['username'], $_SESSION['salt'], $_POST['user-password']);
  $e_pass = ENCRYPT($_POST['password'], $_SESSION['salt'], $_POST['user-password']);
  $groupid = $_POST['group'];
  
  if($groupid == -1) {
    $groupid = NULL;
  }
  
  $query = $mysqli->prepare("INSERT INTO secrets (userid, groupid, name, username, password) VALUES(?, ?, ?, ?, ?)");
  $query->bind_param('issss', $_SESSION['id'], $groupid, $_POST['name'], $e_user, $e_pass);
  $results = $query->execute();
  $mysqli->close();

  LOG_ACTION($id, "add secret");

  header("Location: ../index.php?do=add-secret&msg=success");
}
else {
  header("Location: ../index.php?do=add-secret&msg=failed");
}


?>