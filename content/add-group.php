<div class="container">
  <div class="add">
    <?php
      if(isset($_GET['msg']) && $_GET['msg'] == "success") {
        echo "<div class='alert alert-success' role='alert'>Group successfully added.</div>";
      }
      if(isset($_GET['msg']) && $_GET['msg'] == "failed") {
        echo "<div class='alert alert-danger' role='alert'>Adding group failed.</div>";
      }
    ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <form action="functions/add-group.php" method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Group" required>
          </div>
          <div class="form-group">
            <select class="form-control" name="group" id="groups">
              <option value="-1">None</option>
              <?php include("functions/get-groups.php"); ?>
            </select>
          </div>
          <button type="submit" class="btn btn-default">Add Group</button>
        </form>
      </div>
    </div>
  </div>