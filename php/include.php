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
        $title = $sql['name'];
        $playlist_id = $sql['playlist_id'];
        echo '<br>';
        /*echo json_encode($sql);*/

        echo '<div class="w-container">
                <div class="w-row">
                        <div class="w-col w-col-6"><a class="link-3" href="#" id="playlistTitleTxt">' . $title . '</a>
                        </div>
                        <div class="w-col w-col-6"><a href="../php/remove_playlist.php?pl_id=' . $playlist_id . '"><img  class="image-2" id="removeImg" sizes="20px" src="../images/milker-X-icon.png" srcset="../images/milker-X-icon-p-500.png 500w, ../images/milker-X-icon-p-800.png 800w, ../images/milker-X-icon.png 2400w" width="20"></a>
                        </div>
                    </div>
           </div>';
    return;
}

?>