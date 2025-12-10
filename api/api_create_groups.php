<?php
require '../function/function.php';
$groups = new Groups();
header('access-control-allow-origin: *');

$get_method = $_SERVER['REQUEST_METHOD'];

switch ($get_method) 
{
    case 'POST':
        $name = $_POST['name'];
        $description = $_POST['description'];

        if(!empty($name) && !empty($description))
        {
            $create = $groups->add_group_api($name, $description);

            if ($create == true)
            {
                $create_response =array(
                    'status' => true,
                    'message' => 'Groups created successfully.',
                );
                echo set_response($create_response, 200);
            } else {
                $create_response =array(
                    'status' => false,
                    'message' => 'Failed to create groups.',
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