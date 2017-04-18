<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec58ee9eabec0740cf82f7" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>View Profile</title>
    <meta content="View Profile" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>
<div>
    <div class="row-2 w-row">
        <div class="column-8 w-col w-col-3">
            <label class="field-label-6">Name</label>
        </div>
        <div class="column-5 w-col w-col-3">
            <label class="field-label-7" for="email-2">Email Address</label>
        </div>
        <div class="column-6 w-col w-col-3">
            <label class="field-label-5" for="Username-3">Username</label>
        </div>
        <div class="column-7 w-col w-col-3">
            <div class="text-block-6"><strong>Channel Name</strong>
            </div>
        </div>
    </div>
</div>
<?php
$first = $_SESSION['glbl_user']->fname;
$last = $_SESSION['glbl_user']->lname;
$email = $_SESSION['glbl_user']->email;
$username = $_SESSION['glbl_user']->username;
$channel = $_SESSION['glbl_user']->channel_name;

echo '<div class="div-block-11"></div>
<div class="w-row">
    <div class="w-col w-col-3">
        <div class="text-block-10">';
    echo $first . " " . $last ;
    echo '</div>
    </div>
    <div class="w-col w-col-3">
        <div class="text-block-7">'   ;
echo $email  ;
echo '</div>
    </div>
    <div class="w-col w-col-3">
        <div class="text-block-8">' ;
echo $username ;
echo '</div>
    </div>
    <div class="w-col w-col-3">
        <div class="text-block-9">';
echo $channel;
echo '</div>
    </div>
</div> '  ;
?>

<div class="div-block-12"></div>
<div class="div-block-10"><a class="button-3 w-button" href="update_profile.php">Update Profile</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>