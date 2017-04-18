<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec496d3007283413b397cb" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Channel</title>
    <meta content="Channel" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../css/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/metube-80047b.webflow.css" rel="stylesheet" type="text/css">
    <script src="../js/modernizr.js" type="text/javascript"></script>
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body data-ix="new-interaction">
<div class="section-2">
    <div class="row-3 w-row">
        <div class="w-col w-col-1"><img src="../images/paw.png" width="64">
        </div>
        <div class="column w-col w-col-11">
            <div class="w-row">
                <div class="w-col w-col-6">
                    <h3 class="heading-6">Team U9</h3>
                </div>
                <div class="w-col w-col-6">
                    <div class="w-form">
                        <form data-name="Email Form 2" id="email-form-2" name="email-form-2">
                            <div class="row w-row">
                                <div class="column-3 w-col w-col-10">
                                    <input class="text-field-7 w-input" data-name="searchTxt" id="searchTxt" maxlength="256" name="searchTxt" placeholder="Enter your search criteria" type="text">
                                </div>
                                <div class="column-4 w-col w-col-2"><a class="button w-button" href="search-results.html" id="searchBtn">Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
    <div class="w-dropdown" data-delay="0" data-hover="1">
        <div class="w-dropdown-toggle" id="channelDropDown">
            <div><strong>My Channel</strong>
            </div>
            <div class="w-icon-dropdown-toggle"></div>
        </div>
        <nav class="w-dropdown-list"><a class="dropdown-link w-dropdown-link" href=""><strong>All Media</strong></a>
            <?php
            include_once "../php/include.php";
            echo '<a class="w-dropdown-link" href="browse_videos.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Videos</strong></a>';

            echo '<a class="w-dropdown-link" href="browse_pictures.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Pictures</strong></a>';
            echo '<a class="w-dropdown-link" href="browse_audio.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Audio</strong></a>';

            ?>
            <a class="w-dropdown-link" href="browse-playlists.html"><strong>Playlists</strong></a>
            <a class="w-dropdown-link" href="browse_favorites.php"><span><strong>Favorites</strong></span></a>
        </nav>
    </div>
    <nav class="w-nav-menu" role="navigation"><a class="w-nav-link" href="view_profile.php" id="profileLink"><strong>My Profile</strong></a>
        <a class="nav-link w-nav-link" href="../php/logout.php"><strong id="logoutLink">Logout</strong></a>
    </nav>
    <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
    </div><a class="w-nav-link" href="upload.html" id="uploadLink"><strong>Upload Media</strong></a><a class="w-nav-link" href="messages.html" id="messagesLink"><strong>Messages</strong></a>
    <div class="w-dropdown" data-delay="0" data-hover="1">
        <div class="w-dropdown-toggle" id="browseDropDown">
            <div><strong>Browse</strong>
            </div>
            <div class="w-icon-dropdown-toggle"></div>
        </div>
        <nav class="w-dropdown-list"><a class="dropdown-link w-dropdown-link" href="browse_all.php"><strong>All Media</strong></a>
            <a class="w-dropdown-link" href="browse_videos.php"><strong>Videos</strong></a>
            <a class="w-dropdown-link" href="browse_pictures.php"><strong>Pictures</strong></a>
            <a class="w-dropdown-link" href="browse_audio.php"><strong>Audio</strong></a>
        </nav>
    </div>
</div>

<h1>Favorites</h1>

<?php
if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
} else {
    $user =  $_SESSION['glbl_user']->user_id;
    $sql = "SELECT data_id, user.username, data.* FROM user_favorite INNER JOIN user on user_favorite.user_id = user.user_id  INNER JOIN data on user_favorite.data_id=data.data_id WHERE user_favorite.user_id='$user';";
    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            echo '<div class="w-container">
    <div class="w-row">
      <div class="w-col w-col-6"><a class="link" href="#" id="faveLink">Favorites Link 1</a>
      </div>
      <div class="w-col w-col-6"><img class="image-2" id="removeImg" sizes="20px" src="../images/milker-X-icon.png" srcset="../images/milker-X-icon-p-500.png 500w, ../images/milker-X-icon-p-800.png 800w, ../images/milker-X-icon.png 2400w" width="20">
      </div>
    </div>
  </div>'  ;
            echo json_encode($rowData);
            $data_id = $rowData['data_id'];
            $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$data_id' and data_tag.tag_id=tag.tag_id;";
            if ($resultTag = mysqli_query($conn, $sql)) {
                while ($rowTag = mysqli_fetch_assoc($resultTag)) {
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