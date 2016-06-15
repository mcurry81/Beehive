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
<link rel="stylesheet" type="text/css" href="databaseCss.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">
		$(document).ready(function() {
			$('#bee').DataTable();
		} );

</script> 



<!--<table id="example" cellspacing="0" width="100%"> <thead>
<tr> <th>Hive ID</th> <th>Mites</th> <th>Mobile</th> <th>Start Date</th> </tr> </thead> </table> </body> -->
<div class="row">

<a id='download' class="btn btn-primary" href="dependancies/php/download.php" role="button">Downloadd Excel File</a>

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
   while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
       echo "<tr>";
       echo "<td>". $row['hive_id'] . "</td>";
       echo "<td>" . $row['collection_date'] . "</td>";
       echo "<td>" . $row['sample_period'] . "</td>";
       echo "<td>" . $row['num_mites'] . "</td>";
       echo "<td>" . $row['notes'] . "</td>";
       //TODO: buttons for delete/edit icons, will need to add edit icon and functionality, if we decide to implement...will need to discuss more with client
       //echo"<td>" . "<button type = 'button' class = 'btn btn-primary' data-value='delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>";
       echo "</tr>";
     
}
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
</div>