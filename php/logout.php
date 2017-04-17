<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 10:01
 */
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header("Location: ../html/login.php"); /* Redirect browser */
exit();