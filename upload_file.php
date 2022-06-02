<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"> <title>Upload_file</title></head>
<body>
<?php
session_start();

// Get the filename and make sure it is valid
$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
	echo "Invalid filename";
	exit;
}

//Username has already been checked in the check_username.php

$full_path = sprintf("/srv/uploads/%s/%s", $_SESSION['username'], $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
	header("Location: upload_success.php");
	exit;
}else{
	header("Location: upload_failure.php");
	exit;
}

?>
</body>
</html>