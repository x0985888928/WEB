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
  <title>TRAUM</title>
  <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/memberArea.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>
  <script src="./js/member.js" charset="utf-8"></script>
	<script language="javascript">
	//talk = "d";
	function myMsg(myObj){

		talk = myObj.id;
	//alert("id 為: " + talk);
	}
	function my(){
		document.write(talk);
		return (talk);
	}


</script>
</head>
<body>
	<?php
		if(isset($_SESSION['account'])){
		  echo "<div id="."mail".">
		    <a href="."memberArea.php"."><img src="."./img/mailBox.png"." alt=".""."></a>
		  </div>";
		}
	?>
  <div id="Header">
    <div id="Menu">
      <div class="emptyBox"></div>
      <img src="./img/menu.png" alt=""></div>
    <div id="Logo"><a href="index.php"></a>
      <div id="MemberInfoPC">
        <div class="emptyBox"></div>
        <div class="MemberFace">
        <input type="image" src="
				<?php
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
				?>
				" style="border-radius:50%; width:50px; height:50px; outline:0;  " onClick="location.href='http://114.35.91.83/
				<?php
					if(isset($_SESSION['account'])) echo"memberArea.php";
					else echo"login.php";
				?>' " value=""  ></div>

        <?php
        	if(isset($_SESSION['account'])){
						echo $row1['姓名'];
						echo "您好!";
						echo "<a href="."logout.php"." style="."text-align:center;line-height:20px;font-size:15px"." >登出</a>";
					}
					else{
					  echo "<a href="."login.php"." style="."text-align:center;line-height:20px;font-size:15px"." >請登入</a>";
					}
				?>
			</div>
		</div>
			<div id="MemberInfo">
				<div class="emptyBox"></div>
				<div class="MemberFace"></div>
			</div>
    </div>
  <nav>
    <a href="./aboutUs.php"><li id="aboutUs" class="navPic"></li></a>
    <a href="./news.php"><li id="news" class="navPic"></li></a>
    <a href="./search.php"><li id="search" class="navPic"></li></a>
    <a href="./ranking.php"><li id="ranking" class="navPic"></li></a>
    <a href="./q_a.php"><li id="q_a" class="navPic"></li></a>
  </nav>
  <div id="MemberData">
    <!-- <div id="PhoneNav">
      a*4[href=]
    </div> -->
    <h2>會員專區</h2>
    <div id="leftNav"class="Nav">
      <li><a href="#tab1"  >基本資料</a></li>
      <li><a href="#tab2"
						<?php
							if($row1['表演者']==1) echo "style="."display:none".""
						?>>表演者專區</a></li>
      <li><a href="#tab3">訂單記錄</a></li>
      <li><a href="#tab4">信箱</a></li>
    </div>
    <div class="tabBox">
      <div id="tab1" class="view" >
        <div class="smallBox">
          <img src="
						<?php
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
						?>" alt="">
					<form method="post" action="" enctype="Multipart/Form-Data">
						<a href=""><label for="file">照片上傳</label>
		    		<input type="file" id="file" name="file" accept=".jpg, .jpeg, .png" multiple style="display: none;" onChange="ss.click() "></a>
						<input name ="ss" type="submit" style="display: none;">
						<?php
	  					if($set==1){
	  						echo "<script language="."javascript".">alert('您上傳的檔案尺寸為"."$owidth"."*"."$oheight"."，請用縮圖程式改成400x400');</script>";

	  					}
						?>
        	</form>
        </div>
        <form class="" action="" method="post">
					<table>
            <tr>
              <td>姓名：</td>
              <td>
								<?php
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
								?>
							</td>
            </tr>
            <tr>
              <td>性別：</td>
              <td>
								<?php
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
								?>
							</td>
            </tr>
            <tr>
              <td>帳號：</td>
              <td>
								<?php
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
								?>
							</td>
            </tr>
            <tr>
              <td>密碼：</td>
              <td>******</td>
            </tr>
            <tr>
              <td>暱稱：</td>
              <td><input name ="nick" type="text" value="
								<?php
									echo $row1['暱稱'];
								?>">
							</td>
            </tr>
            <tr>
              <td>生日：</td>
              <td>
								<?php
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
								?>
							</td>
            </tr>
            <tr>
              <td>聯絡電話：</td>
              <td><input name="phone"type="text" value="0<?php echo $row1['電話'];?>"></td>
            </tr>
            <tr>
              <td>E-mail：</td>
              <td><input name="mail"type="text" value="<?php echo $row1['信箱'];?>"></td>
            </tr>
            <tr>
              <td>聯絡地址：</td>
							<?php
								$a=mb_substr($row1['地址'],0,3,"UTF-8");
							?>
              <td><select name="place1">
                <option value="新北市">新北市</option>
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
              <td colspan="2" style="text-align:left;"><input class="BTA" name = "place2" type="text" value="<?php
									echo mb_substr($row1['地址'],3,25,"UTF-8");
								?>">
							</td>
            </tr>
            <tr>
              <td>表演者身份：</td>
              <td>
                <input type="radio" name="radio" value="0" <?php if($row1['表演者']==0) echo "checked="."checked"."";?> >是，我要當表演者
                <input type="radio" name="radio" value="1" <?php if($row1['表演者']==1) echo "checked="."checked"."";?> >否，尚不需要
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align:right;">
                <input class="enter" type='reset' value='重新填寫'>
                <input class="enter" name ="introduce" type='submit' value='送出表單'>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div id="tab2" class="view" style="display:inline;">
				<?php
					if(isset($_POST["per"])){

					 	$link = mysqli_connect('localhost', 'project', '0931821282','traum');
						mysqli_select_db($link, 'traum') or die("db");
						mysqli_query($link,"SET CHARACTER SET utf8");
						$intro = $_POST['intro'];
						$v1 = $_POST['v1'];
						$v2 = $_POST['v2'];
						$v3 = $_POST['v3'];
						$v4 = $_POST['v4'];
					 	if($v1!=NULL){
							mysqli_query($link, "INSERT INTO `表演者影片`(`帳號`, `影片`)VALUES ('$ac','$v1')");
						}
					 	if($v2!=NULL){
					 		mysqli_query($link, "INSERT INTO `表演者影片`(`帳號`, `影片`)VALUES ('$ac','$v2')");
					 	}
					 	if($v3!=NULL){
					 		mysqli_query($link, "INSERT INTO `表演者影片`(`帳號`, `影片`)VALUES ('$ac','$v3')");
					 	}
					 	if($v4!=NULL){
					 		mysqli_query($link, "INSERT INTO `表演者影片`(`帳號`, `影片`)VALUES ('$ac','$v4')");
					 	}
						$numr = mysqli_query($link, "SELECT * FROM `表演者照片`  WHERE `帳號` = '$ac'") or die("qdueary");
						$num = mysqli_num_rows($numr);
						$filename1=$_FILES["ph1"]["name"];
					  if($filename1!=NULL){
					 		$tmp_name1=$_FILES["ph1"]["tmp_name"];
					   	$size1 = $_FILES["ph1"]["size"];
					 		$s1 = getimagesize($tmp_name1);
					 		$ty1=$s1[2];
							if($size1>10240000){
					      alert("上傳檔案不得超過 10M ");
					  	}
							switch($ty1){
							 case 1:
									$t=".gif";break;
							 case 2:
									$t=".jpg";break;
							 case 3:
									$t=".png";break;
							 case 4:
									$t=".swf";break;
							}
							$num=$num+1;
							$l1="/var/www/html/actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
							if(move_uploaded_file($tmp_name1,$l1)){
								$loc1= "./actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
								mysqli_query($link, "INSERT INTO `表演者照片`(`帳號`, `照片路徑`)VALUES ('$ac','$loc1')");
							}
						}
						$filename2=$_FILES["ph2"]["name"];
					  if($filename2!=NULL)
						{
					 		$tmp_name2=$_FILES["ph2"]["tmp_name"];
					   	$size2 = $_FILES["ph2"]["size"];
					 		$s2 = getimagesize($tmp_name2);
					 		$ty2=$s2[2];
							if($size2>10240000)
							{
				        alert("上傳檔案不得超過 10M ");
				  		}
							echo $tmp_name2;
							switch($ty2)
							{
							 case 1:
									$t=".gif";break;
							 case 2:
									$t=".jpg";break;
							 case 3:
									$t=".png";break;
							 case 4:
									$t=".swf";break;
							}
							$num=$num+1;
							$l2="/var/www/html/actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
							if(move_uploaded_file($tmp_name2,$l2))
							{
								$loc2= "./actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
								mysqli_query($link, "INSERT INTO `表演者照片`(`帳號`, `照片路徑`)VALUES ('$ac','$loc2')");
							}
						}
						$filename3=$_FILES["ph3"]["name"];
					  if($filename3!=NULL){
					 		$tmp_name3=$_FILES["ph3"]["tmp_name"];
					   	$size3 = $_FILES["ph3"]["size"];
					 		$s3 = getimagesize($tmp_name3);
					 		$ty3=$s3[2];
							if($size3>10240000){
					      alert("上傳檔案不得超過 10M ");
					  	}
							switch($ty3){
							 case 1:
									$t=".gif";break;
							 case 2:
									$t=".jpg";break;
							 case 3:
									$t=".png";break;
							 case 4:
									$t=".swf";break;
							}
							$num=$num+1;
							$l3="/var/www/html/actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
							if(move_uploaded_file($tmp_name3,$l3)){
								$loc3= "./actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
								mysqli_query($link, "INSERT INTO `表演者照片`(`帳號`, `照片路徑`)VALUES ('$ac','$loc3')");
							}
						}
						$filename4=$_FILES["ph4"]["name"];
				  	if($filename4!=NULL){
					 		$tmp_name4=$_FILES["ph4"]["tmp_name"];
					   	$size4 = $_FILES["ph4"]["size"];
					 		$s4 = getimagesize($tmp_name4);
					 		$ty4=$s4[2];
							if($size4>10240000){
					      alert("上傳檔案不得超過 10M ");
					  	}
							switch($ty4){
								case 1:
									$t=".gif";
									break;
							 	case 2:
									$t=".jpg";
									break;
							 	case 3:
									$t=".png";
									break;
							 	case 4:
									$t=".swf";
									break;
							}
							$num=$num+1;
							$l4="/var/www/html/actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
							if(move_uploaded_file($tmp_name4,$l4)){
								$loc4= "./actor/".$row1['帳號']."/".$row1['帳號']."-".$num.$t;
								mysqli_query($link, "INSERT INTO `表演者照片`(`帳號`, `照片路徑`)VALUES ('$ac','$loc4')");
								mysqli_close($link);
							}
						}
						$link = mysqli_connect('localhost', 'project', '0931821282','traum');
						mysqli_select_db($link, 'traum') or die("db");
						mysqli_query($link,"SET CHARACTER SET utf8");
						$up=mysqli_query($link, "UPDATE `表演者` SET `自介` = '$intro'  WHERE `帳號` = '$ac' ") or die("qd5ueary");
						$type1 = $_POST['type1'];
						if($type1==1)
								mysqli_query($link, "INSERT INTO `表演者類型`(`帳號`, `類型`)VALUES ('$ac','$type1')") or die("qd5ueary");
						else {
							mysqli_query($link, "DELETE FROM `表演者類型` WHERE `帳號` = '$ac' and `類型` = 1") or die("qd5ueary");
						}
						$type2 = $_POST['type2'];
						if($type2==2)
								mysqli_query($link, "INSERT INTO `表演者類型`(`帳號`, `類型`)VALUES ('$ac','$type2')") or die("qd5ueary");
						else {
							mysqli_query($link, "DELETE FROM `表演者類型` WHERE `帳號` = '$ac' and `類型` = 2") or die("qd5ueary");
						}
						$type3 = $_POST['type3'];
						if($type3==3)
								mysqli_query($link, "INSERT INTO `表演者類型`(`帳號`, `類型`)VALUES ('$ac','$type3')") or die("qd5ueary");
						else {
							mysqli_query($link, "DELETE FROM `表演者類型` WHERE `帳號` = '$ac' and `類型` = 3") or die("qd5ueary");
						}
						$type4 = $_POST['type4'];
						if($type4==4)
								mysqli_query($link, "INSERT INTO `表演者類型`(`帳號`, `類型`)VALUES ('$ac','$type4')") or die("qd5ueary");
						else {
							mysqli_query($link, "DELETE FROM `表演者類型` WHERE `帳號` = '$ac' and `類型` = 4") or die("qd5ueary");
						}
						$type5 = $_POST['type5'];
						if($type5==5)
						{
							$type6 = $_POST['type6'];
							mysqli_query($link, "INSERT INTO `表演者類型`(`帳號`, `類型`, `其他`)VALUES ('$ac','$type5', '$type6')") or die("qd5ueary");
						}
						else {
							mysqli_query($link, "DELETE FROM `表演者類型` WHERE `帳號` = '$ac' and `類型` = 5") or die("qd5ueary");
						}

						$pl1 = $_POST['pl1'];
						if($pl1==1)
								mysqli_query($link, "INSERT INTO `表演者區域`(`帳號`, `地區`)VALUES ('$ac','$pl1')") or die("qd5ueary");
						else {
							mysqli_query($link, "DELETE FROM `表演者區域` WHERE `帳號` = '$ac' and `地區` = 1") or die("qd5ueary");
						}
						$pl2 = $_POST['pl2'];
						if($pl2==2)
								mysqli_query($link, "INSERT INTO `表演者區域`(`帳號`, `地區`)VALUES ('$ac','$pl2')") or die("qd5ueary");
						else {
							mysqli_query($link, "DELETE FROM `表演者區域` WHERE `帳號` = '$ac' and `地區` = 2") or die("qd5ueary");
						}
						$pl3 = $_POST['pl3'];
						if($pl3==3)
								mysqli_query($link, "INSERT INTO `表演者區域`(`帳號`, `地區`)VALUES ('$ac','$pl3')") or die("qd5ueary");
						else {
							mysqli_query($link, "DELETE FROM `表演者區域` WHERE `帳號` = '$ac' and `地區` = 3") or die("qd5ueary");
						}
					}
					$link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");



					$sql = "SELECT * FROM `表演者`  WHERE `帳號` = '$ac'";
					$resultp =  mysqli_query($link, $sql) or die("qdueary");
					$rowp = mysqli_fetch_assoc($resultp);
					$intro = $rowp['自介'];
					$resultp2 = mysqli_query($link, "SELECT * FROM `表演者類型`  WHERE `帳號` = '$ac'") or die("qdueary");
					$a=array("0","0","0","0","0");
					while($rowp2=mysqli_fetch_assoc($resultp2)){
						$a[$rowp2['類型']-1]="1";
					}
				?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="box">
            <h3>自我介紹：</h3>
            <textarea name="intro" rows="8" cols="100"><?php echo $intro;?></textarea>
						<h3>表演類型：</h3>
						<input type="checkbox" name="type1" value="1" <?php if($a[0]==1) echo "checked="."checked"."";?>>互動秀
						<input type="checkbox" name="type2" value="2" <?php if($a[1]==1) echo "checked="."checked"."";?>>大型魔術秀
						<input type="checkbox" name="type3" value="3" <?php if($a[2]==1) echo "checked="."checked"."";?>>一般舞臺魔術
						<input type="checkbox" name="type4" value="4" <?php if($a[3]==1) echo "checked="."checked"."";?>>沿桌近距離魔術
						<input type="checkbox" name="type5" value="5" <?php if($a[4]==1) echo "checked="."checked"."";?>>其他
						<input type="text" name="type6" value="<?php
							if($a[4]==1){
								$re = mysqli_query($link, "SELECT * FROM `表演者類型`  WHERE `帳號` = '$ac' and `類型` = 5 ") or die("qdueary");
								$ro = mysqli_fetch_assoc($re);
								echo $ro['其他'];
							}
						?>">
						<h3>表演地區：</h3>
						<?php
							$resultp2 = mysqli_query($link, "SELECT * FROM `表演者區域`  WHERE `帳號` = '$ac'") or die("qdueary");
							//$type = $rowp2['類型'];
							$b=array("0","0","0","0","0");
							while($rowp2=mysqli_fetch_assoc($resultp2)){
								$b[$rowp2['地區']-1]="1";
								//echo $rowp2['類型'];
							}
					  ?>
            <input type="checkbox" name="pl1" value="1" <?php if($b[0]==1) echo "checked="."checked"."";?>>北區
            <input type="checkbox" name="pl2" value="2" <?php if($b[1]==1) echo "checked="."checked"."";?>>中區
            <input type="checkbox" name="pl3" value="3" <?php if($b[2]==1) echo "checked="."checked"."";?>>南區

						<br>
            <div class="showBox">
              <h3>活動影片：</h3>
              <!-- <button class="more" type="button" name="button">更多</button> -->
              <input name = "v1" type="text"  placeholder="Youtube URL">
              <input type="text" name = "v2" placeholder="Youtube URL">
              <input type="text" name = "v3" placeholder="Youtube URL">
              <input type="text" name = "v4" placeholder="Youtube URL">

            </div><br>
            <div class="showBox">
              <h3>活動照片：</h3>
							<input type="file" name="ph1" accept=".jpg, .jpeg, .png" >
					<!--		<input type="file" name="ph2" accept=".jpg, .jpeg, .png" >
							<input type="file" name="ph3" accept=".jpg, .jpeg, .png" >
							<input type="file" name="ph4" accept=".jpg, .jpeg, .png" >  .-->
							<br><br>
            </div>
						<input class="enter" style="margin-right:40%"  type="reset" value="重新填寫">
		        <input name="per" type="submit" value="送出表單">
          </div>
        </form>
      </div>
      <div id="tab3" class="view">
        <div id="subNav" class="Nav">
          <li><a href="#finish">已完成</a></li>
          <li><a href="#notYet">未完成</a></li>
        </div>
        <div class="orderBox">
          <div id="finish" class="order">
            <?php
			        if(isset($_SESSION['account'])){
								$ac=$_SESSION['account'];
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$sql = "SELECT * FROM `訂單`  WHERE `表演者` = '$ac' and `完成與否`=1 ";
								$resultf = mysqli_query($link, $sql) or die("qdueary");
								$data_nums = mysqli_num_rows($resultf);

								if($data_nums!=0){
									$per = 10;
									$pages = ceil($data_nums/$per);
									if (!isset($_GET["page"])){
										$page=1;
									}
									else {
										$page = intval($_GET["page"]);
									}


									$row = mysqli_fetch_assoc($result);

									$start = ($page-1)*$per;
									$sql2 = "SELECT * FROM `訂單`  WHERE `表演者` = '$ac' and `完成與否`=1 limit $start , $per";
									$result = mysqli_query($link,$sql2) or die("asd");
									echo "表演
									<table>
									<tr>
										<td>訂單編號</td>
										<td>姓名</td>
										<td>訂單金額</td>
										<td>訂單日期</td>
										<td>評價</td>
										<td>備註</td>
									</tr>";

									while( $row = mysqli_fetch_assoc($result))
									{

										echo "<tr>";
										echo "<td>"."$row[編號]"."</td>";
										echo "<td>"."$row[聯絡人]"."</td>";
										echo "<td>"."$row[金額]"."</td>";
										echo "<td>"."$row[日期]"."</td>";
										if($row['評價']==0){
											echo"<td><a href='giveComment.php?p=$row[編號]'>未評價</a></td>";
										}
											else
											{
												$sql33 = "SELECT * FROM `評論` WHERE `訂單編號`='$row[編號]' ";
									$result33 = mysqli_query($link, $sql33) or die("qdueary");
									$row33 = mysqli_fetch_assoc($result33);
												echo "<td>$row33[評價]</td>";}
										echo "<td>"."$row[其他]"."</td>";
										echo "</tr>";
									}
									echo "</table></form>";
									$sql3 = "SELECT * FROM `訂單`  WHERE `聯絡人` = '$ac' and `完成與否`=1 limit $start , $per";

									$result = mysqli_query($link,$sql3) or die("asd");
									echo "提供場地
									<table>
									<tr>
										<td>訂單編號</td>
										<td>姓名</td>
										<td>訂單金額</td>
										<td>訂單日期</td>
										<td>評價</td>
										<td>其他</td>
									</tr>";

									while( $row = mysqli_fetch_assoc($result)){
										echo "<tr>";
										echo "<td>"."$row[編號]"."</td>";
										echo "<td>"."$row[聯絡人]"."</td>";
										echo "<td>"."$row[金額]"."</td>";
										echo "<td>"."$row[日期]"."</td>";
											if($row['評價']==0){
											echo"<td><a href='giveComment.php?p=$row[編號]'>未評價</a></td>";
										}
											else
											{
												$sql33 = "SELECT * FROM `評論` WHERE `訂單編號`='$row[編號]' ";
									$result33 = mysqli_query($link, $sql33) or die("qdueary");
									$row33 = mysqli_fetch_assoc($result33);
												echo "<td>$row33[評價]</td>";
												}
										echo "<td>"."$row[其他]"."</td>";
										echo "</tr>";
									}
									echo "</table></form>";
									mysqli_close($link);
									echo "<div style="."text-align:center;height:20px;line-height:20px".">共 "."$data_nums"." 筆-在 "."$page"." 頁-共 "."$pages"." 頁</div><div style="."text-align:center;height:20px;line-height:20px".">";
					    		echo "第 ";
					    		for( $i=1 ; $i<=$pages ; $i++ )
										echo "<a  href=?page="."$i".">"."$i"."</a> ";

									echo "頁</div>";
								}
								else {
									echo "<div class="."NoOrder".">
										<img src="."./img/NoOrder.png"." alt="."".">
									</div>";
								}
							}
						?>
          </div>
          <div id="notYet" class="order">
            <div class="NoOrder">
							<?php
								if(isset($_SESSION['account'])){
									$ac=$_SESSION['account'];
									$link = mysqli_connect('localhost', 'project', '0931821282','traum');
									mysqli_select_db($link, 'traum') or die("db");
									mysqli_query($link,"SET CHARACTER SET utf8");
									$sql = "SELECT * FROM `訂單`  WHERE `表演者` = '$ac' and `完成與否`=0 ";
									$resultf = mysqli_query($link, $sql) or die("qdueary");
									$data_nums2 = mysqli_num_rows($resultf);
									if($data_nums2!=0){
										$per = 10;
										$pages2 = ceil($data_nums/$per);
									if (!isset($_GET["page2"])){
										$page2=1;
									} else {
										$page2 = intval($_GET["page2"]);
									}
									$sql33 = "SELECT * FROM `評論` JOIN `會員` WHERE `會員`.`帳號` = `評論`.`受評人`";
									$result = mysqli_query($link, $sql33) or die("qdueary");
									$row = mysqli_fetch_assoc($result);
									$k=$row['評價'];
									$start = ($page2-1)*$per;
									$sql2 = "SELECT * FROM `訂單`  WHERE `表演者` = '$ac' and `完成與否`=0 limit $start , $per";
									$result = mysqli_query($link,$sql2) or die("asd");
									echo "<table>
										<tr>
											<td>訂單編號</td>
											<td>姓名</td>
											<td>訂單金額</td>
											<td>訂單日期</td>
											<td>評價</td>
											<td>其他</td>
										</tr>";

									while( $row = mysqli_fetch_assoc($result)){
											echo "<tr>";
											echo "<td>"."$row[編號]"."</td>";
											echo "<td>"."$row[聯絡人]"."</td>";
											echo "<td>"."$row[金額]"."</td>";
											echo "<td>"."$row[日期]"."</td>";
											echo "<td>"."日期未到"."</td>";
											echo "<td>"."$row[其他]"."</td>";
											echo "</tr>";
									}
									echo "</table></form>";
									mysqli_close($link);

									echo "<div style="."text-align:center;height:20px;line-height:20px".">共 "."$data_nums2"." 筆-在 "."$page2"." 頁-共 "."$pages2"." 頁</div><div style="."text-align:center;height:20px;line-height:20px".">";
									echo "第 ";
									for( $i=1 ; $i<=$pages2 ; $i++ )
										echo "<a  href=?page2="."$i".">"."$i"."</a> ";
									echo "頁</div>";
									}
									else {
										echo "<div class="."NoOrder".">
										<img src="."./img/NoOrder.png"." alt="."".">
										</div>";
									}
								}
							?>
            </div>
          </div>
        </div>
      </div>
			<div id="tab4" class="view">
				<div id="chatList"><?php

					$ac=$_SESSION['account'];
											$link = mysqli_connect('localhost', 'project', '0931821282','traum');
											mysqli_select_db($link, 'traum') or die("db");
											mysqli_query($link,"SET CHARACTER SET utf8");
											$sql = "SELECT * FROM `聊天室` WHERE `收方`='$ac' ORDER BY `日期` DESC limit 1 ";
											$result = mysqli_query($link, $sql) or die("queary");

											while($row = mysqli_fetch_assoc($result)){
														$sql2222 = "SELECT * FROM `會員` WHERE `帳號`='$row[送方]' ";
														$result2222 = mysqli_query($link, $sql2222) or die("qqqueary");
														$row2222 = mysqli_fetch_assoc($result2222);

														echo"<div class="."chatMember".">";
		        								echo"<img src="."$row2222[圖片]"."  id="."456"." onclick="."     ";
														echo " talk = "."2722"."; ";
		        								echo " "."><div class="."chatContent";
														if($row['已讀與否']==0)
																		echo"Unread";
		        								echo" ".">$row[內容]</div><p class="."chatDate ";
														if($row['已讀與否']==0)
																		echo"Unread";
														echo" ".">$row[日期]</p></div>";
														}
				  ?>
				</div>

				<div id="chatBox" class="gone">
          <h4>莎莎</h4>
					<script type="text/javascript">
    						var t = my() ;
