<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f05d665a93b56d11b2cb2b" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>View Message Thread</title>
    <meta content="View Message Thread" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>

<div class="div-block-25"></div>>
<div class="div-block-27"></div>
<div class="form-wrapper-4 w-form">
    <form class="form-7" data-name="Email Form 3" id="email-form-3" name="email-form-3" action="../php/create_message.php" method="post">
        <?php
            $thread_id = $_REQUEST['thread_id'];
            include "../php/display_message_thread.php";
            list($rec, $subj) = displayMessageThread($thread_id, $conn);
        ?>
        <input type="hidden" value="<?= $rec ?>" name="to" id="to">
        <input type="hidden" value="<?= $subj ?>" name="subj" id="subj">
        <textarea class="textarea-2 w-input" data-name="Reply Txt 3" id="msg" maxlength="5000" name="msg" placeholder="Write your reply..."></textarea>
        <input class="submit-button-5 w-button" data-wait="Please wait..." id="replyBtn" type="submit" value="Reply">
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>