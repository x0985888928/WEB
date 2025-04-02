<?php
  header("Content-Type:text/html;charset=utf-8");
   $acc=$_GET['acc'];
   $acc2=$_GET['acc2'];
   $text=$_GET['text'];

   $link = mysqli_connect('localhost', 'project', '0931821282','traum');
   mysqli_select_db($link, 'traum') or die("db");
   mysqli_query($link,"SET CHARACTER SET utf8");
   $sql= "INSERT INTO `聊天室` (`送方`, `收方`, `內容`, `日期`, `已讀與否`, `編號`) VALUES ('$acc', '$acc2', '$text', CURRENT_TIMESTAMP, '1', '0');";

   $result = mysqli_query($link, $sql) or die("quearyddddd4");


?>
