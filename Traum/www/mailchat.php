<?php
  header("Content-Type:text/html;charset=utf-8");
   $acc=$_GET['acc'];
   $acc2=$_GET['acc2'];

   $link = mysqli_connect('localhost', 'project', '0931821282','traum');
   mysqli_select_db($link, 'traum') or die("db");
   mysqli_query($link,"SET CHARACTER SET utf8");
   $sql9= "SELECT * FROM `聊天室` WHERE  `收方`= '$acc' AND `送方` = '$acc2' AND `已讀與否`= 1";
   $result9 = mysqli_query($link, $sql9) or die("quearyddddd4");
  // echo $sql;
   while($row9 = mysqli_fetch_assoc($result9))
   {
        $sql1 = "DELETE FROM `聊天室` WHERE `收方`= '$row9[收方]' AND `送方` = '$row9[送方]' AND `已讀與否`= '1' AND `日期`= '$row9[日期]' ";
        $result1 = mysqli_query($link, $sql1) or die("quearyddd4");
        $sql2 = "INSERT INTO `聊天室`(`送方`, `收方`, `內容`, `日期`, `已讀與否`, `編號`) VALUES ('$row9[送方]','$row9[收方]','$row9[內容]','$row9[日期]','0','0') ";
        $result2 = mysqli_query($link, $sql2) or die("quearydddd4");
      //  echo $sql1;
      //  echo $sql2;
   }


   $link = mysqli_connect('localhost', 'project', '0931821282','traum');
   mysqli_select_db($link, 'traum') or die("db");
   mysqli_query($link,"SET CHARACTER SET utf8");
   $sql1= "SELECT * FROM `會員` WHERE `帳號`= '$acc2' ";

   $result1 = mysqli_query($link, $sql1) or die("quearyddddd4");
   $row1 = mysqli_fetch_assoc($result1);
   $sql = "SELECT * FROM `聊天室` WHERE (`收方`= '$acc' OR`送方`= '$acc' ) and (`收方`= '$acc2' OR`送方`= '$acc2') order by `日期` asc ";
   echo "<p>".$row1[姓名]."</p><div class="."QABox".">";
   $result = mysqli_query($link, $sql) or die("quearyddddd4");
   while($row = mysqli_fetch_assoc($result))
   {
      if($row['收方'] == $acc)
      {
         echo "
         <div class="."qus"." style="."margin-right:50%"." >".
         $row[內容]
         ."</div>
         ";
      }
      else
      {
        echo "
        <div class="."ans"." style="."margin-left:50%".">".
        $row[內容]
        ."</div>
        ";
      }
   }
   echo "
   </div><div id="."typeArea".">
     <textarea name="."name"." id="."area"." rows="."1"." cols="."80"."></textarea>
     <input class="."enter"." type="."button"." id="."sub"." value="."傳送訊息"." onclick ="."but(\"$acc2\");"." >
   </div></div>
   ";













?>
