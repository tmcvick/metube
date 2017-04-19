<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec58903007283413b39cf2" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Update Profile</title>
    <meta content="Update Profile" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>

<div class="div-block-13"></div>
<?php
$first = $_SESSION['glbl_user']->fname;
$last = $_SESSION['glbl_user']->lname;
$email = $_SESSION['glbl_user']->email;
$username = $_SESSION['glbl_user']->username;
$channel = $_SESSION['glbl_user']->channel_name;
$id = $_SESSION['glbl_user']->user_id;

?>
<div class="w-container">
    <div class="form-wrapper w-clearfix w-form">
        <form class="form-2" data-name="Update Profile Form" id="wf-form-Update-Profile-Form"
              name="wf-form-Update-Profile-Form" action="../php/update_user.php" method="post">
            <div class="w-row">
                <div class="column-9 w-col w-col-6">
                    <label class="lastnamelbl" for="fname">First Name:</label>
                    <input class="text-field-3 w-input" data-name="fname" id="fname" maxlength="256" name="fname"
                           value="<?= $first ?>" required="required" type="text">
                </div>
                <div class="column-10 w-col w-col-6">
                    <label class="lastnamelbl" for="lname">Last Name:</label>
                    <input class="text-field-3 w-input" data-name="lname" id="lname" maxlength="256" name="lname"
                           value="<?= $last ?>" required="required" type="text">
                </div>
            </div>
            <label for="email">Email Address:</label>
            <input class="text-field-4 w-input" data-name="email" id="email" maxlength="256" name="email"
                   value="<?= $email ?>" required="required" type="email">
            <label for="uname">Username:</label>
            <input class="text-field-5 w-input" data-name="uname" id="uname" maxlength="256" name="uname"
                   value="<?= $username ?>" required="required" type="text">
            <label class="lastnamelbl" for="channel">Channel Name:</label>
            <input class="text-field-5 w-input" data-name="channel" id="channel" maxlength="256" name="channel"
                   value="<?= $channel ?>" required="required" type="text">
            <label for="pword">Password:</label>
            <input class="text-field-6 w-input" data-name="pword" id="pword" maxlength="256" name="pword"
                   placeholder="Enter your new (or old) password" required="required" type="password">
            <input type="hidden" value="<?= $id ?>" name="id" id="id">
            <div class="div-block-9">
                <button class="button-4 w-button" type="submit">Save Changes</button>
                <a class="button-12 w-button" href="view_profile.php">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>