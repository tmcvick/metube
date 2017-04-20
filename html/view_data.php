<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f0445ec38cbf65913f1800" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>View Media</title>
    <meta content="View Media" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>
<body>
<?php
include "header.php";
$data_id = $_REQUEST['data_id'];
$sql = "SELECT * FROM data WHERE data_id = '$data_id'";
if ($resultData = mysqli_query($conn, $sql))
{
    $rowData = mysqli_fetch_assoc($resultData);
    $title = $rowData['title'];
    $user_id = $rowData['user_id'];
    $user_sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    if ($user_resultData = mysqli_query($conn, $user_sql))
    {
        $user_rowData = mysqli_fetch_assoc($user_resultData);
        $username = $user_rowData['username'];
    }
    $description = $rowData['description'];
    echo '<div class="w-container">
        <div class="w-row">
                <div class="column-9 w-col w-col-6">
                    <h1>' . $title. '</h1>
                </div>
                <div class="column-10 w-col w-col-6" style="padding:15px" align="right">
                    <h3>Uploaded by ' . $username . '</h3>
                </div>
                </div>
    <h4>' . $description . '</h4>
    </div>';
}

<div class="w-container"></div>
<div class="container-11 w-container">
    <div class="w-row">
        <div class="column-18 w-col w-col-6"><a class="button-14 w-button" href="#" id="downloadBtn">Download</a>
        </div>
        <div class="column-19 w-col w-col-6"><a class="button-15 w-button" href="#" id="favoritesBtn">Add to Favorites</a><a class="button-16 w-button" href="add-to-playlist.html" id="playlistBtn">Add to playlist</a>
        </div>
    </div>
</div>
<div class="div-block-32"></div>
<div class="form-wrapper-3 w-form">
    <form class="form-8" data-name="Comment" id="wf-form-Comment" name="wf-form-Comment">
        <textarea class="textarea-4 w-input" data-name="commentTxt" id="commentTxt" maxlength="5000" name="commentTxt" placeholder="Add comment..."></textarea>
        <input class="submit-button-6 w-button" data-wait="Please wait..." id="commentBtn" type="submit" value="Comment">
    </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
?>
</body>
</html>