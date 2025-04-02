<?php
  $p0=$_GET['p0'];
  $p1=$_GET['p1'];
  $p2=$_GET['p2'];
  $p3=$_GET['p3'];
  $p4=$_GET['p4'];
  $p5=$_GET['p5'];
  $p6=$_GET['p6'];
  $p7=$_GET['p7'];


  $link = mysqli_connect('localhost', 'project', '0931821282','traum');
  mysqli_select_db($link, 'traum') or die("db");
  mysqli_query($link,"SET CHARACTER SET utf8");
  if($p0==1)
  {
    $s0='1';
  }
  else
  {
    $s0=' ';
  }
  if($p1==1)
  {
    $s1='2';
  }
  else
  {
    $s1=' ';
  }
  if($p2==1)
  {
    $s2='3';
  }
  else
  {
    $s2=' ';
  }
  if($p3==1)
  {
    $s3='1';
  }
  else
  {
    $s3=' ';
  }
  if($p4==1)
  {
    $s4='2';
  }
  else
  {
    $s4=' ';
  }
  if($p5==1)
  {
    $s5='3';
  }
  else
  {
    $s5=' ';
  }
  if($p6==1)
  {
    $s6='3';
  }
  else
  {
    $s6=' ';
  }
  $s7 = "and (c.`自介` like '%".$p7."%' OR c.`藝名` like '%".$p7."%' OR c.`經歷` like '%".$p7."%')";
  if($p6==0)
  {
    $sql = "SELECT DISTINCT c.`帳號` , c.`滿意度` FROM `表演者` as c where c.`自介` like '%".$p7."%' OR c.`藝名` like '%".$p7."%' OR c.`經歷` like '%".$p7."%' order by c.`滿意度` desc";
  }
  else
  {
    $sql = "SELECT DISTINCT a.`帳號`,c.`滿意度` FROM `表演者區域` as a, `表演者類型` as b, `表演者` as c WHERE a.`帳號` = b.`帳號` and a.`帳號` = c.`帳號` and(a.`地區`= '".$s0."' OR a.`地區`= '".$s1."' OR a.`地區` = '".$s2."' OR b.`類型`= '".$s3."' OR b.`類型`= '".$s4."' OR b.`類型`= '".$s5."' OR b.`類型`= '".$s6."') ".$s7." group by b.`帳號` order by c.`滿意度` desc";
  }
  //echo $sql;
  $result = mysqli_query($link, $sql) or die("qdueary");
  echo "<div class="."resultBox"."><p>搜尋結果：</p>";
  while( $row = mysqli_fetch_assoc($result) )
  {

     if($p0==1)
     {
       $sql =  "SELECT * FROM `表演者區域` where `帳號` = '$row[帳號]' and `地區` = '1'";
       $results0 = mysqli_query($link, $sql) or die("qdueary");

       $rows0 = mysqli_num_rows($results0);
      // echo $row[帳號].$rnum;
       if($rows0==1)
          $ch0=1;
       else
          $ch0=0;
     }
     else
       $ch0=1;

     if($p1==1)
     {
       $sql =  "SELECT * FROM `表演者區域` where `帳號` = '$row[帳號]' and `地區` = '2'";
       $results1 = mysqli_query($link, $sql) or die("qdueary");
       $rows1 = mysqli_num_rows($results1);
       if($rows1==1)
          $ch1=1;
       else
          $ch1=0;
     }
     else
       $ch1=1;

     if($p2==1)
     {
       $sql =  "SELECT * FROM `表演者區域` where `帳號` = '$row[帳號]' and `地區` = '3'";
       $results2 = mysqli_query($link, $sql) or die("qdueary");
       $rows2 = mysqli_num_rows($results2);
       if($rows2==1)
          $ch2=1;
       else
          $ch2=0;
     }
     else
       $ch2=1;

       if($p3==1)
       {
         $sql =  "SELECT * FROM `表演者類型` where `帳號` = '$row[帳號]' and `類型` = '1'";
         $results3 = mysqli_query($link, $sql) or die("qdueary");

         $rows3 = mysqli_num_rows($results3);

         if($rows3==1)
            $ch3=1;
         else
            $ch3=0;
       }
       else
         $ch3=1;

         if($p4==1)
         {
           $sql =  "SELECT * FROM `表演者類型` where `帳號` = '$row[帳號]' and `類型` = '2'";
           $results4 = mysqli_query($link, $sql) or die("qdueary");

           $rows4 = mysqli_num_rows($results4);
          // echo $row[帳號].$rnum;
           if($rows4==1)
              $ch4=1;
           else
              $ch4=0;
         }
         else
           $ch4=1;
           if($p5==1)
           {
             $sql =  "SELECT * FROM `表演者類型` where `帳號` = '$row[帳號]' and `類型` = '3'";
             $results5 = mysqli_query($link, $sql) or die("qdueary");

             $rows5 = mysqli_num_rows($results5);
            // echo $row[帳號].$rnum;
             if($rows5==1)
                $ch5=1;
             else
                $ch5=0;
           }
           else
             $ch5=1;
             if($p6==1)
             {
               $sql =  "SELECT * FROM `表演者類型` where `帳號` = '$row[帳號]' and `類型` = '4'";
               $results6 = mysqli_query($link, $sql) or die("qdueary");

               $rows6 = mysqli_num_rows($results6);
              // echo $row[帳號].$rnum;
               if($rows6==1)
                  $ch6=1;
               else
                  $ch6=0;
             }
             else
               $ch6=1;
     if($ch0==1&&$ch1==1&&$ch2==1&&$ch3==1&&$ch4==1&&$ch5==1&&$ch6==1)
     {
       echo "<div class="."result".">";

       $sql =  "SELECT * FROM `會員` where `帳號` = '$row[帳號]' ";
       $result1 = mysqli_query($link, $sql) or die("qdueary");
       $row1 = mysqli_fetch_assoc($result1);
       echo "<img src=".$row1[圖片]."  onClick="." location.href='performer2.php?p=$row1[帳號]';"." >";
        $sql =  "SELECT * FROM `表演者` where `帳號` = '$row[帳號]' ";
        $result2 = mysqli_query($link, $sql) or die("qdueary");
       $row2 = mysqli_fetch_assoc($result2);
       echo "<span>".$row2[藝名]."</span><span>";
       $sql =  "SELECT * FROM `表演者區域` where `帳號` = '$row[帳號]' ";
       $result3 = mysqli_query($link, $sql) or die("qdueary");


       while( $row3 = mysqli_fetch_assoc($result3))
       {
         switch($row3[地區])
         {
           case '1':
              echo "北區 ";break;
           case '2':
              echo "中區 ";break;
           case '3':
              echo "南區 ";break;
         }
      }

      echo "</span><span>";
      $sql =  "SELECT * FROM `表演者類型` where `帳號` = '$row[帳號]' ";
      $result4 = mysqli_query($link, $sql) or die("qdueary");
      while( $row4 = mysqli_fetch_assoc($result4))
      {
        switch($row4[類型])
        {
          case '1':
            echo"互動秀<br>";break;
          case '2':
            echo"大型魔術秀<br>";break;
          case '3':
            echo"一般舞臺魔術<br>";break;
          case '4':
            echo"沿桌近距離魔術<br>";break;
        }
      }
      echo "</span>";
      echo "</div>";
     }
  }
  echo "</div>";

?>
