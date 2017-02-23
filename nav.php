<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-default" aria-expanded="false">
        <span class="sr-only">MENU</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?do=show-secrets">mpdev_pass</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-default">
      <ul class="nav navbar-nav">
        <li><a href="?do=show-secrets"><i class="fa fa-key"></i> My Secrets</a></li>
        <li><a href="?do=add-secret"><i class="fa fa-plus"></i> Add Secret</a></li>
        <li><a href="?do=add-group"><i class="fa fa-plus"></i> Add Group</a></li>
        <li><a href="?do=settings"><i class="fa fa-cog"></i> Settings</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if(isset($_SESSION['auth'])) {
            echo "<li class='navbar-text'>Hallo " . $_SESSION['username'] . "</li>";
            echo "<li><a href='functions/logout.php'><i class='fa fa-sign-out'></i> Logout</a></li>";
          }
        ?>
      </ul>
    </div>
  </div>
</nav>