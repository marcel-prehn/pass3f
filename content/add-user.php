<div class="container">
  <div class="add">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "success") {
        echo "<div class='alert alert-success' role='alert'>User successfully added.</div>";
      }
      if(isset($_GET['msg']) && $_GET['msg'] == "failed") {
        echo "<div class='alert alert-danger' role='alert'>Adding user failed.</div>";
      }
    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="functions/add-user.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password-retype" id="password" placeholder="Password Again" required>
          </div>
          <button type="submit" class="btn btn-default">Add User</button>
        </form>
      </div>
    </div>
  </div>