<?php
include("modules/secure.php");
include("modules/mysql.php");

if (isset($_GET['id'])) {
    include_once("functions/secrets.php");

    if (!Secrets::Verify($_SESSION['id'], $_GET['id'])) {
        echo "not authorized!";
        die();
    }

    $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
    $query = "SELECT name, username, password, groupid, timestamp FROM secrets WHERE id = ? LIMIT 1";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->bind_result($name, $username, $password, $groupid, $timestamp);
    $stmt->fetch();
    $stmt->close();
    $mysqli->close();
}
if (isset($_POST['password'])) {
    $username = DECRYPT($username, $_SESSION['salt'], $_POST['password']);
    $password = DECRYPT($password, $_SESSION['salt'], $_POST['password']);
}
?>
<div class="container">
    <div class="details">
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] == "success") {
            echo "<div class='alert alert-success' role='alert'>Secret successfully updated.</div>";
        }
        if (isset($_GET['msg']) && $_GET['msg'] == "failed") {
            echo "<div class='alert alert-danger' role='alert'>Updating Secret failed.</div>";
        }
        ?>
        <h3><?php echo $name; ?></h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="functions/update-secret.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="details-password"
                               value="<?php echo $password; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" disabled class="form-control" name="date" value="<?php echo $timestamp; ?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="group">
                            <option value="-1">None</option>
                            <?php echo Groups::GetGroupsSelected($groupid); ?>
                        </select>
                    </div>
                    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/>
                    <button type="button" class="btn btn-default" data-toggle="modal"
                            data-target="#modal-decrypt-secret">Decrypt
                    </button>
                    <button type="button" class="btn btn-default" id="bt-toggle-password" onclick="toggle_button()">
                        Show
                    </button>
                    <button type="submit" class="btn btn-default" disabled>Update</button>
                    <button type="button" class="btn btn-danger pull-right" data-toggle="modal"
                            data-target="#modal-remove-secret">Delete
                    </button>
                </form>
            </div>
        </div>
    </div>