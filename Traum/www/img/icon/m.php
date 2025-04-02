<?php
	session_start();
	//$ac=$_SESSION['account'];
	//if(isset($_GET["page"])$page=isset($_GET["page"];
  if(isset($_POST["introduce"])){
    $ac=$_SESSION['account'];
    $link = mysqli_connect('localhost', 'project', '0931821282','traum');
    mysqli_select_db($link, 'traum') or die("db");
    mysqli_query($link,"SET CHARACTER SET utf8");
    $nick = $_POST['nick'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $place = $_POST['place1'].$_POST['place2'];
    $radio = $_POST['radio'];
  //   if($nick != null && $phone != null && $place != null && $mail != null){
    $sql = "UPDATE `會員` SET `電話`='$phone' , `信箱`='$mail' , `地址`='$place' , `表演者`='$radio' where `帳號` = '$ac' ";
    if(mysqli_query($link,$sql)){
      echo "<script language="."javascript".">alert('新增成功');</script>";
        //   echo '新增成功!';
          // echo '<meta http-equiv=REFRESH CONTENT=2;url=memberArea.php>';
    }
    else{
      echo "<script language="."javascript".">alert('失敗');</script>";
      //     echo '失敗!';
          // echo '<meta http-equiv=REFRESH CONTENT=2;url=memberArea.php>';
    }
  //      }
  }
  if(isset($_POST["ss"])&&isset($_SESSION['account'])){
    $ac=$_SESSION['account'];
    $link = mysqli_connect('localhost', 'project', '0931821282','traum');
    mysqli_select_db($link, 'traum') or die("db");
    mysqli_query($link,"SET CHARACTER SET utf8");
    $sql = "SELECT * FROM `會員`  WHERE `帳號` = '$ac'";
    $result = mysqli_query($link, $sql) or die("qdueary");
    $row1 = mysqli_fetch_assoc($result);
    $filename=$_FILES["file"]["name"];
    $tmp_name=$_FILES["file"]["tmp_name"];
    $size = getimagesize($tmp_name);
    $oheight = $size[1];
    $owidth = $size[0];
    $type=$size[2];
    switch($type){
       case 1:
          $t=".gif";break;
       case 2:
          $t=".jpg";break;
       case 3:
          $t=".png";break;
       case 4:
          $t=".swf";break;
       case 5:
          $t=".psd";break;
       case 6:
          $t=".bmp";break;
       case 7:
          $t=".tiff";break;
       case 8:
          $t=".tiff";break;
       case 9:
          $t=".jpc";break;
       case 10:
          $t=".jp2";break;
       case 11:
          $t=".jpx";break;
    }
    $location="/var/www/html/actor/".$row1['帳號']."/".$row1['帳號'].$t;
    if($owidth!=400 && $oheight!=400){
          $set=1;
    }
    else {
      if(move_uploaded_file($tmp_name,$location )){
        $loc= "./actor/".$row1['帳號']."/".$row1['帳號'].$t;
        $sql2="UPDATE `會員` SET `圖片` = '$loc'  WHERE `帳號` = '$ac' " ;
        mysqli_query($link,$sql2) or die("asdsssss");
        mysqli_close($link);
        $set=0;
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>會員專區</title>
  <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="js/indexScript.js" charset="utf-8"></script>
  <script src="js/memberArea.js" charset="utf-8"></script>
  <script src="js/javascript.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/memberArea.css">
  <link rel="stylesheet" href="css/header.css">
</head>
<body>
  <div id="title">
    <img src="./img/icon/icon_menu2.png" alt="" id="menuIcon">
    <img src="./img/Logo.png" alt="" id="Logo">
    <div id="memberBox">
      <img src="	<?php
					if(isset($_SESSION['account'])){
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
					else{
						echo "./img/member.png";
					}
				?>" alt="">
      <p id="userName">
			<?php
				if(isset($_SESSION['account'])){
					echo $row1['姓名'];
				}
				else{
					echo "訪客";
				}
			?></p>
      <a href="  <?php
	         if(isset($_SESSION['account']))
	            echo "logout.php";
	         else
	            echo "login.php";

	      ?>" id="session"><?php
	         if(isset($_SESSION['account']))
	            echo "LogOut";
	         else
	            echo "Login";
	      ?></a>
      <a href="memberArea.php"><img src="./img/icon/icon_member.png" alt=""></a>
      <a href="mailBox.php"><img src="./img/icon/icon_mail.png" alt="">
      <p id="unread">(0)</p></a>
    </div>
  </div>
  <nav>
		<li><a href="search3.php">搜尋</a></li>
    <li><a href="">聯絡我們</a></li>
    <li><a href="ranking.php">排行榜</a></li>
    <li><a href="news.php">最新消息</a></li>
    <li><a href="">常見問題</a></li>
  </nav>
  <div id="subNav">
    <li><a href="#tab1">基本資料</a></li>
    <li><a href="#tab2">我的評價</a></li>
    <li><a href="#tab3">表演者專區</a></li>
    <li><a href="#tab4">訂單記錄</a></li>
  </div>
  <div id="tabBox">
    <div id="tab1" class="view">
      <div id="imgBox">
        <img src="<?php
					if(isset($_SESSION['account'])){
						$ac=$_SESSION['account'];
						$link = mysqli_connect('localhost', 'project', '0931821282','traum');
						mysqli_select_db($link, 'traum') or die("db");
						mysqli_query($link,"SET CHARACTER SET utf8");
						$sql = "SELECT * FROM `會員`  WHERE `帳號` = '$ac'";
						$result = mysqli_query($link, $sql) or die("qdueary");
						$row1 = mysqli_fetch_assoc($result);
						if($row1['圖片']=='')
							echo"./img/member.png";
						else
							echo $row1['圖片'];
						mysqli_close($link);
					}
					else echo"./img/member.png";
				?>" alt="" class="memberIMG">
				<form method="post" action="" enctype="Multipart/Form-Data">
        <a id="update" href="">
          <img src="./img/icon/update.jpg" alt="">
          <label for="file">照片上傳</label>
  		    <input type="file" id="file" name="file" accept=".jpg, .jpeg, .png" multiple style="display: none;" onChange="ss.click() ">
        </a>
      </div>
      <form action="">
        <table>
          <tr>
            <td width="40%" >帳號</td>
            <td><?php
							if(isset($_SESSION['account'])){
								$ac=$_SESSION['account'];
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$sql = "SELECT * FROM `會員`  WHERE `帳號` = '$ac'";
								$result = mysqli_query($link, $sql) or die("qdueary");
								$row1 = mysqli_fetch_assoc($result);
								echo $row1['帳號'];
								mysqli_close($link);
							}
						?></td>
          </tr>
          <tr>
            <td width="40%" >密碼</td>
            <td><input class="inputArea" type="password" placeholder="更新密碼"></td>
          </tr>
          <tr>
            <td width="40%" >暱稱</td>
            <td><input class="inputArea" type="text" placeholder="最帥魔術師"></td>
          </tr>
          <tr>
            <td width="40%" >真實姓名</td>
            <td><?php
							if(isset($_SESSION['account'])){
								$ac=$_SESSION['account'];
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$sql = "SELECT * FROM `會員`  WHERE `帳號` = '$ac'";
								$result = mysqli_query($link, $sql) or die("qdueary");
								$row1 = mysqli_fetch_assoc($result);
								echo $row1['姓名'];
								mysqli_close($link);
							}
						?></td>
          </tr>
          <tr>
            <td width="40%" >性別</td>
            <td><?php
								if(isset($_SESSION['account'])){
									$ac=$_SESSION['account'];
									$link = mysqli_connect('localhost', 'project', '0931821282','traum');
									mysqli_select_db($link, 'traum') or die("db");
									mysqli_query($link,"SET CHARACTER SET utf8");
									$sql = "SELECT * FROM `會員`  WHERE `帳號` = '$ac'";
									$result = mysqli_query($link, $sql) or die("qdueary");
									$row1 = mysqli_fetch_assoc($result);
									if($row1['性別']==1)
										echo "男";
									else
										echo "女";
									mysqli_close($link);
								}
							?></td>
          </tr>
          <tr>
            <td width="40%" >生日</td>
            <td><?php
							if(isset($_SESSION['account'])){
								$ac=$_SESSION['account'];
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$sql = "SELECT * FROM `會員`  WHERE `帳號` = '$ac'";
								$result = mysqli_query($link, $sql) or die("qdueary");
								$row1 = mysqli_fetch_assoc($result);
								echo $row1['生日'];
								mysqli_close($link);
							}
						?></td>
          </tr>
          <tr>
            <td width="40%" >聯絡電話</td>
            <td><input class="inputArea" type="text" placeholder="0<?php echo $row1['電話'];?>"></td>
          </tr>
          <tr>
            <td width="40%" >電子信箱</td>
            <td><input class="inputArea" type="text" placeholder="<?php echo $row1['信箱'];?>"></td>
          </tr>
          <tr>
            <td width="40%" >聯絡地址</td>
            <td>
              <input id="postCode" type="text" placeholder="<?php
								$a=mb_substr($row1['地址'],0,3,"UTF-8");
							?>">
              <select name="StartTime">
                <option value="0">新北市</option>
                <option value="1">台北市</option>
                <option value="2">桃園縣</option>
                <option value="3">新竹縣</option>
                <option value="4">苗栗縣</option>
                <option value="5">台中市</option>
                <option value="6">南投縣</option>
                <option value="7">彰化縣</option>
                <option value="8">雲林縣</option>
                <option value="9">嘉義縣</option>
                <option value="10">台南市</option>
                <option value="11">高雄市</option>
                <option value="12">屏東縣</option>
                <option value="13">宜蘭縣</option>
                <option value="14">花蓮縣</option>
                <option value="15">台東縣</option>
                <option value="16">金門縣</option>
                <option value="17">連江縣</option>
              </select></td>
          </tr>
          <tr>
            <td width="40%"></td>
            <td><input type="text" class="inputArea" placeholder="<?php
								echo mb_substr($row1['地址'],3,25,"UTF-8");
							?>"></td>
          </tr>
          <tr>
            <td></td>
            <td>
              <input class="enter" type='submit' value='確認修改'>
            </td>
          </tr>
        </table>
      </form>
    </div>
    <div id="tab2" class="view">
      <div class="box">
        <div id="commemtTitle">
          <a class="memberBtn" href="#memberCom"><img src="./img/icon/commemtMark.png" alt="">會員評價</a>
          <!-- <div class="point"> -->
            <div class="rateBox">
              <div class="howMuch" style="width:70%"></div>
              <img src="./img/icon/rateStar.png" alt="">
              <p><?php

		          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
							mysqli_select_db($link, 'traum') or die("db");
							mysqli_query($link,"SET CHARACTER SET utf8");
							$sql2 = "SELECT * FROM `會員` where`帳號`='$ac' ";
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
								 	  $rrr=$rrr+$row2['評分'];
							}
							echo $rrr/$nummm;
		          ?>/5</p>
              <span>評論(1000)</span>
            </div>
          <!-- </div> -->
          <a class="showBtn" href="#showCom"><img class="gone" src="./img/icon/commemtMark.png" alt="">表演者評價</a>
        </div>
      </div>
      <div class="box">
        <div id="commemtBox">
          <div id="memberCom">
						<?php
							if(isset($_SESSION['account']))
							{

								$ac=$_SESSION['account'];
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								if (!isset($_GET["page"])){
										$page=1;
								} else {
										$page = intval($_GET["page"]);
								}
								$sql = "SELECT * FROM `評論` WHERE `受評人`='$ac' ";
								$resultf = mysqli_query($link, $sql) or die("qdueary");
								$data_nums = mysqli_num_rows($resultf);
								$per = 5;
								$pageas = ceil($data_nums/$per);
								 $start = ($page-1)*$per;
								if($data_nums!=0)
								{
										$sql3 = "SELECT * FROM `評論` WHERE `受評人` = '$ac' ORDER BY `日期` DESC LIMIT $start,5";
										$result = mysqli_query($link,$sql3) or die("as");
										if(mysqli_num_rows($result)!=0)
										{
											while( $row = mysqli_fetch_assoc($result))
											{
												$sql4 = "SELECT * FROM `會員` WHERE `帳號` = '$row[受評人]' ";
												$result1 = mysqli_query($link,$sql4) or die("as");
												$row11 = mysqli_fetch_assoc($result1);
													echo "
													<table class="."commemt".">
														<tr>
															<td rowspan="."3"." width="."20%".">
																<img src=".".$row11[圖片]".">
															</td>
															<td>
																<p class="."name".">$row11[姓名]</p>
															</td>
														</tr>
														<tr>
															<td>
																<div class="."rateBox".">
																	<div class="."howMuch"." style="."width:70%"."></div>
																	<img src="."./img/icon/yellowStar.png"." >
																</div>
																<p>($row[評價])</p>
															</td>
														</tr>
														<tr>
															<td><div class="."content".">$row[內容]</div></td>
														</tr>
													</table>


													";
											}
										}
            		}
							}
								?>

        </div>
      </div>
    </div>  </div>
    <div id="tab3" class="view">
      <form action="">
        <table>
          <tr>
            <td>自我介紹</td>
            <td><textarea name="intro" id="" cols="100" rows="10"></textarea></td>
          </tr>
          <div class="money">
            <tr>
              <td rowspan="2">收費標準</td>
              <td>
                <label>表演類型</label>
                <select name="showType">
                  <option value="0">互動秀</option>
                  <option value="1">大型魔術秀</option>
                  <option value="2">一般舞臺魔術</option>
                  <option value="3">近距離延桌魔術</option>
                  <option value="4">其他</option>
                </select>
                <label>表演名稱</label>
                <input type="text" name="" value="">
              </td>
            </tr>
            <tr>
              <td><label>表演長度</label>
              <input type="text" name="" value="">分鐘
              <input type="text" name="" value="">元 <label class="more">+增加收費方案</label></td>
            </tr>
          </div>
        </table>
        <div class="mediaBox">
          <h3>活動影片：</h3>
          <input type="text" placeholder="Youtube URL">
          <input type="text" placeholder="Youtube URL">
          <input type="text" placeholder="Youtube URL">
          <input type="text" placeholder="Youtube URL">
          <input type="text" placeholder="Youtube URL">
        </div>
        <div class="mediaBox">
          <h3>活動照片：</h3>
          <Input Type="File" Name="YouFile">
          <Input Type="File" Name="YouFile">
          <Input Type="File" Name="YouFile">
          <Input Type="File" Name="YouFile">
          <Input Type="File" Name="YouFile">
          <Input Type="File" Name="YouFile">
        </div>
      </form>
    </div>
    <div id="tab4" class="view">
      <div id="orderTitle" class="box">
        <li class="memberBtn"><a href="#memberComment"><img src="./img/icon/meberAreaMark.png" alt="">會員訂單</a></li>
        <li class="showBtn"><a href="#showComment"><img class="gone" src="./img/icon/meberAreaMark.png" alt="">表演者訂單</a></li>
        <!-- <table>
          <tr>
            <td><a href="#memberComment">會員訂單</a></td>
            <td><a href="#showComment">表演者訂單</a></td>
          </tr>
        </table> -->
      </div>
      <div>
        <div id="memberComment">
        <?php
					$link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT * FROM `訂單`  WHERE `聯絡人` = '$ac'";
					$result = mysqli_query($link, $sql) or die("qdueary");
					while($row1 = mysqli_fetch_assoc($result))
					{
							echo "
							<div class="."orderDetail".">
								<table>
									<tr>
										<td>訂單編號：$row1[編號]</td>
										<td>訂單金額：$row1[金額]元</td>
									</tr>
									<tr>
										<td>成立日期：$row1[日期]</td>
										<td>表演者名稱</td>
									</tr>
									<tr>
										<td>訂單狀況：已付款</td>
										<td>顧客名稱：$row1[表演者]</td>
									</tr>
									<tr>
										<td>評分狀況：";
										if($row1[評價]==1)
										{
												echo "<a href="."giveCommemt.html?=$row1[編號]".">未評價</a>";
										}
										else
											echo "已評價";
										echo "</td>
										<td>$row1[內容]</td>
									</tr>
								</table>
							</div>
							";

					}

					mysqli_close($link);
          ?>

        </div>
        <div id="showComment">
					<?php
						$link = mysqli_connect('localhost', 'project', '0931821282','traum');
						mysqli_select_db($link, 'traum') or die("db");
						mysqli_query($link,"SET CHARACTER SET utf8");
						$sql = "SELECT * FROM `訂單`  WHERE `表演者` = '$ac'";
						$result = mysqli_query($link, $sql) or die("qdueary");
						while($row1 = mysqli_fetch_assoc($result))
						{
								echo "
								<div class="."orderDetail".">
									<table>
										<tr>
											<td>訂單編號：$row1[編號]</td>
											<td>訂單金額：$row1[金額]元</td>
										</tr>
										<tr>
											<td>成立日期：$row1[日期]</td>
											<td>表演者名稱</td>
										</tr>
										<tr>
											<td>訂單狀況：已付款</td>
											<td>顧客名稱：$row1[表演者]</td>
										</tr>
										<tr>
											<td>評分狀況：";
											if($row1[評價]==1)
											{
													echo "<a href="."giveCommemt.html?=$row1[編號]".">未評價</a>";

											}
											else
											echo "已評價";
											echo "</td>
											<td>$row1[內容]</td>
										</tr>
									</table>
								</div>
								";

						}

						mysqli_close($link);
	          ?>


        </div>
      </div>

    </div>
  </div>
</body>
</html>
