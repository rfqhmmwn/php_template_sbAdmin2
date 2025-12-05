<?php
class Groups
{
    //groups
    function get_groups() {
        global $db;
        $query = $db->query("SELECT * FROM `groups`");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    function delete_groups($id) {
        global $db;
        $query = "DELETE FROM `groups` WHERE id = $id";
        $db->query($query);
        $_SESSION['message'] = "Groups berhasil dihapus.";

        echo '<script>window.location.href = "groups.php"</script>';
    }

    //form add groups
    function add_group($name, $description) {
        global $db;
        $query = "INSERT INTO `groups` (id, name, description) VALUES (null, '$name', '$description')";
        $result = $db->query($query);
        if ($result == true){
            $_SESSION['message'] = "Berhasil menambahkan group.";
        } 
        else {
            $_SESSION['message'] = "gagal menambahkan group.";
        }
        
        echo '<script>window.location.href = "groups.php"</script>';
    }

    //form edit groups
    function edit_groups($id, $name, $description) {
        global $db;
        $query = "UPDATE `groups` SET name = '$name', description = '$description' WHERE id = $id";
        $db->query($query);
        $_SESSION['message'] = "Group edited successfully.";

        echo '<script>window.location.href = "groups.php"</script>';
    }

    function get_groups_by_id($id) {
        global $db;
        $query = "SELECT * FROM `groups` WHERE id = $id";
        $result = $db->query($query);
        return $result->fetch_assoc();
    }
}

?>
