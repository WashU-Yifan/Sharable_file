<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"> <title>Upload</title></head>
<body>
	<!---Select the file to upload-->
	<form enctype="multipart/form-data" action="upload_file.php" method="POST">
		<p>
			<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
			<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
		</p>
		<p>
			<input type="submit" value="Upload File" />
		</p>

	</form>
	
	<?php
        session_start();
        if($_POST['symbol']) $_SESSION['action']=$_POST['symbol'];
        $path ="/srv/uploads/". $_SESSION['username']."/*";
         //Citation
        //https://www.nicesnippets.com/blog/how-to-get-list-of-file-in-folder-in-php
        echo "Listing all files".'<br>';
        $fileList = glob($path);
        foreach($fileList as $filename){
            if(is_file($filename)){
                echo $filename. '<br>';
         }
        }
    //End of citation
    ?>

	<strong>Switching Action</strong><br>
	<!--Switch the action-->
	<form action="get_filename.php" method="POST">
		read<input type="radio" name="symbol" value="read" />
        delete<input type="radio" name="symbol" value="delete" />

		<input type="submit" value="Switch" />
	</form>

	<!--Log out the user-->
	<form action="user_login.php" method="POST">
		<input type="submit" value="Log out" />
		<?php
			session_destroy();
		?>
	</form>
</body>
</html>