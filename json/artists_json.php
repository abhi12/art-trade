<?php
require_once("database.php");
$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>
<?php
$content= $_GET['content'];
$i=0;

// showing featured artists 
if($content== 'featured'){
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from artists where featured = 1";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$id = $row[0];
			$name = $row[1];
			$path = $row[13];
			$ans[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path);
			$i = $i + 1;
		}
	
	}
	echo json_encode($ans);
}


// showing upcoming artists
if($content== 'upcoming'){
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from artists where upcoming = 1";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$id = $row[0];
			$name = $row[1];
			$path = $row[14];
			$ans[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name, "2"=>$path, "path"=>$path);
			$i = $i + 1;
		}
	
	}
	echo json_encode($ans);
}

// showing normal artists
if($content== 'normal'){
	mysql_query('SET CHARACTER SET utf8'); // for passing everything including special characters
	$query = "SELECT * from artists";
	$result = mysql_query($query, $connection);
	if(isset($result)){
		while($row= mysql_fetch_array($result)){
			$id = $row[0];
			$name = $row[1];
			$ans[$i] = array("0"=>$id, "id"=>$id, "1"=>$name, "name"=>$name);
			$i = $i + 1;
		}
	}
	echo json_encode($ans);
}
?>