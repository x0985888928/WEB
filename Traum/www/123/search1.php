<?php
	session_start();


	

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
  <title>TRAUM</title>
  <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/searchStyle.css">
  <script src="./js/jquery-3.2.1.min.js" charset="utf-8"></script>
  <script src="./js/javascript.js" charset="utf-8"></script>
	<script src="./slick/slick.min.js" charset="utf-8"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<!-- <script language="JavaScript">

	$(document).ready(function(){
  $("form").submit(function(e){
    alert("Submitted");
  });
});

</script> -->
	<link rel="stylesheet" href="./slick/slick-theme.css">
  <link rel="stylesheet" href="./slick/slick.css">

</head>
<body>
	<?php
	if(isset($_SESSION['account']))
	{
    echo "<div id="."mail".">
	    <a href="."memberArea.php"."><img src="."./img/mailBox.png"." alt=".""."></a>
	  </div>";
  }
	?>
	<div id="Header">
		<div id="Menu">
			<div class="emptyBox"></div>
			<img src="./img/menu.png" alt=""></div>
		<div id="Logo">
			<a href="index.php"></a>
			<div id="MemberInfoPC">
				<div class="emptyBox"></div>
				<div class="MemberFace">

        <input type="image" src="

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
				?>
				" style="border-radius:50%; width:50px; height:50px; outline:0;  " onClick="location.href='http://114.35.91.83/<?php if(isset($_SESSION['account'])) echo"memberArea.php";
				else echo"login.php";?>' " value=""  ></div>
        <?php
				if(isset($_SESSION['account']))
		{
			echo "<a href="."logout.php"." style="."text-align:center;line-height:20px;font-size:15px".">登出</a>";
			echo $row1['姓名'];
			echo "您好!";
		}
		else
		{
		    echo "<a href="."login.php"." style="."text-align:center;line-height:20px;font-size:15px"." >請登入</a>";
		}
		?>
			</div>
		</div>
		<div id="MemberInfo">
			<div class="emptyBox"></div>
			<a href=""><div class="MemberFace">
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
				?>
				" style="border-radius:50%; width:50px; height:50px;" >
			</div></a>
		</div>
	</div>
  <nav>
    <a href="./aboutUs.php"><li id="aboutUs" class="navPic"></li></a>
    <a href="./news.php"><li id="news" class="navPic"></li></a>
    <a href="./search.php"><li id="search" class="navPic"></li></a>
    <a href="./ranking.php"><li id="ranking" class="navPic"></li></a>
    <a href="./q_a.php"><li id="q_a" class="navPic"></li></a>
  </nav>

	<div id="input">
    <form action="" method="post" name="form1">

      <input name="keyword" id="keyWord"type="text" placeholder="搜尋">
      <select class="condition" name="area">
        <option value="0"

				>區域</option>
        <option value="1"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$area==1)
				{
					  echo "selected";
				}
				?>
				>北部</option>
        <option value="2"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$area==2)
				{
					  echo "selected";
				}
				?>
				>中部</option>
        <option value="3"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$area==3)
				{
						echo "selected";
				}
				?>
				>南部</option>
      </select>
      <select class="condition" name="type">
        <option value="0">類型</option>
        <option value="1"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$type==1)
				{
						echo "selected";
				}
				?>
				>互動秀</option>
        <option value="2"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$type==2)
				{
						echo "selected";
				}
				?>
				>大型魔術秀</option>
        <option value="3"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$type==3)
				{
						echo "selected";
				}
				?>
				>一般舞臺魔術</option>
        <option value="4"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$type==4)
				{
						echo "selected";
				}
				?>
				>沿桌近距離魔術</option>
        <option value="5"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$type==5)
				{
						echo "selected";
				}
				?>
				>其他</option>
      </select>
      <select class="condition" name="budget">
        <option value="0">預算</option>
        <option value="1"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$budget==1)
				{
						echo "selected";
				}
				?>
				>6000元以下</option>
        <option value="2"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$budget==2)
				{
						echo "selected";
				}
				?>
				>6001元~12000元</option>
        <option value="3"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$budget==3)
				{
						echo "selected";
				}
				?>
				>12001元~18000元</option>
        <option value="4"
				<?php
				if((isset($_POST["butt"])||isset($_GET["page"]))&&$budget==4)
				{
						echo "selected";
				}
				?>
				>18000元以上</option>
    </select>

    <input type="submit" class="enter" name="butt" value="查詢">

  <h2><br>●搜尋結果</h2>
  <!--<div id="sort">
		排序方式：
    <select class="condition" name="sort" id ="sort" onchange="option(this.options[this.selectedIndex].value);location.reload();">
      <option value="0">依綜合排行</option>
      <option value="1">依地區</option>
      <option value="2">依類型</option>
      <option value="3">依預算</option>
    </select>



  </div></form> -->
  </div>

