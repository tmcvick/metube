<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/12/17
 * Time: 21:42
 */
include_once "include.php";

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
    header("Location: ../login.php"); /* Redirect browser */
    exit();
} else {

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
        echo $conn->error;
    }

    $sql = "SELECT conversation_id from conversation where (conversation.to = '$user_id' AND conversation.from = '$from') OR (conversation.to = '$from' AND conversation.from = '$user_id'); ";
    if ($resultconvo = mysqli_query($conn, $sql)) {
        if ($resultconvo->num_rows > 0) {
            $convo_id = mysqli_fetch_object($resultconvo)->conversation_id;
        } else {
            $sql = "INSERT INTO conversation VALUES (NULL, '$user_id', '$from')";
            if ($result = mysqli_query($conn, $sql)) {
                $convo_id = mysqli_insert_id($conn);
            }   else {
                echo $conn->error;
            }
        }
            $sql = "INSERT INTO Message (subject,message, read_ind, timestamp, conversation_id) VALUES ('$subj','$msg', '$read', '$created', '$convo_id')";

            if ($result = mysqli_query($conn, $sql)) {
                $message_id = mysqli_insert_id($conn);
                echo '<script>
alert("Message sent!");
window.location.href="../html/messages.php";
</script>';
            } else {
                echo $conn->error;
            }
    } else {
        echo $conn->error;
    }
}
?>
