(document).ready(function() {
  $('.webcity').hover(function(){
      $('.webcity2').show();
  }, function(){
      $('.webcity2').hide();
  });
  
   $('.webcity2').hover(function(){
      $(this).show();
  }, function(){
      $(this).hide();
  });
});