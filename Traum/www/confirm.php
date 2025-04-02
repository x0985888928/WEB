<?php
	session_start();
	if (isset($_GET["p"]))
{
   $numm = $_GET["p"];

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
      margin-left: 40%;
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

      ?>" alt="">
      <p id="userName">
				<?php
      if(isset($_SESSION['account'])) echo $row1['姓名'];?>
  </p>
      <a href="" id="session"><?php
         if(isset($_SESSION['account']))
            echo "LogOut";
         else
            echo "Login";
      ?>
			</a>
      <a href="./memberArea.php"><img src="./img/icon/icon_member.png" alt=""></a>
      <a href="./mailBox.php"><img src="./img/icon/icon_mail.png" alt="">
      <p id="unread">(0)</p></a>
    </div>
  </div>
  <nav>
    <li><a href="">搜尋</a></li>
    <li><a href="">聯絡我們</a></li>
    <li><a href="">排行榜</a></li>
    <li><a href="">最新消息</a></li>
    <li><a href="">常見問題</a></li>
  </nav>
  <h1>訂單確認</h1>
  <div class="Container">
    <form action="" method="post">
      <table>
        <tr>
        <td width="20%"><p>活動日期：</p></td>
        <td width="60%">
					<?php
					$link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT * FROM `估價單`  WHERE `編號` = '$numm'";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row1 = mysqli_fetch_assoc($result);
					echo $row1['日期'];
					?></td>
      </tr>
        <tr>
          <td width="20%"><p>活動開始時間：</p></td>
          <td><?php echo $row1['時間'];?></td>
        </tr>
        <tr>
          <td width="20%"><p>預算：</p></td>
          <td width="60%">
            <?php echo "$row1[預算]~$row1[預算2]";?></td>
        </tr>
        <tr>
          <td width="20%"><p>地址：</p></td>
          <td width="60%"><?php echo $row1['地點'];?></td>
        </tr>

        <tr>
          <td><p>場地類型：</p></td>
          <td><?php echo $row1['場地類型'];?>
          </td>
        </tr>
        <tr>
          <td width="20%"><p>表演類型：</p></td>
          <td>
          <?php
					$output = explode("7", "$row1[表演類型]");
					$i=0;
					while($i<5)
					{
							if($output[$i]==1)
								{
						 			 if($i==0){echo"互動秀 ";}
						 			else if($i==1){echo"大型魔術秀 ";}
						 			else if($i==2){echo"一般舞台魔術 ";}
						 			else if($i==3){echo"沿桌近距離魔術 ";}
						 			else if($i==4){echo"其他魔術 ";}
					 			}
								$i++;
				}
					?></td>
        </tr>
        <tr>
          <td width="20%"><p>觀眾年齡層：</p></td>
          <td>
            <?php
						$output = explode("7", $row1['觀眾年齡層']);
						$i=0;
						while($i<5)
						{
								if($output[$i]==1)
									{
							 			 if($i==0){echo"兒童 ";}
							 			else if($i==1){echo"青年 ";}
							 			else if($i==2){echo"壯年 ";}
							 			else if($i==3){echo"中年 ";}
							 			else if($i==4){echo"老年 ";}
						 			}
									$i++;
					}
					?>
          </td>
        </tr>
        <tr>
          <td width="20%"><p>觀眾人數：</p></td>
          <td width="60%">
            <?php
						if($row1['觀眾人數']==0){echo"< 40 ";}
								else if($row1['觀眾人數']==1){echo"40 ~ 100 ";}
								else if($row1['觀眾人數']==2){echo"101 ~ 200 ";}
								else if($row1['觀眾人數']==3){echo"201 ~ 500 ";}
								else if($row1['觀眾人數']==4){echo"> 500 ";}
							echo"人";
					?>
          </td>
        </tr>
        <tr>
          <td width="20%"><p>表演長度：</p></td>
          <td width="60%">
          <?php
					if( $row1['長度']==0){echo"< 10 ";}
							else if( $row1['長度']==1){echo"11 ~ 20 ";}
							else if( $row1['長度']==2){echo"21 ~ 40 ";}
							else if( $row1['長度']==3){echo"> 40 ";}
						echo"分鐘";
						?></td>
        </tr>
        <tr>
          <td width="20%"><p>現場器材：</p></td>
          <td>
          <?php
					$output = explode("7", $row1['設備提供']);
					$i=0;
					while($i<5)
					{
							if($output[$i]==1)
								{
						 			 if($i==0){echo"音響 ";}
						 			else if($i==1){echo"有線麥克風 ";}
						 			else if($i==2){echo"無線麥克風 ";}
						 			else if($i==3){echo"燈光設備 ";}
						 			else if($i==4){echo"其他 ";}
					 			}
								$i++;
				}?>
          </td>
        </tr>
        <tr>
          <td width="20%"><p>音檔繳交方式：</p></td>
          <td>
          <?php
					if($row1['音檔繳交方式']==0){echo"USB ";}
				 else if($row1['音檔繳交方式']==1){echo"光碟 ";}
				 else if($row1['音檔繳交方式']==2){echo"雲端 ";}
				 else if($row1['音檔繳交方式']==3){echo"其他 ";}
				 ?>
          </td>
        </tr>
        <tr>
          <td width="20%"><p>其他需求：</p></td>
          <td>
          <?php echo"無";?>
          </td>
        </tr>
        <tr>
          <td colspan="2">
          <input class="enter" type='submit' name = 'go' value='確認訂單'></td>
        </tr>
      </table>
			<?php
			if(isset($_POST['go']))
			{
				$link = mysqli_connect('localhost', 'project', '0931821282','traum');
				mysqli_select_db($link, 'traum') or die("db");
				mysqli_query($link,"SET CHARACTER SET utf8");

				$sqlq = "SELECT `編號` FROM `訂單` ORDER BY `編號` DESC LIMIT 1";

				$resultq = mysqli_query($link,$sqlq) or die("asd");
				$rowq = mysqli_fetch_assoc($resultq);
				$num = $rowq['編號']+1;


				$sql4 = "INSERT INTO `訂單`(`編號`, `表演者`, `內容`, `金額`, `日期`,`地點`, `時間`, `地點大小`, `設備`, `電話`, `表演長度`, `聯絡人`, `完成與否`,`會評價`,`表評價`, `其他`) VALUES ('$num','$row1[表演者]','asd','$row1[預算]','$row1[日期]','$row1[地點]','$row1[時間]','0','$row1[設備提供]','0931821282','$row1[長度]','$row1[聯絡人]','1','1','1','OK')";
				echo $sql4;
				$result4 = mysqli_query($link,$sql4) or die("pushurass");

				$sql33 = "UPDATE `聊天室` SET `內容`= '估價單' WHERE `編號`= '$numm'";
				$result33 = mysqli_query($link,$sql33) or die("assssd");
	//			$row33 = mysqli_fetch_assoc($result33);

				header("Location: mailBox.php");
mysqli_close($link);

			}?>
    </form>
  </div>

</body>
</html>
