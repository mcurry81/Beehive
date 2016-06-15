<?php
session_start();
//require_once('recaptchalib.php');

$user = $_SESSION['user'];

    
?>


  <div class="jumbotron">
     <div class="row" id ="form">
        <center><h2><strong>Submit Observations</strong></h2></center><br>
          <form action="?controller=view&action=submit" method="post">
            <label for="hivename" class="control-label">Hive Name/ID </label>
            <input type="text" class="form-control" name="hivename" maxlength="30">

            <label for="observationdate" class="control-label">Observation Date </label>
            <input type="date" class="form-control" name="observationdate">

            <label for = "duration" class="control-label">Duration of the Observation(in Days)</label><br>
            <input type="number" class="form-control" min="0" name="duration">

            <label for="mitecount" class="control-label">Mite Count</label>
            <input type="number" class="form-control" name="mitecount">

            <label for"notes" class="control-label">Notes</label>
            <textarea class="form-control" rows="5" id="notes" name="notes" maxlength="500"></textarea><br>

        
       
          
            <!--recapthca here-->

            <input type ="submit"class="beeBtn"></input>
        

            </form>
    </div>
</div>