<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic15.jpg');background-size:cover;">
<!-- View sale history -->
  <div class="w3-content w3-padding" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 ">Sale History</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th" style="margin-bottom:10px;">
  
    <tr>
      <th>Customer ID</th>
      <th>Showroom ID</th>
      <th>Product ID</th>
      <th>Quantity</th>
      <th>Payment ID</th>
      <th>Payment Amount</th>
      <th>Date OF Purchase</th>
      <!-- <th>Edit</th> -->
      <!-- <th>Add</th> -->
      
    </tr>

    <?php
   


        try {

        	if(isset($_GET['sid'])){

        		$sid= $_GET['sid'];
        	
        	
        	

        	$sql= "SELECT *FROM `Buys From` WHERE `Buys From`.`Showroom ID`=(SELECT `Showroom ID` FROM `Employees` WHERE `Employees`.`Manager ID`=:sid)";

            $stmt = $db->prepare($sql);
            $stmt->execute(array(':sid' => $sid));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                echo '<tr>';
                echo '<td>'.$row['Customer ID'].'</td>';
                echo '<td>'.$row['Showroom ID'].'</td>';
                echo '<td>'.$row['Product ID'].'</td>';
                echo '<td>'.$row['Quantity'].'</td>';
                echo '<td>'.$row['Payment ID'].'</td>';
                echo '<td>'.$row['Payment Amount'].'</td>';
                echo '<td>'.$row['Date of Purchase'].'</td>';
                ?>

                <!--<td>
                  
                  <form method="POST" action="payment.php">
                    <input type="submit" name="Buy" value="Buy"/>
                    <input type="hidden" name="id" value="<?php echo $row['Product ID']; ?>"/>
                  </form> -->
                   
                    <!-- <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:green;"> <a href="payment.php?id=<?php echo $row['Product ID']; ?>" >Edit </a >  
                     </button >
                </td>  -->
                <!-- <td>
                	<STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;"> <a href="add_cars.php?s_id=<?php echo $row['Showroom ID'];?>" >Add </a >  
                     </button > 
                </td> 
                 -->
                <?php
                echo '</tr>';
                }
            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    
    ?>
    </table> </div>
    <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="salesemp.php"> <-- Back</a>
                  </button> -->
  </div>

<!--View sale history end -->