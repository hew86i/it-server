<html lang="en"><head>

     <!-- ova ne treba ajax.js -->
  <script src="../AJAX/ajax.js"></script>

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
// $(document).ready(function(){
// 	setTimeout(function(){
// 	$(function(){
// 		$('#news-container').vTicker({ 
// 		speed: 800,
// 		pause: 5500,
// 		animation: 'fade',
// 		height: 700,
// 		mousePause: false,
// 		showItems: 4
// 		});
// 	});
// 	}, 2000);
// });
</script>

  </head>
  <body>
    <!-- <h1>  </h1> -->


<script>

// $(document).ready(function(){
//         setInterval(function() {
//         	$.getJSON('akt.php', function(data){ 
//     			$.each(data, function(idx, obj){ 

//     				var id_num = obj['id'];
//     				var naslov = obj['title'];
//     				var opis = obj['description'];
//     				var status = obj['status'];
//     				var user = obj['user'];
//     				var date = obj['created'];       				
       						
//             		console.log(naslov + ": " + opis+ ": " + user+ ": " + status+ ": " );
            		
//             		//so idnum# obelezuvvat div's
//             		// var new_div = "<li id=\"p_idnum"+id_num+"\""+"><div class=\"panel panel-default\" id=\"idnum"+id_num+"\""+"><h2>"+naslov+"</h2><p>"+opis+"</p></div></li>";
//             		var new_div = "<li id=\"p_idnum"+id_num+"\""+"><div class=\"panel panel-default\"><h2><strong>  - "+naslov+" -  |   "+user+"  </strong>  |  "+date+"</h2><p>"+opis+"</p></div></li>";
//             		console.log("id_num : "+id_num +' :'+new_div);

//             		var div = document.getElementById('news');
//             		// var ul_list = document.get
// 	        		$('#news-container > ul').append(new_div);
	        		
// 	    		});
// 			});
// 			setTimeout(function(){
// 				$.getJSON('remove.php', function(data){ 
// 	    			$.each(data, function(idx, obj){ 

// 	    				var status_brisi = obj['status'];
// 	    				var id_brisi = obj['id'];       				
	       						
// 	            		console.log("id : " + id_brisi);
// 		        		var tag_brisi = "#p_idnum"+id_brisi;		        		
// 		        		console.log("id : " + id_brisi + " tab_brisi :" + tag_brisi);
		    			
// 		    			//remove child		    

// 						$(tag_brisi).parent().remove();
// 		    		});
// 				});
			
// 			}, 1000);
           
//       }, 2000);
//    });

// </script>



<div class="container container-full">
	<div id="view-header">
		<p>ОГЛАСНА ТАБЛА</p>
	</div>

</div>


