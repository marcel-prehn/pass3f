<?php
if($_POST['name'] != "") {
  session_start();
  include("../modules/mysql.php");

  $group = $_POST['name'];
  $userid = $_SESSION['id'];
  $groupid = $_POST['group'];
  
  if($groupid == -1) {
    $groupid = NULL;
  }
  
  $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
  $query = $mysqli->prepare("INSERT INTO groups (userid, groupid, name) VALUES(?, ?, ?)");
  $query->bind_param('iis', $userid, $groupid, $group);
  $query->execute();

  header("Location: ../index.php?do=add-group&msg=success");
}
else {
  header("Location: ../index.php?do=add-group&msg=failed");
}

?>