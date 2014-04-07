<?php
require_once 'core/init.php';
$update = DB::getInstance()->query("UPDATE view SET new = 1 WHERE status = 1");

// session_start();
?>

<html lang="en">
  <head>

     <!-- ova ne treba ajax.js 
  <script src="../AJAX/ajax.js"></script> -->

  <script type="text/javascript" src="../AJAX/jquery.js"></script>
  <script type="text/javascript" src="../AJAX/jquery.vticker-min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/template.css">
    <link href='http://fonts.googleapis.com/css?family=Exo+2:400,300,500,600,700,800,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

<script type="text/javascript">
$(document).ready(function(){
	setTimeout(function(){
	$(function(){
		$('#news-container').vTicker({ 
		speed: 1200,
		pause: 6800,
		animation: 'fade',
		height: 5000,
		mousePause: false,
		showItems: 4
		});
	});
	}, 2000);
});
</script>

  </head>
  <body>
    <!-- <h1>  </h1> -->


<script>

// function pad(n) { return ("0" + n).slice(-2); }
Number.prototype.pad = function (len) {
    return (new Array(len+1).join("0") + this).slice(-len);
}

function printTime() {
		var now = new Date();
			// var hours = now.getHours();
			// var mins = now.getMinutes();
			// var seconds = now.getSeconds();
			// console.log(hours+":"+mins+":"+seconds);
		var time = now.getHours().pad(2) + ":"
         + now.getMinutes().pad(2) + ":"
         + now.getSeconds().pad(2);
         console.log(time);
         document.getElementById("now_time").textContent = time
         // $('#now_time').after(time);
		}
		

$(document).ready(function(){
		

		setInterval("printTime()",1000);

        setInterval(function() {
        	$.getJSON('akt.php', function(data){ 
    			$.each(data, function(idx, obj){ 

    				var id_num = obj['id'];
    				var naslov = obj['title'];
    				var opis = obj['description'];
    				var status = obj['status'];
    				var user = obj['user'];
    				var date = obj['created'];
    				       						
            		// console.log(naslov + ": " + opis+ ": " + user+ ": " + status+ ": " );
            		
            		//so idnum# obelezuvvat div's
            		// var new_div = "<li id=\"p_idnum"+id_num+"\""+"><div class=\"panel panel-default\" id=\"idnum"+id_num+"\""+"><h2>"+naslov+"</h2><p>"+opis+"</p></div></li>";
            		var new_div = "<li id=\"p_idnum"+id_num+"\""+"><div class=\"panel panel-default\">"+
            							"<h2><strong>  - "+naslov+" - </strong></h2>"+
            							"<p>"+opis+"</p><div class='foo' style='float:left;'>"+user+"</div>"+
            							"<div class='foo' style='float:right;'>"+date+"</div><hr style='clear:both;'/>"+

            							"</div></li>";
            										
            										
            										
            		// console.log("id_num : "+id_num +' :'+new_div);

            		// var div = document.getElementById('news');
            		
	        		$('#news-container > ul').append(new_div);
	        		
	    		});
			}, 1000);
			setTimeout(function(){
				$.getJSON('remove.php', function(data){ 
	    			$.each(data, function(idx, obj){ 

	    				var status_brisi = obj['status'];
	    				var id_brisi = obj['id'];       				
	       						
	            		// console.log("id : " + id_brisi);
		        		var tag_brisi = "#p_idnum"+id_brisi;		        		
		        		// console.log("id : " + id_brisi + " tab_brisi :" + tag_brisi);
		    			
		    			//remove child		    

						$(tag_brisi).remove();
		    		});
				});
			
			}, 1000);
           
      }, 2000);

   });

</script>

<style type="text/css">
	
h2 {
  font-weight: 800;
  font-size: 36px;
  text-transform:uppercase;
}

body {
  font-family: 'Exo 2', sans-serif;
  font-weight: 400;
  overflow:hidden;
  cursor: none;
}
.foo {
  font-weight: 300;
  color: #292929;
}

p {
	margin: 0 0 0px;
}

</style>


<div class="container container-full">
	<div class="row " id="view-header">
		<div class="col-lg-10">
			<p style="text-align:center">ОГЛАСНА ТАБЛА</p>
		</div>
		<div class="col-lg-2">
			<p><span id="now_time"></span></p>
		</div>
	</div>

</div>


<div class="container-full">
	<div class="row" id="main-content">
		<div class="col-lg-9">

			<div id="news-container">
				<ul>
				<!-- <li>
						<div id="p_idnum1" class="panel panel-default">
							<h1><strong> Опис на проблемот     |    22/4 </strong></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris accumsan, risus rutrum
					 			fermentum congue, nunc felis posuere erat, nec posuere tortor ipsum id mauris.  malesuada quis dui ut, mo
					   			llis imperdiet nisi.</p>
						</div>
					</li> -->				
				</ul>
		
			</div>	
		</div>

		<!-- <div class="col-lg-2" >
			
		</div>	 -->
	</div>
</div>
   
   <!--  // <script src="../js/bootstrap.min.js"></script>
    // <script type="text/javascript" src="../AJAX/vticker.js"></script> -->

  </body>
</html>