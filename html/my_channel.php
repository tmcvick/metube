<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com -->
<!--  Last Published: Mon Apr 17 2017 01:36:56 GMT+0000 (UTC)  -->
<html data-wf-page="58ec496d3007283413b397cb" data-wf-site="58e64e9e44b92de142263990">
<head>
  <meta charset="utf-8">
  <title>Channel</title>
  <meta content="Channel" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="../css/normalize.css" rel="stylesheet" type="text/css">
  <link href="../css/webflow.css" rel="stylesheet" type="text/css">
  <link href="../css/metube-80047b.webflow.css" rel="stylesheet" type="text/css">
  <script src="../js/modernizr.js" type="text/javascript"></script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body data-ix="new-interaction">
  <div class="section-2">
    <div class="row-3 w-row">
      <div class="w-col w-col-1"><img src="../images/paw.png" width="64">
      </div>
      <div class="column w-col w-col-11">
        <div class="w-row">
          <div class="w-col w-col-6">
            <h3 class="heading-6">Team U9</h3>
          </div>
          <div class="w-col w-col-6">
            <div class="w-form">
              <form data-name="Email Form 2" id="email-form-2" name="email-form-2">
                <div class="row w-row">
                  <div class="column-3 w-col w-col-10">
                    <input class="text-field-7 w-input" data-name="searchTxt" id="searchTxt" maxlength="256" name="searchTxt" placeholder="Enter your search criteria" type="text">
                  </div>
                  <div class="column-4 w-col w-col-2"><a class="button w-button" href="search-results.html" id="searchBtn">Search</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
    <div class="w-dropdown" data-delay="0" data-hover="1">
      <div class="w-dropdown-toggle" id="channelDropDown">
        <div><strong>My Channel</strong>
        </div>
        <div class="w-icon-dropdown-toggle"></div>
      </div>
      <nav class="w-dropdown-list"><a class="dropdown-link w-dropdown-link" href=""><strong>All Media</strong></a>
        <a class="w-dropdown-link" href="browse-all-videos.html"><strong>Videos</strong></a>
        <a class="w-dropdown-link" href="browse-all-pictures.html"><strong>Pictures</strong></a>
        <a class="w-dropdown-link" href="view-all-audio.html"><strong>Audio</strong></a>
        <a class="w-dropdown-link" href="browse-playlists.html"><strong>Playlists</strong></a>
        <a class="w-dropdown-link" href="browse-favorites.html"><span><strong>Favorites</strong></span></a>
      </nav>
    </div>
    <nav class="w-nav-menu" role="navigation"><a class="w-nav-link" href="view-profile.html" id="profileLink"><strong>My Profile</strong></a>
      <a class="nav-link w-nav-link" href="../php/logout.php"><strong id="logoutLink">Logout</strong></a>
    </nav>
    <div class="w-nav-button">
      <div class="w-icon-nav-menu"></div>
    </div><a class="w-nav-link" href="upload.html" id="uploadLink"><strong>Upload Media</strong></a><a class="w-nav-link" href="messages.html" id="messagesLink"><strong>Messages</strong></a>
  </div>
  <div class="w-dropdown" data-delay="0" data-hover="1">
      <div class="w-dropdown-toggle" id="browseDropDown">
          <div><strong>Browse</strong>
          </div>
          <div class="w-icon-dropdown-toggle"></div>
      </div>
      <nav class="w-dropdown-list"><a class="dropdown-link w-dropdown-link" href="browse_all.php"><strong>All Media</strong></a>
          <a class="w-dropdown-link" href="browse-all-videos.html"><strong>Videos</strong></a>
          <a class="w-dropdown-link" href="browse-all-pictures.html"><strong>Pictures</strong></a>
          <a class="w-dropdown-link" href="view-all-audio.html"><strong>Audio</strong></a>
      </nav>
  </div>
  <h1>My Channel</h1>
  
  <?php
      include_once "../php/include.php";

      if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
          echo '<script language="javascript">';
          echo 'alert("User not logged in!")';
          echo '</script>';
          header("Location: ../login.php"); /* Redirect browser */
          exit();
      } else {
          $user =  $_SESSION['glbl_user']->user_id;
          $sql = "SELECT * FROM data WHERE user_id = '$user'";
          if ($resultData = mysqli_query($conn, $sql)) {
              //echo json_encode($resultData);
              while ($rowData = mysqli_fetch_assoc($resultData)) {
                  echo json_encode($rowData);
                  $data_id = $rowData['data_id'];
                  $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$data_id' and data_tag.tag_id=tag.tag_id;";
                  if ($resultTag = mysqli_query($conn, $sql)) {
                      while ($rowTag = mysqli_fetch_assoc($resultTag)) {
                          echo '<br>';
                          echo json_encode($rowTag);
                      }
                  } else {
                      echo "Error with getting tags <br>";
                      echo $conn->error;
                  }
                  echo '<br>';
              }
          } else {
              echo "Error with getting data <br>";
              echo $conn->error;
          }
      }

      ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="../js/webflow.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>