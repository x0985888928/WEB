<?php
	session_start();


	if (isset($_GET["page"]))
	{
		$area = intval($_GET["area"]);
		$keyword = $_GET["keyword"];
		$type = intval($_GET["type"]);
		$budget = intval($_GET["budget"]);
	}

	if(isset($_POST["butt"]))
	{
		$area=$_POST['area'];
		$keyword=$_POST['keyword'];
		$type=$_POST['type'];
		$budget=$_POST['budget'];
	}


	function carea(int $i){
	  switch($i)
		{
			case 1:
				echo"北部";break;
			case 2:
				echo"中部";break;
			case 3:
				echo"南部";break;
		}
	};
	function ctype($i,$a){
	  switch($i)
		{
			case 1:
				echo"互動秀";break;
			case 2:
				echo"大型魔術秀";break;
			case 3:
				echo"一般舞臺魔術";break;
			case 4:
				echo"沿桌近距離魔術";break;
			case 5:
			{
				$link = mysqli_connect('localhost', 'project', '0931821282','traum');
				mysqli_select_db($link, 'traum') or die("db");
				mysqli_query($link,"SET CHARACTER SET utf8");
				$aa = mysqli_query($link,"SELECT * FROM `表演者類型` where `帳號` = '$a' and `類型` = 5") or die("asd");
				$r88 = mysqli_fetch_assoc($aa);
				echo $r88['其他'];
				break;
			}

		}
  };

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="Shortcut Icon" type="image/x-icon" href="img/page_logo.png" >
  <title>Traum築夢娛樂</title>
  <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="js/indexScript.js" charset="utf-8"></script>
  <script src="js/javascript.js" charset="utf-8"></script>
	<script type="text/javascript" src="/jquery/jquery.js"></script>
	<link rel="stylesheet" href="jquery.range.css">
	<script src="http://www.youhutong.com/static/js/jquery.js"></script>
	<script src="jquery.range.js"></script>
	<script type="text/javascript" src="./search.js"></script>

  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/header.css">
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
      ?>
      " alt="">
      <p id="userName">
        <?php
           if(isset($_SESSION['account']))
              echo $row1['姓名'];
           else
              echo "訪客";

        ?>
      </p>
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
      ?>
    </a>
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
    <li><a href="search.php">搜尋</a></li>
    <li><a href="">聯絡我們</a></li>
    <li><a href="ranking.php">排行榜</a></li>
    <li><a href="">最新消息</a></li>
    <li><a href="">常見問題</a></li>
  </nav>
  <div id="banner">
    <img src="./img/search_pc.png" alt="">
  </div>
  <div id="BigBox">

			<input type="text" name="search" id = "text" >
			<input class="enter" type='button' value='搜尋' onclick="check(7)">

    <div id="tagsBox">
      <div class="tag" id = "tag0">北部</div>
      <div class="tag" id = "tag1">中部</div>
      <div class="tag" id = "tag2">南部</div>
      <div class="tag" id = "tag3">互動秀</div>
      <div class="tag" id = "tag4">大型秀</div>
      <div class="tag" id = "tag5">舞臺魔術</div>
      <div class="tag" id = "tag6">近距離</div>
    </div>
    <div class="condition">
      <p>區域</p>
      <table>
        <tr>
          <td><input type="checkbox" id ="0" onchange="check(0)"  >北區</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="1" onchange="check(1)" >中區</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="2" onchange="check(2)" >南區</td>
        </tr>
      </table>

      <p>類型</p>
      <table>
        <tr>
          <td><input type="checkbox" id ="3" onchange="check(3)">互動秀</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="4" onchange="check(4)">大型魔術秀</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="5" onchange="check(5)">一般舞台魔術</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="6" onchange="check(6)">沿桌近距離魔術</td>
        </tr>
      </table>

