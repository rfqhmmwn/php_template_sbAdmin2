<?php
include 'inc/config.php';

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

    //users
    function get_users() {
        global $db;
        $query = $db->query("SELECT * FROM `users`");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    function delete_users($id) {
        global $db;
        $query = "DELETE FROM `users` WHERE id = $id";
        $db->query($query);
        $_SESSION['message'] = "Users berhasil dihapus.";        

        echo '<script>window.location.href = "users.php"</script>'; 
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

    //form add users
    function add_user($username, $password, $email, $first_name, $last_name, $company, $phone, $random) {
        global $db;
        $query = "INSERT INTO `users`(`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES (null,'$random','$username','$password','$email','$random','$random','$random','$random','$random','$random','$random','$random','$random','1','$first_name','$last_name','$company','$phone')";
        $db->query($query);
        $_SESSION['message'] = "Berhasil menambahkan user.";

        echo '<script>window.location.href = "users.php"</script>';
        
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

    //form edit users
    function edit_users($id, $username, $password, $email, $first_name, $last_name, $company, $phone) {
        global $db;
        $query = "UPDATE `users` set username = '$username', password = '$password', email = '$email', first_name = '$first_name', last_name = '$last_name', company = '$company', phone = '$phone' where id = $id";
        return $db->query($query);
    }

    function get_users_by_id($id) {
        global $db;
        $query = "SELECT * FROM `users` WHERE id = $id";
        $result = $db->query($query);
        return $result->fetch_assoc();
    }

    //session message
    function session_message() {
        if(isset($_SESSION['message']) == TRUE)
            {
                // echo $_SESSION['message'];
                $message = $_SESSION['message'];
                
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ' . $message . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['message']);
            }
    }

?>