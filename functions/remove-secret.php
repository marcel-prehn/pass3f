<?php
session_start();
include("../modules/mysql.php");
include("../modules/secure.php");

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
$query = $mysqli->prepare("DELETE FROM secrets WHERE id = ? AND userid = ?");
$query->bind_param('ii', $_POST['id'], $_SESSION['id']);
$results = $query->execute();

if($results) {
    header("Location: ../index.php?do=show-secrets&msg=success-secret");
}
else {
    header("Location: ../index.php?do=show-secrets&msg=failed-secret");
}
?>