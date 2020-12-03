<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg'); background-size:cover;">
<!-- Add finished products-->

<!-- <div> -->
	<div class="w3-container">
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px;width:70%;background-color:white;margin-left:180px;">
	
		<h3> Add New Finished Product(New Car Model)</h3>
        <label><strong>Model Name</strong></label>
        <input type="text" placeholder="Enter Model Name" name="fp_name" value="" required>
        <label ><strong>Car Category</strong></label>
        <input type="text" placeholder="Enter Car Category" name="fp_cat" value="" required>
        <!--<label ><strong>Quantity</strong></label>
        <input type="text" placeholder="Enter Car Quantity" name="fp_qty" value="" required> -->
        <label ><strong>Cost</strong></label>
        <input type="text" placeholder="Enter Car Cost" name="fp_cost" value="" required>
        <label ><strong>Fuel Type</strong></label>
        <input type="text" placeholder="Enter Fuel Type" name="fp_fuel" value="" required>
        <label ><strong>Colour</strong></label>
        <input type="text" placeholder="Enter Car Colour" name="fp_clr" value="" required>
        <label ><strong>No. of Seats</strong></label>
        <input type="text" placeholder="Enter No. of Seats" name="fp_seats" value="" required>
        <label ><strong>Manufacturing Year</strong></label>
        <input type="text" placeholder="Enter Manufacturing Year" name="fp_year" value="" required>
      
      <button type="submit" name="add" value="Add">Add</button>
      			  <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="finished_products.php"> <-- Back</a>
                  </button> -->
                
  </form>
  </div>
<!-- </div> -->
<!-- Add raw materials end-->

<?php

if(isset($_POST['add'])){
	$fp_name=$_POST['fp_name'];
	$fp_cat=$_POST['fp_cat'];
	#$fp_qty=$_POST['fp_qty'];
	$fp_cost=$_POST['fp_cost'];
	$fp_fuel=$_POST['fp_fuel'];
	$fp_clr=$_POST['fp_clr'];
	$fp_seats=$_POST['fp_seats'];
	$fp_year=$_POST['fp_year'];
	

	$sql="INSERT INTO `Finished Products` (`Product Name`,`Product Category`,`Product Cost`,`Fuel`, 
										`Product Colour`,`No. of seats`,`Manufacturing Year`)
									VALUES (:fp_name, :fp_cat,:fp_cost,
											:fp_fuel,:fp_clr,:fp_seats,:fp_year)";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':fp_name' => $fp_name,
						 ':fp_cat' => $fp_cat,
						 #':fp_qty' => $fp_qty,
						 ':fp_cost' => $fp_cost,
						 ':fp_fuel' => $fp_fuel,
						 ':fp_clr' => $fp_clr,
						 ':fp_seats' => $fp_seats,
						 ':fp_year' => $fp_year));
	header('location: fp_add_success.php');
	
	
}
?>