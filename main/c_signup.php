<?php
require_once('config.php');
include "header_footer.php"
?>

<body style="background-image: url('pic2.jpg'); background-size: cover;">
<form action="" method="POST" style="background-color:white; opacity:0.9; margin-top:80px;width:75%;" >
	
      <h1>Customer Sign Up</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="c_name"><strong>Customer Name</strong></label>
        <input type="text" placeholder="Enter Your Name" name="c_name" value="" required>
        <label for="c_tel"><strong>Contact Number</strong></label>
        <input type="text" placeholder="Enter Contact Number" name="c_tel" value="" required>
        <label for="c_city"><strong>City</strong></label>
        <input type="text" placeholder="Enter City" name="c_city" value="" required>
        <label for="c_street"><strong>Street</strong></label>
        <input type="text" placeholder="Enter Street Name" name="c_street" value="" required>
        <label for="c_pin"><strong>Pin Code</strong></label>
        <input type="text" placeholder="Enter Pin Code" name="c_pin" value="" required>
        <label for="c_dob"><strong>Date Of Birth</strong></label>
        <input type="text" placeholder="YYYY-MM-DD" name="c_dob" value="" required>
        <label for="c_gender"><strong>Gender</strong></label>
        <input type="text" placeholder="Enter Your Gender" name="c_gender" value="" required>
        <label for="c_psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="c_psw" value="" required>
        <label for="c_conpsw"><strong>Confirm Password</strong></label>
        <input type="password" placeholder="Confirm Password" name="c_conpsw" value="" required>
      </div>
      <STYLE>A {text-decoration: none;} </STYLE>
      <button type="submit" name="sign_up" value="Sign Up"><a href="c_signup.php">Sign Up</a></button>
 	</div>
    </form>

<?php
if(isset($_POST['sign_up'])){

	$c_name=$_POST['c_name'];
	$c_tel=$_POST['c_tel'];
	$c_city=$_POST['c_city'];
	$c_street=$_POST['c_street'];
	$c_pin=$_POST['c_pin'];
	$c_dob=$_POST['c_dob'];
	$c_gender=$_POST['c_gender'];
	$c_psw=$_POST['c_psw'];
	$c_conpsw=$_POST['c_conpsw'];

	if($c_psw==$c_conpsw){


	$sql="INSERT INTO `Customers`(`Customer Password`,`Customer Name`,`Customer Contact`,`City`,`Street`,`Pin Code`,`DOB`,`Gender`) VALUES(:c_psw,:c_name,:c_tel,:c_city,:c_street,:c_pin,:c_dob,:c_gender);";
	$stmt=$db->prepare($sql);
	$stmt->execute(array('c_psw' => $c_psw,
						 'c_name' => $c_name,
						 'c_tel' => $c_tel,
						 'c_city' => $c_city,
						 'c_street' => $c_street,
						 'c_pin' => $c_pin,
						 'c_dob' => $c_dob,
						 'c_gender' => $c_gender));
  header('location:c_signup_success.php');
	echo '<script>alert("Account Created Successfully!")</script>'; 
	}
	else
		echo '<script>alert("Confirm Password Failed!")</script>'; 

}

?>