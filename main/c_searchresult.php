<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic11.jpg');background-size:cover;">
<!-- <?php

?> -->


<!-- Product division -->
  <div class="w3-content w3-padding" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Products</h3>
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
      <th>Buy</th>
    </tr>
    <?php
        try {
          if(isset($_POST['cat']) && isset($_POST['fuel'])){
  $cat=$_POST['cat'];
  $fuel=$_POST['fuel'];
  $sql="SELECT * FROM `Finished Products` WHERE `Product Category` = :cat AND `Fuel`=:fuel;";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':cat' => $cat,
                                 ':fuel' => $fuel));}

elseif(isset($_POST['cat']) && !isset($_POST['fuel'])){
  $cat=$_POST['cat'];
  $sql="SELECT * FROM `Finished Products` WHERE `Product Category` = :cat;";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':cat' => $cat));}

else{
  if(isset($_POST['fuel']) && !isset($_POST['cat'])){
  $fuel=$_POST['fuel'];
  $sql="SELECT * FROM `Finished Products` WHERE `Fuel`=:fuel;";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':fuel' => $fuel));}
 }

        	// $sql="SELECT * FROM `Finished Products` WHERE `Product Category` = :cat AND `Fuel`=:fuel;";
         //    $stmt = $db->prepare($sql);
         //    $stmt->execute(array(':cat' => $cat,
         //                         ':fuel' => $fuel));
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
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#ffa500;"> <a href="payment.php?p_id=<?php echo $row['Product ID'] ?>" >Buy </a >  
                     </button > 
                </td>
             
                
                <?php
                echo '</tr>';

            }

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    ?>
    </table> </div></div>

    <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:70px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;margin-top:300px"><a href="customer.php"> <-- Back</a>
                  </button> -->

<!-- <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#ffa500;margin-top:300px;"> <a href="payment.php?id=<?php echo $row['Product ID']; ?>" >Buy </a >  
                     </button >  -->