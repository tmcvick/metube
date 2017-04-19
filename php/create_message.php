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

    $sql = "INSERT INTO conversation VALUES (NULL, '$to', '$from')";
    if ($result = mysqli_query($conn, $sql)) {
        $convo_id = mysqli_insert_id($conn);
        //echo 'Conversation created: ' . $convo_id . '<br>';
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
