<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec496d3007283413b397cb" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Favorites</title>
    <meta content="Favorites" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>

<div class="w-container" style="border-bottom: solid; border-bottom-width: thick;">
    <h1>My Favorites</h1>
</div>

<?php
    $user = $_SESSION['glbl_user']->user_id;
    $sql = "SELECT DISTINCT user.username, data.* FROM user_favorite INNER JOIN user on user_favorite.user_id = user.user_id  INNER JOIN data on user_favorite.data_id=data.data_id WHERE user_favorite.user_id='$user' ORDER BY data.data_id DESC;";
    if ($resultData = mysqli_query($conn, $sql)) {
        //echo json_encode($resultData);
        if($resultData->num_rows != 0) {
            while ($rowData = mysqli_fetch_assoc($resultData)) {
                displayRow($rowData);
                $data_id = $rowData['data_id'];
                $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$data_id' and data_tag.tag_id=tag.tag_id;";
                if ($resultTag = mysqli_query($conn, $sql)) {
                    if ($resultTag->num_rows != 0) {
                        echo '<div class="w-container"><strong>Keywords: &nbsp</strong>';
                        while ($rowTag = mysqli_fetch_assoc($resultTag)) {
                            displayRow($rowTag);
                        }
                        echo '</div>';
                    }
                } else {
                    dieWithError(4);
                }
                echo '<br>';
            }
        }
        else {
            echo '<div class="w-container">
                    <h4>You have no favorites.</h4>
                </div>';
        }
    }  else {
        dieWithError(4);
    }

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>