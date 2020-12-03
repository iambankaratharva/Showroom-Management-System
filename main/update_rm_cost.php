<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg'); background-size:cover;">
 <!-- Update aw materials -->
<div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px;background-color:white;">
	<div class="container">
		<h3> Update Raw Material Cost</h3>
		<!--<label><strong>RM ID</strong></label>
        <input type="text" placeholder="Enter Raw Material ID" name="rm_id" value="" required> -->
        <label><strong>RM ID</strong></label>
        <input type="text" placeholder="Enter RM ID" name="rm_id" value="" required>
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
	
	$rm_id=$_POST['rm_id'];
	$cost=$_POST['cost'];


function custom_exception_handler($exception){
  echo 'Invalid Input:'.$exception->getMessage().PHP_EOL;
  header('location: update_rm_cost_err.php');
}
set_exception_handler('custom_exception_handler');
try{
	$sql="CALL `Change Raw Material Cost`(:rm_id,:cost)";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':rm_id' => $rm_id,
						 ':cost' => $cost));
	header('location: rm_update_success.php');
	}catch(PDOException $e){
  throw new Exception("Please Enter Correct !");
}
}		

?>