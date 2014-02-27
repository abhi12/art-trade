<?php
require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>
<?php
$content = $_GET['content'];
$id = $_GET['id'];
$i = 0;
$z= 0;
$j=0;


// fetching information about events

	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from events";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$e_id[$i]= $row[0];
			$galleries[$i]= $row['galleries_id'];
			$ans_gen[$i] = $row;
			$i = $i + 1;
		}
	}
	$n = $i;
	//echo $n;
	$i=0;
	$j=0;
	$a=0;
	$u=0;
	$c=0;$f=0;
	while($i<$n){
		$g = explode(",",$galleries[$i]);
		
		While(1){
			if(!isset($g[$j])){
				break;
			}
			if($g[$j] == $id){
				$an[$a]=$e_id[$i];
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
			
			//echo "sucess";
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


	


if($content == 'g_1'){
	$i=0;
	mysql_query('SET CHARACTER SET utf8');
	$query = "SELECT * from galleries where id = '$id'";
	$result = mysql_query($query, $connection);
	if(isset($result)) { 
	while($row= mysql_fetch_array($result)){
		$ans[$i] = $row;
		$i = $i + 1;
	}
	}
	$arts = $row[7];
	$output= json_encode($ans);
	echo $output;
	
} elseif ($content == 'g_art'){
	$i=0;
	mysql_query('SET CHARACTER SET utf8');
	$query = "SELECT * from galleries where id = '$id'";
	$result = mysql_query($query, $connection);
	if(isset($result)) { 
		$row= mysql_fetch_array($result);
		$arts_id = $row[7];
		$artist_id = $row['artist_id'];
	}
	// to fetch arts from artwork table
	$g = explode(",", $artist_id);
		
	while(++$i){
		if(!isset($g[$i])){
			break;
		}
	}
	//echo $i;
	$n = $i; // no of elements in arts_id 
	$z=0;
	$i = 0;
	
	$ans = array();
	
	while(1){
		if($j<$n){
			$query = "SELECT * from artwork where artist_id = '{$g[$j]}'";
			$result = mysql_query($query, $connection);
			$row= mysql_fetch_array($result);
			$ans[$j][0]= $row['artist_id'];
			$ans[$j][1]= $row['artist'];
			$j = $j + 1;
		}
		
		else{
			break;
		}
		// end of that
	}
	$j=0;
	//print_r($ans);
	
	while(1){
		if($j<$n){
			$query = "SELECT * from artwork where artist_id = '{$g[$j]}'";
			$result = mysql_query($query, $connection);
			while($row= mysql_fetch_array($result)){
				$arr[$i]=$row;
				//echo "<br\>";
				//echo $i;
				//echo "<br\>";
				
				//array_merge($ans[$j],$row);
				//$ans[$j]=$row[$t];
				//$ans[$j]=$row;
				//if($j!=$n-1 && $no_of_rows!=$i) {
				$i++;
				
				//}
			}
			$no_of_rows = mysql_num_rows($result);
			if($j==$n-1 && $no_of_rows==$i){
				unset($arr[$i]);
			}
			//print_r($arr);
			array_push($ans[$j],$arr);
			$j = $j + 1;
			$i=0;
			unset($arr);
			
		}
		
		else{
			break;
		}
		// end of that
			
	}
	
	//	print_r($g);
	//print_r($ans);
	$output= json_encode($ans);
	echo $output;

} elseif ($content == 'g_other'){
	$i=0;
	mysql_query('SET CHARACTER SET utf8');
	$query = "SELECT * from artworks where featured=1";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans[$i] = $row;
		$i = $i + 1;
	}
	$output= json_encode($ans);
	echo $output;
		
} elseif ($content == 'g_artist'){
	$i=0;
	mysql_query('SET CHARACTER SET utf8');
	$query = "SELECT * from galleries where id = '$id'";
	$result = mysql_query($query, $connection);
	$row= mysql_fetch_array($result);
	$artist_id = $row[8];
	// seperating artists from the galleries
	$g = explode(",", $artist_id);
	//echo "</br>";
	
	while(++$i){
		if(!isset($g[$i])){
			break;
		}
	}
	//echo $i;
	//echo "</br>";
	$n = $i;
	$i=0;
	while(1){
	if($j<$n){
		$query = "SELECT * from artwork where artist_id = '$g[$j]'";
		$result = mysql_query($query, $connection);
		$row= mysql_fetch_array($result);
		//$output= json_encode($row);
		//echo "</br>";
		//echo $output;
		//echo "</br>";
		$ans[$i] = $row;
		$i = $i + 1;
		$j++;
	
	}
	else{
		break;
	}
	// end of that
	}
	$output= json_encode($ans);
	echo $output;
	
}elseif($content='g_event'){
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
		$ans1[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
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
		$ans2[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
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
		$ans3[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path, "3"=>$ven, "venue"=>$ven);
		$i = $i + 1;
	}
	$n1 = $n1 - 1;
	}
	if(isset($ans3)){
		$ans[2]=$ans3;
	}
	
	$output = json_encode($ans);
	echo $output;
	
}
?>
	