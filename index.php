<!DOCTYPE html>
<?php
  session_start();
  require_once("functions/groups.php");
  $include = "details-secret.php";
  if(isset($_GET['do'])) {
    switch($_GET['do']) {
      case "show-secrets": $include = "show-secrets.php";
        break;
      case "add-secret": $include = "add-secret.php";
        break;
      case "add-user": $include = "add-user.php";
        break;
      case "add-group": $include = "add-group.php";
        break;
      case "show-users": $include = "show-users.php";
        break;
      case "show-groups": $include = "show-groups.php";
        break;
      case "settings": $include = "settings.php";
        break;
      case "details-secret": $include = "details-secret.php";
        break;
      case "details-user": $include = "details-user.php";
        break;
      case "details-group": $include = "details-group.php";
        break;
      case "update-password": $include = "update-password.php";
        break;
      case "show-salt": $include = "show-salt.php";
        break;
      default: $include = "show-secrets.php";
    }
  }
?>
<html lang="en">
<?php include("header.php"); ?>
<body>
<?php
  if(isset($_SESSION['auth'])) {
    include("nav.php");
    if($_SESSION['active'] == 0) {
      echo "<div class='alert alert-warning' role='alert'>Please update your Password first.</div>";
      include("content/update-password.php");
      echo "<div class='alert alert-info' role='alert'>Note: user passwords can not be recovered!</div>";
    }
    else {
      include("content/" . $include);
    }
  }
  else {
    include("content/login.php");
  }
  include("content/modals/remove-secret.php");
  include("content/modals/remove-user.php");
  include("content/modals/decrypt-secret.php");
?>
</body>
</html>