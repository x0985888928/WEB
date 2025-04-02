$(document).ready(function(){
  // console.log('test');
  var index;
  $('#subNav ul').hover(
    function(){
      index = '.class' + this.id;
      $(index).addClass('active');
      // console.log(index);
    },function () {
      $(index).removeClass('active');
      // console.log('out');
    }
  );
})
