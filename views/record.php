<?php
/*ob_start();
$user = $_SESSION['user'];
$hivename = $_POST['hivename'];
$observationdate = $_POST['observationdate'];
$duration = $_POST['duration'];
$mitecount = $_POST['mitecount'];
$notes = $_POST['notes'];*/
?>


  <div class="row" id="recordHeading">
    <center><h2><strong>Your Observations</strong></h2>
   
    
  </div>

    <div class="jumbotron">
      <div class="row" id="record">

        <table id="example" class="display" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>Hive Name/ID</th>
                <th>Sample Date</th>
                <th>Mite Count</th>
                <th>Notes</th>
             
            </tr>
          </thead>
          
          <tbody>
          <?php

            $counter = 0;
            foreach($samples as $row){
                $hivename =$row['hive_id'];
                $observationdate=$row['collection_date'];
                //$date = date('m/d/Y', strtotime($miltaryDate));
                $mitecount =$row['num_mites'];
                $notes =$row['notes'];
                $counter++;
                echo "<tr>";
                  echo "<td>" .$hivename. "</td>";
                  echo "<td>" . $observationdate . "</td>";
                  echo "<td>" . $mitecount . "</td>";
                  echo "<td>" . $notes . "</td>";
                echo "</tr>";
            };
           ?>
        </tbody>
    </table>
    <br>
    <br>


      <a href="?action=add" id="recordAdd"><strong>Click to Add More Observations</strong></a> <br>

     <center><strong> <h5>With your help, we hope to gather enough data to help save the honeybees...than you!</h5></strong></center>
      <a href="http://beetest.greenrivertech.net/views/chart.php"><strong>Click to See Graph</strong></a> <br>
    
      </div><!--end of row-->            
    </div><!--end of jumbotron-->
