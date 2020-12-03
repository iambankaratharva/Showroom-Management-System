<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic5.jpg'); background-size:cover;">
<!-- Add raw materials-->

<div>
  <form method="post" action="" style="margin-top:90px;margin-bottom:100px;background-color:white;">
  <div class="container">
    <h3> GetRaw Material</h3>
        <label><strong>RM ID</strong></label>
        <input type="text" placeholder="Enter Raw Material ID" name="rm_id" value="" required>
        <label ><strong>RM Quantity</strong></label>
        <input type="text" placeholder="Enter RM Quantity" name="rm_qty" value="" required>
      </div>
      <button type="submit" name="get" value="Get">Add</button>
              <!-- <STYLE>A {text-decoration: none;} </STYLE>
                  <button class="button w3-button w3-btn" style="width:100px;height:50px; font-size:13px;border-radius:12px; color:#ffffff; background-color:#000000;"><a href="raw_materials.php"> <-- Back</a>
                  </button> -->
                
  </form>
</div>
<!-- Add raw materials end-->

<?php

if(isset($_POST['get'])){
  $rm_id=$_POST['rm_id'];
  $rm_qty=$_POST['rm_qty'];

  // $sql="INSERT INTO `Raw Materials` (`RM Name`,`RM Unit Price`,`RM Quantity`,`Supplier ID`) 
  //                 VALUES (:rm_name, :rm_price, :rm_qty, :rm_sid)";
  $sql="CALL `Get Raw Materials`(:rm_id,:rm_qty);";
  $stmt=$db->prepare($sql);
  $stmt->execute(array(':rm_id' => $rm_id,
                        ':rm_qty' => $rm_qty));
  header('location: rm_add_success.php');
  
  
}
?>