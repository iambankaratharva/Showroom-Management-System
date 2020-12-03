<?php
require_once('config.php');
include "header_footer.php"
?>
 <body style="background-image: url('pic13.jpg'); background-size:cover;">
<!-- Add raw materials -->

<div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px;background-color:white;width:50%;margin-left:25%;">
	<div class="container">
		<h3> Add New Raw Material</h3>
        <label><strong>Name</strong></label>
        <input type="text" placeholder="Enter Raw Material Name" name="rm_name" value="" required>
        <label ><strong>Unit Price</strong></label>
        <input type="text" placeholder="Enter Unit Price" name="rm_price" value="" required>
        <label ><strong>Quantity</strong></label>
        <input type="text" placeholder="Enter Quantity" name="rm_qty" value="" required>
        <label ><strong>Supplier ID</strong></label>
        <input type="text" placeholder="Enter Supplier ID" name="rm_sid" value="" required>
      </div>
      <button type="submit" name="add" value="Add">Add</button>
      			 <!--  <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="raw_materials.php"> <-- Back</a>
                  </button> -->
                
  </form>
</div>
<!-- Add raw materials end-->

<?php

if(isset($_POST['add'])){
	$rm_name=$_POST['rm_name'];
	$rm_price=$_POST['rm_price'];
	$rm_qty=$_POST['rm_qty'];
	$rm_sid=$_POST['rm_sid'];

	// $sql="INSERT INTO `Raw Materials` (`RM Name`,`RM Unit Price`,`RM Quantity`,`Supplier ID`) 
	// 								VALUES (:rm_name, :rm_price, :rm_qty, :rm_sid)";
	function custom_exception_handler($exception){
  echo 'Invalid Input:'.$exception->getMessage().PHP_EOL;
}
set_exception_handler('custom_exception_handler');
try{
	$sql="CALL `Add Raw Materials`(:rm_name, :rm_price, :rm_qty, :rm_sid);";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':rm_name' => $rm_name,
						 ':rm_price' => $rm_price,
						 ':rm_qty' => $rm_qty,
						 ':rm_sid' => $rm_sid));
	header('location: rm_add_success.php');
	}catch(PDOException $e){
  throw new Exception("Please Check!");
}
	
}
?>