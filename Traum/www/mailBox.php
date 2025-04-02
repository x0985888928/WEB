<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="Shortcut Icon" type="image/x-icon" href="img/page_logo.png" >
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="Shortcut Icon" type="image/x-icon" href="img/page_logo.png" >
  <title>Traum築夢娛樂</title>
  <script src="js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="js/indexScript.js" charset="utf-8"></script>
  <script src="js/javascript.js" charset="utf-8"></script>
  <link rel="stylesheet" href="css/mailBox.css">
  <link rel="stylesheet" href="css/header.css">

	<script type="text/javascript">
	<?php
		  $ac=$_SESSION['account'];
			$link = mysqli_connect('localhost', 'project', '0931821282','traum');
		  mysqli_select_db($link, 'traum') or die("db");
			mysqli_query($link,"SET CHARACTER SET utf8");
			$sql = "SELECT * FROM `聊天室` WHERE `收方`= '$ac' ";
			$result1 = mysqli_query($link, $sql) or die("queary1");
      while( $row1 = mysqli_fetch_assoc($result1) )
			{
			   $sql = "INSERT INTO `123`(`1`,`2`) VALUES ('$row1[送方]','$row1[日期]')";
				 $re = mysqli_query($link, $sql) or die("queary2");
			}
			$sql = "SELECT * FROM `聊天室` WHERE `送方`= '$ac' ";
			$result2 = mysqli_query($link, $sql) or die("queary3");
      while( $row2 = mysqli_fetch_assoc($result2) )
			{
			   $sql = "INSERT INTO `123`(`1`,`2`) VALUES ('$row2[收方]','$row2[日期]')";
				 $re = mysqli_query($link, $sql) or die("queary");
			}
		    $sql = "SELECT `1`, MAX(`2`)FROM `123` GROUP BY `1` ";
			  $result3 = mysqli_query($link, $sql) or die("queary4q");
	?>

	var xmlHTTP;
//	var xmlHTTPo;
	function but(acc)
	{
		$_xmlHttpRequest();

		var ss=$("#area").val();
		$("#area").val("");
		xmlHTTP.open("GET","mailbut.php?acc=<?php  echo $ac?>&acc2="+acc+"&text="+ss ,true);
		xmlHTTP.onreadystatechange=function check_user()
		{
				if(xmlHTTP.readyState == 4)
				{
						if(xmlHTTP.status == 200)
						{
								var str2=xmlHTTP.responseText;
								document.getElementById("chat").innerHTML=str2;
						}
				}
		}
		xmlHTTP.send(null);
		talk(acc);
	//	update();
	//	document.getElementById().click;

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
	function update()
	{

	    $_xmlHttpRequest();
	    xmlHTTP.open("GET","mailupdate.php?acc=<?php  echo $ac?>" ,true);

	    xmlHTTP.onreadystatechange=function check_user()
	    {
	        if(xmlHTTP.readyState == 4)
	        {
	            if(xmlHTTP.status == 200)
						  {
	                var str2=xmlHTTP.responseText;
	                document.getElementById("allChatLogs").innerHTML=str2;
	            }
	        }
	    }
	    xmlHTTP.send(null);

	}
	function c()
	{

	    $_xmlHttpRequest();
	    xmlHTTP.open("GET","mailclear.php"+per ,true);

	    xmlHTTP.onreadystatechange=function check_user()
	    {
	        if(xmlHTTP.readyState == 4)
	        {
	            if(xmlHTTP.status == 200)
						  {
	                var str1=xmlHTTP.responseText;
	                document.getElementById("unread").innerHTML=str1;
	            }
	        }
	    }
	    xmlHTTP.send(null);

	}
	function talk(per)
	{
	    $_xmlHttpRequest();
	    xmlHTTP.open("GET","mailchat.php?acc=<?php  echo $ac?>&acc2="+per ,true);

	    xmlHTTP.onreadystatechange=function check_user()
	    {
	        if(xmlHTTP.readyState == 4)
	        {
	            if(xmlHTTP.status == 200)
						  {
	                var str1=xmlHTTP.responseText;
	                document.getElementById("chat").innerHTML=str1;
	            }
	        }
	    }
	    xmlHTTP.send(null);

	}
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
      <p id="userName" >
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
      "><img src="./img/icon/icon_mail.png" alt=""></a>
      <p id="unread" onclick="c();"><?php
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

			?></p>
    </div>
  </div>
  <nav>
    <li><a href="search.php">搜尋</a></li>
    <li><a href="">聯絡我們</a></li>
    <li><a href="ranking.php">排行榜</a></li>
    <li><a href="">最新消息</a></li>
    <li><a href="">常見問題</a></li>
  </nav>

  <div id="mailBox" >
    <div id="allChatLogs" >




			<SCRIPT language="JavaScript">
		  update();

			</SCRIPT>
</div>
    <div id="chatroom"> <div id="123" ><div id="chat">






		</div>
	</div></div>
    </div>

</body>
</html>
