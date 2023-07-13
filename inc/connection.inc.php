<?php

$server_name="localhost:3360";
$user_name="root";
$password="";
$database="main_db";

$con = new mysqli ($server_name, $user_name , $password , $database);

if($con->connect_error )
{
die('Unable to connect to database'/* [' . $con->connect_error . ']'*/);
}
else
{
echo "Connection Successful";
}
?>