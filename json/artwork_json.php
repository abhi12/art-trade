<?php

require_once("database.php");

$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>

<?php

$content= $_GET['content'];
$id = $_GET['id'];
$i = 0;
$ans = array();

if($content == 'art_1'){
	$query = "SELECT * from artwork where id = $id";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans[$i]=$row;
		$i = $i + 1 ;
	}
	$output= json_encode($ans);
	echo $output;
	
} elseif($content == 'featured_art'){
	$query = "SELECT * from artwork where featured = 1";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans[$i]=$row;
		$i = $i + 1 ;
	}
	$output= json_encode($ans);
	echo $output;
	
}
?>
