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
        echo " tag keyword: " . $sql['keyword'];
    }
    else
    {
        //this is a data object
        $title = $sql['title'];
        $description = $sql['description'];
        echo '<br>';
        /*echo json_encode($sql);*/
       echo '<div class="w-container">

            <input class="text-field-6 w-input" data-name="title" id="title" maxlength="256" name="pword"
                   value="' . $title . ''" type="text">
            <input type="hidden" value="<?= $id ?>" name="id" id="id">
           </div>';
    }
    return;
}

?>