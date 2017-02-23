<div class="container">
  <div class="add">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "success") {
        echo "<div class='alert alert-success' role='alert'>Password successfully updated.</div>";
      }
      if(isset($_GET['msg']) && $_GET['msg'] == "failed") {
        echo "<div class='alert alert-danger' role='alert'>Updating password failed.</div>";
      }
    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="functions/update-password.php" method="post">
          <div class="form-group">
            <input type="password" class="form-control" name="old-password" placeholder="Old Password" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="new-password" placeholder="New Password" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="new-password-retype" placeholder="New Password Again" required>
          </div>
          <button type="submit" class="btn btn-default">Update Password</button>
        </form>
      </div>
    </div>
  </div>