<?php
session_start();
include("../modules/mysql.php");
include("../modules/secure.php");

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
$query = $mysqli->prepare("DELETE FROM users WHERE id = ?");
$query->bind_param('i', $_POST['id']);
$results = $query->execute();

if($results) {
    header("Location: ../index.php?do=start&msg=user-success");
}
else {
    header("Location: ../index.php?do=start&msg=user-failed");
}
?>