<?php
require_once('config.php');
include "header_footer.php"
?>

<body style="background-image: url('pic4.jpg'); background-size: cover;">
<!-- Sales Empoloyee Login Form-->
  <br>
  <br>
  <br>
  <br>
<form action="" method="POST" style="background-color:white; margin-top:90px;" >
  
      <h1>Sales Representative Login</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Manager ID</strong></label>
        <input type="text" placeholder="Enter Username" name="username" value="" required>
        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="password" value="" required>
      </div>
      <button type="submit" name="submit" value="Sign In">Login</button>
  </div>
    </form>


<?php
if(isset($_POST['submit'])){

  $username=trim($_POST['username']);
  $password=trim($_POST['password']);
  salesemp_login($db,$username,$password);

}

function salesemp_login($db,$username,$password){

    $sql = "SELECT `Manager ID` FROM `Employees` WHERE `Manager ID` = :username AND `Employee Password`= :password LIMIT 1";

    $stmt = $db -> prepare($sql);
    $stmt->execute(array(     // Executing query
              ':username' => $username,
              ':password' => $password));
    if ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {    // If found
          $_SESSION['username'] = $row['username'];
          header("Location: salesemp.php?sid=$username");     // Set user session 
          //return true;
      }
      else{
        header('location:login_invalid.php');
        echo '<script>alert("Invalid Username or Password!")</script>'; 
      }
      }
  
?>