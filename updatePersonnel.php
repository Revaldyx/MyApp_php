<?php
include 'auth.php';
$callback = $_REQUEST['callback'];
$records = json_decode($_REQUEST['records']);
$user_id= $records->{"user_id"};
$name = $records->{"name"};
$email = $records->{"email"};
$phone = $records->{"phone"};
$jurusan = $records->{"jurusan"};

$success = 'false';
$error = 'no error';
// Create the output object.
$output = array();

$query="update personnel set name='$name',email='$email',phone='$phone',jurusan='$jurusan' where user_id=$user_id";

if ($conn->query($query) === TRUE) {
    $success = 'true';
}
else{
	$error = $conn->error;
}

//start output
if ($callback) {
    header('Content-Type: text/javascript');
    echo $callback . '({"success":'.$success.', "message":"'.$error.'"});';
} else {
    header('Content-Type: application/x-json');
    echo json_encode($output);
}
$conn->close();
?>