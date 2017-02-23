<?php
  include("modules/mysql.php");
  include("modules/secure.php");
?>
<div class="container">
  <div class="list">  
   <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "success-secret") {
        echo "<div class='alert alert-success' role='alert'>Secret successfully removed.</div>";
      }
      if(isset($_GET['msg']) && $_GET['msg'] == "failed-secret") {
        echo "<div class='alert alert-danger' role='alert'>Removing Secret failed.</div>";
      }
    ?>
    <h4>grouped</h4>
    <div class="list-group">
      <?php
      $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
      $query = "SELECT groups.id AS gid, groups.name AS gname "
              ."FROM groups WHERE userid = ? AND groupid IS NULL";

      $stmt = $mysqli->prepare($query);
      $stmt->bind_param("i", $_SESSION['id']);
      $stmt->execute();
      $stmt->bind_result($gid, $gname);
      $stmt->store_result();

      if($stmt->num_rows == 0) {
        //echo "<div class='alert alert-info' role='alert'>No groups found.</div>";
      }
      else {
        while($stmt->fetch()) { 
          echo "<a href='?do=details-group&id=".$gid."' class='list-group-item'>";
          echo "<i class='fa fa-plus-square' aria-hidden='true'></i>".$gname."</a>";
        }
      }
        
      $stmt->close();
      $mysqli->close();
      ?>
    </div>
    
    <h4>non-grouped</h4>
    <div class="list-group">
      <?php
      $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
      $query = "SELECT id, name FROM secrets WHERE userid = ? AND groupid IS NULL ORDER BY id ASC";

      $stmt = $mysqli->prepare($query);
      $stmt->bind_param("i", $_SESSION['id']);
      $stmt->execute();
      $stmt->bind_result($id, $name);
      $stmt->store_result();

      if($stmt->num_rows == 0) {
        //echo "<div class='alert alert-info' role='alert'>No secrets found.</div>";
      }
      else {
        while($stmt->fetch()) {
          echo "<a href='?do=details-secret&id=".$id."' class='list-group-item'>";
          echo "<i class='fa fa-key' aria-hidden='true'></i>".$name."</a>";
        }
      }
        
      $stmt->close();
      $mysqli->close();
      ?>
    </div>
  </div>
</div>