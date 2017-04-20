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
        echo '<br>';
        /*echo json_encode($sql);*/

        echo '<a href="view_data.php?data_id=' . $data_id . '" style="text-decoration: none; padding:20px">
            <div class="w-container">
            <h4 style="color:#4e2c96">' . $title . '  </h4><h6 style="color:black">' . $description . '</h6>
           </div></a>';
    }
    return;
}

?>