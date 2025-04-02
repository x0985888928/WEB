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
  <link rel="stylesheet" href="./css/qaStyle.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>
  <script src="./js/qaScript.js" charset="utf-8"></script>
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

					?>
					" style="border-radius:50%; width:50px; height:50px; outline:0;  " onClick="location.href='http://114.35.91.83/<?php
					if(isset($_SESSION['account'])) echo"memberArea.php";
					else echo"login.php";
				?>' " value=""  ></div>
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
	      <a href="
	      <?php
	      if(isset($_SESSION['account']))
		  {
			echo "./memberArea.php";
		  }
		  else
		  {
			 echo "./login.php";
		}
		  ?>
	      "><div class="MemberFace">
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
				echo $row1['圖片'];
				mysqli_close($link);
			}
			else
			{

			}

			?>
	        " style="border-radius:50%; width:50px; height:50px;" >
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

	<div id="Banner"><img src="./img/banner-01.png" alt=""></div>

  <div id="subNav">
    <ul id="1">訂單問題</ul>
    <ul id="2">流程接洽</ul>
    <ul id="3">會員帳號</ul>
    <ul id="4">聯絡我們</ul>
    <li class="class1 borderRight question"><a href="#Q1">如何查詢歷史訂單</a></li>
    <li class="class1 borderRight question"><a href="#Q1">如何確定訂單是否成立</a></li>
    <li class="class1 borderRight question"><a href="#Q1">訂單成立後可否異動</a></li>
    <li class="class1 question"><a href="#Q1">如何取消訂單</a></li>
    <li class="class2 borderRight question"><a href="#Q2">完整接洽流程</a></li>
    <li class="class2 question"><a href="#Q2">如何與表演者聯絡</a></li>
    <li class="class3 borderRight question"><a href="#Q3">如何申請會員</a></li>
    <li class="class3 borderRight question"><a href="#Q3">同一個會員帳號是否可以當表演者及找表演</a></li>
    <li class="class3 question"><a href="#Q3">付款方式</a></li>
    <li class="class4 question"><a href="#Q4">聯絡我們</a></li>
  </div>
  <div id="QuestionBox">
    <div id="Q1" class="AnsBox borderBtm">
      <ul>●訂單問題
        <li><a href="">如何查詢歷史訂單</a></li>
        <li><a href="">如何確定訂單是否成立</a></li>
        <li><a href="">訂單成立後可否異動</a></li>
        <li><a href="">如何取消訂單</a></li>
      </ul>
    </div>
    <div id="Q2" class="AnsBox borderBtm">
      <ul>●流程接洽
        <li><a href="#Q2">完整接洽流程</a></li>
        <li><a href="#Q2">如何與表演者聯絡</a></li>
      </ul>
    </div>
    <div id="Q3" class="AnsBox borderBtm">
      <ul>●會員帳號
        <li><a href="#Q3">如何申請會員</a></li>
        <li><a href="#Q3">同一個會員帳號是否可以當表演者及找表演</a></li>
        <li><a href="#Q3">付款方式</a></li>
      </ul>
    </div>
    <div id="Q4" class="AnsBox">
      <ul>●聯絡我們
        <li><a href="">聯絡我們</a></li>
      </ul>
    </div>
  </div>
	<div id="Footer">
		<p>Copyright © 2015-2017 Traum All rights reserved</p>
	</div>
</body>
</html>
