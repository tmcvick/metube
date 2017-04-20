<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f05baab453ab19cdda7361" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>View Playlist</title>
    <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>
<body>
<?php

$data_id = $_REQUEST['data_id'];
$sql = "SELECT * FROM data WHERE data_id = '$data_id'";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>