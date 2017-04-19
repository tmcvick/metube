<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f05ed74f1ae52af15c8f48" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Compose Message</title>
    <meta content="Compose Message" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>
<div class="div-block-16"></div>
<div class="w-container">
    <div class="form-wrapper-5 w-form">
        <form class="form-9" data-name="Email Form 3" id="email-form-3" name="email-form-3" method="post" action="../php/create_message.php">
            <label for="to" id="toLbl">To:</label>
            <input class="text-field-12 w-input" data-name="to" id="to" maxlength="256" name="to" placeholder="Enter recipient&#39;s username" required type="text">
            <label for="subj" id="subjectLbl">Subject:</label>
            <input class="w-input" data-name="subj" id="subj" maxlength="256" name="subj" placeholder="Enter subject of message" required="required" type="text">
            <label for="msg" id="bodyLbl">Body:</label>
            <textarea class="textarea-3 w-input" data-name="msg" id="msg" maxlength="5000" name="msg" required placeholder="Write your message here..."></textarea>
            <div class="div-block-19">
                <div class="row-4 w-row">
                    <div class="column-12 w-col w-col-11">
                        <input class="submit-button-7 w-button" data-wait="Please wait..." id="sendBtn" type="submit" value="Send">
                    </div>
                    <div class="column-11 w-col w-col-1"><a class="button-11 w-button" href="messages.php">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>