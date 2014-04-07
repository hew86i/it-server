<?php

function addScripts() {

?>
<script type="text/javascript">
$(function(){
	$('#news-container').vTicker({ 
		speed: 500,
		pause: 3000,
		animation: 'fade',
		mousePause: false,
		showItems: 3
	});
});
</script>


<?php 
}
?>