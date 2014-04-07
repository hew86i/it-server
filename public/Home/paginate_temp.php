

<?php
 
  /*
    Place code to connect to your DB here.
  */
 // include your code to connect to DB.
  require_once 'core/init.php';
  require_once 'core/common.inc.php';

  displayPageHeader(" - ");
 
  // $tbl_name = "";   //your table name
  // How many adjacent pages should be shown on each side?
  $adjacents = 3;
  
  /* 
     First get total number of rows in data table. 
     If you have a WHERE clause in your query, make sure you mirror it here.
  */
  $query = DB::getInstance()->query("SELECT * FROM view"); 
  $total_items = $query->count();

  echo "<h1>$total_items</h1><br/>";
  // die();
 
  /* Setup vars for query. */
  $targetpage = "paginate.php";   //your file name  (the name of this file)
  $limit = 5;                 //how many items to show per page
  if(isset($_GET['page'])) {
    $page = $_GET['page'];
    $start = ($page - 1) * $limit;      //first item to display on this page
  } else {
    $page = 0;
    $start = 0;               //if no page var is given, set start to 0
  }
 
  /* Get data. */
  $sql = "SELECT name, description FROM view LIMIT $start, $limit";

  $result = DB::getInstance()->query($sql);
  //test za rezultatite

  // echo "<pre>";
  // print_r($result->results()[0]);
  // echo "</pre>";
  // foreach ($result->results() as $rezultat) {
  // 	foreach ($rezultat as $key => $value) {
  // 		echo "key : $key ---- value : $value <br/>";
  // 	}
  	
  // }
  
  
  /* Setup page vars for display. */
  if ($page == 0) $page = 1;          //if no page var is given, default to 1.
  $prev = $page - 1;              //previous page is page - 1
  $next = $page + 1;              //next page is page + 1
  $lastpage = ceil($total_items[0]/$limit);    //lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 1;            //last page minus 1
 
  /* 
    Now we apply our rules and draw the pagination object. 
    We're actually saving the code to a variable in case we want to draw it more than once.
  */
  $pagination = "";
  if($lastpage > 1)
  { 
    $pagination .= "<div class=\"pagination pagination-centered\"><ul>";
    //previous button
    if ($page > 1) 
      $pagination.= "<li><a href=\"$targetpage?page=$prev\">previous</a></li>";
    else
      $pagination.= "<li class=\"disabled\"><a href=\"#\">previous</a></li>"; 
    
    //pages 
    if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
    { 
      for ($counter = 1; $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
        else
          $pagination.= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";         
      }
    }
    elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some
    {
      //close to beginning; only hide later pages
      if($page < 1 + ($adjacents * 2))    
      {
        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
        {
          if ($counter == $page)
            $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
          else
            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
        }
        $pagination.= "<a href=\"#\">...</a>";
        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
      }
      //in middle; hide some front and some back
      elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
      {
        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
        $pagination.= "<a href=\"#\">...</a>";
        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
        {
          if ($counter == $page)
            $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
          else
            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
        }
        $pagination.= "<a href=\"#\">...</a>";
        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";   
      }
      //close to end; only hide early pages
      else
      {
        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
        $pagination.= "<a href=\"#\">...</a>";
        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
        {
          if ($counter == $page)
            $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
          else
            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";         
        }
      }
    }
    
    //next button
    if ($page < $counter - 1) 
      $pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
    else
      $pagination.= "<li class=\"disabled\"><a href=\"#\">next</a></li>";
    $pagination.= "</ul></div>\n";   
  }


?>
<?php
	// while($row = mysql_fetch_array($result))
	// {
 
	// // Your while loop here
 
	// }
	foreach ($result->results() as $row) {
		foreach ($row as $key => $value) {
			echo "key : $key ---- value : $value <br/>";
		}
	}
	
?>
<?php echo $pagination; ?>

<?php displayPageFooter(); ?>