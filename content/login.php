<div class="container-fluid fill dark-grey">
  <div class="login">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "err") {
        echo "<div class='alert alert-danger' role='alert'>Bad Login! Please retry.</div>";
      }
    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="functions/login.php" method="post" class="">
          <div class="form-group">
            <input type="text" class="form-control" id="login-usr" name="login-usr" placeholder="Username" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="login-pass" name="login-pass" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-default">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
