<div class="container">
    <div class="details">
        <div class="list-group">
            <?php
            include_once("functions/groups.php");

            if (!Groups::Verify($_SESSION['id'], $_GET['id'])) {
                echo "not authorized!";
                die();
            }

            include("modules/mysql.php");

            $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
            $query = "SELECT id, name FROM groups WHERE userid = ? AND groupid = ? ORDER BY name ASC";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ii", $_SESSION['id'], $_GET['id']);
            $stmt->execute();
            $stmt->bind_result($id, $name);
            $stmt->store_result();

            if ($stmt->num_rows == 0) {
                //echo $stmt->num_rows;
                //echo "<div class='alert alert-info' role='alert'>No groups found.</div>";
            } else {
                while ($stmt->fetch()) {
                    echo "<a href='?do=details-group&id=" . $id . "' class='list-group-item'>";
                    echo "<i class='fa fa-plus-square' aria-hidden='true'></i>" . $name . "</a>";
                }
            }

            $stmt->close();
            $mysqli->close();

            $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
            $query = "SELECT id, name FROM secrets WHERE userid = ? AND groupid = ? ORDER BY name ASC";

            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("ii", $_SESSION['id'], $_GET['id']);
            $stmt->execute();
            $stmt->bind_result($id, $name);
            $stmt->store_result();

            if ($stmt->num_rows == 0) {
                //echo $stmt->num_rows;
                //echo "<div class='alert alert-info' role='alert'>No secrets found.</div>";
            } else {
                while ($stmt->fetch()) {
                    echo "<a href='?do=details-secret&id=" . $id . "' class='list-group-item'>";
                    echo "<i class='fa fa-key' aria-hidden='true'></i>" . $name . "</a>";
                }
            }

            $stmt->close();
            $mysqli->close();
            ?>
        </div>
    </div>
</div>