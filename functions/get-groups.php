<?php
  include("modules/mysql.php");

  $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
  $query = "SELECT id, name FROM groups WHERE userid = ".$_SESSION['id']." ORDER BY name ASC";

  $stmt = $mysqli->prepare($query);
  $stmt->execute();
  $stmt->bind_result($id, $name);

  while($stmt->fetch()) {
    echo "<option value='".$id."'>".$name."</option>";
  }   
  $stmt->close();
  $mysqli->close();
?>