@extends('layout.tv_layout')


@section('title')

<script>
	
$(document).ready(function(){

setInterval("printTime()",1000);

setTimeout("Ticker()", 2000);


setInterval(function(){
	$.post('oglasna/aktivni',
			{},
			function(o){
				  	// 		$('#naslov').val(o.name);
							// $('#textarea').val(o.description);
			console.log(o);
			},				  		 
			'json'
		);
				  // $("html, body").animate({ scrollTop: 0 }, "slow");


	},1500);

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
						<li>
							<div id="p_idnum1" class="panel panel-default">
								<h1><strong> Опис на проблемот     |    22/4 </strong></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris accumsan, risus rutrum
						 			fermentum congue, nunc felis posuere erat, nec posuere tortor ipsum id mauris.  malesuada quis dui ut, mo
						   			llis imperdiet nisi.</p>
							</div>
						</li>				
						<li>
							<div id="p_idnum1" class="panel panel-default">
								<h1><strong> Опис на      |    22/4 </strong></h1>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris accumsan, risus rutrum
						 			fermre tortor ipsum id mauris.  malesuada quis dui ut, mo
						   			llis imperdiet nisi.</p>
							</div>
						</li>	
					</ul>
			
				</div>	
			</div>

			<!-- <div class="col-lg-2" >
				
			</div>	 -->
		</div>
	</div>

@stop