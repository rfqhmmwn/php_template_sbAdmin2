<?php
class Users 
{
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

    //form add users
    function add_user($username, $password, $email, $first_name, $last_name, $company, $phone, $random) {
        global $db;
        $query = "INSERT INTO `users`(`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES (null,'$random','$username','$password','$email','$random','$random','$random','$random','$random','$random','$random','$random','$random','1','$first_name','$last_name','$company','$phone')";
        $db->query($query);
        $_SESSION['message'] = "Berhasil menambahkan user.";

        echo '<script>window.location.href = "users.php"</script>';
        
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

    function delete_users_api($id) {
        global $db;
        $check_id_exists = $this->get_users_by_id($id);

        if ($check_id_exists == false) {

            return false;

        } else {

            $query = "DELETE FROM `users` WHERE id = $id";
            $result = $db->query($query);
            
            return $result;
        }
    }

    function get_users_api() {
        global $db;

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = $db->query("SELECT * FROM `users` WHERE id = $id");
            return $query->fetch_all(MYSQLI_ASSOC);
        } else {
            $query = $db->query("SELECT * FROM `users`");
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }

    function add_users_api($username, $password, $email, $first_name, $last_name, $company, $phone, $random) {
        global $db;
        $query = "INSERT INTO `users`(`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES (null,'$random','$username','$password','$email','$random','$random','$random','$random','$random','$random','$random','$random','$random','1','$first_name','$last_name','$company','$phone')";
        $result = $db->query($query);

        return $result;
    }

    function edit_users_api($id, $username, $password, $email, $first_name, $last_name, $company, $phone) {
        global $db;
        $check_id_exists = $this->get_users_by_id($id);

        if ($check_id_exists == false) {

            return false;

        } else {

            $query = "UPDATE `users` set username = '$username', password = '$password', email = '$email', first_name = '$first_name', last_name = '$last_name', company = '$company', phone = '$phone' where id = $id";
            $result = $db->query($query);

            return $result;
        }
    }
}
?>