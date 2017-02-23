<div class="container">
  <div class="list">
    <div class="list-group">
      <?php
      if($_SESSION['roleid'] == 1) {
        echo "<a href='?do=show-users' class='list-group-item'>Show Users</a>\n";
        echo "<a href='?do=show-groups' class='list-group-item'>Show Groups</a>\n";
        echo "<a href='?do=add-user' class='list-group-item'>Add User</a>\n";
        echo "<a href='?do=add-group' class='list-group-item'>Add Group</a>\n";
        echo "<a href='?do=remove-user' class='list-group-item'>Remove Group</a>\n";
      }
      ?>
      <!--<a href="?do=update-password" class="list-group-item">Update Password</a>-->
      <a href="?do=show-salt" class="list-group-item">Show Salt</a>
      <a href="?do=show-salt" class="list-group-item">Delete Account</a>
      
    </div>
  </div>
</div>