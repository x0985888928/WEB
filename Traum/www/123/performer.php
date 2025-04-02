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
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TRAUM</title>
  <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/performerStyle.css">
  <link rel="stylesheet" href="./slick/slick-theme.css">
  <link rel="stylesheet" href="./slick/slick.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>
  <script src="./slick/slick.min.js" charset="utf-8"></script>
</head>

<body>
  <?php
	if(isset($_SESSION['account']))
	{
		echo "<div id="."order".">
	    <a href="."estimate.php"."?p="."$performer"."><img src="."./img/order.png"." alt=".""."></a>
	  </div>";
	}
  else {
    echo "<div id="."order".">
	    <a href="."login.php"."><img src="."./img/order.png"." alt=".""."></a>
	  </div>";
  }
	if(isset($_SESSION['account']))
	{
    echo "<div id="."mail".">
	    <a href="."memberArea.php"."><img src="."./img/mailBox.png"." alt=".""."></a>
	  </div>";
  }
	?>
  <div id="Header">
    <div id="Menu">
      <div class="emptyBox"></div>
      <img src="./img/menu.png" alt=""></div>
    <div id="Logo">
			<a href="index.php"></a>
      <div id="MemberInfoPC">
        <div class="emptyBox"></div>
        <div class="MemberFace">
        <input type="image" src="
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
					echo $row1['圖片'];
					mysqli_close($link);
				}

				?>
        " style="border-radius:50%; width:50px; height:50px; outline:0;  " onClick="location.href='http://114.35.91.83/<?php if(isset($_SESSION['account'])) echo"memberArea.php";
				else echo"login.php";?>' " value=""  >
        </div>
        <?php
				if(isset($_SESSION['account']))
		{
			echo "<a href="."logout.php"." style="."text-align:center;line-height:20px;font-size:15px".">登出</a>";
			echo $row1['姓名'];
			echo "您好!";
		}
		else
		{
		    echo "<a href="."login.php"." style="."text-align:center;line-height:20px;font-size:15px"." >請登入</a>";
		}
		?>
      </div>
    </div>
    <div id="MemberInfo">
      <div class="emptyBox"></div>
      <a href="" style="border-radius:50%; width:50px; height:50px;" >
      </div></a>
    </div>
  </div>
  <nav>
    <a href="./aboutUs.php"><li id="aboutUs" class="navPic"></li></a>
    <a href="./news.php"><li id="news" class="navPic"></li></a>
    <a href="./search.php"><li id="search" class="navPic"></li></a>
    <a href="./ranking.php"><li id="ranking" class="navPic"></li></a>
    <a href="./q_a.php"><li id="q_a" class="navPic"></li></a>
  </nav>
  <div class="box">
    <div id="memberBox">
      <img src="
      <?php
      echo $row[圖片];
      ?>
      " alt="">

    </div>
    <div id="point">

    </div>
    <div id="imgbox">
      <div class="single-item">
        <?php


					$link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT * FROM `表演者照片`  WHERE `帳號` = '$performer'";
					$result = mysqli_query($link, $sql) or die("qdueary");
          if(mysqli_num_rows($result)!=0)
          {
            while($row = mysqli_fetch_assoc($result))
            {
                  echo "<div><img src="."".$row['照片路徑']." "."alt=".""."></div>";
            }
          }
          else {
            echo "<div><img src="."./img/banner-06.png"."></div>";
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
  </div>


	<div id="videoBox">
		<div class="adVideo">
      <iframe src="<?php
      if(isset($_SESSION['account']))
      {
        $ac=$_SESSION['account'];
        $link = mysqli_connect('localhost', 'project', '0931821282','traum');
        mysqli_select_db($link, 'traum') or die("db");
        mysqli_query($link,"SET CHARACTER SET utf8");
        $sql = "SELECT * FROM `表演者影片`  WHERE `帳號` = '$performer'";
        $result = mysqli_query($link, $sql) or die("qdueary");
        $row1 = mysqli_fetch_assoc($result);
        echo $row1['影片'];
        mysqli_close($link);
      }

      ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>

		</div>

  <!-- <div class="slider slider-for slick-initialized slick-slider"> -->
		<div aria-live="polite" class="slick-list draggable">
      <div class="slick-track" style="opacity: 1; width: 2800px;" role="listbox">
        <div class="slick-slide" data-slick-index="0" aria-hidden="true" style="transition: opacity 500ms ease; width: 560px; position: relative; left: 0px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1" role="option" aria-describedby="slick-slide120"><h3>1</h3></div>
        <div class="slick-slide" data-slick-index="1" aria-hidden="true" style="transition: opacity 500ms ease; width: 560px; position: relative; left: -560px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1" role="option" aria-describedby="slick-slide121"><h3>2</h3></div>
        <div class="slick-slide slick-current slick-active" data-slick-index="2" aria-hidden="false" style="width: 560px; position: relative; left: -1120px; top: 0px; z-index: 999; opacity: 1;" tabindex="-1" role="option" aria-describedby="slick-slide122"><h3>3</h3></div>
        <div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 560px; position: relative; left: -1680px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1" role="option" aria-describedby="slick-slide123"><h3>4</h3></div>
        <div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 560px; position: relative; left: -2240px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1" role="option" aria-describedby="slick-slide124"><h3>5</h3></div>
      </div>
    </div>
  </div>
  <!-- <div class="slider slider-nav slick-initialized slick-slider slick-dotted" role="toolbar"> -->
    <button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
		<div aria-live="polite" class="slick-list draggable" style="padding: 0px 50px;">
      <div class="slick-track" style="opacity: 1; width: 2002px; transform: translate3d(-770px, 0px, 0px);" role="listbox">
        <div class="slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>2</h3></div>
        <div class="slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>3</h3></div>
        <div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>4</h3></div>
        <div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>5</h3></div>
        <div class="slick-slide" data-slick-index="0" aria-hidden="true" style="width: 154px;" tabindex="-1" role="option" aria-describedby="slick-slide130"><h3>1</h3></div>
        <div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 154px;" tabindex="-1" role="option" aria-describedby="slick-slide131"><h3>2</h3></div>
        <div class="slick-slide slick-current slick-active slick-center" data-slick-index="2" aria-hidden="false" style="width: 154px;" tabindex="-1" role="option" aria-describedby="slick-slide132"><h3>3</h3></div>
        <div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 154px;" tabindex="-1" role="option" aria-describedby="slick-slide133"><h3>4</h3></div>
        <div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 154px;" tabindex="-1" role="option" aria-describedby="slick-slide134"><h3>5</h3></div>
        <div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>1</h3></div>
        <div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>2</h3></div>
        <div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>3</h3></div>
        <div class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 154px;" tabindex="-1"><h3>4</h3></div>
      </div>
    </div></div>
  <div id="commemt">
    <img src="./img/commemt.png" alt="">
    <h1>評價</h1>
    <div id="commemtBox">
      <div class="rateBox">
        <div class="howMuch" style="width:
       <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
          $sql1 = "SELECT * FROM `會員` WHERE `帳號`= '$performer'";
					$result = mysqli_query($link, $sql1) or die("qdueary");
					$row1 = mysqli_fetch_assoc($result);
					$k = $row1['評分']*20;
                 echo $k;

          ?>%"></div>
        <img src="./img/pointStarGray.png" alt="">
      </div>
      <div class="CommemtDetail">
        <h4>
          <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql2 = "SELECT * FROM `評論` where`受評人`='$performer' ";
					$result = mysqli_query($link, $sql2) or die("qdueary");
					$row2 = mysqli_fetch_assoc($result);
          echo $row2['評價'];

          ?> / 5</h4>
        <p>5星( <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');

					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人` = '$performer' and `評價`=5";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>4星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人` = '$performer' and `評價`=4";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>3星( <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "
SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人` = '$performer'and `評價`=3";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>2星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "
SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人`= '$performer'and `評價`=2";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>1星( <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "
SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人`= '$performer' and `評價`=1";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
      </div>
      <!-- 評論內容開始 -->
      <div class="CommemtNum"><?php
$link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT * FROM `評論` JOIN `會員` WHERE `會員`.`帳號` = `評論`.`評論者` and `評論`.`受評人`='$performer'";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row1 = mysqli_fetch_assoc($result);

					echo "<img src="."$row1[圖片]"."  onClick="." location.href='http://114.35.91.83/performer.php?p=$row1[帳號]'; ".">";
					mysqli_close($link);
          ?>
        <div class="point">
          <div class="rateBox">
            <div class="howMuch" style="width:<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql5 = "SELECT * FROM `評論` WHERE `受評人`='$performer'";
					$result5 = mysqli_query($link, $sql5) or die("qdueary");
					$row5 = mysqli_fetch_assoc($result5);
					$k=$row5['評價']*20;
          echo $k;
          ?>%"></div>
            <img src="./img/pointStarGray.png" alt="">
          </div>
        </div>
        <div class="commemtArea">
           <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$performer'";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

					echo $row['內容'];
          ?>
          </div>

          
      </div>
      <!-- 評論內容結束 -->
    </div>
  </div>
  <div id="Footer">
    <p>Copyright © 2015-2017 Traum All rights reserved</p>
  </div>
  <script type="text/javascript">
    $('.single-item').slick();

    // $('.slider-for').slick({
    //  slidesToShow: 1,
    //  slidesToScroll: 1,
    //  arrows: false,
    //  fade: true,
    //  asNavFor: '.slider-nav'
    // });
    // $('.slider-nav').slick({
    //  slidesToShow: 3,
    //  slidesToScroll: 1,
    //  asNavFor: '.slider-for',
    //  dots: true,
    //  centerMode: true,
    //  focusOnSelect: true
    // });
  </script>
</body>
</html>
