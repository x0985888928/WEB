<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="Shortcut Icon" type="image/x-icon" href="img/page_logo.png" >
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="js/indexScript.js" charset="utf-8"></script>
  <script src="js/javascript.js" charset="utf-8"></script>
  <title>Traum築夢娛樂</title>
</head>
<body>
  <div id="header">
    <img src="./img/menu.png" alt="" id="menuIcon">
    <img src="./img/pc_home.png" alt="" id="banner">
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

  			      }
  			      else
              {
  					     echo "./img/member.png";
  			      }
  			   ?>
  			">
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
      <p id="unread">
			<?php
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
				echo "";
			}

			?></p></a>
    </div>
    <div id="slogan">
      <p>Make Your Dream Come True</p>
    </div>
  </div>
  <div id="sidePoint">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </div>
  <nav>
    <li><a href="search.php">搜尋</a></li>
    <li><a href="img/qrcode.jpg">聯絡我們</a></li>
    <li><a href="ranking.php">排行榜</a></li>
    <li><a href="">最新消息</a></li>
    <li><a href="">常見問題</a></li>
  </nav>
  <div id="AboutUs">
    <div class="container">
      <img src="img/aboutUs1.png" alt="">
      <div class="imgBox">
        <p>多元 Variety</p>
				<span>TRAUM提供多元的魔術表演帶給你更多元的視覺饗宴</span>
      </div>
    </div>
    <div class="container">
      <img src="img/aboutUs2.png" alt="">
      <div class="imgBox">
        <p>獨特 Unique</p>
				<span>TRAUM提供專屬舞台給獨特的你/妳，一展長才</span>
      </div>
    </div>
    <div class="container">
      <img src="img/aboutUs3.png" alt="">
      <div class="imgBox">
        <p>實踐 Fulfill</p>
				<span>TRAUM提供更接近夢想的舞台，一同實踐夢想</span>
      </div>
    </div>
  </div>
  <div id="Ranking">

  </div>
  <div id="News">
    <div class="Box">
      <p>最新消息</p>
      <p>NEWS</p>
    </div>
    <div id="NewsBox">

    </div>
  </div>
  <div id="QandA">
    <p><span>常見</span>問題 Q&A <img src="./img/icon/home_qa.png" alt=""></p>
    <ul>
      <img src="img/icon/pc_home_qa2.png" alt="">
      <li><a href="">如何查詢歷史訂單</a></li>
      <li><a href="">如何確定訂單是否成立</a></li>
      <li><a href="">訂單成立後可否異動</a></li>
      <li><a href="">如何取消訂單</a></li>
    </ul>
    <ul>
      <img src="img/icon/pc_home_qa1.png" alt="">
      <li><a href="">接洽流程為何</a></li>
      <li><a href="">如何與表演者聯絡</a></li>
    </ul>
    <ul>
      <img src="img/icon/pc_home_qa3.png" alt="">
      <li><a href="">如何申請會員</a></li>
      <li><a href="">同一個會員是否可以同時當表演者及找表演</a></li>
      <li><a href="">付款方式</a></li>
    </ul>
    <ul>
      <img src="img/icon/pc_home_qa4.png" alt="">
      <li><a href="">聯絡我們</a></li>
    </ul>
  </div>
  <div id="Footer">
    <img src="img/pc_contact.png" alt="" id="footerBGI">
    <img src="img/footer_logo.png" alt="" id="footerLogo">
    <div id="mediaBox">
      <a href="https://www.facebook.com/Traum0505/?modal=admin_todo_tour"><img src="img/icon/icon_facebook.png" alt=""></a>
      <a href=""><img src="img/icon/icon_ig.png" alt=""></a>
      <a href=""><img src="img/icon/icon_line.png" alt=""></a>
    </div>
    <p>Copyright © 2015 Traum Inc. All rights reserved</p>
  </div>
</body>
</html>
