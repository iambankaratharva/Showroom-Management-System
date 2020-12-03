<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic15.jpg');background-size:cover;">
<!-- View Car In my Showroom division -->
  <div class="w3-content w3-padding" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 ">Cars In My Showroom</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th" style="margin-bottom:10px;">
  
    <tr>
      <th>Showroom ID</th>
      <th>Product ID</th>
      <th>Total Quantity</th>
      <!-- <th>Edit</th> -->
      <!-- <th>Add</th> -->
      
    </tr>

    <?php
   

        try {

        	if(isset($_GET['sid'])){

        		$sid= $_GET['sid'];
        	
        	
        	

        	$sql= "SELECT *FROM `Cars` WHERE `Showroom ID` = (SELECT `Showroom ID` FROM `Employees` WHERE `Manager ID`=:sid);";

            $stmt = $db->prepare($sql);
            $stmt->execute(array(':sid' => $sid));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                echo '<tr>';
                echo '<td>'.$row['Showroom ID'].'</td>';
                echo '<td>'.$row['Product ID'].'</td>';
                echo '<td>'.$row['Total Quantity'].'</td>';
                ?>

              
                
                
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

<!-- <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;margin-top:300px;"> <a href="add_cars.php>" >Add </a >  
                     </button >
 --><!--View Car in my showroom end -->
<STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;margin-top:300px;padding:5px;"> <a href="salesemp_import.php?sid=<?php echo $sid?>" >Import </a >  
                     </button >

