<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic5.jpg'); background-size:cover;">
 <!-- Update aw materials -->
<div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px;background-color:white;">
	<div class="container">
		<h3> Update Raw Material</h3>
		<!--<label><strong>RM ID</strong></label>
        <input type="text" placeholder="Enter Raw Material ID" name="rm_id" value="" required> -->
        <label><strong>RM Name</strong></label>
        <input type="text" placeholder="Enter Raw Material Name" name="rm_name" value="" required>
        <label ><strong>Unit Price</strong></label>
        <input type="text" placeholder="Enter Unit Price" name="rm_price" value="" required>
        <label ><strong>Quantity</strong></label>
        <input type="text" placeholder="Enter Quantity" name="rm_qty" value="" required>
        <!-- <label ><strong>Supplier ID</strong></label>
        <input type="text" placeholder="Enter Supplier ID" name="rm_sid" value="" required> -->
        <input type="submit" name="update" value="Update" required>
        </form>
                  <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;margin-bottom:20px;"><a href="raw_materials.php"> <-- Back</a>
                  </button>
      </div>
      
                
  </form>
</div>
<!-- update raw materials end-->

<?php

if(isset($_GET['rm_id'])){
	$rm_id=$_GET['rm_id'];
	echo $rm_id;

if(isset($_POST['update'])){
	$rm_name=$_POST['rm_name'];
	$rm_price=$_POST['rm_price'];
	$rm_qty=$_POST['rm_qty'];
	#$rm_sid=$_POST['rm_sid'];

	$sql="UPDATE `Raw Materials` SET `RM Name`=:rm_name,`RM Unit Price`=:rm_price,`RM Quantity`=:rm_qty WHERE `RM ID`=:rm_id;";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':rm_name' => $rm_name,
						 ':rm_price' => $rm_price,
						 ':rm_qty' => $rm_qty,
						 #':rm_sid' => $rm_sid,
						 ':rm_id' => $rm_id));
	header('location: rm_update_success.php');
}		
}
?>