<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg');background-size:cover;">

<!-- Add cars to showroom-->

<div id="Add">
  <form method="post" action="" style="margin-top:90px;margin-bottom:100px;background-color:white;">
  <div class="container">
    <h3> Which Car Would You Like To View?</h3>
        <label><strong>Product ID</strong></label>
        <input type="text" placeholder="Enter Product ID" name="p_id" value="" required>
      </div>
      <button type="submit" name="show" value="Show">View</button>
              <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="salesemp.php"> <-- Back</a>
                  </button> -->
                
  </form>
</div>
<!-- Add cars to showroom-->
<?php
if(isset($_POST['show'])){
 
  $p_id=$_POST['p_id'];

header("Location: manufactured_into.php?p_id=$p_id");
}
?>
  
<!-- 
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

  // $sql="CALL `Import the Cars`(:s_id,:p_id,:p_qty)";
  // // $sql="UPDATE `Cars` SET `Cars`.`Total Quantity`=(`Cars`.`Total Quantity`+:p_qty) WHERE `Showroom ID`= :s_id AND `Product ID`=:p_id";
  // $stmt=$db->prepare($sql);
  // $stmt->execute(array(':p_qty' => $p_qty,
  //            ':s_id' => $s_id,
  //            ':p_id' => $p_id));
  // header('location: car_add_success.php');
  
  // }catch(PDOException $e){
 //  throw new Exception("Plz contact Inventory Manager");}
   -->
  
