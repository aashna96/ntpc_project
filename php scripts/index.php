<!DOCTYPE html>
<html>
<head>
<title>NTPC</title>

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

<form action="process.php" method="post">
<div id="contact-form">
	<div>
		<h1>WELCOME TO NTPC</h1> 
		<h4>Please fill the following form to fix your appointment</h4> 
	</div>
		<p id="failure">Please try again</p>  
		<p id="success">Your details have been saved!</p>

		   <form method="post" action="/">
			<div>
		      <label for="name">
		      	<span class="required">Name: *</span> 
		      	<input type="text" id="name" name="name" value="" placeholder="Your Name" required="required" tabindex="1" autofocus="autofocus" />
		      </label> 
			</div>
			<div>
		      <label for="email">
		      	<span class="required"> Contact Number:*</span>
		      	<input type="text" id="email" name="phoneno" value="" placeholder="Your Contact Number" tabindex="2" required="required" />
		      </label>  
			</div>


<div>
		      <label for="name">
		      	<span class="required">Aadhar Number:*</span> 
		      	<input type="text" id="name" name="aadhar" value="" placeholder="Enter Aadhar Card Number" required="required" tabindex="3" autofocus="autofocus" />
		      </label> 
			</div>


	<div>
		      <label for="name">
		      	<span class="required">Designation:*</span> 
		      	<input type="text" id="name" name="designation" value="" placeholder="Your Designation" required="required" tabindex="4" autofocus="autofocus" />
		      </label> 
			</div>

			<div>		          
		      <label for="subject">
		      <span class="required"> Name of Concerned Person:* </span>
                     <input type="text" id="name" name="concernedperson" value="" placeholder="Enter the name of concerned person" required="required" tabindex="5" autofocus="autofocus" />
			      
		      </label>
			</div>
         
  <div>
		      <label for="date">
		      	<span class="required">Date of Meeting:*</span> 
		      	<input type="text" id="datepicker" name="date" value="" placeholder="Enter the date of meeting  (mm/dd/yyyy)" required="required" tabindex="6" autofocus="autofocus" />

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
		      </label> 
			</div>       
         
  <div>
		      <label for="time">
		      	<span class="required">Time of Meeting:*</span> 
		      	
                         <select id="name" name="time" tabindex="7">   
			         <option value="hello">Select Time of Meeting</option>
			         <option value="10a.m-11a.m">10a.m-11a.m</option>  
			         <option value="11a.m-12p.m">11a.m-12p.m </option>
                                 <option value="12p.m-1p.m">12p.m-1p.m </option>
                                 <option value="1p.m-2p.m">1p.m-2p.m </option>
                                  <option value="2p.m-3p.m">2p.m-3p.m </option>
                                  <option value="3p.m-4p.m">3p.m-4p.m </option>
                                  <option value="4p.m-5p.m">4p.m-5p.m </option>
			      </select>
		      </label> 
			</div>          
			
			<div>		           
		      <button name="submit" type="submit" id="submit" >SUBMIT</button> 
			</div>
		   </form>

	</div>