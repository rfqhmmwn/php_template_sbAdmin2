<?php
require '../function/function.php';
$users = new Users();
header('access-control-allow-origin: *');

$get_method = $_SERVER['REQUEST_METHOD'];

switch ($get_method)
{
    case 'GET':
            $create_response =array(
            'status' => true,
            'message' => '',
            'data' => ''
            );

        if (isset($_GET['id']) && $_GET['id'] !== '') {

            $id = $_GET['id'];
            $data = $users->get_users_by_id($id);

            if ($data) {
                $create_response['data'] = $data;
            } else {
                $create_response['status'] = false;
                $create_response['message'] = 'Groups not found.';
                $create_response['data'] = null;
            }

        } else {
            $create_response['data'] = $users->get_users_api();
        }

        echo set_response($create_response, 200);

        break;

    case 'POST':
        
        $get_id = $_POST['id'];
        $delete = $users->delete_users_api($get_id);

        if ($delete == false)
        {
            $create_response =array(
                'status' => false,
                'message' => 'Failed to delete users.',
            );
            echo set_response($create_response, 400);
        } else {
            $create_response =array(
                'status' => true,
                'message' => 'Users deleted successfully.',
            );
            echo set_response($create_response, 200);
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