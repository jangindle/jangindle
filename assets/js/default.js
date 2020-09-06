
$(function(){
				// resize event
	$(window).resize(function(){
		_wh = $(window).height();
		_ww = $(window).width();

		$(".background_slow_body").each(function(){

			_p = $(this).parent();

			if( _p.height() < $(this).height() + 250 ) _p.css( "min-height",  $(this).height() + 300 );
			$(this).css( "top", ( _p.height() - $(this).height() ) / 2   );

		});

	}).resize();

	$(window).scroll(function(){
		$( ".background_slow" ).each(function(){

			_tt = $(this).offset().top;
			_th = $(this).height();
			_st = $(window).scrollTop();
			_wh = $(window).height();

			//_tmp =
			_t = ( _tt - _st  )  * - 0.3;
			$(this).css( "top", _t );

		});
	}).scroll();
});




$(window).resize(function(){
    _wh = $(window).height();
    _ww = $(window).width();

    if(_ww > 960 ){
        $('body').removeClass();
    }else if( _ww > 710 && _ww <= 960){
        $('body').addClass('tablet');
        $('body').removeClass('mobile');
    }else if( _ww <= 710 ){
        $('body').addClass('tablet');
        $('body').addClass('mobile')
    }
}).resize();
