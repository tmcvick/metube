<?php
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('/home/tmcvick/public_html/'));

foreach ($iterator as $item) {
    chmod($item, 0755);
}
session_start();
if (isset($_SESSION['glbl_user'])) {
    header("Location: ./browse_all.php"); /* Redirect browser */
    exit();
}

?>
<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58e64e9e44b92de142263991" data-wf-site="58e64e9e44b92de142263990">
<head>
    <meta charset="utf-8">
    <title>Metube</title>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Webflow" name="generator">
    <link href="../css/normalize.css" rel="stylesheet" type="text/css">
    <link href="../css/webflow.css" rel="stylesheet" type="text/css">
    <link href="../css/metube-80047b.webflow.css" rel="stylesheet" type="text/css">
    <script src="../js/modernizr.js" type="text/javascript"></script>
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">
<div class="section-3">
    <div class="w-row">
        <div class="w-col w-col-1"><img src="../images/paw.png" width="64">
        </div>
        <div class="column-2 w-col w-col-11">
            <h3 class="heading-7">Team U9</h3>
        </div>
    </div>
</div>
<h1 class="heading">&nbsp;&nbsp;&nbsp;&nbsp;Welcome to MeTube</h1>
<div class="div-block-7"></div>
<div class="w-form">
    <form class="form-3" data-name="Email Form" id="email-form" method="post" name="email-form" action="../login.php">
        <label class="field-label" for="user" id="usernameLbl">Username</label>
        <input class="text-field w-input" data-name="user" id="user" maxlength="256" name="user"
               placeholder="Enter your login username" required="required" type="text">
        <label class="field-label-2" for="pass" id="passwordLbl">Password</label>
        <input class="text-field-2 w-input" data-name="pass" id="pass" maxlength="256" name="pass"
               placeholder="Enter your password" required="required" type="password">
        <button class="button-5 w-button" type="submit" id="loginBtn">Login</button>
        <div class="div-block-3"></div>
    </form>
</div>
<div class="div-block-8"></div>
<div class="section">
    <h4 class="heading-4" id="accountLbl">Don't have an account?</h4>
    <div class="div-block"><a class="button w-button" href="registration.html" id="registerBtn">Register</a>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
<script src="../js/webflow.js" type="text/javascript"></script>
<!-- [if lte IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>