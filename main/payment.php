<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic12.jpg');background-size:cover;">


<div class="container w3-content w3-padding" style="margin-top:70px;">
	
  <?php
   if(isset($_GET['p_id'])){
                
                    $p_id=$_GET['p_id'];
                   }
  ?>

  	<!-- <div class="w3-container" style="background-color:white;">
  		<table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th" style="margin-bottom:10px;">
  			<tr>
      			<th>Product ID</th>
      			<th>Product Name</th>
      			<th>Product Category</th>
      			<th>Product Quantity</th> -->
      			<!-- <th>Product Cost</th>
      			<th>Fuel Type</th>
      			<th>Product Colour</th>
      			<th>Number of Seats</th>
      			<th>Manufacturing Year</th>
      		</tr> -->

      		<!--  <?php

              if(isset($_GET['id'])){
                
                    $id=$_GET['id'];

            $sql= "SELECT * FROM `Finished Products` WHERE `Product ID` = :id ";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                echo '<tr>';
                echo '<td>'.$row['Product ID'].'</td>';
                echo '<td>'.$row['Product Name'].'</td>';
                echo '<td>'.$row['Product Category'].'</td>';
                #echo '<td>'.$row['Product Quantity'].'</td>';
                echo '<td>'.$row['Product Cost'].'</td>';
                echo '<td>'.$row['Fuel'].'</td>';
                echo '<td>'.$row['Product Colour'].'</td>';
                echo '<td>'.$row['No. of seats'].'</td>';
                echo '<td>'.$row['Manufacturing Year'].'</td>';
                ?>
                
                <?php 

                    echo '</tr>';
                  } 
                }
              ?>
 -->
     <!--  </table> </div><br><br> -->

                <form method = "post" action="" style="background-color:white;">
                <h4>Please fill the details:</h4> <br>
                <label><strong>Customer ID</strong></label>
                <input type="text" placeholder="Enter Your ID" name="c_id" value="" required>
               <!--  <label ><strong>Product ID</strong></label>
                <input type="text" placeholder="Enter Product ID" name="p_id" value="" required> -->
                <label ><strong>Quantity</strong></label>
                <input type="text" placeholder="Enter Product Quantity" name="p_qty" value="" required>
                <label ><strong>Showroom</strong></label>
                <?php
               //  $sql="SELECT *FROM `Showroom`";
               //  $stmt=$db->prepare($sql);
               //  $stmt->execute();
               //  while($row = $stmt->fetch()){
               //    echo '<input type="radio" name="s_id" value="" style="margin-left:10px;margin-right:5px;">'.$row['Location'];
               //  }
               // echo '<br>';
               // echo '<br>';
                ?>
                <select name="s_id" multiple> // Initializing Name With An Array
                <option value="101">Hyderabad</option>
                <option value="102">Delhi</option>
                <option value="103">Pune</option>
                </select>
                <input type="submit" name="pay" value="Pay" required>
                 <STYLE>A {text-decoration: none;} </STYLE>
                  
              </form>
                 
                <div>
                </div>
    </div>
  		
<?php




