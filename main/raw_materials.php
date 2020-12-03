<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg'); background-size:cover;">

<!-- View Raw Materials -->
  <div class="w3-content w3-padding" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 ">Raw Materials</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th">

    <tr>
      <th>RM ID</th>
      <th>RM Name</th>
      <th>RM Unit Price</th>
      <th>RM Quantity</th>
      <th>Supplier ID</th>
      <!-- <th>Update</th> -->
      <!-- <th>Delete</th> -->
    </tr>

    <?php
        try {

        	$sql= "SELECT *FROM `Raw Materials` ORDER BY `RM ID` ASC";

            $stmt = $db->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                echo '<tr>';
                echo '<td>'.$row['RM ID'].'</td>';
                echo '<td>'.$row['RM Name'].'</td>';
                echo '<td>'.$row['RM Unit Price'].'</td>';
                echo '<td>'.$row['RM Quantity'].'</td>';
                echo '<td>'.$row['Supplier ID'].'</td>';
                ?>
                
              <!--   <td>
                  <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;"> <a href="rm_del.php?rm_id=<?php echo $row['RM ID']; ?>" >Delete </a >  
                     </button> 
                </td> -->
                
                <?php
                echo '</tr>';
                }
            }

        catch(PDOException $e) {
            echo $e->getMessage();
        }
    
    ?>
    </table> </div></div>

    
                    <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;margin-top:300px;"><a href="manager.php"> <-- Back</a>
                  </button> -->
                
                   
                    <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:80px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#00e600;margin-top:300px;padding:5px;"> <a href="rm_add.php" >Add New RM </a >  
                     </button > 
                     <!-- <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;margin-top:300px;padding:5px;"> <a href="rm_get.php" >Get RM </a >  
                     </button >  -->
                <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;margin-top:300px;padding:5px;"> <a href="update_rm_cost.php" >Update Cost </a >  
                     </button> 

                	

                