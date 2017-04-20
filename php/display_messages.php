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
} else {

    $user = $_SESSION['glbl_user']->user_id;

    $sql = "SELECT Message.*, toUser.username as toUser, fromUser.username as fromUser FROM Message INNER JOIN user fromUser on Message.`from` = fromUser.user_id INNER JOIN user toUser on Message.`created_by` = toUser.user_id
WHERE Message.`created_by`=$user or Message.from=$user GROUP BY toUser.username ORDER BY Message.read_ind,  Message.timestamp DESC";

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