<?php
	session_start();
	$ac=$_SESSION['account'];
   $num = $_GET["num"];
   $p = $_GET["p"];
$link = mysqli_connect('localhost', 'project', '0931821282','traum') or die("con");
mysqli_select_db($link, 'traum') or die("db");
mysqli_query($link,"SET CHARACTER SET utf8");
$sql = "SELECT * FROM `訂單` WHERE `編號` = '$num'";
$result = mysqli_query($link, $sql) or die("qdueary1");
$row = mysqli_fetch_assoc($result);
$sql8 = "SELECT * FROM `會員` WHERE `帳號` = '$p' ";
$result8 = mysqli_query($link, $sql8) or die("qdueary");
$row8 = mysqli_fetch_assoc($result8);
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
	<script type="text/javascript">


	</script>
  <style media="screen">
    h2{
      width: 150px;
      margin-left: 15%;
      margin: 50px 0 0 15%;
      background-color: #F6DF6F;
      text-align: center;
    }
    .Container{
      width: 70%;
      margin-left: 15%;
      overflow: auto;
      border: 5px solid #F6DF6F;
      padding: 10px;
      background-color: #F9F9F9;
    }
    .CommemtNum{
      width: 95%;
      overflow: auto;
      padding-bottom: 20px;
      margin: 20px 2.5% 0 2.5%;
      /*margin-top: 50px;*/
    }
    .CommemtNum>img{
      width: 100px;
      height: 100px;
      margin: 20px;
      border: 1px solid black;
      border-radius: 50%;
      float: left;
    }
    button{
      float: right;
      width: 80px;
      height: 30px;
    }
    .fullStar{
      background-color: #F6DF6F;
    }
    .fullStar2{
      background-color: #F6DF6F;
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
				$num1=mysqli_num_rows($result);
				echo "(".$num1.")";
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

  <h2>我的評價<dic id="sss"></div></h2>
  <div class="Container">
    <form action="" method="POST">
      <div class="CommemtNum">
        <img src="
		<?php
					echo $row8['圖片'];
		?>" alt="">
        <div class="point">
          <div class="rateBox">
            <div class="howMuch" style="width:70%"></div>
            <img id="1" src="./img/CommemtStar.png" alt="">
            <img id="2" src="./img/CommemtStar.png" alt="">
            <img id="3" src="./img/CommemtStar.png" alt="">
            <img id="4" src="./img/CommemtStar.png" alt="">
            <img id="5" src="./img/CommemtStar.png" alt="">
          </div>
        </div>
        <textarea name="commemtArea" id = "commemtArea" rows="8" cols="80"></textarea>
      </div>
      <input class="button"  name="enter" type='button' value='送出' onclick="click01()">

    </form>

  </div>
<script type="text/javascript">
  var index, i, point;
  $('.rateBox img').hover(
    function(){
      index = this.id;
      for(i = 1; i <= index; i++){
        $('#' + i).addClass('fullStar');
      }
    },function(){
      $('.rateBox img').removeClass('fullStar');
    }
  );
  $('.rateBox img').click(function(){
    $('.rateBox img').removeClass('fullStar2');


    //point = this.id;
    for(i = 1; i <= index; i++){
      $('#' + i).addClass('fullStar2');
    }
	// 將POINT傳至另一個網址
  });
	var xmlHTTP;
	function click01()
	{


		$_xmlHttpRequest();

		var ss=$("#commemtArea").val();
	//	alert(ss);
		xmlHTTP.open("GET","give1.php?acc=<?php echo $ac;?>&acc2=<?php echo $p;?>&in="+index+"&num=<?php echo $num;?>&ss="+ss ,true);
		xmlHTTP.onreadystatechange=function check_user()
		{
				if(xmlHTTP.readyState == 4)
				{
						if(xmlHTTP.status == 200)
						{
								var str2=xmlHTTP.responseText;
								document.getElementById("sss").innerHTML=str2;
						}
				}
		}
		xmlHTTP.send(null);
		location.href="memberArea.php";
	//alert("s");

	}
	function $_xmlHttpRequest()
	{
	    if(window.ActiveXObject)
	    {
	        xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    else if(window.XMLHttpRequest)
	    {
	        xmlHTTP=new XMLHttpRequest();
	    }
	}

</script>
</body>
</html>
