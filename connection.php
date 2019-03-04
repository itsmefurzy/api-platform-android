<?php

  define('HOST','localhost');
  define('USER','fazilmua_blog');
  define('PASS','fazilmuammar007');
  define('DB','fazilmua_blog');
  $conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

  date_default_timezone_set("Asia/Jakarta");
?>