<?php

class Groups
{
    public static function GetGroups()
    {
        include("modules/mysql.php");
        $result = "";
        $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
        $query = "SELECT id, name FROM groups WHERE userid = " . $_SESSION['id'] . " ORDER BY name ASC";

        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($id, $name);

        while ($stmt->fetch()) {
            $result .= "<option value='" . $id . "'>" . $name . "</option>";
        }
        $stmt->close();
        $mysqli->close();

        return $result;
    }

    public static function GetGroupsSelected($select)
    {
        include("modules/mysql.php");
        $result = "";
        $tag = "";
        $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
        $query = "SELECT id, name FROM groups WHERE userid = 1 ORDER BY name ASC";

        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $stmt->bind_result($gid, $gname);

        while ($stmt->fetch()) {
            if ($gid == $select) {
                $tag = "selected";
            }
            $result .= "<option value='" . $gid . "' " . $tag . ">" . $gname . "</option>";
            $tag = "";
        }
        $stmt->close();
        $mysqli->close();

        return $result;
    }

    public static function AddGroup($name, $groupid)
    {

    }

    public static function Verify($uid, $gid)
    {
        include("modules/mysql.php");
        $result = false;

        $mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DATABASE);
        $query = "SELECT userid FROM groups WHERE id = ? LIMIT 1";

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