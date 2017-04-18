<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f04a930e9e322aaed5f6df" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Browse All Audio</title>
    <meta content="Browse All Audio" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>
<h1>Audio</h1>
<?php
include "header.php";
?>

<?php
if(isset($_REQUEST['user_id'])) {
    $user =  $_REQUEST['user_id'];

    $sql = "SELECT * FROM data WHERE user_id = '$user' AND type='audio'";
} else {
    $sql = "SELECT * FROM data WHERE type='audio'";

}

if ($resultData = mysqli_query($conn, $sql)) {
    //echo json_encode($resultData);
    while ($rowData = mysqli_fetch_assoc($resultData)) {
        displayRow($rowData);
        $data_id = $rowData['data_id'];
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
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>