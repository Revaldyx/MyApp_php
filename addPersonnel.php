<?php
include 'auth.php';
$callback = $_REQUEST['callback'];
$records = json_decode($_REQUEST['records']);

$user_id = $records->{"user_id"};
$name = $records->{"name"};
$email = $records->{"email"};
$phone = $records->{"phone"};
$jurusan = $records->{"jurusan"};

// Create the output object.
$output = array();
$success = 'false';
$query="INSERT INTO personnel VALUES ('$user_id','$name','$email','$phone','$jurusan')";
if ($conn->query($query) === TRUE) {
    $success = 'true';
}
else{
	$success = 'false';
	$error = $conn->error;
}

//start output
if ($callback) {
    header('Content-Type: text/javascript');
    echo $callback . '({"success":'.$success.', "items":' . json_encode($output) . '});';
} else {
    header('Content-Type: application/x-json');
    echo json_encode($output); 
}
$conn->close();
?>