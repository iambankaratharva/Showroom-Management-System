<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg');background-size:cover;">
<!-- View Car In my Showroom division -->
  <div class="w3-content w3-padding" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 ">Product and Raw Materials Requirement Mapping</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th" style="margin-bottom:10px;">
  
    <tr>
      <th>Product ID</th>
      <th>RM ID </th>
      <th>RM Quantity Required</th>
      <!-- <th>Edit</th> -->
      <!-- <th>Add</th> -->
      
    </tr>

    <?php
   


        // try {

        	if(isset($_GET['p_id'])){

        		$p_id= $_GET['p_id'];
            

          }
        	
        	
        	

        	$sql= "SELECT *FROM `Manufactured Into` WHERE `Product ID`=:p_id";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':p_id' => $p_id));
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                echo '<tr>';
                echo '<td>'.$row['Product ID'].'</td>';
                echo '<td>'.$row['RM ID'].'</td>';
                echo '<td>'.$row['RM Quantity Required'].'</td>';

                

                 
                echo '</tr>';
                }
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
               <!--  <td>
                	<STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;"> <a href="add_cars.php?s_id=<?php echo $row['Showroom ID'];?>" >Add </a >  
                     </button > 
                </td> --> 
                
               
      <!--   //     }catch(PDOException $e) {
        //     echo $e->getMessage();
        // } -->
    

         
    
    </table> </div>
<!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="manager.php"> <-- Back</a>
                  </button> -->
  </div>

<!--View Car in my showroom end -->