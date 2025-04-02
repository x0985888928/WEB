<?php
	session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="Shortcut Icon" type="image/x-icon" href="img/page_logo.png" >
  <title>Traum築夢娛樂</title>
  <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="./css/rankingStyle.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>
</head>
<body>
	<div id="title">
		<img src="./img/icon/icon_menu2.png" alt="" id="menuIcon">
		<img src="./img/Logo.png" alt="" id="Logo" onclick="javascript:location.href='index.php' ">
		<div id="memberBox">
			<img src="<?php
					if(isset($_SESSION['account'])){
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
					else{
						echo "./img/member.png";
					}
				?>" alt="">
			<p id="userName">
			<?php
			if(isset($_SESSION['account']))
				 echo $row1['姓名'];
			else
				 echo "訪客";
				?></p>
			<a href=" <?php
	         if(isset($_SESSION['account']))
	            echo "logout.php";
	         else
	            echo "login.php";

	      ?>" id="session"><?php
	         if(isset($_SESSION['account']))
	            echo "LogOut";
	         else
	            echo "LogIn";
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

	<div id="weekStar">
		<div class="star"><img src="./img/AboutUsLeft.png" alt=""></div>
		<div class="star"><img src="./img/AboutUsMid.png" alt=""></div>
		<div class="star"><img src="./img/AboutUsRight.png" alt=""></div>
	</div>
	<div id="Ranking" class="Container">
		<div class="titleImg">
			<img src="./img/titleImg.png" alt="">
      <h1>綜合排名</h1>
		</div>
		<div id="total" class="RankingArea">
			<table>
				<tr>
					<td>
						<div class="No1Box">
							<?php


$link = mysqli_connect('localhost', 'project', '0931821282','traum') or die("con");
mysqli_select_db($link, 'traum') or die("db");
mysqli_query($link,"SET CHARACTER SET utf8");
//mysqli_query($link, "SET collation_connection = 'big5_chinese_ci'");
$sql = "  SELECT DISTINCT `會員`.`帳號`,`表演者`.`滿意度`,`表演者`.`藝名`,`會員`.`圖片`
FROM `會員` JOIN `表演者` JOIN `表演者類型` ON `表演者`.`帳號` = `會員`.`帳號` and `表演者`.`帳號` = `表演者類型`.`帳號`
ORDER BY `滿意度`
DESC LIMIT 5 ";
$result = mysqli_query($link, $sql) or die("qdueary");
$row1 = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result);
$row3 = mysqli_fetch_assoc($result);
$row4 = mysqli_fetch_assoc($result);
$row5 = mysqli_fetch_assoc($result);
?>
							<?php echo"<a href="."performer2.php"."?p="."$row1[帳號]"." ><img src="."$row1[圖片]"." ></a>";?>
							<img class="No1" src="./img/No1.png" alt="">
						</div>
					</td>
					<?php echo"<td><a href="."performer2.php"."?p="."$row2[帳號]"." ><img src="."$row2[圖片]"." ></a></td>";?>

					<?php echo"<td><a href="."performer2.php"."?p="."$row3[帳號]"." ><img src="."$row3[圖片]"." ></a></td>";?>

					<?php echo"<td><a href="."performer2.php"."?p="."$row4[帳號]"." ><img src="."$row4[圖片]"." ></a></td>";?>

					<?php echo"<td><a href="."performer2.php"."?p="."$row5[帳號]"." ><img src="."$row5[圖片]"." ></a></td>";?>
				</tr>
				<tr>
					<td>No.1</td>
					<td>No.2</td>
					<td>No.3</td>
					<td>No.4</td>
					<td>No.5</td>
				</tr>
				<tr>
					<td><?php echo $row1[藝名];?></td>
					<td><?php echo $row2[藝名];?></td>
					<td><?php echo $row3[藝名];?></td>
					<td><?php echo $row4[藝名];?></td>
					<td><?php echo $row5[藝名];?></td>
				</tr>
			</table>
		</div>
		<div class="titleImg">
			<img src="./img/titleImg.png" alt="">
			<h1>區域排名</h1>
		</div>
		<div id="Area" class="RankingArea">
			<table>
				<tr>
					<td rowspan="3" ><img src="./img/rankingN.png" alt=""></td>
					<td>
						<div class="No1Box">
                        <?php


	$link = mysqli_connect('localhost', 'project', '0931821282','traum') or die("con");
	mysqli_select_db($link, 'traum') or die("db");
	mysqli_query($link,"SET CHARACTER SET utf8");
	$sql1 = "  SELECT DISTINCT `會員`.`帳號`,`表演者`.`滿意度`,`表演者`.`藝名`,`會員`.`圖片`,`表演者區域`.`地區`
 FROM `會員` JOIN `表演者` JOIN `表演者類型`JOIN `表演者區域` ON `表演者`.`帳號` = `會員`.`帳號` and `表演者`.`帳號` = `表演者類型`.`帳號` and `表演者區域`.`帳號`=`表演者`.`帳號` and `表演者區域`.`地區`=1
 ORDER BY `滿意度`
 DESC LIMIT 3";
	$sql2 = "  SELECT DISTINCT `會員`.`帳號`,`表演者`.`滿意度`,`表演者`.`藝名`,`會員`.`圖片`,`表演者區域`.`地區`
 FROM `會員` JOIN `表演者` JOIN `表演者類型`JOIN `表演者區域` ON `表演者`.`帳號` = `會員`.`帳號` and `表演者`.`帳號` = `表演者類型`.`帳號` and `表演者區域`.`帳號`=`表演者`.`帳號` and `表演者區域`.`地區`=2
 ORDER BY `滿意度`
 DESC LIMIT 3";
	$sql3 = "  SELECT DISTINCT `會員`.`帳號`,`表演者`.`滿意度`,`表演者`.`藝名`,`會員`.`圖片`,`表演者區域`.`地區`
 FROM `會員` JOIN `表演者` JOIN `表演者類型`JOIN `表演者區域` ON `表演者`.`帳號` = `會員`.`帳號` and `表演者`.`帳號` = `表演者類型`.`帳號` and `表演者區域`.`帳號`=`表演者`.`帳號` and `表演者區域`.`地區`=3
 ORDER BY `滿意度`
 DESC LIMIT 3";
	//$result = mysqli_query($link," SELECT * FROM `表演者` ORDER BY `滿意度` DESC LIMIT 5") or die("qduery");
	//INSERT INTO `一` (`y吃`) VALUES ('12');
	$result1 = mysqli_query($link, $sql1) or die("qdueary");
	$result2 = mysqli_query($link, $sql2) or die("qdueary");
	$result3 = mysqli_query($link, $sql3) or die("qdueary");
