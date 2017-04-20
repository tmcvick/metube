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
        echo '<div class="w-container">' . $sql['keyword'] . ' </div>';
    }
    else
    {
        //this is a data object
        $title = $sql['title'];
        $data_id = $sql['data_id'];
        $description = $sql['description'];
        echo '<br>';
        /*echo json_encode($sql);*/
       echo '<div class="w-container">
            <div class="w-col w-col-6"><a class="link-2" href="view_data.php?data_id=' . $data_id . '"id="title" style="font-size: 30px">' . $title . '  </a>
             <input class="textarea" data-name="title" id="title" maxlength="256" name="pword"
                   value="' . $description . '" type="text" >
           </div>
           </div>';
    }
    return;
}

?>