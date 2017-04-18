<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/7/17
 * Time: 15:44
 */
include_once "include.php";

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
} else {

    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $uname = $_REQUEST['uname'];
    $email = $_REQUEST['email'];
    $pword = $_REQUEST['pword'];
    $channel = $_REQUEST['channel'];
    $id = $_REQUEST['id'];

    $sql = "UPDATE user INNER JOIN user_security ON user_security.security_id = user.security_id SET
            user.fname='$fname', user.lname='$lname', user.username='$uname', user.email='$email', user.channel_name='$channel', user_security.password='$pword' WHERE user_id = '$id'";
    if ($result = mysqli_query($conn, $sql)) {
        $gt_ID = "SELECT * FROM user WHERE user_id = '$id' ";//set session user
        $id_result = mysqli_query($conn, $gt_ID);
        $_SESSION["glbl_user"] = mysqli_fetch_object($id_result);
        header("Location: ../html/view_profile.php");
        exit();
    } else {
        echo $conn->error;
    }
}
?>