//	$total_fields = mysqli_num_fields($result);
//	echo $total_fields;echo "f";
	/*while($row = mysqli_fetch_assoc($result))
	{
  	echo $row['滿意度'];echo "sdf";
	}*/
	$row11 = mysqli_fetch_assoc($result1);
	$row12 = mysqli_fetch_assoc($result1);
	$row13 = mysqli_fetch_assoc($result1);
	$row21 = mysqli_fetch_assoc($result2);
	$row22 = mysqli_fetch_assoc($result2);
	$row31 = mysqli_fetch_assoc($result3);
	$row32 = mysqli_fetch_assoc($result3);
	$row23 = mysqli_fetch_assoc($result2);
	$row33 = mysqli_fetch_assoc($result3);
	echo "<a href="."performer2.php"."?p="."$row11[帳號]"." ><img src="."$row11[圖片]"."></a>
							<img class="."No1"." src="."./img/No1.png"." >
						</div>
					</td>
					<td><a href="."performer2.php"."?p="."$row12[帳號]"." ><img src="."$row12[圖片]"." ></a></td>
					<td><a href="."performer2.php"."?p="."$row13[帳號]"." ><img src="."$row13[圖片]"." ></a></td>
				</tr>
				<tr>
					<td>No.1</td>
					<td>No.2</td>
					<td>No.3</td>
				</tr>
				<tr>
					<td><? $row11[藝名]</td>
					<td><? $row12[藝名]</td>
					<td><? $row13[藝名]</td>
				</tr>
			</table>
			<table>
				<tr>
					<td><a href="."performer2.php"."?p="."$row23[帳號]"." ><img src="."$row23[圖片]"." ></a></td>
					<td><a href="."performer2.php"."?p="."$row22[帳號]"." ><img src="."$row22[圖片]"." ></a></td>
					<td>
						<div class="."No1Box".">
							<a href="."performer2.php"."?p="."$row21[帳號]"." ><img src="."$row21[圖片]"." ></a>
							<img class="."No1"." src="."./img/No1.png".">
						</div>
					</td>
					<td rowspan="."3"." ><img src="."./img/rankingM.png"." ></td>
				</tr>
				<tr>
					<td>No.1</td>
					<td>No.2</td>
					<td>No.3</td>
				</tr>
				<tr>
					<td> $row23[藝名]</td>
					<td> $row22[藝名]</td>
					<td> $row21[藝名]</td>


				</tr>
			</table>
			<table>
				<tr>
					<td rowspan="."3"."><img src="."./img/rankingS.png"." alt=".""."></td>
					<td>
						<div class="."No1Box".">
							<a href="."performer2.php"."?p="."$row31[帳號]"." ><img src="."$row31[圖片]"." ></a>
							<img class="."No1"." src="."./img/No1.png"." >
						</div>
					</td>
					<td><a href="."performer2.php"."?p="."$row32[帳號]"." ><img src="."$row32[圖片]"."></a></td>
					<td><a href="."performer2.php"."?p="."$row33[帳號]"." ><img src="."$row33[圖片]"."></a></td>
				</tr>
				<tr>
					<td>No.1</td>
					<td>No.2</td>
					<td>No.3</td>
				</tr>
				<tr>
					<td>$row31[藝名]</td>
					<td>$row32[藝名]</td>
					<td>$row33[藝名]</td>
				</tr>
			</table>";
	mysqli_close($link);
	?>
		</div>
	</div>
	<div id="Footer">
		<p>Copyright © 2015-2017 Traum All rights reserved</p>
	</div>
</body>
</html>
