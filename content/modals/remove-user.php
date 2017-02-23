
<div id="modal-remove-user" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center">
        Are You Sure?
      </div>
      <div class="modal-footer">
        <form action="functions/remove-user.php" method="post">
          <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; } ?>" />
          <button type="submit" class="btn btn-default">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </form>
      </div>
    </div>
  </div>
</div>
