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
<div class="w-container" style="border-bottom: solid; border-bottom-width: thick;">
    <h1>Search Results</h1>
</div>

<?php

    $query = $_REQUEST['keyword'];

    $sql = "SELECT data.* FROM data INNER JOIN data_tag on data_tag.data_id = data.data_id INNER JOIN tag on data_tag.tag_id = tag.tag_id WHERE tag.keyword='$query' ORDER BY data_id DESC";

    if ($resultData = mysqli_query($conn, $sql)) {
        if ($resultData->num_rows != 0) {
            while ($rowData = mysqli_fetch_assoc($resultData)) {
                displayRow($rowData);
            }
        } else {
            echo '<div class="w-container">
                    <h4>Your search returned no results.</h4>
                </div>';
        }
    }
    else {
        dieWithError(4);

}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>