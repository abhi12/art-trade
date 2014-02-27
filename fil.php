<?php
session_start();
require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>
<?php
$f = $_SESSION['f'];
if(!isset($_GET['price_range'])&&!isset($_GET['size_range'])&&!isset($_GET['type_range'])){
	$f="000";
}

//  defining required variables
$i=0;
$i1=0;
$i2=0;
$i3=0;
$op=array();
$ans1 = array();
$ans2 = array();
$ans3 = array();

// collecting info on price filter
if(isset($_GET['price_range'])){
$f="100";
}

if (isset($_GET['size_range'])){
$f="010";
}

if (isset($_GET['type_range'])){
$f="001";
}

if (isset($_GET['price_range'])&&isset($_GET['size_range'])){
$f="110";
}

if (isset($_GET['size_range'])&&isset($_GET['type_range'])){
$f="011";
}

if (isset($_GET['price_range'])&&isset($_GET['type_range'])){
$f="101";
}

if (isset($_GET['price_range'])&&isset($_GET['size_range'])&&isset($_GET['type_range'])){
$f="111";
}

// collecting required data

if($f=="100"){
$price= $_GET['price_range'];
$p = explode(",", $price);
$p_low = $p[0];
$p_high = $p[1];
$query = "SELECT * from artwork where price>=$p_low and price<=$p_high";
$result = mysql_query($query, $connection);
while($row= mysql_fetch_array($result)){
		$ans1[$i1]=$row;
		$i1 = $i1 + 1 ;
	}
	echo count($ans1);
	echo "<br/>";
	print_r($ans1);
	echo "<br/>";
	}



if($f=="010"){
// collecting info on size filter
$size = $_GET['size_range'];
$s = explode(",", $size);
$s_len = $s[0];
$s_bre = $s[1];
$s_len1 = 0.9*$s[0];
$s_len2 = 1.1*$s[0];
$s_bre1 = 0.9*$s[1]; 
$s_bre2 = 1.1*$s[1];
$query = "SELECT * from artwork where '{$s_len2}'>length>'{$s_len1}' or '{$s_bre1}'<breadth<'{$s_bre2}' ";
//echo isset($query);
$result = mysql_query($query, $connection);
while($row= mysql_fetch_array($result)){
		$op[$i2]=$row;
		$i2 = $i2 + 1 ;
	}
	echo count($op);
	echo "<br/>";
	print_r($op);
	echo "<br/>";
}

if($f=="001"){
// collecting info in type
$type = $_GET['type_range'];
$query = "SELECT * FROM `artwork` WHERE type = '{$type}'";
$result = mysql_query($query, $connection);
while($row= mysql_fetch_array($result)){
	$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo count($ans1);
	echo "<br/>";
	print_r($ans1);
	echo "<br/>";	
}

// showing results accordingly
if($f=="110"){
$price= $_GET['price_range'];
$p = explode(",", $price);
$p_low = $p[0];
$p_high = $p[1];
$size = $_GET['size_range'];
$s = explode(",", $size);
$s_len = $s[0];
$s_bre = $s[1];
$s_len1 = 0.9*$s[0];
$s_len2 = 1.1*$s[0];
$s_bre1 = 0.9*$s[1]; 
$s_bre2 = 1.1*$s[1];
$query = "SELECT * from artwork where price>='{$p_low}' and price<='{$p_high}' and '{$s_len2}'>length>'{$s_len1}' or '{$s_bre1}'<breadth<'{$s_bre2}'";
$result = mysql_query($query, $connection);
while($row= mysql_fetch_array($result)){
	$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo count($ans1);
	echo "<br/>";
	print_r($ans1);
	echo "<br/>";	
}


if ($f=="101"){
$type = $_GET['type_range'];
$price= $_GET['price_range'];
$p = explode(",", $price);
$p_low = $p[0];
$p_high = $p[1];
$query = "SELECT * from artwork where price>='{$p_low}' and price<='{$p_high}' and type = '{$type}'";
$result = mysql_query($query, $connection);
while($row= mysql_fetch_array($result)){
	$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo count($ans1);
	echo "<br/>";
	print_r($ans1);
	echo "<br/>";
}

if ($f=="011"){
$type = $_GET['type_range'];
$size = $_GET['size_range'];
$s = explode(",", $size);
$s_len = $s[0];
$s_bre = $s[1];
$s_len1 = 0.9*$s[0];
$s_len2 = 1.1*$s[0];
$s_bre1 = 0.9*$s[1]; 
$s_bre2 = 1.1*$s[1];
$query = "SELECT * from artwork where type = '{$type}'and '{$s_len2}'>length>'{$s_len1}' or '{$s_bre1}'<breadth<'{$s_bre2}'";
$result = mysql_query($query, $connection);
while($row= mysql_fetch_array($result)){
	$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo count($ans1);
	echo "<br/>";
	print_r($ans1);
	echo "<br/>";
}

if ($f=="111"){
$type = $_GET['type_range'];
$size = $_GET['size_range'];
$s = explode(",", $size);
$s_len = $s[0];
$s_bre = $s[1];
$s_len1 = 0.9*$s[0];
$s_len2 = 1.1*$s[0];
$s_bre1 = 0.9*$s[1]; 
$s_bre2 = 1.1*$s[1];
$price= $_GET['price_range'];
$p = explode(",", $price);
$p_low = $p[0];
$p_high = $p[1];
$query = "SELECT * from artwork where price>='{$p_low}' and price<='{$p_high}' and type = '{$type}' and '{$s_len2}'>length>'{$s_len1}' or '{$s_bre1}'<breadth<'{$s_bre2}'";
$result = mysql_query($query, $connection);
while($row= mysql_fetch_array($result)){
	$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo count($ans1);
	echo "<br/>";
	print_r($ans1);
	echo "<br/>";
}

if($f=="000"){
	$query = "SELECT * from artwork";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
			$op1[$i]=$row;
			$i = $i + 1 ;
	}
	echo count($op1);
	echo "<br/>";
	print_r($op1);
	echo "<br/>";
	}

// clear system
if($_GET['cl']=="p"){
$f[0]="0";
//echo "success";
}
if($_GET['cl']=="s"){
$f[1]="0";
//echo "success";
}

if($_GET['cl']=="t"){
$f[2]="0";
echo "success";
}

?>