<div class="container-full">
	<div class="row" id="main-content">
		<div class="col-lg-9">

			<div id="news-container" style="overflow: hidden; position: relative; height: 700px;">
    <ul style="position: absolute; margin: 0px; padding: 0px; top: -1.7122177184896064px;">
        <!-- 					<li>
						<div id="p_idnum1" class="panel panel-default">
							<h1><strong> Опис на проблемот     |    22/4 </strong></h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris accumsan, risus rutrum
					 			fermentum congue, nunc felis posuere erat, nec posuere tortor ipsum id mauris.  malesuada quis dui ut, mo
					   			llis imperdiet nisi.</p>
						</div>
					</li> -->
        <li id="p_idnum45" style="opacity: 0.9857228436901128;">
            <div class="panel panel-default">
                <h2><strong>  - Најнов - </strong></h2>
                <p>Lorem logasdf lasdfds fjdklsfj adklsfj asldkf jasdklf jdsASDF ASD FASDF
                asdf ASDF ASDF ASDF ASDF asd
                fa sDFAS DFs</p>
                <div style="float:left;">User</div> 
				<div style="float:right;">2014-03-17 15:00:10</div> 
				<hr style="clear:both;"/>

            </div>
        </li>
        <li id="p_idnum4">
            <div class="panel panel-default">
                <h2><strong>  - Тест Налог -  |   Admin Server  </strong>  |  2014-03-04 11:38:27</h2>
                <p>Кирилица налог- нов ред администратор</p>
            </div>
        </li>
        <li id="p_idnum4">
            <div class="panel panel-default">
                <h2><strong>  - Тест Налог -  |   Admin Server  </strong>  |  2014-03-04 11:38:27</h2>
                <p>Кирилица налог- нов ред администратор</p>
            </div>
        </li>
        <li id="p_idnum10">
            <div class="panel panel-default">
                <h2><strong>  - без наслов -  |   Admin Server  </strong>  |  2014-03-05 13:33:48</h2>
                <p>лорен ипсум адум нес. Ата ине коре бес дис ла ла да да - налог за сеее сесе сссс . и така натаму</p>
            </div>
        </li>
        <li id="p_idnum21">
            <div class="panel panel-default">
                <h2><strong>  - So, any ideas? Thanks -  |   Admin Server  </strong>  |  2014-03-05 14:05:53</h2>
                <p>EDIT: Thanks for your answers everybody! I took many of your opinions into account (so I won't be commenting on each answer separately) and finally got it working like this:</p>
            </div>
        </li>
        <li id="p_idnum23">
            <div class="panel panel-default">
                <h2><strong>  - - Извадок од лорем ипсум - -  |   Admin Server  </strong>  |  2014-03-05 14:07:27</h2>
                <p>Aenean gravida augue tellus, vitae accumsan leo luctus at. Pellentesque luctus fermentum velit, id lobortis odio blandit at. Cras vel sem turpis. Aenean commodo ante non euismod consequat. Proin varius augue ut libero tristique adipiscing.
                    Maecenas interdum purus eget elementum semper. Integer vel porttitor est. Integer at odio nibh. Integer lacinia dolor augue, ut aliquam purus suscipit ut. Curabitur tincidunt quis nisl eu ullamcorper. Curabitur eget diam est. Fusce
                    scelerisque laoreet malesuada. Donec massa diam, sagittis ac nibh commodo, posuere venenatis arcu. Ut ultrices, urna at bibendum laoreet, eros neque feugiat tortor, a volutpat elit est eget purus.</p>
            </div>
        </li>
        <li id="p_idnum24">
            <div class="panel panel-default">
                <h2><strong>  -  - ТЕХНИКА - -  |   Admin Server  </strong>  |  2014-03-05 14:08:44</h2>
                <p>Да се дополни агрегатот за <strong>серверот</strong> со гориво</p>
            </div>
        </li>
        <li id="p_idnum25">
            <div class="panel panel-default">
                <h2><strong>  -  - Пратка -  -  |   Admin Server  </strong>  |  2014-03-05 14:10:31</h2>
                <p>Да се испрати компјутерот HP-13 -ка во Прилеп 4
                    <br>(HP-то е врз агрегатот)</p>
            </div>
        </li>
        <li id="p_idnum30">
            <div class="panel panel-default">
                <h2><strong>  - Компјутер 2 каса -  |   Admin Server  </strong>  |  2014-03-05 15:57:05</h2>
                <p>Да се подеси 2 каса во Демир Хисар</p>
            </div>
        </li>
        <li id="p_idnum31">
            <div class="panel panel-default">
                <h2><strong>  - asdf asd f -  |   Admin Server  </strong>  |  2014-03-06 10:14:53</h2>
                <p>Zdravo viktor</p>
            </div>
        </li>
        <li id="p_idnum37">
            <div class="panel panel-default">
                <h2><strong>  - Благоја Тричковски -  |   Admin Server  </strong>  |  2014-03-06 14:19:29</h2>
                <p>
                    Како што велат старите: Нема невозможни работи, најважно е да се има желба. Оваа фраза како да е напишана за 23 годишниот Натран Хјуит. Тој успеа целосно да го смени своето тело благодарение на здравата исхрана и редовните вежби. Во моментот кога Натран
                    цврсто решил да ослабне, тој тежел 146 килограми, после што ослабел неверојатни 76 килограми. Откако ослабе, Натран мораше да направи и пластична операција за да се отстрани вишокот кожа кој остана да виси после наглото слабеење.</p>
            </div>
        </li>
        <li id="p_idnum41">
            <div class="panel panel-default">
                <h2><strong>  - Нов налог -  |   Admin Server  </strong>  |  2014-03-15 11:28:20</h2>
                <p>со - Remove Копче</p>
            </div>
        </li>
        <li id="p_idnum45">
            <div class="panel panel-default">
                <h2><strong>  - Најнов -  |   Admin Server  </strong>  |  2014-03-17 15:00:10</h2>
                <p>со кирилица</p>
            </div>
        </li>
        <li id="p_idnum10">
            <div class="panel panel-default">
                <h2><strong>  - без наслов -  |   Admin Server  </strong>  |  2014-03-05 13:33:48</h2>
                <p>лорен ипсум адум нес. Ата ине коре бес дис ла ла да да - налог за сеее сесе сссс . и така натаму</p>
            </div>
        </li>
        <li id="p_idnum21">
            <div class="panel panel-default">
                <h2><strong>  - So, any ideas? Thanks -  |   Admin Server  </strong>  |  2014-03-05 14:05:53</h2>
                <p>EDIT: Thanks for your answers everybody! I took many of your opinions into account (so I won't be commenting on each answer separately) and finally got it working like this:</p>
            </div>
        </li>
        <li id="p_idnum23">
            <div class="panel panel-default">
                <h2><strong>  - - Извадок од лорем ипсум - -  |   Admin Server  </strong>  |  2014-03-05 14:07:27</h2>
                <p>Aenean gravida augue tellus, vitae accumsan leo luctus at. Pellentesque luctus fermentum velit, id lobortis odio blandit at. Cras vel sem turpis. Aenean commodo ante non euismod consequat. Proin varius augue ut libero tristique adipiscing.
                    Maecenas interdum purus eget elementum semper. Integer vel porttitor est. Integer at odio nibh. Integer lacinia dolor augue, ut aliquam purus suscipit ut. Curabitur tincidunt quis nisl eu ullamcorper. Curabitur eget diam est. Fusce
                    scelerisque laoreet malesuada. Donec massa diam, sagittis ac nibh commodo, posuere venenatis arcu. Ut ultrices, urna at bibendum laoreet, eros neque feugiat tortor, a volutpat elit est eget purus.</p>
            </div>
        </li>
        <li id="p_idnum24">
            <div class="panel panel-default">
                <h2><strong>  -  - ТЕХНИКА - -  |   Admin Server  </strong>  |  2014-03-05 14:08:44</h2>
                <p>Да се дополни агрегатот за <strong>серверот</strong> со гориво</p>
            </div>
        </li>
        <li id="p_idnum25">
            <div class="panel panel-default">
                <h2><strong>  -  - Пратка -  -  |   Admin Server  </strong>  |  2014-03-05 14:10:31</h2>
                <p>Да се испрати компјутерот HP-13 -ка во Прилеп 4
                    <br>(HP-то е врз агрегатот)</p>
            </div>
        </li>
        <li id="p_idnum30">
            <div class="panel panel-default">
                <h2><strong>  - Компјутер 2 каса -  |   Admin Server  </strong>  |  2014-03-05 15:57:05</h2>
                <p>Да се подеси 2 каса во Демир Хисар</p>
            </div>
        </li>
        <li id="p_idnum31">
            <div class="panel panel-default">
                <h2><strong>  - asdf asd f -  |   Admin Server  </strong>  |  2014-03-06 10:14:53</h2>
                <p>Zdravo viktor</p>
            </div>
        </li>
        <li id="p_idnum37">
            <div class="panel panel-default">
                <h2><strong>  - Благоја Тричковски -  |   Admin Server  </strong>  |  2014-03-06 14:19:29</h2>
                <p>
                    Како што велат старите: Нема невозможни работи, најважно е да се има желба. Оваа фраза како да е напишана за 23 годишниот Натран Хјуит. Тој успеа целосно да го смени своето тело благодарение на здравата исхрана и редовните вежби. Во моментот кога Натран
                    цврсто решил да ослабне, тој тежел 146 килограми, после што ослабел неверојатни 76 килограми. Откако ослабе, Натран мораше да направи и пластична операција за да се отстрани вишокот кожа кој остана да виси после наглото слабеење.</p>
            </div>
        </li>
        <li id="p_idnum41">
            <div class="panel panel-default">
                <h2><strong>  - Нов налог -  |   Admin Server  </strong>  |  2014-03-15 11:28:20</h2>
                <p>со - Remove Копче</p>
            </div>
        </li>
        <li id="p_idnum45">
            <div class="panel panel-default">
                <h2><strong>  - Најнов -  |   Admin Server  </strong>  |  2014-03-17 15:00:10</h2>
                <p>со кирилица</p>
            </div>
        </li>
    </ul>

</div>
</div>

		<!-- <div class="col-lg-2" >
			
		</div>	 -->
	</div>
</div>
   
   <!--  // <script src="../js/bootstrap.min.js"></script>
    // <script type="text/javascript" src="../AJAX/vticker.js"></script> -->

  
</body></html>