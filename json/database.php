<?php
define("server","localhost");
define("user","root");
define("pass","");


class Database{
	
 	public $connection, $result, $id, $name;
	private $tb_name, $a, $b, $c;
	
	public function open_connection(){
	  
	  $this->connection = mysql_connect(server, user, pass);
	  if(!$this->connection){
	    die("Database connection failed: " . mysql_error());
	  } else {
	    $db_select = mysql_select_db("art_1",$this->connection);
	    if (!$db_select) {
		  die("Database selection failed: " . mysql_error());
	    }  
	  }

	}
	
	public function insert_query($query){
	 
	  $this->result = mysql_query($query, $this->connection);
	  if(isset($this->result)){
        echo "</br>Database Entry successful";
		}
	}
	
	public function fetch_info($query){
	
	$this->result = mysql_query($query, $this->connection);
	$row = mysql_fetch_row($this->result);
	$this->id= $row[0];
	$this->name = $row[1];
	}
	
	public function close_connection(){
	
	  if(isset($this->connection)){
	    mysql_close($this->connection);
		unset($this->connection);
	  }
	
	}
	
	
	}

$data=new Database();
$data->open_connection();



	
?>