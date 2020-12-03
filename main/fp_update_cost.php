<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg'); background-size:cover;">
 <!-- Update aw materials -->
<div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px;background-color:white;">
	<div class="container">
		<h3> Update Product Cost</h3>
		<!--<label><strong>RM ID</strong></label>
        <input type="text" placeholder="Enter Raw Material ID" name="rm_id" value="" required> -->
        <label><strong>Product ID</strong></label>
        <input type="text" placeholder="Enter Product ID" name="p_id" value="" required>
        <label><strong>Cost</strong></label>
        <input type="text" placeholder="Update Cost" name="cost" value="" required>
      
        <!-- <label ><strong>Supplier ID</strong></label>
        <input type="text" placeholder="Enter Supplier ID" name="rm_sid" value="" required> -->
        <input type="submit" name="update" value="Update" required>
        </form>
                  <STYLE>A {text-decoration: none;} </STYLE>
                  <!-- <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;margin-bottom:20px;"><a href="raw_materials.php"> <-- Back</a>
                  </button> -->
      </div>
      
                
  </form>
</div>
<!-- update raw materials end-->

<?php



if(isset($_POST['update'])){
	
	$p_id=$_POST['p_id'];
	$cost=$_POST['cost'];

function custom_exception_handler($exception){
  echo 'Invalid Input:'.$exception->getMessage().PHP_EOL;
  header('location:fp_update_cost_err.php');
}
set_exception_handler('custom_exception_handler');
try{
	$sql="CALL `Change Finished Product Cost`(:p_id,:cost)";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':p_id' => $p_id,
						           ':cost' => $cost));
	header('location: fp_update_success.php');
  }catch(PDOException $e){
  throw new Exception("Please Enter Correct !");
}
}		

?>