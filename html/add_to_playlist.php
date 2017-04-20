<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f063cf22ba1a657e82a6e9" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Create Playlist</title>
    <meta content="Create Playlist" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>
<body>

<div class="div-block-28"></div>
<div class="w-form">
    <form class="form-10" data-name="Email Form 3" id="email-form-3" name="email-form-3">
        <div class="w-container">
            <div class="w-row">
                <div class="column-15 w-col w-col-6">
                    <label class="field-label-9" for="field">Select Playlist to add the media to:</label>
                </div>
                <div class="column-16 w-col w-col-6">
                    <select class="select-field w-select" id="field" name="field">
                        <option value="">Select a playlist...</option>
                        <?php
                        if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
                            echo '<script language="javascript">';
                            echo 'alert("User not logged in!")';
                            echo '</script>';
                        } else {
                            $user = $_SESSION['glbl_user']->user_id;
                            $sql = "SELECT * FROM playlist WHERE created_by='$user';";
                            if ($resultPlaylist = mysqli_query($conn, $sql)) {
                                while ($rowPlaylist = mysqli_fetch_assoc($resultPlaylist)) {
                                    $title = $rowPlaylist['name'];
                                    echo '<option value = "Choice" > ' . $title . '</option >';
                                }
                            }
                        }

/*
                        <option value = "Second" > Second Choice </option >
                        <option value = "Third" > Third Choice </option >*/
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="div-block-29"></div>
        <div class="container-10 w-container">
            <input class="submit-button-8 w-button" data-wait="Please wait..." id="addBtn" type="submit"
                   value="Add to Playlist"><a class="button-13 w-button" href="channel.html" id="cancelBtn">Cancel</a>
        </div>
    </form>
    <div class="w-form-done">
        <div>Thank you! Your submission has been received!</div>
    </div>
    <div class="w-form-fail">
        <div>Oops! Something went wrong while submitting the form</div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>