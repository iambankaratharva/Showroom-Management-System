<?php
require_once('config.php');
include "header_footer.php"
?>

<!-- Update suppliers-->

<div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px">
	<div class="container">
		<h3> Update New Supplier</h3>
		<!-- <label><strong>Supplier ID</strong></label>
        <input type="text" placeholder="Enter Supplier ID" name="sid" value="" required> -->
        <label><strong>Supplier Name</strong></label>
        <input type="text" placeholder="Enter Supplier Name" name="sup_name" value="" required>
        <label ><strong>Contact Number</strong></label>
        <input type="text" placeholder="Enter Contact Number" name="sup_contact" value="" required>
        <label ><strong>City</strong></label>
        <input type="text" placeholder="Enter City" name="sup_city" value="" required>
      </div>
      <button type="submit" name="add" value="Add">Update</button>
      			  <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="sup_update_seccess.php"> <-- Back</a>
                  </button>
                
  </form>
</div>


<?php

if(isset($_GET['sid'])){
	$sid=$_GET['sid'];

if(isset($_POST['add'])){
	$sup_name=$_POST['sup_name'];
	$sup_contact=$_POST['sup_contact'];
	$sup_city=$_POST['sup_city'];

	$sql="UPDATE `Suppliers` SET `Supplier Name`=:sup_name,`Supplier Contact`= :sup_contact,`City`= :sup_city WHERE `Supplier ID`= :sid";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':sup_name' => $sup_name,
						 ':sup_contact' => $sup_contact,
						 ':sup_city' => $sup_city,
						 ':sid' => $sid));
	header('location: sup_add_success.php');
	
	}
}
?>
<!-- Update suppliers end-->