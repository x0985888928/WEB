<?php
	session_start();

if (isset($_GET["p"]))
{
   $performer = $_GET["p"];

}
					if(isset($_POST["sub"]))
					{

							$link = mysqli_connect('localhost', 'project', '0931821282','traum');
							mysqli_select_db($link, 'traum') or die("db");
							mysqli_query($link,"SET CHARACTER SET utf8");

							$sql33 = "SELECT `編號` FROM `估價單` ORDER BY `編號` DESC LIMIT 1";
							$result33 = mysqli_query($link,$sql33) or die("asd");
							$row33 = mysqli_fetch_assoc($result33);
							$numm=$row33['編號']+1;

							$ac=$_SESSION['account'];
							$date = $_POST['date'];
							$time = $_POST['StartTime'];
							$budget = $_POST['budget'];
							switch($budget)
							{
								case 1:
									$maxb = 6000; $mind = 0; break;
							  case 2:
									$maxb = 12000; $mind = 6000; break;
								case 3:
									$maxb = 18000; $mind = 12000; break;
								case 4:
									$maxb = 50000; $mind = 12000; break;
							}
							$add1 = $_POST['add1'];
							$add2 = $_POST['add2'];
							$add3 = $add1.$add2;
							$date2 = explode("-",$date);
							$place = $_POST['place'];
							$type1 = $_POST['type1'];
							$typer="7";
							if($type1==1)
									$typer=$typer."1";
							else
									$typer=$typer."0";
							$typer=$typer."7";
							$type2 = $_POST['type2'];

							if($type2==1)
									$typer=$typer."1";
							else
									$typer=$typer."0";
							$typer=$typer."7";
							$type3 = $_POST['type3'];

							if($type3==1)
									$typer=$typer."1";
							else
									$typer=$typer."0";
							$typer=$typer."7";
							$type4 = $_POST['type4'];

							if($type4==1)
									$typer=$typer."1";
							else
									$typer=$typer."0";
							$typer=$typer."7";
							$type5 = $_POST['type5'];

							if($type5==1)
									$typer=$typer."1";
							else
									$typer=$typer."0";
							$typer=$typer."7";
							$ageRange1 = $_POST['ageRange1'];
							$ager="7";
							if($ageRange1==1)
									$ager=$ager."1";
							else
									$ager=$ager."0";
							$ager=$ager."7";
							$ageRange2 = $_POST['ageRange2'];
							if($ageRange2==1)
									$ager=$ager."1";
							else
									$ager=$ager."0";
							$ager=$ager."7";
							$ageRange3 = $_POST['ageRange3'];
							if($ageRange3==1)
									$ager=$ager."1";
							else
									$ager=$ager."0";
							$ager=$ager."7";
							$ageRange4 = $_POST['ageRange4'];
							if($ageRange4==1)
									$ager=$ager."1";
							else
									$ager=$ager."0";
							$ager=$ager."7";
							$ageRange5 = $_POST['ageRange5'];
							if($ageRange5==1)
									$ager=$ager."1";
							else
									$ager=$ager."0";
							$ager=$ager."7";
							$howMany = $_POST['howMany'];
							$howLong = $_POST['howLong'];
							$equip1 = $_POST['equipment1'];
							if($equip1==1)
									$equipr=$equipr."1";
							else
									$equipr=$equipr."0";
							$equipr=$equipr."7";
							$equip2 = $_POST['equipment2'];
							if($equip2==1)
									$equipr=$equipr."1";
							else
									$equipr=$equipr."0";
							$equipr=$equipr."7";
							$equip3 = $_POST['equipment3'];
							if($equip3==1)
									$equipr=$equipr."1";
							else
									$equipr=$equipr."0";
							$equipr=$equipr."7";
							$equip4 = $_POST['equipment4'];
							if($equip4==1)
									$equipr=$equipr."1";
							else
									$equipr=$equipr."0";
							$equipr=$equipr."7";
							$equip5 = $_POST['equipment5'];
							if($equip5==1)
									$equipr=$equipr."1";
							else
									$equipr=$equipr."0";
							$equipr=$equipr."7";
							$radio = $_POST['radio'];
							$other = $_POST['otherRequirement'];
							$sql = "INSERT INTO `估價單`(`時間`, `地點`, `日期`, `表演類型`, `預算`, `預算2`,`場地類型`, `長度`, `設備提供`, `聯絡人`, `表演者`,
								`編號`, `觀眾年齡層`, `觀眾人數`, `音檔繳交方式`, `創立時間`)
								VALUES('$time', '$add3', '$date2[0].$date2[1].$date2[2]','$typer','$maxb','$mind','$place','$howLong','$equipr','$ac','$performer','$numm','$ager','$howMany','$radio',CURRENT_TIMESTAMP)";
								echo $sql;
							mysqli_query($link,$sql) or die("asdswssss");
							$sql3 = "INSERT INTO `聊天室`(`送方`, `收方`, `內容`, `日期`, `已讀與否`, `編號`)
							VALUES ('$ac','$performer','<a href="."confirm.php?p=$numm".">估價單</a>',CURRENT_TIMESTAMP,'1','$numm' )";
								//echo $sql;
							mysqli_query($link,$sql3) or die("asdswssss");
							header("Location: mailBox.php");

					}

					?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="Shortcut Icon" type="image/x-icon" href="img/page_logo.png" >
  <title>Traum築夢娛樂</title>
  <!-- <link rel="stylesheet" href="./dist/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="./dist/css/bootstrap-theme.min.css"> -->
	<link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="./css/loginStyles.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>

  <style media="screen">
    .Container{
      width: 70%;
      margin-left: 15%;
      overflow: auto;
      border: 5px solid #17515A;
      padding: 10px;
    }
    .enter{
      float: left;
      width: 20%;
      margin-left: 20%;
    }
    h1{
      text-align: center;
      font-size: 3rem;
    }
    td p{
      text-align: center;
    }
    input[type = text], textarea{
      border: 1px solid #17515A;
      border-radius: 5px;
    }
  </style>
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
  <h1>估價單</h1>
  <div class="Container">
    <form action="" method="post">
      <table>
        <tr>
        <td width="20%"><p>活動日期：</p></td>
        <td width="60%"><input name ='date' type='date'></td>
      </tr>
        <tr>
          <td width="20%"><p>活動開始時間：</p></td>
          <td><select name="StartTime">
            <option value="00:00">00:00</option>
            <option value="01:00">01:00</option>
            <option value="02:00">02:00</option>
            <option value="03:00">03:00</option>
            <option value="04:00">04:00</option>
            <option value="05:00">05:00</option>
            <option value="06:00">06:00</option>
            <option value="07:00">07:00</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
            <option value="14:00">14:00</option>
            <option value="15:00">15:00</option>
            <option value="16:00">16:00</option>
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
            <option value="22:00">22:00</option>
            <option value="23:00">23:00</option>
          </select></td>
        </tr>
        <tr>
          <td width="20%"><p>預算：</p></td>
          <td width="60%">
            <select name="budget">
            <option value="1">6000元以下</option>
            <option value="2">6001元~12000元</option>
            <option value="3">12001元~18000元</option>
            <option value="4">18000元以上</option>
          </select></td>
        </tr>
        <tr>
          <td width="20%"><p>地址：</p></td>
          <td width="60%"><select name="add1">
            <option value="新北市">新北市</option>
            <option value="台北市">台北市</option>
            <option value="桃園縣">桃園縣</option>
            <option value="新竹縣">新竹縣</option>
            <option value="苗栗縣">苗栗縣</option>
            <option value="台中市">台中市</option>
            <option value="南投縣">南投縣</option>
            <option value="彰化縣">彰化縣</option>
            <option value="雲林縣">雲林縣</option>
            <option value="嘉義縣">嘉義縣</option>
            <option value="台南市">台南市</option>
            <option value="高雄市">高雄市</option>
            <option value="屏東縣">屏東縣</option>
            <option value="宜蘭縣">宜蘭縣</option>
            <option value="花蓮縣">花蓮縣</option>
            <option value="台東縣">台東縣</option>
            <option value="金門縣">金門縣</option>
            <option value="連江縣">連江縣</option>
          </select></td>
        </tr>
        <tr>
          <td width="20%"></td>
          <td><input name ='add2' type="text"></td>
        </tr>
        <tr>
          <td><p>場地類型：</p></td>
          <td>
            <input type="radio" name="place" value="餐廳">餐廳
            <input type="radio" name="place" value="戶外展場">戶外展場
            <input type="radio" name="place" value="展場">展場
            <input type="radio" name="place" value="其他">其他
            <input type="text">
          </td>
        </tr>
        <tr>
          <td width="20%"><p>表演類型：</p></td>
          <td>
            <input type="checkbox" name="type1" value="1">互動秀
            <input type="checkbox" name="type2" value="1">大型魔術秀
            <input type="checkbox" name="type3" value="1">一般舞臺魔術
            <input type="checkbox" name="type4" value="1">沿桌近距離魔術
            <input type="checkbox" name="type5" value="1">其他
            <input type="text"></td>
        </tr>
        <tr>
          <td width="20%"><p>觀眾年齡層：</p></td>
          <td>
            <input type="checkbox" name="ageRange1" value="1">兒童
            <input type="checkbox" name="ageRange2" value="1">青年
            <input type="checkbox" name="ageRange3" value="1">壯年
            <input type="checkbox" name="ageRange4" value="1">中年
            <input type="checkbox" name="ageRange5" value="1">老年
          </td>
        </tr>
        <tr>
          <td width="20%"><p>觀眾人數：</p></td>
          <td width="60%">
            <select name="howMany">
            <option value="0">40人以下</option>
            <option value="1">40人~100人</option>
            <option value="2">101人~200人</option>
            <option value="3">201人~500人</option>
            <option value="4">500人以上</option>
          </select></td>
        </tr>
        <tr>
          <td width="20%"><p>表演長度：</p></td>
          <td width="60%">
            <select name="howLong">
            <option value="0">10分鐘以下</option>
            <option value="1">11分鐘~20分鐘</option>
            <option value="2">21分鐘~40分鐘</option>
            <option value="3">40分鐘以上</option>
          </select></td>
        </tr>
        <tr>
          <td width="20%"><p>現場器材：</p></td>
          <td>
            <input type="checkbox" name="equipment1" value="1">音響
            <input type="checkbox" name="equipment2" value="1">有線麥克風
            <input type="checkbox" name="equipment3" value="1">無線麥克風
            <input type="checkbox" name="equipment4" value="1">燈光設備
            <input type="checkbox" name="equipment5" value="1">其他
            <input type="text">
          </td>
        </tr>
        <tr>
          <td width="20%"><p>音檔繳交方式：</p></td>
          <td>
            <input type="radio" name="radio" value="0">USB
            <input type="radio" name="radio" value="1">光碟
            <input type="radio" name="radio" value="2">雲端
            <input type="radio" name="radio" value="3">其他
            <input type="text">
          </td>
        </tr>
        <tr>
          <td width="20%"><p>其他需求：</p></td>
          <td>
            <textarea name="otherRequirement" rows="8" cols="80"></textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2"><input class="enter" type='submit' value='重新填寫'>
          <input class="enter" name ='sub' type='submit' value='送出表單'>
          </td>
        </tr>
      </table>
    </form>
  </div>

</body>
</html>
