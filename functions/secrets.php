<?php

class Secrets
{
    public static function GetSecrets()
    {

    }

    public static function Verify($uid, $gid)
    {
        include("modules/mysql.php");
        $result = false;

        $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
        $query = "SELECT userid FROM secrets WHERE id = ? LIMIT 1";

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $gid);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        $stmt->fetch();

        if ($id == $uid) {
            $result = true;
        }
        return $result;
    }
}

?>