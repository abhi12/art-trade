<?php
require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>
<?php
//decalre
$ans = array();
$an=array();
$i =0;
$j=0;
$r=0;
$p=0;
$id = $_GET['id'];
$content = $_GET['content'];


// fetching information about the event for the artist
	$ans = array();
	$an=array();
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from events";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$e_id[$i]= $row[0];
			$artist[$i]= $row['artist_id'];
			$ans_gen[$i] = $row;
			$i = $i + 1;
		}
	}
	$n = $i;
	//print_r($artist);
	//echo $n;
	$i=0;
	$j=0;
	$a=0;
	$u=0;
	$c=0;$f=0;
	while($i<$n){
		$g = explode(",",$artist[$i]);
		
		While(1){
			if(!isset($g[$j])){
				break;
			}
			if($g[$j] == $id){
				$an[$a]=$i+1;
				$a++;
			}
			$j++;
		}
		$j=0;
		$i++;
	}
	//print_r($an);
	$n1 = count($an);
	$i=0;
	while($n1>0){
		mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
		$query = "SELECT * from events where id = '$an[$i]'";
		$result = mysql_query($query, $connection);
		if(isset($result)){
		$row = mysql_fetch_row($result);
		$date_first[$i]= $row[6];  // first date of the event array
		$date_last[$i]= $row[7]; // last date of the month array
		$ans[$i]=$row[0];
		}
		$i++;
		$n1 = $n1 -1;
	}
	//print_r($ans);
	$n1 = count($ans);
	//echo $i;
	//echo "</br>";
	// finding today's date
	date_default_timezone_set('UTC');
	$today = date("Y-m-d");
	//echo $today;
	// $t = date_create('$today');
	// echo $t;
	// echo date_format($t, 'F d,Y,l');
	//echo $today;

	// dividing in the past,curr and future
	$i = 0;
	while($n1>0){
		if(strtotime($date_last[$i])<strtotime($today)){
			
			//echo "past";
			$past[$u]= $ans[$i];
			//echo "past";
			$u = $u + 1;
		}
		if(strtotime($date_first[$i])<strtotime($today) && strtotime($today)<strtotime($date_last[$i])){
			$curr[$c]= $ans[$i];
			//echo "curr";
			$c = $c + 1;
		}
		if(strtotime($date_first[$i])>strtotime($today)){
			$future[$f]= $ans[$i];
			//echo "future";
			$f = $f + 1;
		}
		$i = $i +1;
		$n1 = $n1 - 1;
	}

//searching that name in the database and returning data accordingly
if ($content=='a_1'){
	$query = "SELECT * from artists where id = '{$id}'";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		$row= mysql_fetch_array($result);
		}
	$output= json_encode($row);
	echo $output;

}elseif($content=='a_art'){
	$i=0;
	$query="SELECT * from artwork where artist_id = '{$id}'";
	$result = mysql_query($query,$connection);
	while($row=mysql_fetch_array($result)){
		$ans2[$i]=$row;
		$i = $i + 1;
	}
	$output = json_encode($ans2);
	echo $output;
}elseif($content=='a_event'){
	$i=0;
	if(isset($future)){
		$n1 = sizeof($future);
	}
	//print_r($past);
	while($n1>0){
	$query = "SELECT * from events where id = '{$future[$i]}' ";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		$row= mysql_fetch_array($result);
		$id = $row[0];
		$name = $row[1];
		$path = $row[4];
		$d_f[$i]=$row[6]; // date first
		$d_l[$i]=$row[7]; // date final
		$ven = 	$row[5];
		$ans1[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven, "4"=> $d_f[$i], "date_first"=>$d_f[$i], "5"=>$d_l[$i], "date_last"=>$d_l[$i]);
		$i = $i + 1;
	}
	$n1 = $n1 - 1;
	}
	if(isset($ans1)){
		$ans[0]=$ans1;
	}
	

	$i=0;
	if(isset($curr)){
		$n1 = sizeof($curr);
	}
	//print_r($past);
	while($n1>0){
	$query = "SELECT * from events where id = '{$curr[$i]}' ";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		$row= mysql_fetch_array($result);
		$id = $row[0];
		$name = $row[1];
		$path = $row[4];
		$d_f[$i]=$row[6]; // date first
		$d_l[$i]=$row[7]; // date final
		$ven = 	$row[5];
		$ans2[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven, "4"=> $d_f[$i], "date_first"=>$d_f[$i], "5"=>$d_l[$i], "date_last"=>$d_l[$i]);
		$i = $i + 1;
	}
	$n1 = $n1 - 1;
	}
	if(isset($ans2)){
		$ans[1]=$ans2;
	}
	

	$i=0;
	if(isset($past)){
		$n1 = sizeof($past);
	}
	//print_r($past);
	while($n1>0){
	$query = "SELECT * from events where id = '{$past[$i]}' ";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		$row= mysql_fetch_array($result);
		$id = $row[0];
		$name = $row[1];
		$path = $row[4];
		$d_f[$i]=$row[6]; // date first
		$d_l[$i]=$row[7]; // date final
		$ven = 	$row[5];
		$ans3[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven, "4"=> $d_f[$i], "date_first"=>$d_f[$i], "5"=>$d_l[$i], "date_last"=>$d_l[$i]);
		$i = $i + 1;
	}
	$n1 = $n1 - 1;
	}
	if(isset($ans3)){
		$ans[2]=$ans3;
	}
	
	$output = json_encode($ans);
	echo $output;
	
}elseif($content=='a_gall'){
	$i=0;
	$ans = array();
	$an1=array();
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from galleries";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$e_id[$i]= $row[0];
			$artist1[$i]= $row['artist_id'];
			$ans_gen[$i] = $row;
			$i = $i + 1;
		}
	}
	$n = $i;
	print_r($artist1);
	//echo $n;
	$i=0;
	$j=0;
	$a=0;
	$u=0;
	$c=0;$f=0;
	while($i<$n){
		$g = explode(",",$artist1[$i]);
		
		While(1){
			if(!isset($g[$j])){
				break;
			}
			if($g[$j] == $id){
				$an1[$a]=$e_id[$i];
				$a++;
			}
			$j++;
		}
		$j=0;
		$i++;
	}
	print_r($an1);
	$n1 = count($an1);
	$i=0;
	while($n1>0){
		mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
		$query = "SELECT * from galleries where id = '$an1[$i]'";
		$result = mysql_query($query, $connection);
		if(isset($result)){
		$row = mysql_fetch_row($result);
		$g_id=$row[0];
		$g_name=$row[1];
		$ans[$i]=array("0"=>$g_id, "id"=>$g_id, "1"=>$g_name, "name"=>$g_name);
		}
		$i++;
		$n1 = $n1 -1;
	}
	echo json_encode($ans);


}
?>