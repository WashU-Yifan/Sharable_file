
    <?php
        session_start();
        $filename=$_SESSION['file'];
        $full_path = $_SESSION['fullpath'];

        // Now we need to get the MIME type (e.g., image/jpeg).  PHP provides a neat little interface to do this called finfo.
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($full_path);

        // Finally, set the Content-Type header to the MIME type of the file, and display the file.
        header("Content-Type: ".$mime);
        header('content-disposition: inline; filename="'.$filename.'";');
        readfile($full_path);
        header("refresh:2; url=get_filename.php");
    ?>

