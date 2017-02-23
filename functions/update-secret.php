<?php
    session_start();
    include("../modules/mysql.php");
    include("../modules/secure.php");
    
    $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);

    $id = $_POST['id'];
    $salt = $_SESSION['salt'];
    $e_user = ENCRYPT($_POST['username'], $salt);
    $e_pass = ENCRYPT($_POST['password'], $salt);

    $query = $mysqli->prepare("UPDATE secrets SET username = ?, password = ? WHERE id = ?");
    $query->bind_param('ssi', $e_user, $e_pass, $id);
    $results = $query->execute();

    if($results) {
        header("Location: ../index.php?do=details-secret&id=".$id."&msg=success");
    }
    else {
        header("Location: ../index.php?do=details-secret&id=".$id."&msg=failed");
    }
?>