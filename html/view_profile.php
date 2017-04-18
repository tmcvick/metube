<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec58ee9eabec0740cf82f7" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>View Profile</title>
    <meta content="View Profile" property="og:title">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../css/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/metube-80047b.webflow.css" rel="stylesheet" type="text/css">
    <script src="../js/modernizr.js" type="text/javascript"></script>
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body>
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
        <nav class="w-dropdown-list"><a class="dropdown-link w-dropdown-link" href="my_channel.php"><strong>All Media</strong></a>
            <?php
            include_once "../php/include.php";
            echo '<a class="w-dropdown-link" href="browse_videos.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Videos</strong></a>';

            echo '<a class="w-dropdown-link" href="browse_pictures.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Pictures</strong></a>';
            echo '<a class="w-dropdown-link" href="browse_audio.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Audio</strong></a>';

            ?>
            <a class="w-dropdown-link" href="browse-playlists.html"><strong>Playlists</strong></a>
            <a class="w-dropdown-link" href="browse-favorites.html"><span><strong>Favorites</strong></span></a>
        </nav>
    </div>
    <nav class="w-nav-menu" role="navigation"><a class="w-nav-link" href="view_profile.php" id="profileLink"><strong>My Profile</strong></a>
        <a class="nav-link w-nav-link" href="../php/logout.php"><strong id="logoutLink">Logout</strong></a>
    </nav>
    <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
    </div><a class="w-nav-link" href="upload.html" id="uploadLink"><strong>Upload Media</strong></a>
    <a class="w-nav-link" href="messages.html" id="messagesLink"><strong>Messages</strong></a>
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
<div>
    <div class="row-2 w-row">
        <div class="column-8 w-col w-col-3">
            <label class="field-label-6">Name</label>
        </div>
        <div class="column-5 w-col w-col-3">
            <label class="field-label-7" for="email-2">Email Address</label>
        </div>
        <div class="column-6 w-col w-col-3">
            <label class="field-label-5" for="Username-3">Username</label>
        </div>
        <div class="column-7 w-col w-col-3">
            <div class="text-block-6"><strong>Channel Name</strong>
            </div>
        </div>
    </div>
</div>
<?php
$first = $_SESSION['glbl_user']->fname;
$last = $_SESSION['glbl_user']->lname;
$email = $_SESSION['glbl_user']->email;
$username = $_SESSION['glbl_user']->username;
$channel = $_SESSION['glbl_user']->channel_name;

echo '<div class="div-block-11"></div>
<div class="w-row">
    <div class="w-col w-col-3">
        <div class="text-block-10">';
    echo $first . " " . $last ;
    echo '</div>
    </div>
    <div class="w-col w-col-3">
        <div class="text-block-7">'   ;
echo $email  ;
echo '</div>
    </div>
    <div class="w-col w-col-3">
        <div class="text-block-8">' ;
echo $username ;
echo '</div>
    </div>
    <div class="w-col w-col-3">
        <div class="text-block-9">';
echo $channel;
echo '</div>
    </div>
</div> '  ;
?>

<div class="div-block-12"></div>
<div class="div-block-10"><a class="button-3 w-button" href="update-profile.html">Update Profile</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>