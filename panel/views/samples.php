<?php
//start a session
session_start();

//start buffer
ob_start();


	//if not logged in as admin, send to login page
	if(!isset($_SESSION['username'])){
		header("Location: adminlogin.php");
	}

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="assets/databaseCss.css"/>

<script type="text/javascript" language="javascript" class="init">
		$(document).ready(function() {
			$('#bee').DataTable();
		} );

</script> 



<!--<table id="example" cellspacing="0" width="100%"> <thead>
<tr> <th>Hive ID</th> <th>Mites</th> <th>Mobile</th> <th>Start Date</th> </tr> </thead> </table> </body> -->
<!--<div class="jumbotron">-->
<div class="row" id="adminTable">

<a href="../download.php"id='download' class="btn btn-primary"  role="button">Download Excel File</a>

<?php
  
	echo "<div class ='beehive'>";
	echo "<table id = 'bee' cellspacing='0' width='100%'>";
	echo "<thead id = 'head'>";
	echo "<th>Hive ID</th>";
	echo "<th>Collection Date</th>"; 
	echo "<th>Sample Period</th>";
	echo "<th>Mites</th>";
	echo "<th>Notes</th>";


	//TODO: Look into adding delete/edit feature, client doesn't feel is necessary, but may be useful
	//echo"<th>Delete/Edit</th>";
	echo "</thead>";
	echo "<tbody>";



            $counter = 0;
            foreach($samples as $row){
                $hivename =$row['hive_id'];
                $observationdate=$row['collection_date'];
                //$date = date('m/d/Y', strtotime($miltaryDate));
                $sample_period=$row['sample_period'];
                $mitecount =$row['num_mites'];
                $notes =$row['notes'];
                $counter++;
                echo "<tr>";
                  echo "<td>" .$hivename. "</td>";
                  echo "<td>" . $observationdate . "</td>";
                  echo "<td>" . $sample_period . "</td>";
                  echo "<td>" . $mitecount . "</td>";
                  echo "<td>" . $notes . "</td>";
                echo "</tr>";
            };
          

	echo "</tbody>";
	echo "</table>";
	echo "</div>";

$db = null;
?>
   
<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#bee')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>
<!--</div>-->
</div>