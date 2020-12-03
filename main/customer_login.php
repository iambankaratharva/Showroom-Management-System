<?php
require_once('config.php');
include "header_footer.php"
?>

<body style="background-image: url('pic2.jpg'); background-size: cover;">
<!-- Customer Login Form -->
	<br>
	<br>
	<br>
	<br>
<form action="" method="POST" style="background-color:white; opacity:0.95; margin-top:80px;" >
	
      <h1>Customer Login</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Customer Name</strong></label>
        <input type="text" placeholder="Enter Customer Name" name="username" value="" required>
        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" value="" required>
      </div>
      <STYLE>A {text-decoration: none;} </STYLE>
      <button type="submit" name="submit" value="" style="background-color:#08f26e">Log In</button>
      <button type="submit" name="sign_up" value="Sign Up"><a href="c_signup.php">Sign Up</a></button>
 	</div>
    </form>


<?php
if(isset($_POST['submit'])){

  $username=trim($_POST['username']);
  $password=trim($_POST['password']);
  customer_login($db,$username,$password);

}

function customer_login($db,$username,$password){

    $sql = "SELECT `Customer Name` FROM `Customers` WHERE `Customer Name` = :username AND `Customer Password`= :password LIMIT 1";

    $stmt = $db -> prepare($sql);
    $stmt->execute(array(     // Executing query
              ':username' => $username,
              ':password' => $password));
    if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {    // If found
          $_SESSION['username'] = $row['username'];
          header("Location: customer.php?c_name=$username");     // Set user session 
          //return true;
      }
      else{
        header('location:login_invalid.php');
        echo '<script>alert("Invalid Username or Password!")</script>'; 
      }
  }
?>
