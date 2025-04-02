var xmlHTTP;

$(document).ready(function(){
  $(".tag").hide();
  $("#tag0").click(function(){
      document.getElementById("0").checked = false;
      $("#tag0").hide();
      check(0);
    })
    $("#tag1").click(function(){
        document.getElementById("1").checked = false;
        $("#tag1").hide();
        check(1);
      })
      $("#tag2").click(function(){
          document.getElementById("2").checked = false;
          $("#tag2").hide();
          check(2);
        })
        $("#tag3").click(function(){
            document.getElementById("3").checked = false;
            $("#tag3").hide();
            check(3);
          })
          $("#tag4").click(function(){
              document.getElementById("4").checked = false;
              $("#tag4").hide();
              check(4);
            })
            $("#tag5").click(function(){
                document.getElementById("5").checked = false;
                $("#tag5").hide();
                check(5);
              })
              $("#tag6").click(function(){
                  document.getElementById("6").checked = false;
                  $("#tag6").hide();
                  check(6);
                })

/*  $("#hide1").click(function(){


    })*/

            /*	$("#budget").onchange(function(){
                $("b").text($("#budget").serialize());
              });
              $('.range-slider').jRange({
                      from: 0,
                      to: 100,
                      step: 1,
                      scale: [0,25,50,75,100],
                      format: '%s',
                      width: 300,
                      showLabels: true,
                      isRange : true
                });*/
});
function check(v)
{
  //0
  var p0=document.getElementById("0");
  if(v==0)
  {
    if(p0.checked==true)
    {
       $("#tag0").toggle(100);
    }
    else
    {
       $("#tag0").hide();
    }
  }

  if(p0.checked==true)
    p0=1;
  else
    p0=0;

  //1
  var p1=document.getElementById("1");
  if(v==1)
  {
    if(p1.checked==true)
    {
      $("#tag1").toggle(100);
    }
    else
    {
      $("#tag1").hide();
    }
  }
  if(p1.checked==true)
    p1=1;
  else
    p1=0;

  //2
  var p2=document.getElementById("2");
  if(v==2)
  {
    if(p2.checked==true)
    {
      $("#tag2").toggle(100);
    }
    else
    {
      $("#tag2").hide();
    }
  }
  if(p2.checked==true)
    p2=1;
  else
    p2=0;

  //3
  var p3=document.getElementById("3");
  if(v==3)
  {
    if(p3.checked==true)
    {
      $("#tag3").toggle(100);
    }
    else
    {
      $("#tag3").hide();
    }
  }
  if(p3.checked==true)
    p3=1;
  else
    p3=0;

  //4
  var p4=document.getElementById("4");
  if(v==4)
  {
    if(p4.checked==true)
    {
      $("#tag4").toggle(100);
    }
    else
    {
      $("#tag4").hide();
    }
  }
  if(p4.checked==true)
    p4=1;
  else
    p4=0;

  //5
  var p5=document.getElementById("5");
  if(v==5)
  {
    if(p5.checked==true)
    {
      $("#tag5").toggle(100);
    }
    else
    {
      $("#tag5").hide();
    }
  }
  if(p5.checked==true)
    p5=1;
  else
    p5=0;
  //6
  var p6=document.getElementById("6");
  if(v==6)
  {
    if(p6.checked==true)
    {
      $("#tag6").toggle(100);
    }
    else
    {
      $("#tag6").hide();
    }
  }
  if(p6.checked==true)
    p6=1;
  else
    p6=0;

  var p7=$("#text").val();
	$("#text").val(p7);




    $_xmlHttpRequest();

    xmlHTTP.open("GET","searchplace.php?p0="+p0+"&p1="+p1+"&p2="+p2+"&p3="+p3+"&p4="+p4+"&p5="+p5+"&p6="+p6+"&p7="+p7 ,true);

    xmlHTTP.onreadystatechange=function check_user()
    {
        if(xmlHTTP.readyState == 4)
        {
            if(xmlHTTP.status == 200)
            {
                var s2=xmlHTTP.responseText;
                document.getElementById("resultArea").innerHTML=s2;
            }
        }
    }
    xmlHTTP.send(null);
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
function rr(x){
　var Str=document.getElementById(x).value;
　alert(Str);
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
