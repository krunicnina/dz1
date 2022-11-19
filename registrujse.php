<!DOCTYPE html>

<?php
include "dbBroker.php";
include "model/user.php";


if(isset( $_POST['submit'] )){
	$email=trim($_POST['email']);
	$password=trim($_POST['password']);
  $upit = "SELECT * FROM user WHERE email='$email'";
  $res_e = mysqli_query($conn, $upit);
  if(mysqli_num_rows($res_e) > 0){
    echo '<script>alert("Email već postoji!")</script>'; }
    else{

    
	$data = Array (
				"email" => $email, 
				"password" => $password,
				
        );	
      
		$user= new User(null,$email,$password);
	$user->ubaciUser($data,$conn);
        header("Location:forma.php");
        
}
}
?>


<html lang="en">
  <head>
  <title>Sign up</title>
     <link rel="stylesheet" href="css/signup.css" /> 
  
   
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quietflow@1.0.2/lib/quietflow.min.js"></script>
  
  
  </head>
  <body class="container" id="Form">
   <form name="form"  action="#" method="POST"  class="login-form" >
<h1>Sign up</h1>
<div class="flex-input">
<label class="">Email</label>
<input type="text" size="30" id="email" placeholder="Email"name="email"required >
</div>


<div class="flex-input">
<label for="">Password</label>
<input type="password" size="30"  id="password"placeholder="Password"name="password"required >
</div>
<div class="flex-input">
<label for="">Confirm Password</label>
<input type="password" size="30" placeholder="Confirm Password"name="confirmpassword"required >
</div>

<div>
<input type="submit" name="submit" value="Submit" id="submit">

</div>
<div class="flex-container">
    <div style="text-align: right;">
        <input type="reset"id="reset">

</div>
</div>
<p class="para-2">
 Already have an account? <a href="forma.php">Login here</a>
   </form>
  </body>
</html>