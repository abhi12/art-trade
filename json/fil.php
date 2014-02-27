<?php
session_start();
require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>
<?php
if(!isset($_GET['price_range'])&&!isset($_GET['size_range'])&&!isset($_GET['type_range'])){
	$_SESSION['f']="000";
}
if(isset($_GET['price_range'])){
	$_SESSION['p']=$_GET['price_range'];
	}
if(isset($_GET['size_range'])){
	$_SESSION['s']=$_GET['size_range'];
	}

if(isset($_GET['type_range'])){
	$_SESSION['t']=$_GET['type_range'];
	}
//$_SESSION['f']="000";
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
if(isset($_SESSION['p'])&&!isset($_SESSION['s'])&&!isset($_SESSION['t'])){
	$_SESSION['f']="100";
}

if(!isset($_SESSION['p'])&&isset($_SESSION['s'])&&!isset($_SESSION['t'])){
	$_SESSION['f']="010";
}

if(!isset($_SESSION['p'])&&!isset($_SESSION['s'])&&isset($_SESSION['t'])){
	$_SESSION['f']="001";
}

if(isset($_SESSION['p'])&&isset($_SESSION['s'])&&!isset($_SESSION['t'])){
	$_SESSION['f']="110";
}

if(!isset($_SESSION['p'])&&isset($_SESSION['s'])&&isset($_SESSION['t'])){
	$_SESSION['f']="011";
}

if(isset($_SESSION['p'])&&!isset($_SESSION['s'])&&isset($_SESSION['t'])){
	$_SESSION['f']="101";
}

if(isset($_SESSION['p'])&&isset($_SESSION['s'])&&isset($_SESSION['t'])){
	$_SESSION['f']="111";
}

// clear system
if(isset($_GET['cl']))
{
	if($_GET['cl']=="p"){
	$_SESSION['p']=NULL;
	$_SESSION['f'][0]="0";
	//echo "success";
	}
	if($_GET['cl']=="s"){
	$_SESSION['s']=NULL;
	$_SESSION['f'][1]="0";
	//echo "success";
	}

	if($_GET['cl']=="t"){
	$_SESSION['t']=NULL;
	$_SESSION['f'][2]="0";
	}
	
	if($_GET['cl']=="u"){
	session_destroy();
	//echo "success";
	}
}

// collecting required data

if($_SESSION['f']=="100"){
	$price= $_SESSION['p'];
	$p = explode(",", $price);
	$p_low = $p[0];
	$p_high = $p[1];
	$query = "SELECT * from artwork where price>=$p_low and price<=$p_high";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans1[$i1]=$row;
		$i1 = $i1 + 1 ;
	}
	echo json_encode($ans1);
	// echo count($ans1);              this is the code to check wheather this code is working is not
	// echo "<br/>";
	// print_r($ans1);
	// echo "<br/>";
}



if($_SESSION['f']=="010"){
	// collecting info on size filter
	$size = $_SESSION['s'];
	$s = explode(",", $size);
	$s_len = $s[0];
	$s_bre = $s[1];
	$s_len1 = 0.5*$s[0];
	$s_len2 = 1.8*$s[0];
	$s_bre1 = 0.5*$s[1]; 
	$s_bre2 = 1.8*$s[1];
	$query = "SELECT * from artwork where '{$s_len1}'<length and length<'{$s_len2}' AND '{$s_bre1}'<breadth and breadth<'{$s_bre2}' ";
	//echo isset($query);
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$op[$i2]=$row;
		$i2 = $i2 + 1 ;
	}
	echo json_encode($op);
}

if($_SESSION['f']=="001"){
	$type = $_SESSION['t'];
	$query = "SELECT * FROM `artwork` WHERE type = '{$type}'";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo json_encode($ans1);
}


if($_SESSION['f']=="110"){
	$price= $_SESSION['p'];
	$p = explode(",", $price);
	$p_low = $p[0];
	$p_high = $p[1];
	$size = $_SESSION['s'];
	$s = explode(",", $size);
	$s_len = $s[0];
	$s_bre = $s[1];
	$s_len1 = 0.5*$s[0];
	$s_len2 = 1.8*$s[0];
	$s_bre1 = 0.5*$s[1]; 
	$s_bre2 = 1.8*$s[1];
	$query = "SELECT * from artwork where price>='{$p_low}' and price<='{$p_high}' and '{$s_len1}'<length and length<'{$s_len2}' AND '{$s_bre1}'<breadth and breadth<'{$s_bre2}'";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo json_encode($ans1);
}


if ($_SESSION['f']=="101"){
	$type = $_SESSION['t'];
	$price= $_SESSION['p'];
	$p = explode(",", $price);
	$p_low = $p[0];
	$p_high = $p[1];
	$query = "SELECT * from artwork where price>='{$p_low}' and price<='{$p_high}' and type = '{$type}'";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo json_encode($ans1);
}

if ($_SESSION['f']=="011"){
	$type = $_SESSION['t'];
	$size = $_SESSION['s'];
	$s = explode(",", $size);
	$s_len = $s[0];
	$s_bre = $s[1];
	$s_len1 = 0.5*$s[0];
	$s_len2 = 1.8*$s[0];
	$s_bre1 = 0.5*$s[1]; 
	$s_bre2 = 1.8*$s[1];
	$query = "SELECT * from artwork where type = '{$type}'and '{$s_len1}'<length and length<'{$s_len2}' AND '{$s_bre1}'<breadth and breadth<'{$s_bre2}'";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo json_encode($ans1);
}

if ($_SESSION['f']=="111"){
	$type = $_SESSION['t'];
	$size = $_SESSION['s'];
	$s = explode(",", $size);
	$s_len = $s[0];
	$s_bre = $s[1];
	$s_len1 = 0.5*$s[0];
	$s_len2 = 1.8*$s[0];
	$s_bre1 = 0.5*$s[1]; 
	$s_bre2 = 1.8*$s[1];
	$price= $_SESSION['p'];
	$p = explode(",", $price);
	$p_low = $p[0];
	$p_high = $p[1];
	$query = "SELECT * from artwork where price>='{$p_low}' and price<='{$p_high}' and type = '{$type}' and '{$s_len1}'<length and length<'{$s_len2}' AND '{$s_bre1}'<breadth and breadth<'{$s_bre2}'";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$ans1[$i3]=$row;
		$i3 = $i3 + 1 ;
	}
	echo json_encode($ans1);
}

if($_SESSION['f']=="000"){
	mysql_query("SET CHARACTER SET utf8");
	$query = "SELECT * from artwork";
	$result = mysql_query($query, $connection);
	while($row= mysql_fetch_array($result)){
		$op1[$i]=$row;
		$i = $i + 1 ;
	}
	echo json_encode($op1);
}

?>