<?php
require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>

<?php
$content = $_GET['content'];
$i = 0;
$ans = array();


if($content == 'f_main'){
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from featured";
	$result = mysql_query($query, $connection);
	
	while($row= mysql_fetch_array($result)){
		$ans[i]=$row;
		$i = $i + 1 ;
	}
	$output= json_encode($ans);
	echo $output;
	

} elseif($content == 'f_art') {
	mysql_query('SET CHARACTER SET utf8');
	$query = "SELECT * from artwork where featured = 1";
	$result = mysql_query($query, $connection);
	
	while($row= mysql_fetch_array($result)){
			$ans[$i]=$row;
			$i = $i + 1 ;
		}
	
		$output= json_encode($ans);
		echo $output;
	
} elseif($content == 'f_gallery') {
	$query = "SELECT * from galleries where featured = 1";
	$result = mysql_query($query, $connection);
	
	while($row= mysql_fetch_array($result)){
		$ans[$i]=$row;
		$i = $i + 1 ;
	}
		$output= json_encode($ans);
		echo $output;
} elseif($content == 'f_event') {
	mysql_query('SET CHARACTER SET utf8');
	$query = "SELECT * from events where featured = 1";
	$result = mysql_query($query, $connection);
	
	while($row= mysql_fetch_array($result)){
		$d_f[$i]=$row[6]; // d_f  for first date
		$d_l[$i]=$row[7];  // d_l for last date
		$ans[$i]=$row;
		$i = $i + 1 ;
		
	}
$n = $i; // number of dates in the selected rows
$i =0;
	
	// converting date in required format
While($n > 0){
	$a=$d_f[$i];
	$b=$d_l[$i];
	$d_1 = substr($a,5,2);
	$date_1=substr($a,8,2);// first date of the event
	$year_1=substr($a,0,4);
	$date_2=substr($b,8,2);// last date of the event
	$year_2=substr($a,0,4);
	$d_2 = substr($b,5,2);
    //array_push($ans[$i],$date_1,$year_1,$date_2,$year_2);          // adding only date to the json
				
	switch ($d_1){
		case 01:
			$m = "Jan";
			break;
		case 02:
			$m = "Feb";
			break;
		case 03:
			$m = "Mar";
			break;
		case 04:
			$m = "April";
			break;
		case 05:
			$m = "May";
			break;
		case 06:
			$m = "June";
			break;
		case 07:
			$m = "July";
			break;
		case 08:
			$m = "August";
			break;
		case 09:
			$m = "Sep";
			break;
		case 10:
			$m = "Oct";
			break;
		case 11:
			$m = "Nov";
			break;
		case 12:
			$m = "Dec";
			break;
		}
		$date=$m." ".$date_1.", ".$year_1;
		array_push($ans[$i],$date);
		
		
	switch ($d_2){
		case 01:
			$m1 = "Jan";
			break;
		case 02:
			$m1 = "Feb";
			break;
		case 03:
			$m1 = "Mar";
			break;
		case 04:
			$m1 = "April";
			break;
		case 05:
			$m1 = "May";
			break;
		case 06:
			$m1 = "June";
			break;
		case 07:
			$m1 = "July";
			break;
		case 08:
			$m1 = "August";
			break;
		case 09:
			$m1 = "Sep";
			break;
		case 10:
			$m1 = "Oct";
			break;
		case 11:
			$m1 = "Nov";
			break;
		case 12:
			$m1 = "Dec";
			break;
		}
		$date=$m1." ".$date_2.", ".$year_2;
		array_push($ans[$i],$date);
		$i = $i +1;
		$n = $n -1;
		}
		
	$output= json_encode($ans);
		echo $output;
 }

?>