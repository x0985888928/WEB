<?php
	session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TRAUM</title>
  <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/aboutStyle.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>
</head>
<body>
	<?php
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

				?>" style="border-radius:50%; width:50px; height:50px; outline:0;  "
				 onClick="location.href='http://114.35.91.83/<?php if(isset($_SESSION['account'])) echo"memberArea.php";
 				else echo"login.php";?>' " value=""  >
        </div><?php
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
		?></div>
    </div>
    <div id="MemberInfo">
      <div class="emptyBox"></div>
      <a href=""><div class="MemberFace">
      <img src="<?php
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

      ?>" style="border-radius:50%; width:50px; height:50px;" >
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

  <div id="Banner"><img src="./img/banner-03.png" alt=""></div>
  <div id="AboutUs">
    <div class="UsBox">
      <h4>實踐</h4>
      <div class="contentBox">
        <p>勇於實踐屬於自己的夢想</p>
      </div>
      <img src="./img/aboutUsLeft.png" alt="">
    </div>
    <div class="UsBox">
      <h4>獨特</h4>
      <div class="contentBox">
        <p>勇於實踐屬於自己的夢想</p>
      </div>
      <img src="./img/aboutUsMid.png" alt="">
    </div>
    <div class="UsBox">
      <h4>多元</h4>
      <div class="contentBox">
        <p>勇於實踐屬於自己的夢想</p>
      </div>
      <img src="./img/aboutUsRight.png" alt="">
    </div>
  </div>
  <img id="history" src="./img/history.png" alt="">
  <div id="imgBox">
    <img src="./img/aboutUsRight.png" alt="">
    <img src="./img/aboutUsRight.png" alt="">
    <img src="./img/aboutUsRight.png" alt="">
    <img src="./img/aboutUsRight.png" alt="">
  </div>
  <div id="Footer">
    <p>Copyright © 2015-2017 Traum All rights reserved</p>
  </div>
</body>
</html>
