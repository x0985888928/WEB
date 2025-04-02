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
  <link rel="stylesheet" href="./css/newStyle.css">
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

				?>
				" style="border-radius:50%; width:50px; height:50px; outline:0;  " onClick="location.href='http://114.35.91.83/<?php if(isset($_SESSION['account'])) echo"memberArea.php";
				else echo"member.php";?>' " value=""  ></div>
        <?php
        if(isset($_SESSION['account']))
		{
			
			echo $row1['姓名'];
			echo "您好!";
			echo "<a href="."logout.php".">登出</a>";
		}
		else
		{
		    echo "<a href="."login.php".">請登入</a>";
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
		echo "./member.php";
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
	<div id="Banner"><img src="./img/banner-02.png" alt=""></div>
	<p id="title">最新消息</p>
	<div id="board">
		<table>
			<tr>
				<td>標題</td>
				<td>發佈日期</td>
			</tr>
			<tr>
				<td>測試公告</td>
				<td>2018/01/02</td>
			</tr>
			<tr>
				<td>測試公告</td>
				<td>2018/01/01</td>
			</tr>
			<tr>
				<td>測試公告</td>
				<td>2017/12/31</td>
			</tr>
			<tr>
				<td>測試公告</td>
				<td>2017/12/30</td>
			</tr>
			<tr>
				<td>Traum線上媒合平台系統測試開放</td>
				<td>2017/12/29</td>
			</tr>

		</table>
	</div>
	<div class="Container">
		<iframe src="https://calendar.google.com/calendar/embed?title=Traum&amp;showPrint=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=ts92mj8n6idi74ar62qktrq0qo%40group.calendar.google.com&amp;color=%23AB8B00&amp;ctz=Asia%2FTaipei"
	frameborder="0" scrolling="no"></iframe>
	</div>
	<div id="Footer">
    <p>Copyright © 2015-2017 Traum All rights reserved</p>
  </div>
</body>
</html>
