<?php

 header("Content-Type:text/html;charset=utf-8");
 $acc=$_GET['acc'];
 //echo $acc;
 $link = mysqli_connect('localhost', 'project', '0931821282','traum');
 mysqli_select_db($link, 'traum') or die("db");
 mysqli_query($link,"SET CHARACTER SET utf8");

 $sql = "SELECT `1`, MAX(`2`)FROM `123` GROUP BY `1` ";
 $result4 = mysqli_query($link, $sql) or die("queary5");
 while( $row4 = mysqli_fetch_assoc($result4) )
 {



    $link = mysqli_connect('localhost', 'project', '0931821282','traum');
    mysqli_select_db($link, 'traum') or die("db");
    mysqli_query($link,"SET CHARACTER SET utf8");

    $sql1 = "SELECT * FROM `聊天室` WHERE (`收方`= '$acc' OR`送方`= '$acc' ) and (`收方`= '$row4[1]' OR`送方`= '$row4[1]') order by `日期` desc ";
  //	echo $sql1;
    $result10 = mysqli_query($link, $sql1) or die("quearyddddd4");
    $row5 = mysqli_fetch_assoc($result10);
    $sql2 = "SELECT * FROM `會員` WHERE `帳號` = '$row4[1]' ";
    $result = mysqli_query($link, $sql2) or die("queary84");
    $row6 = mysqli_fetch_assoc($result);

    echo "
    <div class="."previewBox"."  id ="."$row4[1]"." >
      <img src="."$row6[圖片]"." onclick="."talk(\"$row4[1]\");".">
      <p  id ="."$row4[1]"." onclick="."c();"." class = ";

      if($row5["已讀與否"] == 1 && $row5['收方'] == $acc)
      {
        echo " \"Name unread\" ";
      }
      else
      {
        echo " \"Name\" ";
      }
      echo ">$row6[姓名]</p>
    <div id ="."$row4[1]"." class=";
    if($row5["已讀與否"] == 1 && $row5["收方"] == $acc)
    {
      echo " \"preview unread \" ";
    }
    else
    {
      echo " \"preview\" ";
    }
    echo ">$row5[內容]</div>
    </div>";



 }
 mysqli_query($link, "DELETE FROM `123` WHERE 1") or die("queary1");
 ?>
