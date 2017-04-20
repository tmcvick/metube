<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 09:10
 */
function displayMessageThread($to_id, $from_id ,$conn)
{
    include_once "include.php";
    $rec = 0;
    $subj = '';

        $user_id = $_SESSION['glbl_user']->user_id;
        $username = $_SESSION['glbl_user']->username;

        $sql = "SELECT Message.*, toUser.username as toUser, fromUser.username as fromUser, toUser.user_id as toUserId FROM Message
  INNER JOIN user toUser on Message.created_by=toUser.user_id INNER JOIN user fromUser on Message.from=fromUser.user_id WHERE (Message.created_by=$to_id AND Message.from = $from_id) OR (Message.created_by=$from_id AND Message.from=$to_id)
ORDER BY Message.timestamp";


        $flag = 0;
        if ($resultData = mysqli_query($conn, $sql)) {
            while ($rowData = mysqli_fetch_assoc($resultData)) {
                $to = $rowData['toUser'];
                $from = $rowData['fromUser'];
                $to_id = $rowData['toUserId'];
                $message = $rowData['message'];
                $subj = $rowData['subject'];

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
                echo '<label for="replyTxt-1" style="font-weight: normal;
  font-size: 12px;
  margin-bottom: 0;
  margin-left: -450px;">' . $from . '</label>

        <textarea class="message-box textarea-2 w-input" data-name="Reply Txt 3" id="replyTxt-1" maxlength="5000" name="replyTxt-1" readonly style="background-color: ' . $color . '">' . $message . '</textarea>
            <label for="replyTxt-1" style="font-weight: normal;
  font-size: 12px;
  margin-bottom: 0;
  margin-left: 450px;">' . date('m/d/y', strtotime($rowData['timestamp'])) . '</label>';


                $read_ind = $rowData['read_ind'];
                $id = $rowData['message_id'];
                if ($read_ind == 0 && $user_id == $to_id) {
                    $sql = "UPDATE Message SET read_ind='1' WHERE message_id = '$id'";
                    if ($result = mysqli_query($conn, $sql)) {
                    } else {
                        dieWithError(8);

                    }
                }
            }
        } else {
            dieWithError(8);

        }
    return array($rec, $subj);
}