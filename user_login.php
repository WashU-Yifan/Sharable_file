<!DOCTYPE html>
<html lang="en">

<head> <meta charset="UTF-8"> <title>Sharable file</title></head>
<body>
    <strong>Enter your username first.</strong>
    
    <form action="check_username.php" method="POST">
    
    <p>
        <!-- username--> 
        <input type="text" name="username"  />
    </p>

    <p>
    <strong>Action </strong><br>
    <!-- Define your action, upload, read, or delete--> 
        upload<input type="radio" name="symbol" value="upload" />
        read<input type="radio" name="symbol" value="read" />
        delete<input type="radio" name="symbol" value="delete" />
    </p>

        <input type="submit" value="Send" />
        <input type="reset" />


</form>
</body>
</html>