<?php
if($_POST['password'] == $_POST['password-retype']) {
  include("../modules/mysql.php");
  include("../modules/secure.php");

  $salt = md5(uniqid());
  $username = $_POST['username'];
  $password = md5($_POST['password'] . $salt);
  $email = $_POST['email'];

  $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);

  $query = $mysqli->prepare("INSERT INTO users (username, password, email, salt) VALUES(?, ?, ?, ?)");
  $query->bind_param('ssss', $username, $password, $email, $salt);
  $query->execute();
  
  $secure = $mysqli->prepare("INSERT INTO secure (userid, password) VALUES((SELECT id FROM users WHERE username = ?), ?)");
  $secure->bind_param('ss', $username, $password);
  $secure->execute();

  header("Location: ../index.php?do=add-user&msg=success");
}
else {
  header("Location: ../index.php?do=add-user&msg=failed");
}

?>