<?php

//session_start();

include_once "php/include.php";

    $user = $_REQUEST["user"];
    $pswrd = $_REQUEST["pass"];
    $usrerr = "Invalid username";

    /*SELECT password FROM user_security INNER JOIN user on user_security.security_id on user.security_id WHERE username = '$user'*/


    $ver_user = "SELECT security_id FROM user WHERE username = '$user' ";
    $user_result = mysqli_query($conn, $ver_user);
    $sec_id = mysqli_fetch_object($user_result);

//todo catch any errors here
    if (empty($sec_id)) {
        dieWithError(1);
    } else {
        //echo $sec_id->security_id;

        $ver_pass = "SELECT password FROM user_security WHERE security_id = '$sec_id->security_id' ";
        $pass_result = mysqli_query($conn, $ver_pass);
        $usr_pass = mysqli_fetch_object($pass_result);

        if ($usr_pass->password == $pswrd) {
            $gt_ID = "SELECT * FROM user WHERE security_id = '$sec_id->security_id' ";//set session user
            $id_result = mysqli_query($conn, $gt_ID);
            $_SESSION["glbl_user"] = mysqli_fetch_object($id_result);
            unset($GLOBALS["guest"]);
            header("Location: ./html/browse_all.php"); /* Redirect browser */
            exit();
        } else {
            dieWithError(1);
        }
}
?>