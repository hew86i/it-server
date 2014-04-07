
<?php
require_once 'core/init.php';
require_once 'core/common.inc.php';
require_once 'core/navbar.php';

displayPageHeader(" - HOME - ");
displayNavbar();
?>
<!-- *********************** Дел за tinymce ********************************* -->
<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
<script src="../tinymce/tinymce.min.js"></script>
<script src="../tinymce/jquery.tinymce.min.js"></script>

<!-- ************************************************************************* -->

<script>
tinymce.init({
    selector: "textarea",
    theme: "modern",
    force_p_newlines : false,
    width: 800,
    height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "../css/bootstrap.min.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
   fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 }); 
</script>



<?php

$user = new User();
//$another_user = new User(3);  // moze da se koristi dolnata naredba i za ovoj user
//echo $user->isLoggedIn() ? ' - Logged IN - ' : '<p> - NOT Logged IN - </p><hr/>';



// ********************** Променливи за прикажување на контент *********************************
$isSameUser = 0;
$isAdminGroup = 1;  // 1 za standard user | 5 za admin gorup
// *********************************************************************************************


if($user->isLoggedIn()){

if(Input::exists()) {
	
	if(Token::check(Input::get('token'))) {

	$validate = new Validation();
	$validation = $validate->check($_POST, array(
		'naslov' => array(
			'required' => true,			
		),
		'textarea' => array(
			'required' => true,			
		)			
	));

	if($validation->passed()) {			
		
		try {
			DB::getInstance()->insert('view', array(
				'name' => Input::get('naslov'),

				// ***************************************** НАЈВАЖНО ЗА ДА СЕ ПРИКАЖАТ ВО ПРАВИЛНА ФОРМА !! *********************
				'description' => mysql_real_escape_string(htmlentities(Input::get('textarea'),ENT_QUOTES | ENT_HTML5)),  
				// mysql_real_escape_string

				'user' => $user->data()->username				
			));		
			
		} catch (Exception $e) {
			die($e->getMessage());
		}

	} else {		
		foreach ($validation->errors() as $error) {
			echo "<p> $error * </p>";			
		}
	}
	}
}

// $username = 'admin';   // tuka ke se pobara userort od drugo mesto

// $getName = "SELECT name FROM users WHERE username = '".$username."'";
// $user = DB::getInstance()->AssQuery($getName);			
$current_username = $user->data()->username;
$isAdminGroup = $user->data()->group;
?>


	
<div class="container" style="margin-top:40px">
	<div class="row">
		<div class="col-md-12" id="test1" style="background-color:#B2FFFF">
			<h2> Hello <span class="glyphicon glyphicon-star"> </span> <a href="#"><?php echo escape($user->data()->username); ?></a> !</h2>

			<!-- <ul>
				<li><a href="logout.php"> Log out</a></li> 
			</ul> -->
		<!-- 	<div> -->
				<form class="form-horizontal" action="" method="post" style="width:70%">
					  <fieldset>
					    
					    <!-- Form Name -->
					    <legend>
					      Внеси налог
					    </legend>
					    
					    <!-- Text input-->
					    <div class="form-group">
					      <label class="col-md-4 control-label" for="naslov">
					        Наслов
					      </label>
					      
					      <div class="col-md-6 input-lg">
					        <input id="naslov" name="naslov" type="text" placeholder="" class="form-control input-md" required="">
					        
					      </div>
					    </div>
					    
					    <!-- Textarea -->
					    <div class="form-group" >
					      <label class="col-md-4 control-label" for="textarea">
					        Опис
					      </label>
					      <div class="col-md-6">
					        <textarea class="form-control" id="editor" name="textarea" rows="6" cols="140"></textarea>
					      </div>
					    </div>
					    
					    <!-- Button -->
					    <div class="form-group">
					      <label class="col-md-4 control-label" for="prati">
					      </label>
					      <div class="col-md-4">
					        <button id="prati" name="prati" class="btn btn-primary">
					          внеси налог
					        </button>
					      </div>
					    </div>

						    <!-- Hidden input-->
						<div class="form-group">
				  			<label class="col-sm-2 control-label" for="token"></label>  
				  			<div class="col-sm-3">
				  				<input id="token" name="token" type="hidden" placeholder="" value="<?php echo Token::generate(); ?>" class="form-control input-md">    
				  			</div>
						</div>
					    
					  </fieldset>
				</form>

		</div>

	</div> <!-- row za vnesi forma -->

		<!-- <div class="row" id="prikaziAktivnosti" style="margin-left: 0 0 0 0">
			<div class="col-md-12"> -->
				<!-- <div class="panel panel-default" style="background-color:#B2B2FF"> -->
					
						<!-- <div class="container"> -->
	<div class="row well" style="margin-left: 0 0 0 0">
		<h2> Внесени налози</h2>
	</div>
	<style type="text/css">
	ul,ol {
		margin-left: 10px;
	}
	</style>

			<?php
				// $get_the_user =get_object_vars($user->data()); 
				// print_r($get_the_user['username']);
				// die();
				   //current loged in usernmame
				
				//set the record limit
				$rec_limit = 10;
				
				/* Get total number of records */
				$sql    = "SELECT * FROM view";
				
				$retval = DB::getInstance()->query($sql);					
				$rec_count = $retval->count();
				
				if (isset($_GET{'page'})) {
					$page   = $_GET{'page'} + 1;
					$offset = $rec_limit * $page;
				} else {
					$page   = 0;
					$offset = 0;
				}
				$left_rec = $rec_count - ($page * $rec_limit);

				$sql = "SELECT id, name, description, user, created FROM view WHERE status <> 9 ORDER BY created DESC LIMIT $offset, $rec_limit";

				
				$retval = DB::getInstance()->AssQuery($sql);	
				?>

				<script type="text/javascript">
				  function delete_row(row_id)
				  {
				  	$.ajax(
				  	{
				  		url: "brishi_zapis.php",
				  		type: 'POST',
				  		data: { id: row_id },

				  	}
				  			)
				  	.done(function( msg ) {
				  		// alert(msg);
						$('#row_'+row_id).remove();
						});
				  }
				  											  
				</script>

				<?php 
				 
				
				foreach ($retval->results() as $rows) {

				$s = "SELECT `view`.`name`, `view`.`description`, `users`.`name`, `view`.`created`, `users`.`username` as UsrName FROM `view` JOIN `users` ON `view`.`user` = `users`.`username` WHERE `view`.`id` = ".$rows['id']."";
				$namedate = DB::getInstance()->AssQuery($s);

				$User_of_akt = $namedate->results()[0]['UsrName'];
				// echo " - ";
				// // echo $current_username +'<br/>';
				// echo gettype($User_of_akt);
				// echo " | ";
				// echo $current_username;
				// echo " - ";
				// echo gettype($current_username);
				if($current_username === $User_of_akt) {
					$isSameUser = 1;
					// echo " | Isti se";
				} else {
					// echo "   |   NE SE ISTI";
					$isSameUser = 0;
				}				

				
				$id=$rows['id'];
				$rank = 'rank' . $id;
				

				echo '<div class="row well" style="margin-left: 15px; border: 1px solid black"'.' id=\'row_' . $rows['id'] . '\'>'; 
					$description_name = html_entity_decode($rows['description'],ENT_QUOTES | ENT_HTML5);
					// echo $description_name;
					// die();
					?>
						
						<script>
							function edit_text(naslov) {
								
								$("#naslov").val(naslov);								
								
								// tinymce.activeEditor.setContent('');

							}

						</script>

						<div class="col-sm-3">
							<h4><?php echo $namedate->results()[0]['name'] ?></h4>
							<h4><?php echo $namedate->results()[0]['created'] ?></h4>
							<!-- <h4>normal</h4> -->
						</div>
						<script type="text/javascript">

						function edit_well() {
							tinymce.init({
							    selector: "div.editable",
							    inline: true,
							    plugins: [
							        "advlist autolink lists link image charmap print preview anchor",
							        "searchreplace visualblocks code fullscreen",
							        "insertdatetime media table contextmenu paste"
							    ],
							    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
							});
						}
						</script>

						<div class="col-sm-6 editable" style="border-left:1px solid black">
							<h2><?php echo $rows['name'] ?></h2>
							
							<p><?php echo html_entity_decode($rows['description'],ENT_QUOTES | ENT_HTML5); 
							// var_dump(html_entity_decode($rows['description'],ENT_HTML5));

							// $str = trim(html_entity_decode($rows['description'],ENT_HTML5));
							// var_dump($str);
							// die();
							?><p>			
						</div>
						<div class="col-sm-2 col-md-offset-1">
					<?php
						echo '<form method="post" ' . ' id="form_id_' . $rows['id'] . '">'; ?>
						<?php 
						
						if($isSameUser || $isAdminGroup==5) { ?>
						  
						      <button type="button" class="btn btn-primary" onclick="delete_row(<?php echo $rows['id'] ?>)" >Remove</button> 
							  <button type="button" class="btn btn-defalut" onclick="edit_well()">Edit</button><br/>
						<?php } ?>
							<label >
								<input type="radio" name="<?php echo $rank ?>" value="Normal" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Normal') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Normal<br/>
								<input type="radio" name="<?php echo $rank ?>" value="Warning" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Warning') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Warning<br/>
								<input type="radio" name="<?php echo $rank ?>" value="Itno" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Itno') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Itno<br/>
							
							</label>
						</form>
						</div>
					</div>
			
				<?php		
					// echo '<tr id=\'row_' . $rows['id'] . '\'>';
					// echo '<td style="font-size:18px"><strong>' . $rows['name'] . '</strong></td>';
					// echo '<td style="font-size:16px">' . $rows['description'] . '</td>';
					// echo '<td style="font-size:16px">' . $rows['user'] . '</td>';
					// echo '<td style="font-size:16px">' . $rows['created'] . '</td>';
					// // echo '<a onclick="delete_row(\'' . $rows['id'] . '\')">remove</a>';	
					// echo '<td> ' .  '<div >' .
					// 					'<button type="button" class="btn btn-primary" onclick="delete_row(\''. $rows['id'].'\')" >Remove</button>' . 
					// 					'<button type="button" class="btn btn-default">Edit</button>' . 
					// 				'</div>' . '</td>';											
									
				}					

				// echo '</tr>';
				// echo '</tbody>';
				// echo '</table>';
				echo '<ul class="pager">';
				if ($left_rec < $rec_limit) {
					$last = $page - 2;
					echo @"<li><a href=\"$_PHP_SELF?page=$last\">Previous</a></li>";
				} else if ($page == 0) {
					echo @"<li><a href=\"$_PHP_SELF?page=$page\"> <li>Next</a></li>";
				} else if ($page > 0) {
					$last = $page - 2;
					echo @"<li><a href=\"$_PHP_SELF?page=$last\">Previous</a></li> ";
					echo @"<li><a href=\"$_PHP_SELF?page=$page\">Next</a></li>";
				}
				echo '</ul>';
				
				?>

</div><!--  GLAVEN DIV ZA CONTAINER -->

<?php


	
?>



<div class="container">
 <div class="starter-template" style="margin-top:40px">
<?php
} else {
	?>

	<div style="margin-top:10%" align="center">
	<h3> Потребно е да се логирате <a href="login.php">Login <span class="glyphicon glyphicon-log-in">
	</a> - или - <a href="register.php"> Register <span class="glyphicon glyphicon-registration-mark"> </a></h3>';
</div>
	<?php
	}
	?>

 </div>
</div>



 <!-- ZA KRAJ NA HTML -->
<?php displayPageFooter(); ?>