</script>
          <div class="feedback">
            <img src="./img/member.png" alt="">
            <div class="conversation">
              <p>hi</p>
            </div>
          </div>
          <div class="reply">
            <div class="conversation">
              <p>您好</p>
            </div>
          </div>
          <div id="texting">
            <input type="text" name="" value="">
            <button type="button" name="button">Enter</button>
          </div>
        </div>

		</div>

	</div>
	</div>
<h1>評價</h1>
  <div id="commemt">

    <div class="rateBox">
      <div class="howMuch" style="width:<?php
			$ac=$_SESSION['account'];
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
          $sql1 = "SELECT * FROM `評論` WHERE `受評人`= '$ac'";
					$result = mysqli_query($link, $sql1) or die("qdueary");
					$row1 = mysqli_num_rows($result);
					if($row1==0)
            echo "0";
					else{
					       $sql2 = "SELECT * FROM `評論` WHERE `受評人`='$ac'";
					       $result = mysqli_query($link, $sql2) or die("qdueary");
								 $c=0;
								 $c1 = mysqli_num_rows($result);
								 while($row = mysqli_fetch_assoc($result))
								 {
									 	$c=$row['評價']+$c;
								 }
					       $k=$c/$c1*20;

                 echo $k;
		      }
          ?>%"></div>
      <img src="./img/pointStar.png" alt="">
    </div>
    <div class="CommemtDetail">
      <h4>
          <?php

          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql2 = "SELECT * FROM `評論` where`受評人`='$ac' ";
					$result = mysqli_query($link, $sql2) or die("qdueary");
					$row2 = mysqli_fetch_assoc($result);
					if(mysqli_num_rows($result)==0)
					{
						  echo "0";
					}
					else
					{
						  echo $row2['評價'];
					}


          ?> / 5</h4>
        <p>5星( <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');

					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人` = '$ac' and `評價`=5";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>4星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人` = '$ac' and `評價`=4";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>3星( <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "
SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人` = '$ac'and `評價`=3";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>2星(<?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "
SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人`= '$ac'and `評價`=2";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
        <p>1星( <?php
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
					mysqli_select_db($link, 'traum') or die("db");
					mysqli_query($link,"SET CHARACTER SET utf8");
					$sql = "
SELECT COUNT(`評價`) FROM `評論`  WHERE `受評人`= '$ac' and `評價`=1";
					$result = mysqli_query($link, $sql) or die("qdueary");
					$row = mysqli_fetch_assoc($result);

          echo $row['COUNT(`評價`)'];
          ?>)</p>
      </div>
			<div id="commemtBox">

				<?php

							$link = mysqli_connect('localhost', 'project', '0931821282','traum');
							mysqli_select_db($link, 'traum') or die("db");
							mysqli_query($link,"SET CHARACTER SET utf8");
							$sql = "SELECT * FROM `評論` JOIN `會員` on `會員`.`帳號` = `評論`.`評論者` where `評論`.`受評人`='$ac'";
							$result = mysqli_query($link, $sql) or die("qdueary");
							$row1 = mysqli_fetch_assoc($result);

							if(mysqli_num_rows($result)==0)
							{
								  echo "<img src="."./img/member.png".">";
							}
							else
							{
								  echo "<img src="."$row1[圖片]"."  onClick="." location.href='http://114.35.91.83/performer.php?p=$row1[評論者]' ".">";
							}

							mysqli_close($link);
		          ?>
		      <div class="point">
		        <div class="rateBox">
		          <div class="howMuch" style="width:<?php

		          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
							mysqli_select_db($link, 'traum') or die("db");
							mysqli_query($link,"SET CHARACTER SET utf8");
							$sql5 = "SELECT * FROM `評論` WHERE `受評人`='$ac'";
							$result5 = mysqli_query($link, $sql5) or die("qdueary");
							$row5 = mysqli_fetch_assoc($result5);
							$k=$row5['評價']*20;
		          echo $k;
		          ?>%"></div>
		          <img src="./img/pointStar.png" alt="">
		        </div>
		      </div>
		      <div class="commemtArea">
						<?php

		          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
							mysqli_select_db($link, 'traum') or die("db");
							mysqli_query($link,"SET CHARACTER SET utf8");
							$sql = " SELECT * FROM `評論`  WHERE `受評人`= '$ac'";
							$result = mysqli_query($link, $sql) or die("qdueary");

							if(mysqli_num_rows($result)==0)
							{
								  echo "尚無評論";
							}
							else
							{
								  echo $row['內容'];
							}

		          ?></div></div>

		</div>
  <div id="Footer">
    <p>Copyright © 2015-2017 Traum All rights reserved</p>
  </div>

</body>
</html>
