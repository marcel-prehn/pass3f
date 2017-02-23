<?php
if(isset($_POST['login-usr']) && isset($_POST['login-pass'])) {
  include("../modules/mysql.php");
  include("../modules/secure.php");

  $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
  $query = "SELECT users.id, users.password, users.salt, users.active, users.roleid, secure.password FROM users LEFT JOIN secure ON secure.userid = users.id WHERE username = ? LIMIT 1";

  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $_POST['login-usr']);
  $stmt->execute();
  $stmt->bind_result($id, $password, $salt, $active, $roleid, $secure);
  $stmt->fetch();
  $stmt->close();
  $mysqli->close();

  if($password == md5($_POST['login-pass'] . $salt)) {
    session_start();
    $_SESSION['auth'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $_POST['login-usr'];
    $_SESSION['password'] = $password;
    $_SESSION['salt'] = $salt;
    $_SESSION['active'] = $active;
    $_SESSION['roleid'] = $roleid;
    $_SESSION['secure'] = $secure;
    header("Location: ../index.php?do=show-secrets");
  }
  else {
    header("Location: ../index.php?do=login&msg=err");
  }
}
else {
  header("Location: ../index.php?do=login&msg=err");
}
?>