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

<h1>Favorites</h1>

<?php
if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
} else {
    $user =  $_SESSION['glbl_user']->user_id;
    $sql = "SELECT data.data_id, user.username, data.* FROM user_favorite INNER JOIN user on user_favorite.user_id = user.user_id  INNER JOIN data on user_favorite.data_id=data.data_id WHERE user_favorite.user_id='$user';";
    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            $data_id = $rowData['data_id'];

            echo '<div class="w-container">
                <div class="w-row">
                  <div class="w-col w-col-6"><a class="link" href="#" id="faveLink">Favorites Link 1</a>
                  </div>
                  <div class="w-col w-col-6"><a href="../php/remove_favorite.php?data_id=' . $data_id . '"><img  class="image-2" id="removeImg" sizes="20px" src="../images/milker-X-icon.png" srcset="../images/milker-X-icon-p-500.png 500w, ../images/milker-X-icon-p-800.png 800w, ../images/milker-X-icon.png 2400w" width="20"></a>
                  </div>
                </div>
              </div>'  ;
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

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>