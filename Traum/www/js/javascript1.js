$(document).ready(function(){
  //---------------------nav toggle start--------------------------
  var width = $(window).width();
  console.log(width);
  if(width < 1280){
    $("#Menu > img").click(
      function(){
        $("nav").slideToggle();
      }
    );
  }
  //---------------------nav toggle end-------------------------------
  //---------------------nav CHT ENG start--------------------------
  else if(width > 1279){
    console.log(width);
    console.log("0");
    $(".EGT").addClass("hide");
    $(".CHT").hover(
      function(){
        $(this).addClass("hide");
        $(this).next("EGT").removeClass("hide");
      },
      function(){
        $(this).removeClass("hide");
        $(this).next("EGT").addClass("hide");
      }
    );
  }
  //---------------------nav CHT ENG end--------------------------
  // -----------------------tab code start------------------------
  // 預設顯示第一個 Tab
	var _showTab = 0;
	var $defaultLi = $('ul.tabs li').eq(_showTab).addClass('active');
	$($defaultLi.find('a').attr('href')).siblings().hide();

	// 當 li 頁籤被點擊時...
	// 若要改成滑鼠移到 li 頁籤就切換時, 把 click 改成 mouseover
	$('ul.tabs li').click(function() {
		// 找出 li 中的超連結 href(#id)
		var $this = $(this),
			_clickTab = $this.find('a').attr('href');
		// 把目前點擊到的 li 頁籤加上 .active
		// 並把兄弟元素中有 .active 的都移除 class
		$this.addClass('active').siblings('.active').removeClass('active');
		// 淡入相對應的內容並隱藏兄弟元素
		$(_clickTab).stop(false, true).fadeIn().siblings().hide();

		return false;
	}).find('a').focus(function(){
		this.blur();
	});
  // ------------------tab code end-------------------------
});
