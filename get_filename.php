<!DOCTYPE html>
<html lang="en">

<head> <meta charset="UTF-8"> <title>Get filename</title></head>
<body>
    <strong>Enter the filename please.</strong>
    
    <form action="check_filename.php" method="POST">
    
    <p>
        <!-- file name--> 
        <input type="text" name="file"  />
    </p>
    <input type="submit" value="Send" />
        <input type="reset" />
    </form>
    
    <?php
        session_start();
        if($_POST['symbol']) $_SESSION['action']=$_POST['symbol'];
        if($_SESSION['action']=='upload') header("Location: upload.php");
        $path ="/srv/uploads/". $_SESSION['username']."/*";
         //Citation
        //https://www.nicesnippets.com/blog/how-to-get-list-of-file-in-folder-in-php
        echo '<br>'."Listing all files".'<br>';
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
        upload<input type="radio" name="symbol" value="upload" />
		read<input type="radio" name="symbol" value="read" />
        delete<input type="radio" name="symbol" value="delete" />
		<input type="submit" value="Switch" />
	</form>
   
    <!-- Log out -->
    <form action="user_login.php" method="POST">
        <input type="submit" value="Log out" />
        <?php session_destroy();?>
    </form>
</body>
</html>