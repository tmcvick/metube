<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 2:26 PM
 */

include_once "include.php";

function displayComments($conn)
{
    if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
        echo '<script language="javascript">';
        echo 'alert("User not logged in!")';
        echo '</script>';
        header("Location: ../login.php"); /* Redirect browser */
        exit();
    } else {

        $data_id = $_REQUEST["data_id"]; //todo set to current data

        $sql = "SELECT comment.*, user.username FROM comment INNER JOIN user on comment.user_id = user.user_id WHERE comment.data_id = '$data_id';";

        if ($resultData = mysqli_query($conn, $sql)) {
            while ($rowData = mysqli_fetch_assoc($resultData)) {
                $content = $rowData['content'];
                $from_id = $rowData['user_id'];
                $sql = "SELECT username from user where user_id = '$from_id';";
                if ($resultid = mysqli_query($conn, $sql)) {
                    $from = mysqli_fetch_object($resultid)->username;
                } else {
                    dieWithError(13);
                }

                //display body
                echo '<label for="replyTxt-1" style="font-weight: normal;
                font-size: 12px;
                margin-bottom: 0;margin-left: -395px;" align="left"><strong>Posted by&nbsp' . $from . '</strong></label>

                <textarea class="message-box textarea-2 w-input" data-name="Reply Txt 3" id="replyTxt-1" maxlength="5000" name="replyTxt-1" readonly style="border: solid; border-color: black">' . $content . '</textarea>';
            }
        } else {
            dieWithError(8);

        }
    }
    return $content;
}
?>