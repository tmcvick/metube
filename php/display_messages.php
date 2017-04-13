<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 08:15
 */
include_once "include.php";

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
    header("Location: ../login.php"); /* Redirect browser */
    exit();
} else {

    $user = $_SESSION['glbl_user']->user_id;

    $sql = "SELECT Message.*, toUser.username as toUser, fromUser.username as fromUser FROM Message INNER JOIN conversation on Message.conversation_id = conversation.conversation_id INNER JOIN user fromUser on conversation.`from` = fromUser.user_id INNER JOIN user toUser on conversation.`to` = toUser.user_id
WHERE conversation.to=$user or conversation.from=$user ORDER BY conversation.conversation_id, Message.read_ind, Message.timestamp DESC";

    if ($result = mysqli_query($conn, $sql)) {
        if ($result->num_rows == 0) {
            echo 'No messages found';
        } else {
            $resultArray = array();
            $tempArray = array();
            while ($row = $result->fetch_object()) {
                $tempArray = $row;
                array_push($resultArray, $tempArray);
            }
            echo json_encode($resultArray);
        }
    } else {
        echo $conn->error;
    }
}
?>