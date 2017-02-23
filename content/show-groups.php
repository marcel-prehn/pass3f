<div class="container">
  <div class="list">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "success-user") {
        echo "<div class='alert alert-success' role='alert'>Group successfully removed.</div>";
      }
      if(isset($_GET['msg']) && $_GET['msg'] == "failed-user") {
        echo "<div class='alert alert-danger' role='alert'>Removing Group failed.</div>";
      }
    ?>
    <div class="list-group">
        <?php
        include("modules/mysql.php");
        include("modules/secure.php");

        $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
        $query = "SELECT id, name FROM groups ORDER BY id ASC";

        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($id, $name);

        while($stmt->fetch()) {
          echo "<a href=?do=remove-group&id=".$id." class='list-group-item'>".$name."</a>";
        }   
        $stmt->close();
        $mysqli->close();
        ?>
    </div>
  </div>
</div>