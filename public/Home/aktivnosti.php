<?php
require_once 'core/init.php';
require_once 'core/common.inc.php';
require_once 'core/navbar.php';

displayPageHeader(" - HOME - ");
displayNavbar();

$username = 'admin';   // tuka ke se pobara userort od drugo mesto

$getName = "SELECT name FROM users WHERE username = '".$username."'";
$user = DB::getInstance()->AssQuery($getName);

$id=2;
$rank = 'rank' . $id;
?>

<!-- HTML vo body-->

<div class="container" style="margin-top:60px">
	<div class="row well" style="margin-left: 15px; border: 1px solid black">
		<div class="col-sm-3">
			<h4><?php echo $user->results()[0]['name']; ?></h4>
			<h4>2014-12-01 15:02:02</h4>
			<!-- <h4>normal</h4> -->
		</div>
		<div class="col-sm-6" style="border-left:1px solid black">
			<h2 style="text-align:center">NASLOV ddd d sdf asdf asdf asdfas dfasd</h2>
			<p >opisasd fasdkf las;dfkl jasdklfa sdklfja sdfja sdfas dj;fadklsjawe klfjasdfkl23dasfklasdjf dklsf
			asdfkl asjdfkl jasdfklja sfkljasd fklwj4ot8i jasdklfjas;ldfk jasdfkl j834rt jasdklf
			asdf ajsdfkljasdfkldjsf lakejoiaswdfsd<p>			
		</div>
		<div class="col-sm-2 col-md-offset-1">
		<form name="send2" id="send_id_2" method="post">
			<button type="button" class="btn btn-primary">Remove</button>
			<button type="button" class="btn btn-primary">Edit</button><br/>
			<label >
				<input type="radio" name="<?php echo $rank ?>" value="Normal" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Normal') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Normal<br/>
				<input type="radio" name="<?php echo $rank ?>" value="Warning" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Warning') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Warning<br/>
				<input type="radio" name="<?php echo $rank ?>" value="Itno" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Itno') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Itno<br/>
			
			</label>
		</form>
		</div>
	</div>
	<?php 

	$id=3;
	$rank = 'rank' . $id;
	?>
	<div class="row well" style="margin-left: 15px; border: 1px solid black">
		<div class="col-sm-3">
			<h4><?php echo $user->results()[0]['name']; ?></h4>
			<h4>2014-12-01 15:02:02</h4>
			<!-- <h4>normal</h4> -->
		</div>
		<div class="col-sm-6" style="border-left:1px solid black">
			<h2 style="text-align:center">NASLOV ddd d sdf asdf asdf asdfas dfasd</h2>
			<p >opisasd fasdkf las;dfkl jasdklfa sdklfja sdfja sdfas dj;fadklsjawe klfjasdfkl23dasfklasdjf dklsf
			asdfkl asjdfkl jasdfklja sfkljasd fklwj4ot8i jasdklfjas;ldfk jasdfkl j834rt jasdklf
			asdf ajsdfkljasdfkldjsf lakejoiaswdfsd<p>			
		</div>
		<div class="col-sm-2 col-md-offset-1">
		<form name="send3" id="send_id_3" method="post">
			<button type="button" class="btn btn-primary">Remove</button>
			<button type="button" class="btn btn-primary">Edit</button><br/>
			<label >
				<input type="radio" name="<?php echo $rank ?>" value="Normal" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Normal') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Normal<br/>
				<input type="radio" name="<?php echo $rank ?>" value="Warning" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Warning') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Warning<br/>
				<input type="radio" name="<?php echo $rank ?>" value="Itno" <?php if(isset($_POST[$rank]) && $_POST[$rank] == 'Itno') { ?>checked="checked" <?php } ?> onChange="this.form.submit()"/> Itno<br/>
			
			</label>
		</form>
		</div>
	</div>

	<div class="row well" style="margin-left: 15px; border: 1px solid black">
		<div class="col-sm-2" >
			<?php
			echo "<pre>";
			echo (isset($_POST[$rank]) && $_POST[$rank] == 'Normal') ?  'checked':'';
			echo (isset($_POST[$rank]) && $_POST[$rank] == 'Warning') ?  'checked':'';
			echo (isset($_POST[$rank]) && $_POST[$rank] == 'Itno') ?  'checked':'';
			// print_r($user->results()[0]['name']);
			echo "<br/>";
			print_r($_POST);
			echo "</pre>";
			?>
		</div>		
	</div>





</div>







<?php displayPageFooter(); ?>