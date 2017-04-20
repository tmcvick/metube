<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 09:10
 */
function displayMessageThread($thread_id, $conn)
{
    include_once "include.php";

    if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
        echo '<script language="javascript">';
        echo 'alert("User not logged in!")';
        echo '</script>';
    } else {

        $user_id = $_SESSION['glbl_user']->user_id;
        $username = $_SESSION['glbl_user']->username;

        $sql = "SELECT Message.*, toUser.username as toUser, fromUser.username as fromUser FROM Message INNER JOIN conversation on Message.conversation_id=conversation.conversation_id
  INNER JOIN user toUser on conversation.to=toUser.user_id INNER JOIN user fromUser on conversation.from=fromUser.user_id WHERE Message.conversation_id ='$thread_id'
ORDER BY Message.timestamp DESC";


        $flag = 0;
        if ($resultData = mysqli_query($conn, $sql)) {
            while ($rowData = mysqli_fetch_assoc($resultData)) {
                $to = $rowData['toUser'];
                $from = $rowData['fromUser'];
                $message = $rowData['message'];

                if ($to == $username) {
                    $rec = $from;
                    $color = "cornflowerblue";
                } else {
                    $rec = $to;
                    $color = "darkgray";
                }

                if ($flag == 0) {
                    //display subject and From
                    $flag = 1;
                    echo '<div class="w-container">
        <h3 class="heading-8">Messages between you and ' . $rec . '</h3>
    </div>   ';
                }
                //display body
                echo '<label for="replyTxt-1" class="message-label">' . $from . '</label>

        <textarea class="message-box textarea-2 w-input" data-name="Reply Txt 3" id="replyTxt-1" maxlength="5000" name="replyTxt-1" readonly style="background-color: ' . $color . '">' . $message . '</textarea>
            <label for="replyTxt-1" class="message-date">' . date('m/d/y', strtotime($rowData['timestamp'])) . '</label>';


                $read_ind = $rowData['read_ind'];
                $id = $rowData['message_id'];
                if ($read_ind == 0) {
                    $sql = "UPDATE Message SET read_ind='1' WHERE message_id = '$id'";
                    if ($result = mysqli_query($conn, $sql)) {
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
}