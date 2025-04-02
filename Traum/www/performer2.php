<?php
session_start();
if (isset($_GET["p"]))
{
   $performer = $_GET["p"];

}
$link = mysqli_connect('localhost', 'project', '0931821282','traum') or die("con");
mysqli_select_db($link, 'traum') or die("db");
mysqli_query($link,"SET CHARACTER SET utf8");
$sql = "SELECT * FROM `會員` JOIN `表演者` WHERE `會員`.`帳號` = '$performer' and `表演者`.`帳號` = '$performer' ";
$result = mysqli_query($link, $sql) or die("qdueary");
$row = mysqli_fetch_assoc($result);
mysqli_close($link);
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="Shortcut Icon" type="image/x-icon" href="img/page_logo.png" >
  <title>Traum築夢娛樂</title>
  <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="./slick/slick-theme.css">
  <link rel="stylesheet" href="./slick/slick.css">
  <link rel="stylesheet" href="./css/performerStyle.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>
  <script src="./slick/slick.min.js" charset="utf-8"></script>
</head>
<body>
  <div id="title">
    <img src="./img/icon/icon_menu2.png" alt="" id="menuIcon">
    <img src="./img/Logo.png" alt="" id="Logo" onclick="javascript:location.href='index.php' ">
    <div id="memberBox">
      <img src="
      <?php
      if(isset($_SESSION['account']))
      {
        $ac=$_SESSION['account'];
        $link = mysqli_connect('localhost', 'project', '0931821282','traum');
        mysqli_select_db($link, 'traum') or die("db");
        mysqli_query($link,"SET CHARACTER SET utf8");
        $sql = "SELECT * FROM `會員`  WHERE `帳號` = '$ac'";
        $result = mysqli_query($link, $sql) or die("qdueary");
        $row1 = mysqli_fetch_assoc($result);
        if($row1['圖片'] == "")
         echo "./img/member.png";
       else
         echo $row1['圖片'];
        mysqli_close($link);
      }
      else
      {
         echo "./img/member.png";
      }

      ?>" alt="">
      <p id="userName"><?php
      if(isset($_SESSION['account']))
         echo $row1['姓名'];
      else
         echo "訪客";
  ?></p>
      <a href="
      <?php
         if(isset($_SESSION['account']))
            echo "logout.php";
         else
            echo "login.php";

      ?>
      " id="session">
      <?php
         if(isset($_SESSION['account']))
            echo "LogOut";
         else
            echo "Login";

      ?></a>
      <a href="
      <?php
         if(isset($_SESSION['account']))
         {
            echo "memberArea.php";
         }
         else
            echo "login.php";
      ?>
      "><img src="./img/icon/icon_member.png" alt=""></a>
      <a href="
      <?php
         if(isset($_SESSION['account']))
         {
            echo "mailBox.php";
         }
         else
            echo "login.php";
      ?>
      "><img src="./img/icon/icon_mail.png" alt="">
      <p id="unread"><?php
			if(isset($_SESSION['account']))
			{
				$ac=$_SESSION['account'];
			//	echo "ds";
		
				$link = mysqli_connect('localhost', 'project', '0931821282','traum');
				mysqli_select_db($link, 'traum') or die("db");
				mysqli_query($link,"SET CHARACTER SET utf8");
				$sql = "SELECT * FROM `聊天室`  WHERE `收方` = '$ac' AND `已讀與否`";
				$result = mysqli_query($link, $sql) or die("qdueary");
				$num=mysqli_num_rows($result);
				echo "(".$num.")";//echo"sdf";
			}
			else {
				echo "(X)";
			}

			?></p></a>
    </div>
  </div>
  <nav>
    <li><a href="./search.php">搜尋</a></li>
    <li><a href="./index.php">聯絡我們</a></li>
    <li><a href="./ranking.php">排行榜</a></li>
    <li><a href="./index.php">最新消息</a></li>
    <li><a href="./index.php">常見問題</a></li>
  </nav>
  <div id="leftBox">
    <img id="memImg" src = "<?php


      $link = mysqli_connect('localhost', 'project', '0931821282','traum');
      mysqli_select_db($link, 'traum') or die("db");
      mysqli_query($link,"SET CHARACTER SET utf8");
      $sql = "SELECT * FROM `表演者` JOIN`會員` ON`表演者`.`帳號`=`會員`.`帳號` WHERE `會員`.`帳號` = '$performer' LIMIT 1";
      $result = mysqli_query($link, $sql) or die("qdueary");
      if(mysqli_num_rows($result)!=0)
      {
        while($row = mysqli_fetch_assoc($result))
        {
              echo $row['圖片'];
        }
      }
      else {
        echo "./img/banner-06.png";
      }

      mysqli_close($link);


    ?>" alt="">
    <div id="member">
      <p><?php


        $link = mysqli_connect('localhost', 'project', '0931821282','traum');
        mysqli_select_db($link, 'traum') or die("db");
        mysqli_query($link,"SET CHARACTER SET utf8");
        $sql = "SELECT * FROM `表演者` WHERE `帳號` = '$performer'";
        $result = mysqli_query($link, $sql) or die("qduearrrryyyy");
        if(mysqli_num_rows($result)!=0)
        {
          while($row = mysqli_fetch_assoc($result))
          {
                echo $row['藝名'];
          }
        }
        mysqli_close($link);
      ?> </p>
      <img src="./img/icon/star.png" alt="">
      <p><?php

      $link = mysqli_connect('localhost', 'project', '0931821282','traum');
      mysqli_select_db($link, 'traum') or die("db");
      mysqli_query($link,"SET CHARACTER SET utf8");
      $sql2 = "SELECT * FROM `評論` where `受評人` = '$performer' AND `表演` = '1'";
      $result = mysqli_query($link, $sql2) or die("qdueary");
      $nummm = mysqli_num_rows($result);

      if($nummm==0)
      {
          echo "0";
      }
      else
      {
        $rrr=0;
        while($row2 = mysqli_fetch_assoc($result))
            $rrr=$rrr+$row2['評價'];
	$final=$rrr/$nummm;
	

        echo round($final ,1);
      }

      ?></p>
    </div>
    <div id="estimate">
      <a href="
      <?php
      if(isset($_SESSION['account']))
      {
         echo "./estimate.php?p=".$performer;
      }
      else
      {
          echo "";
      }
      ?>
      ">預約表單</a></div>
    <div class="textBox">

    </div>
    <div class="textBox">
      <h1>收費<br>標準</h1>
      <h3>CHARGE</h3>
    </div>
    <div class="textBox">
      <h1>活動<br>照片</h1>
      <h3>PICTURES</h3>
    </div>
    <div class="textBox">
      <h1>活動<br>影片</h1>
      <h3>FILMS</h3>
    </div>
    <div class="textBox">
      <h1>評價</h1>
      <h3>EVALUATE</h3>
    </div>
  </div>
  <div id="rightBox">
    <div id="intro">
      <?php


        $link = mysqli_connect('localhost', 'project', '0931821282','traum');
        mysqli_select_db($link, 'traum') or die("db");
        mysqli_query($link,"SET CHARACTER SET utf8");
        $sql = "SELECT * FROM `表演者` WHERE `帳號` = '$performer'";
        $result = mysqli_query($link, $sql) or die("qdueary");
        $row = mysqli_fetch_assoc($result);
        echo $row['自介']."<br><br>".$row['經歷'];


        mysqli_close($link);
      ?>
    </div>
    <div id="charge">

      <?php
      if(isset($_SESSION['account'])){
        $ac=$_SESSION['account'];
        $link = mysqli_connect('localhost', 'project', '0931821282','traum');
        mysqli_select_db($link, 'traum') or die("db");
        mysqli_query($link,"SET CHARACTER SET utf8");
        $sql = "SELECT * FROM `收費方案`  WHERE `帳號` = '$performer'";
        $result = mysqli_query($link, $sql) or die("qdueary");
      //	$row1 = mysqli_fetch_assoc($result);
        $i=1;
        while($row1 = mysqli_fetch_assoc($result)){

          echo " ".$i.".   ";
          echo $row1['名稱'];
          echo "  ";
          echo $row1['長度'];
          echo "分鐘  ";
          echo $row1['金額'];
          echo "元<br>";
          $i++;
        }
        mysqli_close($link);
      }
      ?>

    </div>
    <div id="imgbox">
      <div class="single-item">
      <?php


          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
          mysqli_select_db($link, 'traum') or die("db");
          mysqli_query($link,"SET CHARACTER SET utf8");
          $sql = "SELECT * FROM `表演者照片` WHERE `帳號` = '$performer' ";
          $result = mysqli_query($link, $sql) or die("qdueary");
          if(mysqli_num_rows($result)!=0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
                  echo
                  "<div><img src="."".$row['照片路徑'].""."></div>";
              }
          }
          else
          {
            echo "./img/banner-01.png";
          }

          mysqli_close($link);


        ?>
        <ul class="slick-dots" style="display: block;" role="tablist">
          <li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation00" id="slick-slide00">
          <button type="button" data-role="none" role="button" tabindex="0">1</button></li>
          <li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation01" id="slick-slide01">
            <button type="button" data-role="none" role="button" tabindex="0">2</button></li>
          <li aria-hidden="true" role="presentation"></li>
        </ul>
      </div>
    </div>
    <div id="videoBox">
  		<div class="adVideo">
  			<iframe src="<?php


          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
          mysqli_select_db($link, 'traum') or die("db");
          mysqli_query($link,"SET CHARACTER SET utf8");
          $sql = "SELECT * FROM `表演者` JOIN `表演者影片` ON `表演者`.`帳號`=`表演者影片`.`帳號` WHERE `表演者`.`帳號` = '$performer'  LIMIT 1";
          $result = mysqli_query($link, $sql) or die("qdueary");
          if(mysqli_num_rows($result)!=0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
                  echo $row['影片'];
            }
          }

          mysqli_close($link);


        ?>" frameborder="0" allowfullscreen></iframe>
  		</div>
    </div>
    <div id="commemt">
      <div class="rateBox">
        <div class="howMuch" style= "width:<?php
        $link = mysqli_connect('localhost', 'project', '0931821282','traum');
        mysqli_select_db($link, 'traum') or die("db");
        mysqli_query($link,"SET CHARACTER SET utf8");
        $sql2 = "SELECT * FROM `評論` where `受評人` = '$performer' AND `表演` = '1'";
        $result = mysqli_query($link, $sql2) or die("qdueary");
        $nummm = mysqli_num_rows($result);

        if($nummm==0)
        {
            echo "0";
        }
        else
        {
          $rrr=0;
          while($row2 = mysqli_fetch_assoc($result))
              $rrr=$rrr+$row2['評價'];

          echo $rrr/$nummm*20;
        }

        ?>%"></div>
        <img src="./img/icon/rateStar.png" alt="">
      </div>
      <p>
      <?php

      $link = mysqli_connect('localhost', 'project', '0931821282','traum');
      mysqli_select_db($link, 'traum') or die("db");
      mysqli_query($link,"SET CHARACTER SET utf8");
      $sql2 = "SELECT * FROM `評論` where `受評人` = '$performer' AND `表演` = '1'";
      $result = mysqli_query($link, $sql2) or die("qdueary");
      $nummm = mysqli_num_rows($result);

      if($nummm==0)
      {
          echo "0";
      }
      else
      {
        $rrr=0;
        while($row2 = mysqli_fetch_assoc($result))
            $rrr=$rrr+$row2['評價'];
	$final=$rrr/$nummm;
	

        echo round($final ,1);
      }

      ?>/5</p>
      <div id="starNum">
        <span>1星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer' and `評價`=1 and `表演`= '1' ";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_num_rows($result);

          echo $row;
          ?>)</span>
        <span>2星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer' and `評價`=2 and `表演`= '1' ";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_num_rows($result);

          echo $row;
          ?>)</span>
        <span>3星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer' and `評價`= 3 and `表演`= '1' ";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_num_rows($result);

          echo $row;
          ?>)</span>
        <span>4星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer' and `評價`= 4 and `表演`= '1' ";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_num_rows($result);

          echo $row;
          ?>)</span>
        <span>5星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer' and `評價`= 5 and `表演`= '1' ";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_num_rows($result);

          echo $row;
          ?>)</span>
        <span>評論(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer' and `表演`= '1' ";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_num_rows($result);

          echo $row;
          ?>)</span>
      </div>
      <?php
      //onClick = "."location.href='performer2.php?p=".$row[帳號]."'"."
      $link = mysqli_connect('localhost', 'project', '0931821282','traum');
      mysqli_select_db($link, 'traum') or die("db");
      mysqli_query($link,"SET CHARACTER SET utf8");
      $sql = " SELECT * FROM `評論` , `會員` WHERE `受評人`= '$performer' and `表演`= '1' and `會員`.`帳號` =`評論`.`評論者` ";
      $result = mysqli_query($link, $sql) or die("qdueary");
      while($row = mysqli_fetch_assoc($result))
      {
        $f=$row[評價]*20;
        echo "<table class="."commemt".">
          <tr>
            <td rowspan="."3"." width="."20%".">
              <img src="."".$row[圖片].""."   >
            </td>
          </tr>
          <tr>
            <td>
              <div class="."rateBox".">
                <div class="."howMuch"." style = "."width:".$f."%"."></div>
                <img src="."./img/icon/yellowStar.png"." alt=".">
              </div>
            </td>
          </tr>
          <tr>
            <td><div class="."content".">".$row[內容]."</div></td>
          </tr>
        </table>";
      }

      ?>

