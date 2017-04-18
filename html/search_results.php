<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec496d3007283413b397cb" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Search Results</title>
    <meta content="Search Results" property="og:title">
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>
<h1>Search Results</h1>

<?php

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
} else {
    $query = $_REQUEST['keyword'];

    $sql = "SELECT data.* FROM data INNER JOIN data_tag on data_tag.data_id = data.data_id INNER JOIN tag on data_tag.tag_id = tag.tag_id WHERE tag.keyword='$query'";

    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            displayRow($rowData);
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