<?php

		header("Content-Type:text/html;charset=utf-8");
 		$acc=$_GET['acc'];
 		$acc2=$_GET['acc2'];
		$in=$_GET['in'];
 		$text=$_GET['ss'];
		$num=$_GET['num'];

    $link = mysqli_connect('localhost', 'project', '0931821282','traum');
    mysqli_select_db($link, 'traum') or die("db");
    mysqli_query($link,"SET CHARACTER SET utf8");
		$sql1 = "UPDATE `訂單` SET `表評價`= 0 WHERE `編號`='$num'";
		$result1 = mysqli_query($link, $sql1) or die("qdueary1");
    $sql2 = "SELECT * FROM `評論` WHERE 1 ";
    $result2 = mysqli_query($link, $sql2) or die("qdueary2");
    $nn = mysqli_num_rows($result2);
		$nn = $nn+1;

    $sql3 = "INSERT INTO `評論`(`編號`,`受評人`, `評論者`, `內容`, `評價`, `日期`, `訂單編號`, `表演`) VALUES  ('$nn','$acc2','$acc','$text','$in','2019-06-15','$num','0')";
		//echo $sql3;
    $result3 = mysqli_query($link, $sql3) or die("qdueary3");
		//echo "good";
?>
