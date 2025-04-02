<?php
	session_start();

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
				?>" alt="">
      <p id="userName"><?php
				if(isset($_SESSION['account'])){
					echo $row1['姓名'];
				else{ echo "訪客";
}
}
			?></p>
      <a href="" id="session">LogIn</a>
      <a href=""><img src="./img/icon/icon_member.png" alt=""></a>
      <a href=""><img src="./img/icon/icon_mail.png" alt="">
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
  <div id="subNav">
    <li><a href="#tab1" >基本資料</a></li>
    <li><a href="#tab2">我的評價</a></li>
    <li><a href="#tab3" >表演者專區</a></li>
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
				<?php
					if($set==1){
						echo "<script language="."javascript".">alert('您上傳的檔案尺寸為"."$owidth"."*"."$oheight"."，請用縮圖程式改成400x400');</script>";

					}
				?>
			</form>
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
            <td><input class="inputArea" type="text" placeholder="最帥魔術師" value="<?php
							echo $row1['暱稱'];
						?>"></td>
          </tr>
          <tr>
            <td width="40%" >真實姓名</td>
            <td>	<?php
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
              <input id="postCode" type="text" placeholder="407" value="<?php
								$a=mb_substr($row1['地址'],0,3,"UTF-8");
							?>">
              <select name="StartTime">
                <option value="新北市" <?php if($a=="新北市") echo"selected"?>>新北市</option>
								<option value="台北市" <?php if($a=="台北市") echo"selected"?>>台北市</option>
                <option value="桃園縣" <?php if($a=="桃園縣") echo"selected"?>>桃園縣</option>
                <option value="新竹縣" <?php if($a=="新竹縣") echo"selected"?>>新竹縣</option>
                <option value="苗栗縣" <?php if($a=="苗栗縣") echo"selected"?>>苗栗縣</option>
                <option value="台中市" <?php if($a=="台中市") echo"selected"?>>台中市</option>
                <option value="南投縣" <?php if($a=="南投縣") echo"selected"?>>南投縣</option>
                <option value="彰化縣" <?php if($a=="彰化縣") echo"selected"?>>彰化縣</option>
                <option value="雲林縣" <?php if($a=="雲林縣") echo"selected"?>>雲林縣</option>
                <option value="嘉義縣" <?php if($a=="嘉義縣") echo"selected"?>>嘉義縣</option>
                <option value="台南市" <?php if($a=="台南市") echo"selected"?>>台南市</option>
                <option value="高雄市" <?php if($a=="高雄市") echo"selected"?>>高雄市</option>
                <option value="屏東縣" <?php if($a=="屏東縣") echo"selected"?>>屏東縣</option>
                <option value="宜蘭縣" <?php if($a=="宜蘭縣") echo"selected"?>>宜蘭縣</option>
                <option value="花蓮縣" <?php if($a=="花蓮縣") echo"selected"?>>花蓮縣</option>
                <option value="台東縣" <?php if($a=="台東縣") echo"selected"?>>台東縣</option>
                <option value="金門縣" <?php if($a=="金門縣") echo"selected"?>>金門縣</option>
                <option value="連江縣" <?php if($a=="連江縣") echo"selected"?>>連江縣</option>
              </select></td>
          </tr>
          <tr>
            <td width="40%"></td>
            <td><input type="text" class="inputArea" value="<?php
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
          <a href="">會員評價</a>
          <!-- <div class="point"> -->
            <div class="rateBox">
              <div class="howMuch" style="width:70%"></div>
              <img src="./img/icon/rateStar.png" alt="">
              <p>3.5/5</p>
              <span>評論(1000)</span>
            </div>
          <!-- </div> -->
          <a href="">表演者評價</a>
        </div>
      </div>
      <div class="box">
        <div id="commemtBox">
          <table class="commemt">
            <tr>
              <td rowspan="3" width="20%">
                <img src="./img/icon/member.png" alt="">
              </td>
              <td>
                <p class="name">王小明</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="rateBox">
                  <div class="howMuch" style="width:70%"></div>
                  <img src="./img/icon/yellowStar.png" alt="">
                </div>
                <p>(3.5)</p>
              </td>
            </tr>
            <tr>
              <td><div class="content">很優質的魔術師</div></td>
            </tr>
          </table>

          <table class="commemt">
            <tr>
              <td rowspan="3" width="20%">
                <img src="./img/icon/member.png" alt="">
              </td>
              <td>
                <p class="name">王小明</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="rateBox">
                  <div class="howMuch" style="width:70%"></div>
                  <img src="./img/icon/yellowStar.png" alt="">
                </div>
                <p>(3.5)</p>
              </td>
            </tr>
            <tr>
              <td><div class="content">很優質的魔術師</div></td>
            </tr>
          </table>

          <table class="commemt">
            <tr>
              <td rowspan="3" width="20%">
                <img src="./img/icon/member.png" alt="">
              </td>
              <td>
                <p class="name">王小明</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="rateBox">
                  <div class="howMuch" style="width:70%"></div>
                  <img src="./img/icon/yellowStar.png" alt="">
                </div>
                <p>(3.5)</p>
              </td>
            </tr>
            <tr>
              <td><div class="content">很優質的魔術師很優質的魔術師很優質的魔術師很優質的魔術師很優質的魔術師很優質的魔術</div></td>
            </tr>
          </table>

          <table class="commemt">
            <tr>
              <td rowspan="3" width="20%">
                <img src="./img/icon/member.png" alt="">
              </td>
              <td>
                <p class="name">王小明</p>
              </td>
            </tr>
            <tr>
              <td>
                <div class="rateBox">
                  <div class="howMuch" style="width:70%"></div>
                  <img src="./img/icon/yellowStar.png" alt="">
                </div>
                <p>(3.5)</p>
              </td>
            </tr>
            <tr>
              <td><div class="content">很優質的魔術師</div></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div id="tab3" class="view">
      <form action="">
        <table>

        </table>
      </form>
    </div>
    <div id="tab4" class="view">
      <div id="orderTitle" class="box">
        <li><a href="#memberComment">會員訂單</a></li>
        <li><a href="#showComment">表演者訂單</a></li>
        <!-- <table>
          <tr>
            <td><a href="#memberComment">會員訂單</a></td>
            <td><a href="#showComment">表演者訂單</a></td>
          </tr>
        </table> -->
      </div>
      <div id="memberComment">
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
      </div>
      <div id="showComment" class="active">
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
        <div class="orderDetail">
          <table>
            <tr>
              <td>訂單編號：0123456789</td>
              <td>訂單金額：99999999元</td>
            </tr>
            <tr>
              <td>成立日期：2099/13/33</td>
              <td>表演者名稱</td>
            </tr>
            <tr>
              <td>訂單狀況：已付款</td>
              <td>顧客名稱：王曉明</td>
            </tr>
            <tr>
              <td>評分狀況：已評分</td>
              <td>表演類型：舞臺魔術</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
