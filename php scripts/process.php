<?php
 
require 'database.php';
$conn    = Connect();

$name = (isset($_POST['name']) ? $_POST['name'] : '');
$phoneno = (isset($_POST['phoneno']) ? $_POST['phoneno'] : '');
$aadhar = (isset($_POST['aadhar']) ? $_POST['aadhar'] : '');
$designation = (isset($_POST['designation']) ? $_POST['designation'] : '');
$concernedperson = (isset($_POST['concernedperson']) ? $_POST['concernedperson'] : '');
$date = (isset($_POST['date']) ? $_POST['date'] : '');
$time = (isset($_POST['time']) ? $_POST['time'] : '');

$query   = "INSERT into members (name,phoneno,aadhar,designation,concernedperson,date,time) VALUES('" . $name . "','" . $phoneno . "','" . $aadhar . "','" . $designation  . "','" . $concernedperson . "', '" . $date . "', '" . $time . "')";

$success = $conn->query($query);
 
if (!$success) {
    die("Couldn't enter data: ".$conn->error);
 }
 
echo "Thank You For Contacting Us.Kindly bring your Aadhar Card at the day of meeting.  <br>";

$conn->close();
 
?>