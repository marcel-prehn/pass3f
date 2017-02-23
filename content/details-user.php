<?php 
  if(isset($_GET['id'])) {
    include("modules/secure.php");
    include("modules/mysql.php");
    $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
    $query = "SELECT users.username, users.timestamp, COUNT(secrets.userid) FROM users LEFT JOIN secrets ON secrets.userid = users.id WHERE users.id = ? LIMIT 1";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->bind_result($username, $timestamp, $secrets);
    $stmt->fetch();
    $stmt->close();
    $mysqli->close();
  }
?>
<div class="container">
  <div class="details">
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="functions/update-secret.php" method="post">
          <div class="form-group">
            <input type="text" disabled class="form-control" name="username" value="<?php echo $username; ?>">
          </div>
          <div class="form-group">
            <input type="text" disabled class="form-control" name="username" value="<?php echo $secrets; ?> Secrets">
          </div>
          <div class="form-group">
            <input type="text" disabled class="form-control" name="date" value="<?php echo $timestamp; ?>">
          </div>
          <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id" />
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-remove-user">Delete</button>
        </form>
      </div>
    </div>
</div>