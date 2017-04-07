<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/7/17
 * Time: 15:44
 */
include_once "include.php";

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$uname = $_REQUEST['uname'];
$email = $_REQUEST['email'];
$pword = $_REQUEST['pword'];
$channel = $_REQUEST['channel'];
$id = $_REQUEST['id'];

$sql = "UPDATE user INNER JOIN user_security ON user_security.security_id = user.security_id SET
            (user.fname='$fname', user.lname='$lname', user.username='$uname', user.email='$email', user.channel_name='$channel', user_security.password='$pword') WHERE user_id = '$id'";
if($result = mysqli_query($conn, $sql)) {
    echo 'User id update: ' . $id;
} else {
    echo $conn->error;
}
?>