<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec55f14a996d425a1d6d0d" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Upload</title>
    <meta content="Upload" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>
<?php
include "header.php";
?>

<div class="form-wrapper-2 w-form">
    <form class="form-4" data-name="Email Form 3" id="email-form-3" name="email-form-3" action="../php/upload_data.php" method="post" enctype="multipart/form-data">
        <label for="titleTxt" id="titleLbl">Title</label>
        <input class="text-field-8 w-input" data-name="titleTxt" id="title" maxlength="256" name="title" placeholder="Enter the title of the media" type="text" required>
        <label for="typeText" id="typeLbl">Type</label>
        <input class="text-field-9 w-input" data-name="typeText" id="dtype" maxlength="256" name="dtype" placeholder="Enter the type of media (i.e. picture, video)" required="required" type="text">
        <label for="taglist" id="typeLbl">Tags</label>
        <input class="text-field-9 w-input" data-name="taglist" id="taglist" maxlength="1000" name="taglist" placeholder="Enter the keywords, separated by commas" required="required" type="text">
        <label for="descriptionTxt" id="descriptionLbl">Description</label>
        <textarea class="textarea w-input" id="desc" maxlength="5000" name="desc" required placeholder="Add a short description of the media"></textarea>
        <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
        <label for="flname" style="color:#663399"><em> Add a Data Item: (Each file limit 50M)</em></label><br/>
        <input required class="text-field-9 w-input" name="flname" id="flname" type="file"/>

        <input class="submit-button-4 w-button" data-wait="Please wait..." id="uploadBtn" type="submit" value="Upload">
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>