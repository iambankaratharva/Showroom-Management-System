<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg'); background-size:cover;">
<!-- Add finished products-->

<!-- <div> -->
	<div class="w3-container">
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px;width:70%;background-color:white;margin-left:150px;">
	
		<h3> Configure New Finished Product(New Car Model)</h3>
        <label><strong>Product ID</strong></label>
        <input type="text" placeholder="Enter Product ID" name="p_id" value="" required>
        <label ><strong>RM ID</strong></label>
        <input type="text" placeholder="Enter RM ID" name="rm_id" value="" required>
       
        <label ><strong>RM Quantity</strong></label>
        <input type="text" placeholder="Enter RM Quantity" name="rm_qty" value="" required>
        
      
      <button type="submit" name="config" value="Configure">Add</button>
      			  <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="finished_products.php"> <-- Back</a>
                  </button>
                 -->
  </form>
  </div>
<!-- </div> -->
<!-- Add raw materials end-->

<?php

if(isset($_POST['config'])){
	$p_id=$_POST['p_id'];
	$rm_id=$_POST['rm_id'];
	$rm_qty=$_POST['rm_qty'];


	// $sql="INSERT INTO `Finished Products` (`Product Name`,`Product Category`,`Product Cost`,`Fuel`, 
	// 									`Product Colour`,`No. of seats`,`Manufacturing Year`)
	// 								VALUES (:fp_name, :fp_cat,:fp_cost,
	// 										:fp_fuel,:fp_clr,:fp_seats,:fp_year)";
	function custom_exception_handler($exception){
  echo 'Invalid Input:'.$exception->getMessage().PHP_EOL;
  header('location:fp_config_err.php');
}
set_exception_handler('custom_exception_handler');
try{
	$sql="CALL `Configure Car Requirements`(:p_id, :rm_id,:rm_qty);";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':p_id' => $p_id,
						 ':rm_id' => $rm_id,
						 ':rm_qty' => $rm_qty));
	header('location:fp_config_success.php');
	}catch(PDOException $e){
  throw new Exception("Please check again !");
}
	
}
?>