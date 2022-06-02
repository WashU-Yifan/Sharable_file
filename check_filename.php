<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"> <title>Check_filename</title></head>
<body>
<?php
session_start();

$filename = $_POST['file'];

// We need to make sure that the filename is in a valid format; if it's not, display an error and leave the script.
// To perform the check, we will use a regular expression.
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
    echo "Invalid filename!";
    header("refresh:2; url=get_filename.php");
    exit;
}
$_SESSION['file']=$filename;
$_SESSION['fullpath']=sprintf("/srv/uploads/%s/%s", $_SESSION['username'], $filename);

// Check if the file exit
//citation: https://www.phptutorial.net/php-tutorial/php-file-exists/#:~:text=Use%20the%20file_exists()%20function,a%20file%20exists%20and%20writable.
if (!is_file($_SESSION['fullpath'])) {
    echo "File not exist, directing";
    header("refresh:2; url=get_filename.php");
    exit;
}
//end of citation
if ($_SESSION['action']=="read"){
    header("url=read_file.php");
}
else{
    header("url=delete_file.php");
}
?>
</body>
</html>