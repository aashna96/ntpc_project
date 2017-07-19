<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>

<style media="screen" type="text/css">

background:url(http://phutora.com/img/friends3.jpg) no-repeat;
   background-size: cover;
   height:100%;
   background-color: #000;
}
* {
   box-sizing:border-box;
   -webkit-box-sizing:border-box;
   -moz-box-sizing:border-box;
   -webkit-font-smoothing:antialiased;
   -moz-font-smoothing:antialiased;
   -o-font-smoothing:antialiased;
   font-smoothing:antialiased;
   text-rendering:optimizeLegibility;
}
body {
   color: #C0C0C0;
   font-family: Arial, san-serif;
}


/* Contact Form Styles */
h1 {
   margin: 10px 0 0 0;
}
h4{
   margin: 0 0 20px 0;
}
#contact-form {
   background-color:rgba(72,72,72,0.7);
   padding: 10px 20px 30px 20px;
   max-width:100%;
   float: left;
   left: 50%;
   position: absolute;
   margin-top:30px;
   margin-left: -260px;
   border-radius:7px;
   -webkit-border-radius:7px;
   -moz-border-radius:7px;
}
#contact-form input,   
#contact-form select,   
#contact-form textarea,   
#contact-form label { 
   font-size: 15px;  
   margin-bottom: 2px;
   font-family: Arial, san-serif;
} 
#contact-form input,   
#contact-form select,   
#contact-form textarea { 
   width:100%;
   background: #fff;
   border: 0; 
   -moz-border-radius: 4px;  
   -webkit-border-radius: 4px;  
   border-radius: 4px;
   margin-bottom: 25px;  
   padding: 5px;  
}  
#contact-form input:focus,   
#contact-form select:focus,   
#contact-form textarea:focus {  
   background-color: #E5E6E7; 
}  
#contact-form textarea {
   width:100%;
   height: 150px;
}
#contact-form button[type="submit"] {
   cursor:pointer;
   width:100%;
   border:none;
   background:#991D57;
   background-image:linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
   background-image:-moz-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
   background-image:-webkit-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
   color:#FFF;
   margin:0 0 5px;
   padding:10px;
   border-radius:5px;
}
#contact-form button[type="submit"]:hover {
   background-image:linear-gradient(bottom, #9C215A 0%, #A82767 52%);
   background-image:-moz-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
   background-image:-webkit-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
   -webkit-transition:background 0.3s ease-in-out;
   -moz-transition:background 0.3s ease-in-out;
   transition:background-color 0.3s ease-in-out;
}
#contact-form button[type="submit"]:active {
   box-shadow:inset 0 1px 3px rgba(0,0,0,0.5);
}
input:required, textarea:required {  
   box-shadow: none;
   -moz-box-shadow: none;  
   -webkit-box-shadow: none;  
   -o-box-shadow: none;  
} 
#contact-form .required {  
   font-weight:bold;  
   color: #E5E6E7;      
}

/* Hide success/failure message
   (especially since the php is missing) */
#failure, #success {
   color: #6EA070; 
   display:none;  
}

/* Make form look nice on smaller screens */
@media only screen and (max-width: 580px) {
   #contact-form{
      left: 3%;
      margin-right: 3%;
      width: 88%;
      margin-left: 0;
      padding-left: 3%;
      padding-right: 3%;
   }
}
</style>
</head>
<body>
<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
  $aadhar = (isset($_POST['aadhar']) ? $_POST['aadhar'] : '');
  $imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));
   // $image = $_FILES['image']['tmp_name'];
   // $img = file_get_contents($image);
    $con = mysqli_connect('localhost','id1980364_root','ntpcdb','id1980364_appointment') or die('Unable To connect');
  $insert_image="INSERT INTO img VALUES('$aadhar','$imagetmp')";
  $success = $con->query($insert_image);
  if ($success) {
    echo "Successfully Uploaded!<br>";
 }
else{
die("Couldn't enter data: ".$conn->error);
}
  //  $sql = "insert into images1 (image) values(?)";
 
   // $stmt = mysqli_prepare($con,$sql);
 
   // mysqli_stmt_bind_param($stmt, "s",$img);
   // mysqli_stmt_execute($stmt);
 
  //  $check = mysqli_stmt_affected_rows($stmt);
   // if($check==1){
      //  $msg = 'Successfully Uploaded';
  //  }else{
      //  $msg = 'Could not upload';
   // }
    mysqli_close($con);
}
?>
<form action="web.php" method="post" enctype="multipart/form-data">
<div id="contact-form">
  <div>
    <h1>CLICK THE IMAGE</h1> 
    <h4>Please click choose file to proceed</h4> 
  </div>
    <p id="failure">Please try again</p>  
    <p id="success">Your details have been saved!</p>

       <form method="post" action="/">

 <div>
          <label for="email">
            <span class="required"> Aadhar Number:*</span>
            <input type="text" id="email" name="aadhar" value="" placeholder="Enter Aadhar Number" tabindex="1" required="required" />
          </label>  
      </div>
      <div>
          <label for="email">
            <span class="required"> UPLOAD IMAGE:*</span>
            <input type="file" id="email" name="image" value="" placeholder="Select Image" tabindex="2" required="required" />
          </label>  
      </div>
  <div>              
          <button name="upload" type="submit" id="submit" >UPLOAD</button> 
      </div>
       </form>

  </div>
<?php
    echo $msg;
?>
</body>
</html>