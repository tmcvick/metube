<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/12/17
 * Time: 21:42
 */
include_once "include.php";


    $from = $_SESSION['glbl_user']->user_id;
    $to = $_REQUEST['to'];
    $subj = $_REQUEST['subj'];
    $msg = $_REQUEST['msg'];
    $created = date("Y-m-d H:i:s");
    $read = 0;
    $user_id = 0;
    
    $sql = "SELECT user_id from user where username = '$to';";
    if ($resultid = mysqli_query($conn, $sql)) {
        $user_id = mysqli_fetch_object($resultid)->user_id;
    } else {
        dieWithError(13);
    }

    $sql = "INSERT INTO Message (subject, message, read_ind, timestamp, created_by, Message.from) VALUES ('$subj', '$msg', '$read', '$created', '$user_id', '$from')";

    if ($result = mysqli_query($conn, $sql)) {
        $message_id = mysqli_insert_id($conn);
        echo '<script>
            alert("Message sent!");
            window.location.href="../html/messages.php";
            </script>';
    } else {
        dieWithError(5);

}
?>
