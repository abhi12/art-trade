<?php
require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>
<?php

$i=0;
$u=$c=$f=0;
// function for creating date format
function date_changing($ans,$date_f,$date_l,$num)	
{
	$i=0;
	While($num > 0){
		$a=$date_f[$i];
		$b=$date_l[$i];
		$d_1 = substr($a,5,2);
		$d_2 = substr($b,5,2);
		$date_1=substr($a,8,2);// first date of the event
		$date_2=substr($b,8,2);// last date of the event
		
		array_push($ans[$i],$date_1,$date_2);// adding only date to the json
					
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
			array_push($ans[$i],$m);
						
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
			
			array_push($ans[$i],$m1);
			
			$i = $i +1;
			$num = $num -1;
	}
	//print_r($ans);
	return $ans;
}


$content= $_GET['content'];
$i=0;$i1=0;$i2=0;
$u=$c=$f=0;
// code to generate general information from the database
mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from events";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$e_id[$i]= $row[0];
			$date_first[$i]= $row[6];  // first date of the event array
			$date_last[$i]= $row[7]; // last date of the month array
			$ans_gen[$i] = $row;
			$i = $i + 1;
		}
	}
// finding today's date
date_default_timezone_set('UTC');
$today = date("Y-m-d");
// $t = date_create('$today');
// echo $t;
// echo date_format($t, 'F d,Y,l');
//echo $today;

// dividing in the past,curr and future
$n = $i;
$i=0;
while($n>0){
	if(strtotime($date_last[$i])<strtotime($today)){
		//echo "sucess";
		$past[$u]= $e_id[$i];
		$u = $u + 1;
	}
	if(strtotime($date_first[$i])<strtotime($today) && strtotime($today)<strtotime($date_last[$i])){
		$curr[$c]= $e_id[$i];
		$c = $c + 1;
	}
	if(strtotime($date_first[$i])>strtotime($today)){
		$future[$f]= $e_id[$i];
		$f = $f + 1;
	}
	$i = $i +1;
	$n = $n - 1;
}
// echo "past:";				// to check date code is working or not
// print_r($past);
// echo"<br/>";

// echo "curr:";                      
// print_r($curr);
// echo"<br/>";

// echo "future:";
// print_r($future);
// echo"<br/>";

if($content== 'featured'){
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from events where featured = 1";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$id = $row[0];
			$name = $row[1];
			$path = $row[4];
			$d_f[$i1]=$row[6]; // date first
			$d_l[$i1]=$row[7]; // date final
			$ven = 	$row[5];
			$ans1[$i1] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
			$i1 = $i1 + 1;
			
		}
	}
	$ans = date_changing($ans1,$d_f,$d_l,$i1);
	echo json_encode($ans);
}

if($content== 'normal'){
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from events";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$id = $row[0];
			$name = $row[1];
			$path = $row[4];
			$d_f[$i2]=$row[6];
			$d_l[$i2]=$row[7];
			$ven = 	$row[5];
			$ans2[$i2] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
			$i2 = $i2 + 1;
		}
	}
	$ans = date_changing($ans2,$d_f,$d_l,$i2);
	echo json_encode($ans);
}

if(isset($future)){
	if($content=='up'){
		$i=0;
		mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
		$n_f = sizeof($future);
		while($n_f>0){
		$query = "SELECT * from events where id = '{$future[$i]}'";
		$result = mysql_query($query, $connection);
		if(isset($result)){
			$row= mysql_fetch_array($result);
			$id = $row[0];
			$name = $row[1];
			$path = $row[4];
			$d_f[$i]=$row[6]; // date first
			$d_l[$i]=$row[7]; // date final
			$ven = 	$row[5];
			$ans3[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
			$i = $i + 1;
		}
		$n_f = $n_f - 1;
		}
		$ans = date_changing($ans3,$d_f,$d_l,$i);
		echo json_encode($ans);
	}
}

if(isset($past)){
	if($content=='past'){
		$i=0;
		mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
		$n_p = sizeof($past);
		//echo $n_f;
		while($n_p>0){
		$query = "SELECT * from events where id = '{$past[$i]}'";
		$result = mysql_query($query, $connection);
		if(isset($result)){
			$row= mysql_fetch_array($result);
			$id = $row[0];
			$name = $row[1];
			$path = $row[4];
			$d_f[$i]=$row[6]; // date first
			$d_l[$i]=$row[7]; // date final
			$ven = 	$row[5];
			$ans2[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
			$i = $i + 1;
		}
		$n_p = $n_p - 1;
		}
		$ans = date_changing($ans2,$d_f,$d_l,$i);
		echo json_encode($ans);
	}
}	

if(isset($curr)){

	if($content=='curr'){
		$i=0;
		mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
		$n_c = sizeof($curr);
		//echo $n_f;
		while($n_c>0){
		$query = "SELECT * from events where id = '{$curr[$i]}'";
		$result = mysql_query($query, $connection);
		if(isset($result)){
			$row= mysql_fetch_array($result);
			$id = $row[0];
			$name = $row[1];
			$path = $row[4];
			$d_f[$i]=$row[6]; // date first
			$d_l[$i]=$row[7]; // date final
			$ven = 	$row[5];
			$ans3[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
			$i = $i + 1;
		}
		$n_c = $n_c - 1;
		}
		$ans = date_changing($ans3,$d_f,$d_l,$i);
		echo json_encode($ans);
	}	
}
?>