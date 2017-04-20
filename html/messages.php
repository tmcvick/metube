<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec498bf44e6b0178882210" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Messages</title>
    <meta content="Messages" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>

<div class="div-block-21"></div>
<div class="container-9 w-container">
    <div class="div-block-20"><a class="button-9 w-button" href="compose_message.php" id="newMessageBtn">New
            Message</a>
    </div>
    <div class="div-block-22"></div>
    <div>
    <?php
    $user = $_SESSION['glbl_user']->user_id;

    $sql = "SELECT Message.*, toUser.username as toUser, fromUser.username as fromUser FROM Message INNER JOIN conversation on Message.conversation_id = conversation.conversation_id INNER JOIN user fromUser on conversation.`from` = fromUser.user_id INNER JOIN user toUser on conversation.`to` = toUser.user_id
    WHERE conversation.to=$user or conversation.from=$user GROUP BY conversation.conversation_id ORDER BY Message.read_ind,  Message.timestamp DESC, conversation.conversation_id";

    if ($result = mysqli_query($conn, $sql)) {
        if ($result->num_rows == 0) {
            echo'
                <div><strong>You have no messages!</strong>
                </div>';
        } else {
            echo '<div class="w-row" style="border-bottom: solid; border-bottom-width: thick;">
            <div class="w-col w-col-3">
                <div><strong>From</strong>
                </div>
            </div>
            <div class="w-col w-col-6">
                <div><strong>Subject</strong>
                </div>
            </div>
            <div class="w-col w-col-3">
                <div><strong>Time</strong>
                </div>
            </div>
        </div>';
            $username = $_SESSION['glbl_user']->username;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['fromUser'] === $username) {
                    $rec = $row['toUser'];
                } else {
                    $rec = $row['fromUser'];
                }

                    if ($row['read_ind'] == 0 && $row['toUser'] === $username) {
                    $color = "#ff5c00";
                } else {
                    $color = "white";
                }
                
                echo '<a href="http://webapp.cs.clemson.edu/~tmcvick/html/view_message_thread.php?thread_id=' . $row['conversation_id'] .'">
                <div class="w-row" style="background-color: ' . $color . '">
            <div class="w-col w-col-3">
                <div>' . $rec . '
                </div>
            </div>
            <div class="w-col w-col-6">
                <div>' . $row['subject'] .'
                </div>
            </div>
            <div class="w-col w-col-3">
                <div>' . date( 'm/d/y', strtotime($row['timestamp'])) .'
                </div>
            </div>
            div class="w-col w-col-3">
                <div>' . $row['conversation_id'] .'
                </div>
            </div>
        </div>
                </a>';
            }
        }
    } else {
        echo $conn->error;
    }
    ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>