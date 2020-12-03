<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic12.jpg');background-size:cover;">

<!-- Product division -->
  <div class="w3-content w3-padding" id="products" style="margin-bottom:70px;margin-top:70px;background-color:white;opacity:95%;">
  
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16 ">Products</h3>
    <div class="w3-container">
    <table class="w3-table w3-table-all w3-bordered" class="w3-table td" class="w3-table th">

    <tr>
      <th>Showroom ID</th>
      <th>Product ID</th>
      <th>Product Name</th>
      <th>Product Category</th>
      <!-- <th>Product Quantity</th> -->
      <th>Product Cost</th>
      <th>Fuel Type</th>
      <th>Product Colour</th>
      <th>Number of Seats</th>
      <th>Manufacturing Year</th>
      <th>Buy</th>
    </tr>
    <?php
        try {


            $stmt = $db->query('SELECT `Cars`.`Showroom ID`, `Finished Products`.`Product ID`, `Finished Products`.`Product Name`, `Finished Products`.`Product Category`, `Finished Products`.`Product Cost`, `Finished Products`.`Fuel`, `Finished Products`.`Product Colour`, `Finished Products`.`No. of seats`, `Finished Products`.`Manufacturing Year` FROM `Cars` LEFT JOIN `Finished Products` ON `Cars`.`Product ID`=`Finished Products`.`Product ID` ORDER BY `Cars`.`Showroom ID`');
            while($row = $stmt->fetch()){
                
                echo '<tr>';
                echo '<td>'.$row['Showroom ID'].'</td>';
                echo '<td>'.$row['Product ID'].'</td>';
                echo '<td>'.$row['Product Name'].'</td>';
                echo '<td>'.$row['Product Category'].'</td>';
                echo '<td>'.$row['Product Cost'].'</td>';
                echo '<td>'.$row['Fuel'].'</td>';
                echo '<td>'.$row['Product Colour'].'</td>';
                echo '<td>'.$row['No. of seats'].'</td>';
                echo '<td>'.$row['Manufacturing Year'].'</td>';
                ?>

               <td>
                  <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#ffa500;"> <a href="payment.php?p_id=<?php echo $row['Product ID']?> " >Buy </a >  
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
<!--Product divion end -->

<!--Search -->
<div>
  <form action="c_searchresult.php" method="post" style="margin-top:160px;margin-bottom:100px;margin-left:10px;margin-right:10px;background-color:white;">
    <h3>Search by Category:</h3>
    <input type="text" placeholder="Enter Category" list="category" name="cat" value="" >
    <datalist id="category">
    <option value="Suv">
    <option value="Sedan">
    <option value="Compact">
    <option value="Off Road">
    <option value="Mini Van">
  </datalist>
    <h3>Search by Fuel Type:</h3>
    <input type="text" placeholder="Enter Fuel Type" list="fuel" name="fuel" value="" >
    <datalist id="fuel">
    <option value="Petrol">
    <option value="Diesel">
    <option value="Electric">
  </datalist>
    <!-- <h3>Search by Category:</h3>
    <input type="text" placeholder="Enter Starting Cost" list="fuel" name="cat" value="" >
    <datalist id="fuel">
    <option value="Petrol">
    <option value="Diesel">
    <option value="Electric">
  </datalist> -->
  <input type="submit" name="search" value="Search" >
  </form>
</div>
                    
                  <!--   <STYLE>A {text-decoration: none;} </STYLE>
                      <button class="button w3-button w3-btn" style="width:70px;height:50px; font-size:13px;border-radius:12px; color:#000000; background-color:#ffa500;margin-top:300px;"> <a href="payment.php" >Buy </a >  
                     </button > 
 -->
<?php

if(isset($_POST['search'])){

    $cat=$_POST['cat'];
    $fuel=$_POST['fuel'];

    header("Location: c_searchresult.php?cat=$cat&fuel=$fuel");

}

?>
