$(document).ready(function(){
  var _showTab = 0;
  var _showTab2 = 0;
    var $defaultLi = $('#subNav li').eq(_showTab).addClass('active');
    $($defaultLi.find('a').attr('href')).siblings().hide();
    // var $defaultLi2 = $('#orderTitle li').eq(_showTab2).addClass('active');
    // $($defaultLi2.find('a').attr('href')).siblings().hide();
    // console.log($defaultLi2);
    // 當 li 頁籤被點擊時...
    // 若要改成滑鼠移到 li 頁籤就切換時, 把 click 改成 mouseover
    $('#subNav li').click(function() {
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

    // $('#orderTitle li').click(function() {
    //   // 找出 li 中的超連結 href(#id)
    //   var $this = $(this),
    //     _clickTab2 = $this.find('a').attr('href');
    //     console.log($this);
    //   // 把目前點擊到的 li 頁籤加上 .active
    //   // 並把兄弟元素中有 .active 的都移除 class
    //   $this.addClass('active').siblings('.active').removeClass('active');
    //   // 淡入相對應的內容並隱藏兄弟元素
    //   $(_clickTab2).stop(false, true).fadeIn().siblings().hide();
    //
    //   return false;
    // }).find('a').focus(function(){
    //   this.blur();
    // });
});
