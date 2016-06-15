<?php

$_SESSION['email'] = $_POST['email'];
$_SESSION['subject'] = $_POST['subject'];
$_SESSION['body'] = $_POST['body'];

$_SESSION['action'] = $_POST['action'];
$_SESSION['controller'] = $_GET['controller'];


?> 
<div class="jumbotron">   
	<div class="row" id ="form">
		<h1><center>Contact Me</center></h1>
	 	<form action="?controller=mail&action=send" method="post">
	    <p>Your Email Address: </br>
		<input type="text" name="email"  id="mailid"/>
		</p>
					
		<p>
		Name: </br>
		<input type="text" name="name"  id="nameid"/>
		</p>
		</br>
					
		<p>
		Subject Of Your Message </br>
		<input type="text" name="subject" id="subjectid"/>
		</p>
					
		<p>
		<i>Please enter your message in the text field that follows.</i>
		</p>
		<textarea name="body" rows="10" id="bodyid" cols="52"> </textarea>
					
	
	    <button class="mailBtn" name="action" type='submit' id="admin-btn"  value="send">Send Message</button>
	    </form>
	</div>
</div>		