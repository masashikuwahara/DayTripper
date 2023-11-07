// 初回のみモーダルをすぐ出す判定。flagがモーダル表示のstart_open後に代入される
	var access = $.cookie('access')
	if(!access){
		flag = true;
		$.cookie('access', false);
	}else{
		flag = false	
	}
	
	
	$(".modal-open").modaal({
	// start_open:flag, 
	overlay_close:true,
	before_open:function(){
		$('html').css('overflow-y','hidden');
	},
	after_close:function(){
		$('html').css('overflow-y','scroll');
	}
	});