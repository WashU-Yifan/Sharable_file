<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"> <title>Check_Username</title></head>
<body>
<?php
    session_start();
    $user = $_POST['username'];
    $_SESSION['username']=$user;
    $action=$_POST['symbol'];
    $_SESSION['action']=$action;
    //check username format
    if( !preg_match('/^[\w_\-]+$/', $user) ){
        echo "Invalid username";
        session_destroy();
        header("refresh:2; url=user_login.php");
        exit;

    }
    //read the user.txt file and extract the usernames
    $h = fopen("/srv/user.txt", "r");
    $linenum = 0;
    while( !feof($h) ){
        $names[$linenum]=substr(fgets($h),0,-1);
         $linenum++;
    }
    fclose($h);

    //check if the username is registered
    $i=0;
    $nameexist=0;
    while($i<=$linenum){
        if($names[$i]==$user){
            $nameexist=1;
            break;
        }
        $i++;
    }

    //if there is no match in the user.txt, then return to the login page.
    if($nameexist==0){
        echo "login failed, user not exist!";
        session_destroy();
        header("refresh:2; url=user_login.php");
        exit;
    }

    //directing to different pages based on the action.
    switch ($action ){
        case "upload":
            echo "login success! Redirecting now.....";
            header("refresh:2; url=upload.php");
            break;
        case "read":
        case "delete":
            echo "login success! Redirecting now.....";
            header("refresh:2; url=get_filename.php");
            break;
        default:
            echo "action not specifies, returning to the login page";
            session_destroy();
            header("refresh:2; url=user_login.php");
    }
    

    ?>
</body>
</html>