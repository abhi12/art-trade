<?php
require_once("json/database.php");

$data = new Database();
$data->open_connection();
$connection = $data->connection;
?>

<?php
$id = $_GET['id'];
// pulling info about artwork
$query1 = "SELECT * FROM artwork where id=$id";
$result1 = mysql_query($query1, $connection);
$row= mysql_fetch_row($result1);

$art_name = $row[1];
$art_artist = $row[6];
$art_price = $row[10];


$name = $_GET['name'];
$mail = $_GET['mail'];
$note = $_GET['note'];

// inserting data in database
$query = "INSERT INTO buyers (name, email, query) VALUES ('$name', '$mail', '$note')";
$result = mysql_query($query, $connection);

//email invoking
include('PHPMailer_5.2.1/class.phpmailer.php');

// Here sets data for email
$from = 'spectrartindia@gmail.com';
$from_name = 'Spectra';
$to = $mail;
$toname = '$name';
$subject = 'Successful Query for artwork';
$msg = "You are interested in buying the artwork with details as follows-
		
		Art : $art_name
		Artist : $art_artist
		Price : $art_price
		Your messege : $note
		
		- You recieved this mail because you requested for an art on Sepctraindia.tk
		- We will respond you through this thread";
		
$msg_new = nl2br($msg);	

$mail             = new PHPMailer();
$mail->IsSMTP();                                // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com";           // SMTP server
$mail->SMTPAuth   = true;        				// enable SMTP authentication    
$mail->SMTPDebug  = 2;           
$mail->SMTPSecure = "ssl";                      // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";           // sets GMAIL as the SMTP server
$mail->Port       = 465;	                        // set the SMTP port for the GMAIL server
$mail->Username   = 'spectrartindia@gmail.com';           // your GMAIL account
$mail->Password   = 'bits_pilani';                 // GMAIL password

$mail->SetFrom($from, $from_name);
$mail->AddReplyTo($from, $from_name);
$mail->Subject = $subject;
$mail->MsgHTML($msg_new);                 // to send with HTML tags

$mail->AddAddress($to, $toname);


if(!$mail->Send()) {
  echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
  echo 'Message sent!';
}


?>