<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 09:10
 */
include_once "include.php";

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
    header("Location: ../login.php"); /* Redirect browser */
    exit();
} else {

    $thread_id = $_REQUEST['thread'];

    $sql = "SELECT Message.*, toUser.username as toUser, fromUser.username as fromUser FROM Message INNER JOIN conversation on Message.conversation_id=conversation.conversation_id
  INNER JOIN user toUser on conversation.to=toUser.user_id INNER JOIN user fromUser on conversation.from=fromUser.user_id WHERE Message.conversation_id ='$thread_id'
ORDER BY Message.timestamp DESC";


    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            echo json_encode($rowData);
            $read_ind = $rowData['read_ind'];
            $id = $rowData['message_id'];
            if ($read_ind == 0) {
                $sql = "UPDATE Message SET read_ind='$read_ind' WHERE message_id = '$id'";
                if ($result = mysqli_query($conn, $sql)) {
                    echo 'message set to read';
                } else {
                    echo "Error with setting message to read <br>";
                    echo $conn->error;
                }
            }
        }
    } else {
        echo "Error with getting message thread <br>";
        echo $conn->error;
    }
}