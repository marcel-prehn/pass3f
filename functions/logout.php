<?php
session_start();
session_unset("auth");
session_unset("id");
session_unset("username");
session_unset("salt");
session_destroy();
header("Location: ../index.php");
?>