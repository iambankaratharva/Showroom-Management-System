<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic11.jpg'); background-size:cover;">

<header class="w3-display-container w3-content w3-wide head-img" style="max-width:1500px;" id="home">
  
  <div class="w3-display-middle w3-margin-top w3-center">
    <STYLE>A {text-decoration: none;} </STYLE>
    <button type="button" class="button button1 w3-btn"><a href="c_buy_a_car.php">Buy A Car</a></button>
    <button type="button" class="button button2 w3-btn"><a href="c_view_my_cars.php?c_name=<?php echo $_GET['c_name']?>">View My Cars</a></button>
  </div>
</header>