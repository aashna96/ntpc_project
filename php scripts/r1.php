<?php 

require 'database.php';
$conn    = Connect();
 
 if($_SERVER['REQUEST_METHOD']=='GET'){
 
 $aadhar  = $_GET['aadhar'];
 

 
 $sql = "SELECT * FROM members WHERE aadhar='".$aadhar."'";
 
 $r = mysqli_query($conn,$sql);
 
 $res = mysqli_fetch_array($r);
 
 $result = array();
 
 array_push($result,array(
 "name"=>$res['name'],
 "phoneno"=>$res['phoneno'],
 "aadhar"=>$res['aadhar'],
 "designation"=>$res['designation'],
 "concernedperson"=>$res['concernedperson'],
 "date"=>$res['date'],
 "time"=>$res['time'],
 "confirm"=>$res['confirm'],
 )
 );
 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($conn);
 
 }