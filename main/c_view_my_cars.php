<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic11.jpg');background-size:cover;">
<!-- View Car In my Showroom division -->
  <div class="w3-content w3-padding" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 ">Cars I Own</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th" style="margin-bottom:10px;">
  
    <tr>
      <th>Customer ID</th>
      <th>Product ID</th>
      <th>No. of Cars</th>
      <!-- <th>Return</th> -->
      <!-- <th>Add</th> -->
      
    </tr>

    <?php
   


        try {

        	if(isset($_GET['c_name'])){

        		$c_name= $_GET['c_name'];
        	
        	
        	

        	$sql= "SELECT *FROM `Cars Owned` INNER JOIN `Customers` ON `Cars Owned`.`Customer ID` = `Customers`.`Customer ID` WHERE `Cars Owned`.`Customer ID`= (SELECT `Customer ID` FROM `Customers` WHERE `Customer Name`=:c_name LIMIT 1)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array('c_name' => $c_name));
            while($row = $stmt->fetch()){
                
                echo '<tr>';
                echo '<td>'.$row['Customer ID'].'</td>';
                echo '<td>'.$row['Product ID'].'</td>';
                echo '<td>'.$row['No. of Cars'].'</td>';
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
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;"> <a href="c_return_car.php?p_id=<?php echo $row['Product ID'];?>" >Return </a >  
                     </button > 
                </td>  -->
                
                <?php
                echo '</tr>';
                }
            }
          }catch(PDOException $e) {
            echo $e->getMessage();
        }
    

         
    ?>
    </table> </div>
<!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="customer.php"> <-- Back</a>
                  </button> -->
  </div>

<!--View Car in my showroom end -->