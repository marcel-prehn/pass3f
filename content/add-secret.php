<div class="container">
  <div class="add">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "success") {
        echo "<div class='alert alert-success' role='alert'>Secret successfully added.</div>";
      }
      if(isset($_GET['msg']) && $_GET['msg'] == "failed") {
        echo "<div class='alert alert-danger' role='alert'>Adding Secret failed. Password wrong?</div>";
      }
    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="functions/add-secret.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Secret Description" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Secret Username" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Secret Password" required>
          </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Secret Password again" required>
            </div>
          <div class="form-group">
            <input type="password" class="form-control" name="user-password" id="user-password" placeholder="Your Pass Password" required>
          </div>
          <div class="form-group">
            <select class="form-control" name="group">
              <option value="-1">None</option>
              <?php include("functions/get-groups.php"); ?>
            </select>
          </div>
          <button type="submit" class="btn btn-default">Add Secret</button>
        </form>
      </div>
    </div>
  </div>