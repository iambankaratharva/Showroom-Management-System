<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic7.jpg');background-size:cover;">

<!-- Add cars to showroom-->

<div id="Add">
	<form method="post" action="" style="margin-top:90px;margin-bottom:100px;background-color:white;opacity:95%;">
	<div class="container">
		<h3> Add New Cars</h3>
        <label><strong>Showroom ID</strong></label>
        <input type="text" placeholder="Enter Showroom ID" name="s_id" value="" required>
        <label ><strong>Product ID</strong></label>
        <input type="text" placeholder="Enter Product ID" name="p_id" value="" required>
        <label ><strong>Quantity</strong></label>
        <input type="text" placeholder="Enter Product Quantity" name="p_qty" value="" required>
      </div>
      <button type="submit" name="add" value="Add">Add</button>
      			  <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="salesemp.php"> <-- Back</a>
                  </button> -->
                
  </form>
</div>
<!-- Add cars to showroom-->
<?php
if(isset($_POST['add'])){
	$s_id=$_POST['s_id'];
	$p_id=$_POST['p_id'];
	$p_qty=$_POST['p_qty'];

// function custom_exception_handler($exception){
//   echo 'Car(s) not available in the Inventory:'.$exception->getMessage().PHP_EOL;
// }
// set_exception_handler('custom_exception_handler');

	// $sql="DROP TRIGGER IF EXISTS import_a_car;";
	// $stmt=$db->prepare($sql);
	// $stmt->execute(array($sql));

	// $sql="CREATE TRIGGER import_a_car AFTER UPDATE ON `Cars` FOR EACH ROW UPDATE `Finished Products` SET `Finished Products`.`Product Quantity` = (`Finished Products`.`Product Quantity` - (NEW.`Total Quantity` - OLD.`Total Quantity`)) WHERE `Finished Products`.`Product ID` = NEW.`Product ID`;";
	// $stmt=$db->prepare($sql);
	// $stmt->execute(array($sql));
// try{

function custom_exception_handler($exception){
  echo 'Cars out of stock:'.$exception->getMessage().PHP_EOL;
  header('location:salesemp_import_err.php');
}
set_exception_handler('custom_exception_handler');
try{
	$sql="CALL `Import the Cars`(:s_id,:p_id,:p_qty)";
	// $sql="UPDATE `Cars` SET `Cars`.`Total Quantity`=(`Cars`.`Total Quantity`+:p_qty) WHERE `Showroom ID`= :s_id AND `Product ID`=:p_id";
	$stmt=$db->prepare($sql);
	$stmt->execute(array(':p_qty' => $p_qty,
						 ':s_id' => $s_id,
						 ':p_id' => $p_id));
	header('location: car_add_success.php');
	}catch(PDOException $e){
  throw new Exception("Please contact Inventory Manager!");
}
	
	// }catch(PDOException $e){
 //  throw new Exception("Plz contact Inventory Manager");}
	
	
}
?>