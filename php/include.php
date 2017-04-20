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
            <label for="email">Email Address:</label>
            <input class="text-field-4 w-input" data-name="email" id="email" maxlength="256" name="email"
                   value="<?= $email ?>" required="required" type="email">
            <label for="uname">Username:</label>
            <input class="text-field-5 w-input" data-name="uname" id="uname" maxlength="256" name="uname"
                   value="<?= $username ?>" required="required" type="text">
            <label class="lastnamelbl" for="channel">Channel Name:</label>
            <input class="text-field-5 w-input" data-name="channel" id="channel" maxlength="256" name="channel"
                   value="<?= $channel ?>" required="required" type="text">
            <label for="pword">Password:</label>
            <input class="text-field-6 w-input" data-name="pword" id="pword" maxlength="256" name="pword"
                   placeholder="Enter your new (or old) password" required="required" type="password">
            <input type="hidden" value="<?= $id ?>" name="id" id="id">
            <div class="div-block-9">
                <button class="button-4 w-button" type="submit">Save Changes</button>
                <a class="button-12 w-button" href="view_profile.php">Cancel</a>
            </div>
        </form>
    </div>
</div>';
    }
    return;
}

?>