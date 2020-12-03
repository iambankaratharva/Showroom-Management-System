<?php
require_once('config.php');
include "header_footer.php"
?>

<body style="background-image: url('pic13.jpg');background-size:cover;">
 Finished products restocking

<div>
	<form method="post" action="" style="margin-top:170px;margin-bottom:100px;background-color:white;margin-right:170px;">
	<div class="container">
		<h3> Restock</h3>
        <label><strong>Quantity</strong></label>
        <input type="text" placeholder="Enter quantity to restock" name="fp_r_qty" value="" required>
       <!--  <label ><strong>Product ID</strong></label> -->
        <input type="submit" name="restock" value="Restock" required>
        
        
      </div>
      
      			 <!--  <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="finished_products.php"> <-- Back</a>
                  </button>
                 -->
  </form>
</div>
<!-- Finihsed Products restocking end-->
<?php
if(isset($_GET['p_id'])){

	$p_id=$_GET['p_id'];

if(isset($_POST['restock'])){

	$fp_r_qty=$_POST['fp_r_qty'];

	// $sql="DROP TRIGGER IF EXISTS manufacture_a_car;";
	// $stmt=$db->prepare($sql);
	// $stmt->execute(array($sql));

	// $sqlTrigger="CREATE TRIGGER `Manufacture a Car` BEFORE UPDATE
	// ON `Finished Products` FOR EACH ROW
	// 	BEGIN 
	// 		IF OLD.`Product Quantity` <> NEW.`Product Quantity` THEN
	// 			UPDATE `Raw Materials`, `Manufactured Into`
	// 				SET `Raw Materials`.`RM Quantity` = (`Raw Materials`.`RM Quantity` - (`Manufactured Into`.`RM Quantity Required`)*
	// 					(NEW.`Product Quantity`-OLD.`Product Quantity`))
	// 				WHERE `Raw Materials`.`RM ID` = `Manufactured Into`.`RM ID` AND `Manufactured Into`.`Product ID` = NEW.`Product ID`;       
               
	// 		END IF;
	// 	END$";
	// $stmt=$db->prepare($sql);
	// $stmt->execute(array($sql));


	// $sql="UPDATE `Finished Products`
	// 		SET `Finished Products`.`Product Quantity` = (`Finished Products`.`Product Quantity` + :fp_r_qty)
 //            WHERE `Finished Products`.`Product ID` = :p_id;";

function custom_exception_handler($exception){
  echo 'Out of Raw Materials:'.$exception->getMessage().PHP_EOL;
}
set_exception_handler('custom_exception_handler');
try{


	$sql="CALL `Manufacture a Car`(:p_id,:fp_r_qty);";
    $stmt=$db->prepare($sql);
    $stmt->execute(array(':p_id' => $p_id,
    					':fp_r_qty' => $fp_r_qty));

    header('location: restock_success.php');
}catch(PDOException $e){
  throw new Exception("Please Replinish!");
}


	}
}

?>