<?php

require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;

?>
<?php
//declare
$id = $_GET['id'];
$i=0;
$j = 0;
$ans = array();
$ans1 = array();
$e= 0;

// function to change date



// To fetch event information
mysql_query("SET CHARACTER SET utf8");
$query = "SELECT * from events where id = '$id'";
$result = mysql_query($query, $connection);
$row= mysql_fetch_array($result);
$ans[0]= $row;
$date_first=$row['date_f'];
$date_last=$row['date_l'];

// date changing

	$a=$date_first;
	$b=$date_last;
	$d_1 = substr($a,5,2);
	//echo $d_1;
	//echo "<br/>";
	$date_1=substr($a,8,2);// first date of the event
	$year_1=substr($a,0,4);
	$date_2=substr($b,8,2);// last date of the event
	$year_2=substr($b,0,4);
	$d_2 = substr($b,5,2);
    //array_push($ans[0],$date_1,$date_2);          // adding only date to the json
				
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
		case 8:
			$m = "Aug";
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
	//echo $m;	
	$date=$m." ".$date_1.", ".$year_1;
	//echo $date;
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
		case 8:
			$m1 = "August";
			break;
		case 9:
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


$gallery_1 = $row[3];
$art_1=$row[9];
$artist_1=$row[10];

// to fetch data from galleries table
$g = explode(",", $gallery_1);
while(++$i){
	if(!isset($g[$i])){
		break;
	}
}
$n = $i;

while(1){
	if($j<$n){
		mysql_query("SET CHARACTER SET utf8");
		$query = "SELECT * from galleries where id = '$g[$j]'";
		$result = mysql_query($query,$connection);
		$row= mysql_fetch_array($result);
		$a1=$row['id'];
		//print_r($row);
		$b1=$row['name'];
		$row1= array("0"=>$a1,"id"=>$a1,"1"=>$b1,"name"=>$b1);
		//print_r($row1);
		$ans1[$j] = $row1;
		$j++;
	
	}
	else{
		break;
	}
}


array_push($ans,$ans1);
//print_r($ans);
//fetching info on artist
$i=0;
$j=0;

$ar= explode(",", $artist_1);
while(++$i){
	if(!isset($ar[$i])){
		break;
	}
}
$n = $i;

while(1){
	if($j<$n){
		mysql_query("SET CHARACTER SET utf8");
		$query = "SELECT * from artists where id = '$ar[$j]'";
		$result = mysql_query($query, $connection);
		$row= mysql_fetch_array($result);
		$ar_id[$j]=$row['id'];
		$ar_name[$j]=$row['name'];
		$row1= array("0"=>$ar_id[$j],"id"=>$ar_id[$j],"1"=>$ar_name[$j],"name"=>$ar_name[$j]);
		$ans4[$j] = $row1;
		$j++;
	
	}
	else{
		break;
	}
}
array_push($ans,$ans4);


// fetching info on the artwork
$i = 0;
$j = 0;

$a = explode(",", $art_1);
while(++$i){
	if(!isset($a[$i])){
		break;
	}
}
$n = $i;

while(1){
	if($j<$n){
		mysql_query("SET CHARACTER SET utf8");
		$query = "SELECT * from artwork where id = '$a[$j]'";
		$result = mysql_query($query,$connection);
		$row= mysql_fetch_array($result);
		$a2=$row['id'];
		$b2=$row['name'];
		$d2=$row['path'];
		$e2=$row['artist'];
		$f2=$row['artist_id'];
		$row2= array("0"=>$a2,"id"=>$a2,"1"=>$b2,"name"=>$b2,"2"=>$d2,"path"=>$d2,"3"=>$e2,"artist"=>$e2,"4"=>$f2,"artist_id"=>$f2);
		$ans2[$j] = $row2;
		$j++;
	
}
	else{
		break;
	}
}
array_push($ans,$ans2);
$output= json_encode($ans);
echo $output;
?>