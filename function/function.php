<?php
require __DIR__. '/../inc/config.php';
include 'function_groups.php';
include 'function_users.php';

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

//API response
function set_response($data, $code =200) {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    $response = json_encode($data);

    return $response;
}
?>