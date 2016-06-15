<?php
session_start();

if($_SESSION['user']){
    session_destroy();
}
ob_start(); 
?> 

<!DOCTYPE html>

<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src='https://www.google.com/recaptcha/api.js'></script>
<!--font awesome-->
<script src="https://use.fontawesome.com/93c8ead996.js"></script>

<link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
    <!--custom stylesheet-->
<link rel="stylesheet" href="assets/css/jumbotron-narrow.css">
<link rel="stylesheet" href="assets/css/beeStyle.css">
</head>
<body>     
   
        <div class="header">
        <center><a href="http://www.animatedimages.org/cat-bees-185.htm"><img src="http://www.animatedimages.org/data/media/185/animated-bee-image-0067.gif" border="0" alt="animated-bee-image-0067" id="beeGif"/></a><h1>BeeHive Admin Login</h1></center>
        </div>
        <div class = "container">

            <div class="jumbotron">
                <div class="row" id ="form">
                	<form class="form-signin" action="authenticate.php" method="post">
                    	<h2 id="adminLogin2">Please Sign In</h2>
                        <label for="username">Username</label>
                    	<input type="text" class="adminInput" id="inputUser" class="form-control" placeholder="Username" name="username" autofocus="" value="<?php if(isset($_SESSION['username'])){echo($_SESSION['username']);}?>" required>
                        
                        <label for="password">Password</label>
            			<input type="password" class="adminInput" id="inputPassword" class="form-control" name="password" placeholder="Password" required >
           
           				<button class="beeBtn" id="admin-btn" type="submit" value="submit">Sign In</input>
            
            			<?php 
            				if(!empty($_SESSION['error'])){
                    			echo('<div class="alert alert-danger" role="alert">'.$_SESSION['error'].'</div>');
                    
                    			unset($_SESSION['error']);
               					}
             			?>
       		 		</form>
                </div>
            </div>
        </div>
       <?php
        include('footer.php');
        ?>
 
    </body>
    
</html>
<?php
?>