<!--      <table class="commemt">
        <tr>
          <td rowspan="3" width="20%">
            <img src="<?php
              /*  $link = mysqli_connect('localhost', 'project', '0931821282','traum');
      					mysqli_select_db($link, 'traum') or die("db");
      					mysqli_query($link,"SET CHARACTER SET utf8");
      					$sql = "SELECT * FROM `評論` JOIN `會員` ON `評論`.`評論者`=`會員`.`帳號`  WHERE `受評人`= '$performer' and  `表演`= '1' ";
      					$result = mysqli_query($link, $sql) or die("qdueary");
      					$row1 = mysqli_fetch_assoc($result);

      					echo "$row1[圖片]";
                mysqli_close($link);
                ?>"
                <?php echo "onClick = "."location.href='performer2.php?p=$row1[帳號]'"."";?> alt="">
          </td>
        </tr>
        <tr>
          <td>
            <div class="rateBox">
              <div class="howMuch" style = "width:<?php
            $link = mysqli_connect('localhost', 'project', '0931821282','traum');
  					mysqli_select_db($link, 'traum') or die("db");
  					mysqli_query($link,"SET CHARACTER SET utf8");
  					$sql5 = "SELECT * FROM `評論` WHERE `受評人`='$performer'";
  					$result5 = mysqli_query($link, $sql5) or die("qdueary");
  					$row5 = mysqli_fetch_assoc($result5);
  					$k=$row5['評價']*20;
            echo $k;*/
            ?>%"></div>
              <img src="./img/icon/yellowStar.png" alt="">
            </div>
          </td>
        </tr>
        <tr>
          <td><div class="content"><?php
      /*   $link = mysqli_connect('localhost', 'project', '0931821282','traum');
         mysqli_select_db($link, 'traum') or die("db");
         mysqli_query($link,"SET CHARACTER SET utf8");
         $sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer'";
         $result = mysqli_query($link, $sql) or die("qdueary");
         $row = mysqli_fetch_assoc($result);

         echo $row['內容'];*/
         ?></div></td>
        </tr>
      </table> -->
    </div>
  </div>
<!--
  <div id="Footer">
    <p>Copyright © 2015-2017 Traum All rights reserved</p>
  </div> -->
  <script type="text/javascript">
      $('.single-item').slick();

      $('.slider-for').slick({
       slidesToShow: 1,
       slidesToScroll: 1,
       arrows: false,
       fade: true,
       asNavFor: '.slider-nav'
      });
      $('.slider-nav').slick({
       slidesToShow: 3,
       slidesToScroll: 1,
       asNavFor: '.slider-for',
       dots: true,
       centerMode: true,
       focusOnSelect: true
      });
    </script>
</body>
</html>
