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
    <div class="div-block-20"><a class="button-9 w-button" href="compose-message.html" id="newMessageBtn">New
            Message</a>
    </div>
    <div class="div-block-22"></div>
    <div>
    <?php
    $user = $_SESSION['glbl_user']->user_id;

    $sql = "SELECT Message.*, toUser.username as toUser, fromUser.username as fromUser FROM Message INNER JOIN conversation on Message.conversation_id = conversation.conversation_id INNER JOIN user fromUser on conversation.`from` = fromUser.user_id INNER JOIN user toUser on conversation.`to` = toUser.user_id
    WHERE conversation.to=$user or conversation.from=$user ORDER BY conversation.conversation_id, Message.read_ind, Message.timestamp DESC";

    if ($result = mysqli_query($conn, $sql)) {
        if ($result->num_rows == 0) {
            echo'
                <div><strong>You have no messages!</strong>
                </div>';
        } else {
                echo '<table class="table table-hover table-bordered">';
                echo '<tr>';
                echo '<th>From</th>';
                echo '<th>Subject</th>';
                echo '<th>Time</th>';
                echo '</tr>';

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['fromUser'] . "</td>";
                    echo "<td>" . $row['subject'] . "</td>";
                    echo "<td>" . date( 'm/d/y', strtotime($row['timestamp']))  . "</td>";
                    echo "</tr>";
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