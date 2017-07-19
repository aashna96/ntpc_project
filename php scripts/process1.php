<?php
 
require 'database.php';
$conn    = Connect();


$phoneno = (isset($_POST['phoneno']) ? $_POST['phoneno'] : '');

$confirm = (isset($_POST['confirm']) ? $_POST['confirm'] : '');

$query   = "UPDATE members SET confirm = '" . $confirm . "' WHERE phoneno = '" . $phoneno . "' ";

$success = $conn->query($query);
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 
}
 
echo "Your message has been saved successfully! <br>";
 
$conn->close();
 
?>