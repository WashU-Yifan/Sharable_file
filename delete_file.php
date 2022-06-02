<?php
session_start();
$full_path = $_SESSION['fullpath'];
unlink($full_path);
echo "You have delete the file, directing to the previous page now";

header("refresh:2; url=get_filename.php");

?>