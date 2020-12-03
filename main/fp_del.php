<?php
require_once('config.php');
#include "header_footer.php"
?>

<!-- Delete A Car Model-->

<div>
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px">
	<div class="container">
		<h3>Delete A Car Model </h3>
        <label><strong>Product ID</strong></label>
        <input type="text" placeholder="Enter Product ID to be Deleted" name="fp_id" value="" required>
      </div>
      <button type="submit" name="add" value="Add">Delete</button>
      			  <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="finished_products.php"> <-- Back</a>
                  </button>
                
  </form>
</div>


<?php

if(isset($_POST['add'])){
	$fp_id=$_POST['fp_id'];

	$sql="DELETE FROM `Finished Products` WHERE `Product ID` = :fp_id";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':fp_id' => $fp_id));
	header('location: fp_del_success.php');
	
	
}
?>