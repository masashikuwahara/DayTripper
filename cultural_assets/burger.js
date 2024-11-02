// メニュー
jQuery(document).ready(function($){
$('.toggle-btn').on('click',function(){
    $('.toggle-btn__line').toggleClass('active');
    $('.global-nav').fadeToggle();
});
});