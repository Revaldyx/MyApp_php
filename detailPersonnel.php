<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myapp";

$conn	=	new	mysqli($servername,	$username,	$password,
$dbname);
/* check connection */
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$callback = $_REQUEST['callback']; 
$userid = $_REQUEST['user_id'];

// Create the output object.
$output = array();
$success = 'false';
$query="SELECT * FROM personnel WHERE user_id = $userid" or die("Cannot access item");
$result = mysqli_query($conn, $query); if(mysqli_num_rows($result) > 0){
while($obj = mysqli_fetch_object($result)) {
$output[] = $obj;

}
$success = 'true';
}

//start output
if ($callback) {
header('Content-Type: text/javascript');
echo	$callback	.	'({"success":'.$success.',	"items":'
	. json_encode($output) . '});';
} else {
header('Content-Type: application/x-json'); echo json_encode($output);
}
$conn->close();
?>

 
 
