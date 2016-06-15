<?php
session_start();


if(!isset($_SESSION['username'])){
        header("Location: adminLogin.php");
    }
 
 
    //file for stylesheets, bootstrap, jquery, and javascript links
 ob_start();   
?> 
<?php
require('header.php');
?>
    <!--custom stylesheet-->
<link rel="stylesheet" href="assets/css/jumbotron-narrow.css">
<link rel="stylesheet" href="assets/css/beeStyle.css">

</head>
    <body id="adminBody">
  
        <div class="header">
        <center><a href="http://www.animatedimages.org/cat-bees-185.htm"><img src="http://www.animatedimages.org/data/media/185/animated-bee-image-0067.gif" border="0" alt="animated-bee-image-0067" id="beeGif"/></a><h1><strong>Admin Panel</strong></h1></center><br>
        <!--TODO: div class jumbotron will be styled as .right_col role=main when adding navbar-->
        </div>
        <div class = "container" >
           
               
    <?php  
        
                    if(isset($_GET['controller'])){
                        $controller = strtoupper($_GET['controller']);
                        //$action = strtoupper($_GET['action']);
                        switch($controller){

                            case ADMIN:
                                include('controllers/adminController.php');
                                break;


                            default:
                                include('controllers/adminController.php');

                        }
                    }else{
                        include('controllers/adminController.php');
                    }
     ?>
         </div>
        <?php 
        include('footer.php');
        ?>
       
    </body>
    
</html>
<?php
ob_flush();
?>