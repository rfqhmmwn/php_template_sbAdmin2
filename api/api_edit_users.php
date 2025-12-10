<?php
require '../function/function.php';
$users = new Users();
header('access-control-allow-origin: *');

$get_method = $_SERVER['REQUEST_METHOD'];

switch ($get_method) 
{
    case 'POST':
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];
        $random = rand();
        $id = $_POST['id'];

        if(!empty($id) && !empty($username) && !empty($password) && !empty($email) && !empty($first_name) && !empty($last_name) && !empty($company) && !empty($phone))
        {
            $create = $users->edit_users_api($id, $username, $password, $email, $first_name, $last_name, $company, $phone, $random);
            
            if ($create == true)
            {
                $create_response =array(
                    'status' => true,
                    'message' => 'Users edited successfully.',
                );
                echo set_response($create_response, 200);
            } else {
                $create_response =array(
                    'status' => false,
                    'message' => 'Failed to edit users.',
                );
                echo set_response($create_response, 400);
            }
        } else {
            $create_response =array(
                'status' => false,
                'message' => 'Invalid parameters.',
            );
            echo set_response($create_response, 400);
        }
        
        break;
    
    default:
        $create_response =array(
            'status' => false,
            'message' => 'Method not allowed.',
            'data' => null
        );

        echo set_response($create_response, 404);

        break;
}
    
?>