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
    <div class="form-wrapper w-clearfix w-form">
        <form class="form-2" data-name="Display Data Form" id="wf-form-Display-Data-Form"
              name="wf-form-Display-Data-Form" method="post">
            <div class="w-row">
                <div class="column-9 w-col w-col-6">
                    <label class="lastnamelbl" for="title"><?php echo $title; ?></label>
                </div>
                <div class="column-10 w-col w-col-6">
                    <label class="lastnamelbl" for="lname"><?php echo $description; ?></label>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>';
    }
    return;
}

?>