<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 10:12
 */
include_once "include.php";
if(isset($_SESSION['glbl_user'])) {
    echo "user set: ";
    echo  $_SESSION['glbl_user'];
} else {
    echo 'User not set';
}