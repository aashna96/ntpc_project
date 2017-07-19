<?php
$servername= "localhost";
$username= "id1980364_root";
$password="ntpcdb";
$dbname= "id1980364_appointment";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$name = (isset($_POST['name']) ? $_POST['name'] : '');
$phoneno = (isset($_POST['phoneno']) ? $_POST['phoneno'] : '');
$aadhar = (isset($_POST['aadhar']) ? $_POST['aadhar'] : '');
$designation = (isset($_POST['designation']) ? $_POST['designation'] : '');
$concernedperson = (isset($_POST['concernedperson']) ? $_POST['concernedperson'] : '');
$date = (isset($_POST['date']) ? $_POST['date'] : '');
$time = (isset($_POST['time']) ? $_POST['time'] : '');


$sql = "insert into members (name,phoneno,aadhar,designation,concernedperson,date,time) values ('$name','$phoneno','$aadhar','$designation','$concernedperson', '$date', '$time')";

if(mysqli_query($conn,$sql)){
    echo 'success';
  }
  else{
    echo 'failure';
  }
  mysqli_close($conn);
?>