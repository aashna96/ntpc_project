<?php
 
require 'database.php';
$con    = Connect();

 

if($_SERVER['REQUEST_METHOD']=='GET'){
$aadhar = $_GET['aadhar'];
$db = mysqli_connect('localhost','id1980364_root','ntpcdb','id1980364_appointment'); 
$sql = "SELECT image FROM img WHERE aadhar ='" . $aadhar . "';";
$sth = $db->query($sql);
$result=mysqli_fetch_array($sth);

echo '<img src="data:image/jpg;base64,'.base64_encode( $result['image'] ).'"/>';
  }  
 
 mysqli_close($con);