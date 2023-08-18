$(function () {
  $('.menu').on('click', function () {
    $(this).toggleClass('active');
    $("#nav").toggleClass('active');
  })
});

$(function () {
  $('#nav a').on('click', function () {
    $('#nav').toggleClass('active');
    $(".menu").toggleClass('active');
  })
});

$('#page-link a[href*="#"]').click(function () {
	let elmHash = $(this).attr('href'); 
	let pos = $(elmHash).offset().top - 50;
	$('body,html').animate({scrollTop: pos}, 50);
	return false;
});

//logoの表示
$(window).on('load',function(){
  $("#splash").delay(1500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
  $("#splash_logo").delay(1200).fadeOut('slow');//ロゴを1.2秒（1200ms）待機してからフェードアウト
});

ScrollReveal().reveal('#menu01', { 
  duration: 1600, 
  scale: 0.1,
  reset: false
});

ScrollReveal().reveal('#menu02', { 
  duration: 1600, 
  scale: 0.1,
  reset: false
});

ScrollReveal().reveal('#menu03', { 
  duration: 1600, 
  scale: 0.1,
  reset: false
});

ScrollReveal().reveal('#menu04', { 
  duration: 1600, 
  scale: 0.1,
  reset: false
});

ScrollReveal().reveal('#menu05', { 
  duration: 1600, 
  scale: 0.1,
  reset: false
});