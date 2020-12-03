<?php
require_once('config.php');
#include "header_footer.php"
?>

<!-- Delete raw materials-->

<!-- <div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px">
	<div class="container">
		<h3> Delete a Raw Material</h3>
        <label><strong>RM ID</strong></label>
        <input type="text" placeholder="Enter Raw Material ID to be Deleted" name="rm_id" value="" required>
      </div>
      <button type="submit" name="del" value="Delete">Delete</button>
      			  <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="raw_materials.php"> <-- Back</a>
                  </button>
                
  </form>
</div> -->


<?php




if(isset($_GET['p_id'])){
	$rm_id=$_GET['p_id'];

	$sql="DELETE FROM `Cars Owned` WHERE `Product ID` = :p_id";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':p_id' => $p_id));
	header('location: c_view_my_cars.php');
	
	
}
?>

<!-- Delete raw materials end-->