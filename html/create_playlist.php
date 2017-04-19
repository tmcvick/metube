<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58f05a791547a019bd5ee133" data-wf-site="58e64e9e44b92de142263990">
<head>
  <meta charset="utf-8">
  <title>Create Playlist</title>
  <meta content="Create Playlist" property="og:title">
  <?php
    include "meta.php";
    ?>
</head>

<?php
include "header.php";
?>
<div class="w-form">
    <form class="form-6" data-name="Email Form 3" id="email-form-3" name="email-form-3" action="../php/create_playlist.php" method="post">
      <label for="pl_name" id="playlistLbl">Playlist Name</label>
      <input class="text-field-11 w-input" data-name="pl_name" id="pl_name" maxlength="256" name="pl_name" placeholder="Enter the name of your playlist" required type="text">
      <div class="w-container">
        <div class="w-row">
          <div class="column-14 w-col w-col-6"><button class="button-8 w-button" type="submit" id="createBtn">Create</button>
          </div>
          <div class="column-13 w-col w-col-6"><a class="button-10 w-button" href="list_playlists.php" id="cancelBtn">Cancel</a>
          </div>
        </div>
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>