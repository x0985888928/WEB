<?php
	session_start();

	if(isset($_POST["but"])){
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$acc = $_POST['ac'];
								$pd = $_POST['pd'];
								$sql = "SELECT * FROM `會員` WHERE `帳號` = '$acc' AND `密碼` = '$pd'";
								$result = mysqli_query($link, $sql) or die("qdueary");
								$row = mysqli_fetch_assoc($result);
								mysqli_close($link);
								if($row["帳號"]==$acc && $row["密碼"]==$pd )
								{
										$_SESSION['account']=$acc;
										header("Location: index.php");
								}
								echo "<script language="."javascript".">alert('登入錯誤');</script>";
						}

						if(isset($_POST["reg"]))
						{
								$_SESSION['account']=$acc;
								$link = mysqli_connect('localhost', 'project', '0931821282','traum');
								mysqli_select_db($link, 'traum') or die("db");
								mysqli_query($link,"SET CHARACTER SET utf8");
								$name = $_POST['na'];
								$acc = $_POST['acc'];
								$pd = $_POST['pww'];
								$mail = $_POST['mail'];
								$a = $_POST['idn'];
								$phone = $_POST['phone'];
								$sex = $_POST['sex'];
								$date = $_POST['birth'];
								$place1 = $_POST['place1'];
								$place2 = $_POST['place2'];
								$place="$place1"."$place2";
								$sql2="INSERT INTO `會員`(`帳號`, `密碼`, `姓名`, `生日`, `性別`, `電話`, `信箱`, `圖片`, `地址`,`表演者`,`暱稱`,`評分`)
											VALUES ('$acc','$pd','$name','$date','$sex','$phone','$mail','./img/123.png','$place','1','','0')";
								mysqli_query($link,$sql2) or die($sql2);
								mysqli_query($link,"INSERT INTO `表演者`(`帳號`, `自介`, `收費`, `滿意度`, `評論`, `經歷`, `藝名`)
											VALUES ('$acc','','0','0','','','')") or die("a32");
								mkdir("./actor/".$acc, 0777, true) or die("sa3");
								chmod("./actor/".$acc, 0777);
								mysqli_close($link);
								header("Location: index.php");
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
  <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="js/indexScript.js" charset="utf-8"></script>
  <script src="js/javascript.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/header.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
	<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js "></script>
	<script>

	$(document).ready(function($) {
	    $.validator.addMethod("notEqualsto", function(value, element, arg) {
	        return arg != value;
	    }, "您尚未選擇!");

	$("#ff").validate({
	    submitHandler: function(form) {

	        form.submit();
	    },
	    rules: {
	        acc: {
	            required: true,
	            minlength: 4,
	            maxlength: 15
	        },
	        pww: {
	            required: true,
	            minlength: 5,
	            maxlength: 10
	        },




	        mail: {
	            required: true,
	            email: true
	        },

					na: {
	            required: true
	        },
					phone: {
							required: true
					},
					birth: {
	            required: true
	        },
					place1: {
	            required: true
	        },
					place2: {
	            required: true
	        },




	    },
	    messages: {
	        acc: {
	            required: "帳號為必填欄位",
	            minlength: "帳號最少要4個字",
	            maxlength: "帳號最長15個字"
	        },
					na: {
	            required: "姓名為必填欄位",
	            minlength: "姓名最少要2個字",
	            maxlength: "姓名最長15個字"
	        },


	    }
	});
	});
	</script>

	<style type="text/css">
	.error {
	     color: #D82424;
	     font-weight: normal;
	     display: inline;
	     padding: 1px;
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
			" >
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
  <div class="container">
    <div id="signup">
      <p>註冊 SIGN UP</p>
      <form action="" method="post" name="ff" id="ff">
        <table>
          <tr>
            <td width="40%"><p>姓名</p></td>
            <td width="60%"><input type='text' name="na"></td>
          </tr>
          <tr>
            <td width="40%"><p>帳號</p></td>
            <td width="60%"><input type='text' name="acc"></td>
          </tr>
          <tr>
            <td width="40%"><p>密碼</p></td>
            <td width="60%"><input type='password' name="pww"></td>
          </tr>
          <tr>
            <td width="40%"><p>生日</p></td>
            <td width="60%"><input type='date' name="birth"></td>
          </tr>
          <tr>
            <td><p>性別</p></td>
            <td>
              <input type="radio" name="sex" value="0" checked="checked">男
              <input type="radio" name="sex" value="1">女
            </td>
          </tr>
          <tr>
            <td width="40%"><p>信箱</p></td>
            <td width="60%"><input name="mail" type='text'></td>
          </tr>
          <tr>
            <td width="40%"><p>聯絡方式</p></td>
            <td width="60%"><input name="phone" type='text'></td>
          </tr>
          <tr>
            <td width="40%"><p>地址</p></td>
            <td width="60%">
              <select name="place1">
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
              </select>
            </td>
          </tr>
          <tr>
            <td width="40%"><p></p></td>
            <td width="60%"><input name = "place2" type='text'></td>
          </tr>
          <tr>
            <td><p>表演者身份：</p></td>
            <td>
              <input type="radio" name="yes" value="0">是
              <input type="radio" name="yes" value="1">否
            </td>
          </tr>
          <tr>
            <td width="50%"><input class="enter" type='reset' value='重新填寫'></td>
            <td width="50%"><input name="reg" class="enter" type='submit' value='送出表單'></td>
          </tr>
        </table>
      </form>
    </div>
    <div id="Login">
      <p>登入 LOGIN</p>
      <form action="" method="post">
        <table>
          <tr>
            <td width="40%"><p>帳號</p></td>
            <td width="60%"><input type='text' name="ac"></td>
          </tr>
          <tr>
            <td width="40%"><p>密碼</p></td>
            <td width="60%"><input type='password' name="pd"></td>
          </tr>
          <tr>
            <td width="50%"><input name="but" class="enter" type='submit' value='登入'></td>
          </tr>
        </table>
      </form>
    </div>
  </div>

</body>
</html>
