<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic13.jpg'); background-size:cover;">
<!-- View Finished Products -->
  <div class="w3-content w3-padding w3-auto" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Suppliers</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th">

    <tr>
      <th>Supplier ID</th>
      <th>Supplier Name</th>
      <th>Supplier Contact</th>
      <th>City</th>
      <!-- <th>Update</th> -->
      <!-- <th>Delete</th> -->
    </tr>

    <?php
   


        try {

        	
        	
        	$sql="SELECT * FROM `Suppliers`";
        	$stmt = $db->prepare($sql);
        	$stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                echo '<tr>';
                echo '<td>'.$row['Supplier ID'].'</td>';
                echo '<td>'.$row['Supplier Name'].'</td>';
                echo '<td>'.$row['Supplier Contact'].'</td>';
                echo '<td>'.$row['City'].'</td>';
                ?>
                
                <!-- <td>
                  <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:yellow;"> <a href="sup_del.php?sid=<?php echo $row['Supplier ID']; ?>" >Delete </a >  
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
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#00e600;margin-top:300px;"> <a href="sup_add.php" >Add </a >  
                     </button > 
                     <!--  <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#FFA500;margin-top:300px"> <a href="sup_update.php?sid=<?php echo $row['Supplier ID']; ?>" >Update </a >  
                     </button>  -->
                
                	 

                     