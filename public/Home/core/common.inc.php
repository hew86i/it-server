<?php

function displayPageHeader ($pageTitle=null) {

?>

<!DOCTYPE html>
<html lang="en" ng-app>
  <head>
  
 
  <!-- <script type="text/javascript" src="../AJAX/jquery.js"></script>
  <script type="text/javascript" src="../AJAX/jquery.vticker-min.js"></script> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle ?></title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/template.css"> 

  </head>
  <body>
    <!-- <h1>  <?php echo $pageTitle ?></h1> -->

<?php
}

function displayPageFooter() {

?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  <!--  <script type="text/javascript" src="../AJAX/vticker.js"></script> -->
    

  </body>
</html>	

<?php
}
?>