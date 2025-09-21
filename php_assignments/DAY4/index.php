<?php 

$db_name="Project";
$db_type="mysql";
$db_user="root";
$db_host="localhost";
$db_pass="";
$connection=new PDO("$db_type:host=$db_host;dbname=$db_name",$db_user,$db_pass);

session_start();

?>