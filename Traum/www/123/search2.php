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
  <title>Traum築夢娛樂</title>
  <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="js/indexScript.js" charset="utf-8"></script>
  <script src="js/javascript.js" charset="utf-8"></script>
	<script type="text/javascript" src="/jquery/jquery.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		$(".tag").hide();
  	$("#0").click(function(){
  		$("#tag0").toggle(100);
		//	var select_op=document.getElementById("#0").value;
				alert("select_op");
  	});

	  	$("#1").click(function(){
	  		$("#tag1").toggle(100);

	  	});

		  	$("#2").click(function(){
		  		$("#tag2").toggle(100);

		  	});

			  	$("#3").click(function(){
			  		$("#tag3").toggle(100);

			  	});

				  	$("#4").click(function(){
				  		$("#tag4").toggle(100);

				  	});

					  	$("#5").click(function(){
					  		$("#tag5").toggle(100);

					  	});

						  	$("#6").click(function(){
						  		$("#tag6").toggle(100);

						  	});

								$("#hide0").click(function(){
										$("#tag0").hide();
										$("#0").removeAttr();
									})
								$("#hide1").click(function(){
										$("#tag1").hide();
										$("#1").change();
									})
								$("#hide2").click(function(){
										$("#tag2").hide();
										$("#2").click();
									})
								$("#hide3").click(function(){
										$("#tag3").hide();
										$("#3").click();
									})
								$("#hide4").click(function(){
										$("#tag4").hide();
										$("#4").click();
									})
								$("#hide5").click(function(){
										$("#tag5").hide();
										$("#5").click();
									})
								$("#hide6").click(function(){
									$("#tag6").hide();
									$("#6").click();
								})
	});
	$.ajax({
		url:'ajax_text.txt',
		data:{
			oper:	'query',
		},
		type:	'POST',
		dataType:'json',
		success:function(JData){
			$("#div1").html(JData);
		},
		error:function(xhr,ajaxOptions,thrownError){
			console.log(textStatus, errorThrown);
		}
	})

	</script>

  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/header.css">
</head>
<body>
  <div id="title">
    <img src="./img/icon/icon_menu2.png" alt="" id="menuIcon">
    <img src="./img/Logo.png" alt="" id="Logo">
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
            echo "memberArea2.php";
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
				mysqli_close($link);
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
    <input type="text" name="search" value="">
    <div id="tagsBox">
      <div class="tag" id = "tag0" >北部		<button id="hide0" width="10" height="20" >x</button></div>
      <div class="tag" id = "tag1" >中部		<button id="hide1" width="10" height="20" >x</button></div>
      <div class="tag" id = "tag2" >南部		<button id="hide2" width="10" height="20" >x</button></div>
      <div class="tag" id = "tag3" >互動秀		<button id="hide3" width="10" height="20" >x</button></div>
      <div class="tag" id = "tag4">大型秀		<button id="hide4" width="10" height="20" >x</button></div>
      <div class="tag" id = "tag5" >舞臺魔術 <button id="hide5" width="10" height="20" >x</button></div>
      <div class="tag" id = "tag6" >近距離		<button id="hide6" width="10" height="20" >x</button></div>
    </div>


    <div class="condition">
			<form>
      <p>區域</p>
      <table>
        <tr>
          <td><input type="checkbox" id ="0" name="" = value="" onchange="check()";>北區</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="1" name="" value="">中區</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="2" name="" value="">南區</td>
        </tr>
      </table>

      <p>類型</p>
      <table>
        <tr>
          <td><input type="checkbox" id ="3">互動秀</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="4">大型魔術秀</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="5">一般舞台魔術</td>
        </tr>
        <tr>
          <td><input type="checkbox" id ="6">沿桌近距離魔術</td>
        </tr>
      </table>

      <p>預算</p>
      <input type="range" id = "budget" min="0" max="50000" onchange="myFunction()">
			<b id ="budget2"></b>

      <input class="enter" type='submit' value='GO'>
		</form>
    </div>

    <div id="resultArea">
      <div id="best" class="resultBox">
        <p>最佳媒合結果：</p>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
      </div>
      <div class="resultBox">
        <p>其他搜尋結果：</p>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
        <div class="result">
          <img src="./img/icon/member.png" alt="">
          <span>布魯斯</span>
          <span>北區</span>
          <span>互動魔術</span>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
