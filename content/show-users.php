<div class="container">
  <div class="list">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "success-user") {
        echo "<div class='alert alert-success' role='alert'>User successfully removed.</div>";
      }
      if(isset($_GET['msg']) && $_GET['msg'] == "failed-user") {
        echo "<div class='alert alert-danger' role='alert'>Removing User failed.</div>";
      }
    ?>
    <div class="list-group">
        <?php
        include("modules/mysql.php");
        include("modules/secure.php");

        $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
        $query = "SELECT id, username FROM users ORDER BY id ASC";

        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($id, $username);


        while($stmt->fetch()) {
          echo "<a href=?do=details-user&id=".$id." class='list-group-item'>".$username."</a>";
        }   
        $stmt->close();
        $mysqli->close();
        ?>
    </div>
  </div>
</div>