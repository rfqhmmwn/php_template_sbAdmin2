<?php
    include 'config.php';
    $get_action = $_GET['action'];
        $get_id = $_GET['id'];

        if(isset($get_action) == 'hapus' && isset($get_id)) 
            {
            $query = "DELETE FROM `groups` WHERE id = $get_id";
            $result = $db->query($query);

            echo '<script>window.location.href = "../groups.php"</script>';
            
            }
?>