<?php
require_once("database.php");

$data = new Database();
$data->open_connection();
$connection = $data->connection;

?>
<?php

$content = $_GET['content'];

if($content == 'price'){
	$price= $_GET['price_range'];
	$p = explode(",", $price);
	$p_low = $p[0];
	$p_high = $p[1];
	$query = "SELECT * from artwork where price>=$p_low and price<=$p_high";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans[i]=$row;
		$i = $i + 1 ;
	}
	$output= json_encode($ans);
	echo $output;
	
}

if($content == 'size'){
	$size = $_GET['size_range'];
	$s = explode(",", $size);
	$s_len = $s[0];
	$s_bre = $s[1];
	$s_len1 = 0.9*$s[0];
	$s_len2 = 1.1*$s[0];
	$s_bre1 = 0.9*$s[1]; 
	$s_bre2 = 1.1*$s[1];
	$query = "SELECT * from artwork where $s_len2>length>$s_len1 or $s_bre1<breadth<$s_bre2";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans[i]=$row;
		$i = $i + 1 ;
	}
	$output= json_encode($row);
	echo $output;
	
} 

if ($content == 'type'){
	$type = $_GET['art_type'];
	$query = "SELECT * FROM `artwork` WHERE type = '$type'";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
	$ans[i]=$row;
		$i = $i + 1 ;
	}
	$output= json_encode($ans);
	echo $output;
	
}
?>