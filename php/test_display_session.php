<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 10:12
 */
include_once "include.php";
if(isset($_SESSION['glbl_user'])) {
    echo "user set: " . print_r($_SESSION, TRUE);

} else {
    echo 'User not set';
}