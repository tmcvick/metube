<?php

/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/5/17
 * Time: 00:03
 */

session_save_path("/home/tmcvick/");
session_start();

$servername = "mysql1.cs.clemson.edu";
$username = "metube_tob";
$password = "pass123word";
$dbname = "metube_tmcvick";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (PDOException $e) {
    echo "Connection Failed\n", $e->getMessage();
}

function displayRow($sql)
{
    if (isset($sql['keyword'])) {
        //this is a tag
        echo $sql['keyword'] . ' &nbsp';
    } else {
        //this is a data object
        $title = $sql['title'];
        $data_id = $sql['data_id'];
        $description = $sql['description'];
        echo '<br>';
        /*echo json_encode($sql);*/

        echo '<a href="view_data.php?data_id=' . $data_id . '" style="text-decoration: none">
            <div class="w-container">
            <h2 style="color:#4e2c96">' . $title . '  </h2><h4 style="color:black">' . $description . '</h4>
           </div></a>';
    }
    return;
}

function displayPlaylistRow($sql)
{
    if (isset($sql['keyword'])) {
        //this is a tag
        echo $sql['keyword'] . ' &nbsp';
    } else {
        //this is a data object
        $title = $sql['title'];
        $data_id = $sql['data_id'];
        $description = $sql['description'];
        /*echo json_encode($sql);*/

        echo '<a href="view_data.php?data_id=' . $data_id . '" style="text-decoration: none">
            <div class="w-container" style="padding-left: 40px; margin-top: 0px; margin-bottom: 0px">
            <h3 style="color:#4e2c96">' . $title . '  </h3><h5 style="color:black; padding-left: 30px">' . $description . '</h5>
           </div></a>';
    }
    return;
}

function dieWithError($errorNo) {
    switch ($errorNo){
        case 1:
            ?>
            <script type="text/javascript">
                alert("Login failed!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/login.php";
            </script>
            <?php
        case 2:
            ?>
            <script type="text/javascript">
                alert("Failed to register user!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/registration.html";
            </script>
            <?php
        case 3:
            ?>
            <script type="text/javascript">
                alert("User is not logged in!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/login.php";
            </script>
            <?php
        case 4:
            //getting data
            ?>
            <script type="text/javascript">
                alert("Error getting data, exiting to homepage");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/my_channel.php";
            </script>
            <?php
        case 5:
            //sending msg
            ?>
            <script type="text/javascript">
                alert("Error while sending message: Message not sent");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/messages.php";
            </script>
            <?php
        case 6:
            //creating playlist
            ?>
            <script type="text/javascript">
                alert("Cannot create playlist!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/create_playlist.php";
            </script>
            <?php
        case 7:
            //getting playlist
            ?>
            <script type="text/javascript">
                alert("Cannot load playlists! Exiting to homepage");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/my_channel.php";
            </script>
            <?php
        case 8:
            //loading messages
            ?>
            <script type="text/javascript">
                alert("Cannot load messages! Exiting to homepage");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/my_channel.php";
            </script>
            <?php
        case 9:
            //updating user
            ?>
            <script type="text/javascript">
                alert("Error while updating user!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/view_profile.php";
            </script>
            <?php
        case 10:
            //file exists
            ?>
            <script type="text/javascript">
                alert("Error while uploading file: file already exists!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/upload.php";
            </script>
            <?php
        case 11:
            //file too big
            ?>
            <script type="text/javascript">
                alert("Error while uploading file: file exceeds the maximum file size!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/upload.php";
            </script>
            <?php
        case 12:
            //upload sql
            ?>
            <script type="text/javascript">
                alert("Error while uploading file!");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/upload.php";
            </script>
            <?php
        case 13:
            ?>
            <script type="text/javascript">
                alert("Error while sending message: User does not exist");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/messages.php";
            </script>
            <?php
        case 14:
            ?>
            <script type="text/javascript">
                alert("Error while adding file to favorites");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/browse_favorites.php";
            </script>
            <?php
        case 15:
            ?>
            <script type="text/javascript">
                alert("Error while adding file to playlist");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/list_playlists.php";
            </script>
            <?php
        case 16:
            ?>
            <script type="text/javascript">
                alert("Error while creating comment. Exiting to homepage");
                window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/my_channel.php";
            </script>
            <?php
    }
}

?>