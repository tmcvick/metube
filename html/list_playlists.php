<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f051310e9e322aaed5f887" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Browse Playlists</title>
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>
<h1>Playlists</h1>
<div class="w-container">
    <div><a class="button-7 w-button" href="create_playlist.php" id="createBtn">Create New Playlist</a>
    </div>
</div>
<?php
if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
} else {
    $user =  $_SESSION['glbl_user']->user_id;
    $sql = "SELECT * FROM playlist WHERE created_by='$user';";
    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowPlaylist = mysqli_fetch_assoc($resultData)) {
            $p_id = $rowPlaylist['playlist_id'];
            displayRow($rowPlaylist);
            $sql = "SELECT user.username, data.* FROM data INNER JOIN user on data.user_id = user.user_id INNER JOIN playlist_data on data.data_id=playlist_data.data_id where playlist_data.playlist_id='$p_id';";
            if ($resultData = mysqli_query($conn, $sql)) {
                while ($rowData = mysqli_fetch_assoc($resultData)) {
                    $data_id = $rowData['data_id'];

                    echo '<div class="w-container">
                    <div class="w-row">
                        <div class="w-col w-col-6"><a class="link-3" href="#" id="playlistTitleTxt">Playlist Title 1</a>
                        </div>
                        <div class="w-col w-col-6"><img class="image" height="20" id="removeImage" sizes="20px" src="../images/milker-X-icon.png" srcset="../images/milker-X-icon-p-500.png 500w, ../images/milker-X-icon-p-800.png 800w, ../images/milker-X-icon.png 2400w" width="20">
                        </div>
                    </div>
                  </div>';
                    displayRow($rowData);
                    $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$data_id' and data_tag.tag_id=tag.tag_id;";
                    if ($resultTag = mysqli_query($conn, $sql)) {
                        while ($rowTag = mysqli_fetch_assoc($resultTag)) {
                            displayRow($rowTag);
                        }
                    } else {
                        echo "Error with getting tags <br>";
                        echo $conn->error;
                    }
                    echo '<br>';
                }
            } else {
                echo "Error with getting data <br>";
                echo $conn->error;
            }
        }
    }
    else {
        echo "Error with getting playlists <br>";
        echo $conn->error;
    }
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>