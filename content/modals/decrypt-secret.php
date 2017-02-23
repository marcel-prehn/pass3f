<div id="modal-decrypt-secret" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="index.php?do=details-secret&id=<?php if(isset($_GET['id'])) { echo $_GET['id']; } ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter Your Password</h4>
        </div>
        <div class="modal-body text-center">
          <input type="password" class="form-control" name="password" autofocus required />
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; } ?>" />
          <button type="submit" class="btn btn-default">Decrypt Secret</button>
        </div>
      </div>
    </form>
  </div>
</div>