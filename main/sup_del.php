<?php
require_once('config.php');
#include "header_footer.php"
?>

<!-- Delete a supplier-->

<!-- <div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px">
	<div class="container">
		<h3>Delete A Supplier </h3>
        <label><strong>Supplier ID</strong></label>
        <input type="text" placeholder="Enter Supplier ID to be Deleted" name="sup_id" value="" required>
      </div>
      <button type="submit" name="add" value="Add">Delete</button>
      			  <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="supplier.php"> <-- Back</a>
                  </button>
                
  </form>
</div> -->


<?php

if(isset($_GET['sid'])){
	$sid=$_GET['sid'];

	$sql="DELETE FROM `Suppliers` WHERE `Supplier ID` = :sid;";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':sid' => $sid));
	header('location: sup_del_success.php');
	
	
}
?>