<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/7/17
 * Time: 15:00
 */
include_once "include.php";
$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$uname = $_REQUEST['uname'];
$email = $_REQUEST['email'];
$pword = $_REQUEST['pword'];
$channel = $_REQUEST['channel'];
$pword2 = $_REQUEST['pword2'];

if ($pword != $pword2) {
    echo "Error: passwords didn't match!";
} else {


    //create secuirty table
    $sql = "INSERT INTO user_security (password) VALUES ('$pword')";

    if ($result = mysqli_query($conn, $sql)) {
        $security_id = mysqli_insert_id($conn);
        $sql = "INSERT INTO user (fname, lname, username, email, security_id, channel_name) VALUES ('$fname', '$lname', '$uname', '$email', '$security_id', '$channel')";

        if ($result = mysqli_query($conn, $sql)) {
            echo 'User id created: ' . mysqli_insert_id($conn);

            header("Location: ../html/login.php"); /* Redirect browser */
            exit();
        } else {
            echo $conn->error;
        }
    } else {
        echo $conn->error;
    }
}
?>