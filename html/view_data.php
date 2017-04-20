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

<?php
include "header.php";
$rowData = 0;
$username = 0;
$data_id = $_REQUEST['data_id'];
$sql = "SELECT * FROM data WHERE data_id = '$data_id'";
if ($resultData = mysqli_query($conn, $sql)) {
    $rowData = mysqli_fetch_assoc($resultData);
    $title = $rowData['title'];
    $user_id = $rowData['user_id'];
    $user_sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    if ($user_resultData = mysqli_query($conn, $user_sql)) {
        $user_rowData = mysqli_fetch_assoc($user_resultData);
        $username = $user_rowData['username'];
    }
    $description = $rowData['description'];
    echo '<div class="w-container" >
        <div class="w-row" style="border-bottom: solid; border-bottom-width: thick;">
                <div class="column-9 w-col w-col-6">
                    <h1>' . $title . '</h1>
                </div>
                <div class="column-10 w-col w-col-6" style="padding:15px" align="right">
                    <h3>Uploaded by ' . $username . '</h3>
                </div>
                </div>
    <h4>' . $description . '</h4>
    </div>';

    if ($rowData['type'] == "video") {
        echo '<div style="margin-top: 20px; margin-bottom: 20px" align="center">
                          <video width="320" height="240" controls>
<source type="video/mp4" src="/~tmcvick/uploads/' . $rowData['filename'] . '">
This video failed to play
</video>
</div>';
    }
    if ($rowData['type'] == "picture") {
        echo '<div style="margin-top: 20px; margin-bottom: 20px" align="center"><img width="320" src="/~tmcvick/uploads/' . $rowData['filename'] . '"/></div>';
    }

    if($rowData['type'] == "audio") {
        echo '<div style="margin-top: 20px; margin-bottom: 20px" align="center">
                          <audio controls>
<source type="audio/mpeg" src="/~tmcvick/uploads/' . $rowData['filename'] . '">
This audio failed to play
</audio>
</div>';
    }
}

?>
<div class="container-11 w-container">
    <div class="w-row">
        <div class="column-18 w-col w-col-6"><a class="button-14 w-button"
                                                href="<?= "/~tmcvick/uploads/" . $rowData['filename'] ?>"
                                                id="downloadBtn" download>Download</a>
        </div>
        <div class="column-19 w-col w-col-6">
            <?php
            if(!isset($_SESSION['guest'])) {
                echo '<a class="button-16 w-button" href="../php/add_favorite.php?data_id=' . $data_id . '" id="favoritesBtn">Add to Favorites</a>';
                echo '<a class="button-16 w-button" href="add_to_playlist.php?data_id=' . $data_id . '" id="playlistBtn">Add to playlist</a>' ;
            }
            ?>
        </div>
    </div>
</div>
<?php
if(!isset($_SESSION['guest'])) {
    include "../php/display_comments.php";

    echo '<div class="form-wrapper-4 w-form">
    <form class="form-7" data-name="Email Form 3" id="email-form-3" name="email-form-3" action="../php/create_comment.php" method="post">
        <h3 align="center" style="color:#ff5c00">Comments</h3>
            
           ';
    $content = displayComments($conn);
    echo '
        
        <input type="hidden" value="' . $content . '" name="comment" id="comment">
        <input type="hidden" value="' . $data_id . '" name="data_id" id="data_id">
        <textarea class="textarea-2 w-input" data-name="Reply Txt 3" id="msg" maxlength="5000" name="comment" placeholder="Add a comment..."></textarea>
<input class="submit-button-5 w-button" data-wait="Please wait..." id="commentBtn" type="submit" value="Add Comment">
</form>
</div>';
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>

<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->

</body>
</html>