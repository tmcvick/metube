<?php

/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/5/17
 * Time: 00:03
 */
 
  $servername = "mysql1.cs.clemson.edu";
  $username = "metube_tob";
  $password = "pass123word";
  $dbname = "metube_tmcvick";

  try {
      $conn = new mysqli($servername, $username, $password, $dbname);
  } catch (PDOException $e) {
      echo "Connection Failed\n", $e->getMessage();
  }
?>