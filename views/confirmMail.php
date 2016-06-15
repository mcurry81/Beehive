<?php

$_SESSION['action'] = $_GET['action'];

?>
<div class="jumbotron">   

	<div class = "row" id="confirm">

		<h2>What would you like to do next?</h2>
		<a href="?controller=view&action=add">Return to Main Page</a> <br>
		<a href='?controller=view&action=submit'>Sample Summary Page</a>
	</div>
</div>