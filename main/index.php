<?php
ob_start();
session_start();
require_once('config.php');
?>

<!DOCTYPE html>
<html>
<title>Inventory Management System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../w3.css">
<body style="background-image: url('pic10.jpg');background-size: cover;">

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="index.php" class="w3-bar-item w3-button"><b>DBMS</b> Inventory Management System</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <a href="about.php" class="w3-bar-item w3-button">About</a>
      <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide head-img" style="max-width:1500px;" id="home">
  
  <div class="w3-display-middle w3-center">
    <STYLE>A {text-decoration: none;} </STYLE>
    <button type="button" class="button button1 w3-btn"><a href="customer_login.php">Customer</a></button>
    <button type="button" class="button button2 w3-btn"><a href="salesemp_login.php">Showroom Sales Representative</a></button>
    <button type="button" class="button button3 w3-btn"><a href="manager_login.php">Inventory Manager</a></button>
  </div>
</header>



<!-- Footer -->
<footer class="w3-center w3-black   footer" style="height:120px;">
  <p style="margin:5px;font-family:Trebuchet MS, Arial, Helvetica, sans-serif;">Our Partners<a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green"></a></p>
  
        
          <img src="logo15.jpg" style="margin-left:15px;margin-right:15px;">
        
        <img src="logo20.jpg" style="margin-left:15px;margin-right:15px;">
          <img src="logo16.jpg" style="margin-left:15px;margin-right:15px;">
        
        <img src="logo19.jpg" style="margin-left:15px;margin-right:15px;">
          <img src="logo17.jpg" style="margin-left:15px;margin-right:15px;">

        <img src="logo18.jpg" style="margin-left:15px;margin-right:15px;">


        
      
  
</footer>

</body>
</html>