if(isset($_POST['pay'])){

$c_id=$_POST['c_id'];
// $p_id=$_POST['p_id'];
$p_qty=$_POST['p_qty'];
$s_id=$_POST['s_id'];

// $sql="CREATE TRIGGER buy_a_car AFTER INSERT ON `Cars Owned` FOR EACH ROW UPDATE `Cars` SET `Cars`.`Total Quantity`= (OLD.`Total Quantity`-);";
// $stmt=$db->prepare($sql);
// $stmt->execute(array(':qty' => $qty));





// $sql="DROP PROCEDURE IF EXISTS `Buy a car`;";
//   $stmt=$db->prepare($sql);
//   $stmt->execute(array($sql));

// $sql="CREATE PROCEDURE `Buy a car` (IN Customer_ID INT, IN Product_ID INT, IN Quantity INT, IN Showroom_ID INT)
//   proc: BEGIN
//     DECLARE Total_Cost DECIMAL(15,2) DEFAULT 0;
//         DECLARE Flag INT DEFAULT -1;
//         SELECT (Quantity*`Finished Products`.`Product Cost`) INTO Total_Cost FROM `Finished Products` WHERE `Product ID` = Product_ID;
        
//         SELECT EXISTS (SELECT * FROM `Cars Owned` WHERE `Customer ID` = Customer_ID AND `Product ID` = Product_ID) INTO Flag;
        
//         IF Flag = 0 THEN
//       UPDATE `Cars` 
//         SET `Cars`.`Total Quantity` = `Cars`.`Total Quantity` - Quantity
//                 WHERE `Cars`.`Showroom ID` = Showroom_ID AND `Cars`.`Product ID` = Product_ID;
//             INSERT INTO `Cars Owned` VALUES (Customer_ID, Product_ID, Quantity);
  
//     ELSEIF FLAG = 1 THEN 
//       UPDATE `Cars` 
//         SET `Cars`.`Total Quantity` = `Cars`.`Total Quantity` - Quantity
//                 WHERE `Cars`.`Showroom ID` = Showroom_ID AND `Cars`.`Product ID` = Product_ID;
//       UPDATE `Cars Owned`
//         SET `Cars Owned`.`No. of Cars` = `Cars Owned`.`No. of Cars` + Quantity
//         WHERE `Cars Owned`.`Customer ID` = Customer_ID AND `Cars Owned`.`Product ID` = Product_ID;

//     ELSE 
//       LEAVE proc;
//     END IF;
        
//         INSERT INTO `Buys From`(`Customer ID`,
//                 `Showroom ID`, 
//                 `Product ID`, 
//                 `Quantity`, 
//                 `Payment Amount`, 
//                 `Date of Purchase`) VALUES (Customer_ID, Showroom_ID, Product_ID, Quantity, Total_Cost, CURDATE());
//   END$";
// echo $p_qty;


function custom_exception_handler($exception){
  echo 'Cars out of stock:'.$exception->getMessage().PHP_EOL;
  // echo '<script>alert("Cars Out of Stock: Please check another showroom!")</script>';
  header('location:payment_err.php'); 
}
set_exception_handler('custom_exception_handler');

try{
  $stmt=$db->prepare("CALL `Buy a car`(:c_id,:p_id,:p_qty,:s_id)");
  $stmt->execute(array(':c_id' => $c_id,
                       ':p_id' => $p_id,
                       ':p_qty' => $p_qty,
                       ':s_id' => $s_id));
  header('location: payment_successful.php');
}catch(PDOException $e){
  throw new Exception("Plz check another showroom");
}
  
  

// $sql="UPDATE `Cars` SET `Cars`.`Total Quantity`= (`Cars`.`Total Quantity`-:p_qty) WHERE `Showroom ID`=:s_id AND `Product ID`=:p_id;";
// $stmt=$db->prepare($sql);
// $stmt->execute(array(':p_qty' => $p_qty,
//                      ':s_id' => $s_id,
//                      ':p_id' => $p_id));

// $sql="INSERT INTO `Cars Owned` VALUES(:c_id,:p_id,:p_qty);";
// $stmt=$db->prepare($sql);
// $stmt->execute(array(':c_id' => $c_id,
//                      ':p_id' => $p_id,
//                      ':p_qty' => $p_qty));



// $curr_date = date("m.d.y");
// $sql="INSERT INTO `Buys From`(`Customer ID`,
//                 `Showroom ID`, 
//                 `Product ID`, 
//                 `Quantity`, 
//                 `Payment Amount`, 
//                 `Date of Purchase`) VALUES (:c_id, :s_id, :p_id, :p_qty, Total_Cost, :curr_date;";
// $stmt=$db->prepare($sql);
// $stmt->execute(array(':c_id' => $c_id,
//                      ':s_id' => $s_id,
//                      ':p_id' => $p_id,
//                      ':p_qty' => $p_qty,
//                      ':curr_date' => $curr_date));


}
?>
