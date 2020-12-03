<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg');background-size:cover;">
<!-- View Finished Products -->
  <div class="w3-content w3-padding w3-auto" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Finished Products</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th">
      
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Category</th>
      <th>Product Quantity</th>
      <th>Product Cost</th>
      <th>Fuel Type</th>
      <th>Product Colour</th>
      <th>Number of Seats</th>
      <th>Manufacturing Year</th>
      <th>Restock</th>
    </tr>

    <?php
   


        // try {

        	
        	
        	$sql="SELECT * FROM `Finished Products`";
        	$stmt = $db->prepare($sql);
        	$stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                echo '<tr>';
                echo '<td>'.$row['Product ID'].'</td>';
                echo '<td>'.$row['Product Name'].'</td>';
                echo '<td>'.$row['Product Category'].'</td>';
                echo '<td>'.$row['Product Quantity'].'</td>';
                echo '<td>'.$row['Product Cost'].'</td>';
                echo '<td>'.$row['Fuel'].'</td>';
                echo '<td>'.$row['Product Colour'].'</td>';
                echo '<td>'.$row['No. of seats'].'</td>';
                echo '<td>'.$row['Manufacturing Year'].'</td>';
                ?>
                <td>
                  <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#0c71e0;padding:5px;"> <a href="fp_restock.php?p_id=<?php echo $row['Product ID']; ?>" >Restock </a >  
                     </button>
                </td>
                
                
                <?php
                echo '</tr>';
                }
        //     }

        // catch(PDOException $e) {
        //     echo $e->getMessage();
        // }
    
    ?>
    </table> </div></div>

    
                    <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;margin-top:300px;"><a href="manager.php"> <-- Back</a>
                  </button> -->
                
                   
                    <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#00ff00;margin-top:300px;margin-left:5px;padding:5px;"> <a href="fp_add.php" >Add </a >  
                     </button > 
                
                	<!-- <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;margin-top:300px;"> <a href="fp_del.php" >Delete </a >  
                     </button>  -->

                  <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#FFA500;margin-top:300px;margin-left:5px;padding:5px;"> <a href="fp_update_cost.php" >Update Cost </a >  
                     </button> 

                     <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:85px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;margin-top:300px;margin-left:5px;padding:5px;"> <a href="fp_config.php" >Configure </a >  
                     </button> 
