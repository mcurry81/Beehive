<?php
    session_id();
    session_start();
    $_SESSION['user'] = session_id();
    
    //file for stylesheets, bootstrap, jquery, and javascript links
    require('header.php');
    ob_start();
?> 
<link rel="stylesheet" href="assets/css/jumbotron-narrow.css">
<link rel="stylesheet" href="assets/css/beeStyle.css">
</head>
    <body id="samplesBody">
  
    

        <div class="header">
            <center><a href="http://www.animatedimages.org/cat-bees-185.htm"><img src="http://www.animatedimages.org/data/media/185/animated-bee-image-0067.gif" border="0" alt="animated-bee-image-0067" id="beeGif"/></a><h1><strong>Beehive Mite Tracking</strong></h1></center><br>
                <a href="?action=add"><i class="fa fa-home" aria-hidden="true"><strong>Home</strong></i></a> <br>
        </div>
        <!--TODO: div class jumbotron will be styled as .right_col role=main when adding navbar-->
        <div class = "container">  

    <?php  
           /*Controller determines which Controller file gets used*/
                           

                    if(isset($_GET['controller'])){
                        //$action = strtoupper($_GET['action']);
                        switch($controller){
                            /*if view is set as the controller, viewController will be used*/
                            case VIEW:
                                include('controllers/viewController.php');
                                break;
                            /*if mail is set as the controller, then mailController will be used*/
                            case MAIL:
                                include('controllers/mailController.php');
                                break;

                            /*viewController is the default controller*/
                            default:
                                include('controllers/viewController.php');

                        }
                    }else{
                        include('controllers/viewController.php');
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
