<?php

//session_start();

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('/home/tmcvick/public_html/'));

foreach($iterator as $item) {
    chmod($item, 0755);
}
include_once "php/include.php";

$user = $_REQUEST["user"];
$pswrd = $_REQUEST["pass"];
$usrerr = "Invalid username";

/*SELECT password FROM user_security INNER JOIN user on user_security.security_id on user.security_id WHERE username = '$user'*/

$ver_user = "SELECT security_id FROM user WHERE username = '$user' ";
$user_result = mysqli_query($conn,$ver_user);
$sec_id = mysqli_fetch_object($user_result);

//todo catch any errors here
if(empty($sec_id))
{
    echo $usrerr; // should empty text field and return
}
else
{
    //echo $sec_id->security_id;

    $ver_pass = "SELECT password FROM user_security WHERE security_id = '$sec_id->security_id' ";
    $pass_result = mysqli_query($conn,$ver_pass);
    $usr_pass = mysqli_fetch_object($pass_result);

    if($usr_pass->password == $pswrd)
    {
        echo 'Success!';
        $gt_ID = "SELECT * FROM user WHERE security_id = '$sec_id->security_id' ";//set session user
        $id_result = mysqli_query($conn,$gt_ID);
        $_SESSION["glbl_user"] = mysqli_fetch_object($id_result);
    }
    else{
        echo 'Login failed';
    }

    echo '<br> Test, UserID : <br>';
    echo $_SESSION["glbl_user"]->user_id;
}

//todo session_destroy() when logging out

?>