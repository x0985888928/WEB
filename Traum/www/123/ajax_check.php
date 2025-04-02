<?php
session_start();
    header("Content-Type:text/html;charset=utf-8");

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
   $select_op0=$_GET['select_op0'];
   $select_op1=$_GET['select_op1'];
   $select_op2=$_GET['select_op2'];
   $select_op3=$_GET['select_op3'];
   $select_op4=$_GET['select_op4'];
   $select_op5=$_GET['select_op5'];
   $select_op6=$_GET['select_op6'];
   $ac=$_SESSION['account'];
   if($select_op0 != ""||$select_op1 != ""||$select_op2 != ""||$select_op3 != ""
        ||$select_op4 != ""||$select_op5 != ""||$select_op6 != ""){
        if($select_op0 == "0"){

          $ac=$_SESSION['account'];
          $link = mysqli_connect('localhost', 'project', '0931821282','traum');
          mysqli_select_db($link, 'traum') or die("db");
          mysqli_query($link,"SET CHARACTER SET utf8");
          $sqlm = "SELECT * FROM `會員`  WHERE `帳號` = 'blue1314'";
          $sqlt = "SELECT * FROM `表演者`  JOIN `表演者類型` ON `表演者`.`帳號`=`表演者類型`.`帳號`WHERE `表演者區域`.`地區` = '1'";
          $sqla = "SELECT * FROM `表演者`  JOIN `表演者區域` ON `表演者`.`帳號`=`表演者區域`.`帳號` WHERE `表演者`.`帳號` = $rowa['帳號'] ";
          $resultm = mysqli_query($link, $sqlm) or die("qdueary");
          $resultt = mysqli_query($link, $sqlt) or die("qdueary");
          $resulta = mysqli_query($link, $sqla) or die("qdueary");
          $rowm = mysqli_fetch_assoc($resultm);
          $rowt = mysqli_fetch_assoc($resultt);
          $rowa = mysqli_fetch_assoc($resulta);
          mysqli_close($link);
          $a = 0;
          echo"<div id="."best"." class="."resultBox"."><p>最佳媒合結果：</p>";
          while($rowt = mysqli_fetch_assoc($resultt))
          {
              if($a%4==0) echo"<div id="."best"." class="."resultBox".">";
              echo"<div class="."result".">
              <img src="."$rowm[圖片]"." alt="."".">
              <p></p>
              <span>$rowt[藝名]</span>
              <p></p>
              ";
              carea($rowa["地區"]);
              echo" ";
              while( $rowa = mysqli_fetch_assoc($resulta))
    				 {
   				 	   carea($rowa["地區"]);
   						 echo " ";
     			 	 }
             echo"<p></p>";
             ctype($rowt["類型"],$rowt["帳號"]);
             echo" ";
             while( $rowt = mysqli_fetch_assoc($resultt))
     				 {

    					 	 ctype($rowt["類型"],$rowt["帳號"]);
    						 echo " ";
    			 	 }
          echo"</div></div>";
          $a=$a+1;
        }
    }
  }

  else{
  }

?>