<!--      <p>預算</p><input type="range" class="range-slider"  value="25,75"/>

      <input class="enter" type='submit' value='GO'>-->
    </div>

    <div id="resultArea">
      <div id="best" class="resultBox">
				<?php
				$ac=$_SESSION['account'];
				$link = mysqli_connect('localhost', 'project', '0931821282','traum');
				mysqli_select_db($link, 'traum') or die("db");
				mysqli_query($link,"SET CHARACTER SET utf8");
				$sql = "SELECT * FROM `表演者`  order by `滿意度` desc limit 4";
				$result = mysqli_query($link, $sql) or die("qdueary");
				echo "<p>最佳媒合結果：</p>";

				while($row = mysqli_fetch_assoc($result))
				{
					echo "
					<div class="."result".">
					";
					$link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql1 = "SELECT * FROM `會員` where `會員`.`帳號` = '$row[帳號]'  ";
					$result1 = mysqli_query($link, $sql1) or die("qdueary");
					$row1 = mysqli_fetch_assoc($result1);
					echo "<img src="."".$row1[圖片].""."";
					echo ""." onClick = "."location.href='performer2.php?p=$row1[帳號]'"."";
					echo "><span>".$row[藝名]."</span> ";
					$sql2 = "SELECT * FROM `表演者區域` where `帳號` = '$row1[帳號]' ";
					$result2 = mysqli_query($link,$sql2) or die("asd");
			//		echo $sql2;
			echo "<span>";
					while($row2 = mysqli_fetch_assoc($result2))
					{

						switch($row2[地區])
						{

								case 1:
									echo"北部 ";break;
								case 2:
									echo"中部 ";break;
								case 3:
									echo"南部 ";break;

						}
					}
					echo "</span>";
					$sql2 = "SELECT * FROM `表演者類型` where `帳號` = '$row1[帳號]' ";
					$result2 = mysqli_query($link,$sql2) or die("asd");
			//		echo $sql2;
			echo "<span>";
					while($row2 = mysqli_fetch_assoc($result2))
					{
						switch($row2[類型])
						{
							case 1:
								echo"互動秀<br>";break;
							case 2:
								echo"大型魔術秀<br>";break;
							case 3:
								echo"一般舞臺魔術<br>";break;
							case 4:
								echo"沿桌近距離魔術<br>";break;
							case 5:
							{
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$aa = mysqli_query($link,"SELECT * FROM `表演者類型` where `帳號` = '$row1[帳號]' and `類型` = 5") or die("asd");
								$r88 = mysqli_fetch_assoc($aa);
								echo $r88['其他'];
								break;
							}

						}
					}
echo "</span>";
					echo "</div>";

				}
				?>


      </div>
      <div class="resultBox">
        <p>其他搜尋結果：</p>
				<?php
				$ac=$_SESSION['account'];
				$link = mysqli_connect('localhost', 'project', '0931821282','traum');
				mysqli_select_db($link, 'traum') or die("db");
				mysqli_query($link,"SET CHARACTER SET utf8");
				$sql = "SELECT * FROM `表演者`  order by `滿意度` desc limit 4,8";
				$result = mysqli_query($link, $sql) or die("qdueary");
			//	echo "<p>最佳媒合結果：</p>";

				while($row = mysqli_fetch_assoc($result))
				{
					echo "
					<div class="."result".">
					";
					$link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql1 = "SELECT * FROM `會員` where `會員`.`帳號` = '$row[帳號]'  ";
					$result1 = mysqli_query($link, $sql1) or die("qdueary");
					$row1 = mysqli_fetch_assoc($result1);
					echo "<img src="."".$row1[圖片].""." onClick="." location.href='performer2.php?p=$row1[帳號]';"."><span>".$row[藝名]."</span> ";
					$sql2 = "SELECT * FROM `表演者區域` where `帳號` = '$row1[帳號]' ";
					$result2 = mysqli_query($link,$sql2) or die("asd");
				//		echo $sql2;
				echo "<span>";
					while($row2 = mysqli_fetch_assoc($result2))
					{

						switch($row2[地區])
						{

								case 1:
									echo"北部 ";break;
								case 2:
									echo"中部 ";break;
								case 3:
									echo"南部 ";break;

						}
					}
					echo "</span>";
					$sql2 = "SELECT * FROM `表演者類型` where `帳號` = '$row1[帳號]' ";
					$result2 = mysqli_query($link,$sql2) or die("asd");
				//		echo $sql2;
				echo "<span>";
					while($row2 = mysqli_fetch_assoc($result2))
					{
						switch($row2[類型])
						{
							case 1:
								echo"互動秀<br>";break;
							case 2:
								echo"大型魔術秀<br>";break;
							case 3:
								echo"一般舞臺魔術<br>";break;
							case 4:
								echo"沿桌近距離魔術<br>";break;
							case 5:
							{
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$aa = mysqli_query($link,"SELECT * FROM `表演者類型` where `帳號` = '$row1[帳號]' and `類型` = 5") or die("asd");
								$r88 = mysqli_fetch_assoc($aa);
								echo $r88['其他'];
								break;
							}

						}
					}
				echo "</span>";
					echo "</div>";

				}
				?>


      </div>
    </div>
  </div>

</body>
</html>
