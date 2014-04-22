@extends('layout.tv_layout')


@section('title')

<script>
	
$(document).ready(function(){

setInterval("printTime()",1000);

setTimeout("Ticker()", 2000);


setInterval(function(){
	$.post('/it-server/oglasna/aktivni',
			{},
			function(o){
				console.log(o);
				$.each(o, function(idx, obj){ 

    				var id_num = obj['id'];
    				var naslov = obj['title'];
    				var opis = obj['description'];
    				var status = obj['status'];
    				var user = obj['user'];
    				var date = obj['created'];
    				       						
            		console.log(naslov + ": " + opis+ ": " + user+ ": " + status+ ": " );
            		
            		//so idnum# obelezuvvat div's
            		// var new_div = "<li id=\"p_idnum"+id_num+"\""+"><div class=\"panel panel-default\" id=\"idnum"+id_num+"\""+"><h2>"+naslov+"</h2><p>"+opis+"</p></div></li>";


            		var new_div = "<li id=\"p_idnum"+id_num+"\""+"><div class=\"panel panel-default\">"+
            							"<h2><strong>  - "+naslov+" - </strong></h2>"+
            							"<p>"+opis+"</p><div class='foo' style='float:left;'>"+user+"</div>"+
            							"<div class='foo' style='float:right;'>"+date+"</div><hr style='clear:both;'/>"+

            							"</div></li>";
            		
	        		$('#news-container > ul').append(new_div);	        		
	    		});
			},				  		 
			'json'
		);

	setTimeout(function(){
				$.post('/it-server/oglasna/neaktivni',
					{}, 
					function(data){ 
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

	},2000);

});

</script>


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

@stop

@section('content')

<div class="container-full">
		<div class="row" id="main-content">
			<div class="col-lg-9">

				<div id="news-container">
					<ul>									
						<!-- <li>
							<div id="p_idnum1" class="panel panel-default">
								<h1><strong> Hard coded </strong></h1>
								<p>intro - default</p>
							</div>
						</li> -->	
					</ul>
			
				</div>	
			</div>

			<!-- <div class="col-lg-2" >
				
			</div>	 -->
		</div>
	</div>

@stop