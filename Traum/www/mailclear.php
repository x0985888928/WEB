<?php


  mysqli_close($link);
  $link = mysqli_connect('localhost', 'project', '0931821282','traum');
  mysqli_select_db($link, 'traum') or die("db");
  mysqli_query($link,"SET CHARACTER SET utf8");
  $sql = "SELECT * FROM `聊天室`  WHERE `收方` = '$ac' AND `已讀與否`";
  $result = mysqli_query($link, $sql) or die("qdueary");
  $num=mysqli_num_rows($result);
  echo "(".$num.")";

?>
