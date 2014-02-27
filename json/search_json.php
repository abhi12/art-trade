<?php
require_once("database.php");

$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>
<?php
$search = $_GET['search'];

if(strlen($search)>0){
	$hint= array();
	$i = 0;
	$j = 1;
	$z = 1;
	
	// For artwork in the database
	$query = "SELECT * from `artwork` where `name` LIKE '$search%' LIMIT 3";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		
		array_push($row,"artwork");
		$hint[$i] = $row;
		$i = $i + 1;
		//$output= json_encode($row);
		$a = "./artwork.php?id=".$row['id'];
		$b = $row['name'];		
		echo '<a href='.$a.'><li>'.$b.'</li></a>';
		
	}
	
	//print_r($hint);
	
	// For artist in the database
	$query = "SELECT * from `artwork` where `artist` LIKE '$search%' LIMIT 3";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		array_push($row,"artist");
		$hint[$i + $j] = $row;
		$j = $j + 1;
		$a = "./artwork.php?id=".$row['id'];
		$b = $row['artist'];		
		echo '<a href='.$a.'><li>'.$b.'</li></a>';
		//$output_1= json_encode($row);
		
	}
	
	// For galleries in the database
	$query = "SELECT * from `galleries` where `name` LIKE '$search%' LIMIT 3";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		array_push($row,"galleries");
		$hint[$i + $j + $z] = $row;
		$z = $z + 1;
		//$output_2= json_encode($row);
		$a = "./gallery.php";
		$b = $row['name'];		
		echo '<a href='.$a.'><li>'.$b.'</li></a>';
	}
	
	//print_r($hint);
	//$output= json_encode($hint);
	//echo $output;
}
else {
	echo "";
}



?>