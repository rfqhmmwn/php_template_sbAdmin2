<?php   

$db= new mysqli('localhost', 'root', '', 'sbadmin2_starterkit');

if($db->connect_error)
{
    die("error");
}
?>