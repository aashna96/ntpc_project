<?php
 
 
function Connect()
{
 $dbhost = "localhost";
 $dbuser = "id1980364_root";
 $dbpass = "ntpcdb";
 $dbname = "id1980364_appointment";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}
 
?>