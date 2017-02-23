<?php
function LOG_ACTION($who, $what) {
  include("mysql.php");
  $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
  $query = $mysqli->prepare("INSERT INTO logs (userid, action) VALUES(?, ?)");
  $query->bind_param('is', $who, $what);
  $query->execute();
  $query->close();
  $mysqli->close();
}
?>