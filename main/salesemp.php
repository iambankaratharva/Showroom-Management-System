<?php
require_once('config.php');
include "header_footer.php"
?>
<body style="background-image: url('pic15.jpg'); background-size:cover;">


<header class="w3-display-container w3-content w3-wide head-img" style="max-width:1500px;" id="home">
  
  <div class="w3-display-middle w3-margin-top w3-center">
    <STYLE>A {text-decoration: none;} </STYLE>
    <button type="button" class="button button1 w3-btn"><a href="salesemp_car_show.php?sid=<?php echo $_GET['sid']?>">Show Cars</a></button>
    <button type="button" class="button button2 w3-btn"><a href="salesemp_sales_hist.php?sid=<?php echo $_GET['sid']?>">Sale History</a></button>
  </div>
</header>



