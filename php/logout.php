<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 10:01
 */
session_unset();
session_destroy();
header("Location: ../login.php"); /* Redirect browser */
exit();