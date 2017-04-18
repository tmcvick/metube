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
                        <form data-name="Search Form" id="search_form" name="search_form" method="post" action="search_results.php">
                            <div class="row w-row">
                                <div class="column-3 w-col w-col-10">
                                    <input class="text-field-7 w-input" data-name="keyword" id="keyword" maxlength="256" name="keyword" placeholder="Enter your search criteria" type="text" required>
                                </div>
                                <div class="column-4 w-col w-col-2"><button class="button w-button" type="submit" id="searchBtn">Search</button>
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
        <nav class="w-dropdown-list">
            <a class="w-dropdown-link" href="my_channel.php"><strong>All Media</strong></a>
            <?php
            include_once "../php/include.php";
            echo '<a class="w-dropdown-link" href="browse_videos.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Videos</strong></a>';

            echo '<a class="w-dropdown-link" href="browse_pictures.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Pictures</strong></a>';
            echo '<a class="w-dropdown-link" href="browse_audio.php?user_id=' . $_SESSION["glbl_user"]->user_id . '"><strong>Audio</strong></a>';

            ?>
            <a class="w-dropdown-link" href="list_playlists.php"><strong>Playlists</strong></a>
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