<?php

			if(isset($_POST["butt"])||isset($_GET["page"]))
			{

							if($area==0)
							{
								   $sqlarea = " ";
							}
							else
							{
								   $sqlarea = "`表演者區域`.`地區` = $area and ";
							}

							if($type==0)
							{
								   $sqltype = " ";
							}
							else
							{
								   $sqltype = "`表演者類型`.`類型` = $type and ";
							}

							$min=0;$max=100000000000;
							switch($budget)
							{
								case 0:
									break;
								case 1:
									$min=0;
									$max=6000;
									break;
								case 2:
									$min=6001;$max=12000;break;
								case 3:
									$min=12001;$max=18000;break;
								case 4:
									$min=18001;$max=100000000000;break;

							}
							$link = mysqli_connect('localhost', 'project', '0931821282','traum');
							mysqli_select_db($link,'traum');
							mysqli_query($link,"SET CHARACTER SET utf8");
							$sql2 = "SELECT DISTINCT `表演者`.`帳號` FROM `表演者` JOIN `表演者區域` ON `表演者`.`帳號` = `表演者區域`.`帳號` JOIN `會員` ON `表演者`.`帳號` = `會員`.`帳號` JOIN `表演者類型` ON `表演者`.`帳號` = `表演者類型`.`帳號` where `自介` like  '%$keyword%' and $sqlarea $sqltype `表演者`.`收費` > $min and `表演者`.`收費` <= $max ";
							//echo $keyword.$sqlarea.$sqltype;
							$resultf = mysqli_query($link,$sql2) or die("asd5");
							$data_nums = mysqli_num_rows($resultf);

					    $per = 5;
					    $pages = ceil($data_nums/$per);
					    if (!isset($_GET["page"])){
					        $page=1;
					    } else {
					        $page = intval($_GET["page"]);
					    }
					    $start = ($page-1)*$per;
							$sql = "SELECT DISTINCT `表演者`.* , `會員`.*   FROM `表演者` JOIN `表演者區域` ON `表演者`.`帳號` = `表演者區域`.`帳號` JOIN `會員` ON `表演者`.`帳號` = `會員`.`帳號` JOIN `表演者類型` ON `表演者`.`帳號` = `表演者類型`.`帳號` where `自介` like  '%$keyword%' and $sqlarea $sqltype `表演者`.`收費` > $min and `表演者`.`收費` <= $max limit $start , $per";
					    $result = mysqli_query($link,$sql) or die("asd");
							echo	"<table width="."300"." border="."1".">
										<tbody>";

							while( $row = mysqli_fetch_assoc($result) )
							{
								echo "<div class="."result".">
								<img src="."$row[圖片]"." style="."border-radius:50%;"." onClick="." location.href='http://114.35.91.83/performer.php?p=$row[帳號]'; ".">";
							 echo "<p>$row[藝名]</p>";
							 echo "<p>所在區域：";

							 $re = mysqli_query($link,"SELECT * FROM `表演者區域` where `帳號` = '$row[帳號]' ") or die("assd");
							// echo "<p>所在區域：";
							 while($ro = mysqli_fetch_assoc($re) )
							 {
								 	  carea($ro["地區"]);
										echo " ";
							 }

							 echo"</p>";
							 echo "<p>擅長類型：";
							 $re = mysqli_query($link,"SELECT * FROM `表演者類型` where `帳號` = '$row[帳號]' ") or die("assd");

							 while($ro = mysqli_fetch_assoc($re) )
							 {
								 	  ctype($ro["類型"],$ro["帳號"]);
										echo " ";
							 }
							 echo "</p>";
							 echo "<p>平均行情：$row[收費]元</p>";
							 echo "	</div>";
						 }
							echo "</tbody>
										</table>";
			}
			else
			{
				$link = mysqli_connect('localhost', 'project', '0931821282','traum');
				mysqli_select_db($link,'traum');
				mysqli_query($link,"SET CHARACTER SET utf8");
				$sql = "SELECT * FROM `表演者` ORDER BY `滿意度` DESC LIMIT 5 ";
				$result = mysqli_query($link,$sql) or die("asd");

				echo	"<table width="."300"." border="."1".">
							<tbody>";

				while( $row = mysqli_fetch_assoc($result))
				{
					$rowa=$row["帳號"];
					$re5 = mysqli_query($link,"SELECT DISTINCT * FROM `會員` JOIN `表演者` ON `表演者`.`帳號` = `會員`.`帳號` where `表演者`.`帳號` = '$rowa' ") or die("asdx");
					$row55 = mysqli_fetch_assoc($re5);
					echo "<div class="."result".">
					<img src="."$row55[圖片]"." style="."border-radius:50%;"." onClick="." location.href='http://114.35.91.83/performer.php?p=$row55[帳號]'; ".">";

				 echo "<p>$row55[藝名]</p>";
				 echo "<p>所在區域：";


				 $r1 = mysqli_query($link,"SELECT * FROM `表演者區域` where `帳號` = '$rowa' ") or die("asd");
				 //echo $ro1["地區"];
			   while( $ro1 = mysqli_fetch_assoc($r1))
 				 {
				 	   carea($ro1["地區"]);
						 echo " ";
			 	 }
				 echo"</p>";
				 echo "<p>擅長類型r：";
				 $r2 = mysqli_query($link,"SELECT * FROM `表演者類型` where `帳號` = '$rowa' ") or die("asd");
				 echo "sd";
				 while( $ro2 = mysqli_fetch_assoc($r2))
 				 {

					 				 	   ctype($ro2["類型"],$rowa);
						 echo " ";
			 	 }

				 echo "</p>";
				 echo "<p>平均行情：$row[收費]元</p>";
				 echo "	</div>";

			 }

				echo "</tbody>
							</table>";
							echo "<br><br>";
			}
			if(isset($_POST["butt"])||isset($_GET["page"]))
			{
				echo "<div style="."text-align:center;height:20px;line-height:20px".">共 "."$data_nums"." 筆-在 "."$page"." 頁-共 "."$pages"." 頁</div><div style="."text-align:center;height:20px;line-height:20px".">";
    		echo "第 ";
    		for( $i=1 ; $i<=$pages ; $i++ ) {
					echo "<a  href=?page="."$i"."&area="."$area"."&type="."$type"."&budget="."$budget".">"."$i"."</a> ";
    		}
				echo "頁</div>";
			}
		mysqli_close($link);
  ?>

	<div id="Footer">
		<p>Copyright © 2015-2017 Traum All rights reserved</p>
	</div>
</body>
</html>
