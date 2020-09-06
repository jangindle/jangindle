$.easing.easeInExpo = function (x, t, b, c, d) { return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b; };
$.easing.easeOutExpo = function (x, t, b, c, d) { return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b; };
$.easing.easeInOutExpo = function (x, t, b, c, d) { if (t==0) return b; if (t==d) return b+c; if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b; return c/2 * (-Math.pow(2, -10 * --t) + 2) + b; };

//////////////////////////////////// Carousel ////////////////////////////////////

var SCarousel = function( element, optionsHook ){

  var el = {};
  el.root = $( element );
  el.list = $( "ul", el.root );
  el.items = $( "li", el.list );

  var optionsDefault = {
    style: {
      parentHeight: false,
      itemWidth: "100%", // string
      itemMaxWidth: "100%", // string
      onPosition: "left", // left, center
      infinite: true, // boolean
    },
    idx: {
      current: 0, // now
      min: 0, // number
      max: el.items.length-1, // number
      length: el.items.length, // number
    },
    update: {
      mode: "slide", // slide, fade
      speed: 600, // number
      relative: false, // boolean
      auto: 0, // number
      callback: {
        on: null, // function
        off: null, // function
      },
    },
    interface: {
      dots: true, // boolean
      pointers: true, // boolean
      draggable: true, // boolean
    },
  };
  var options = $.extend( true, optionsDefault, optionsHook );

  var _autoUpdate = null;
  var _itemWidth = parseFloat( options.style.itemWidth );
  var _itemWidthUnit = typeof options.style.itemWidth !== "string"
    ? "px"
    : options.style.itemWidth.indexOf( "%" ) >= 0
      ? "%"
      : "px";

  function build(){

    el.root.addClass( "carousel" );
    if( options.style.parentHeight ){
      el.root.addClass( "inherit-parent-height" );
    };

    el.list.wrap( "<div class='viewport' />" );
    el.viewport = el.list.parent( ".viewport" );

    // infinite 占썩몿�든몴占� 占쎈떯由� 占쎄쑵鍮�, mirror�쒙옙 占쎌빘苑�옙�몃빍占쏙옙
    if( options.style.infinite ){
      // 占쎌빘苑�옙占� 揶쏆뮇�붺몴占� �닌뗫�占쎈뜄��
      var _mirrorCount = _itemWidthUnit == "%"
        ? Math.ceil( 100/_itemWidth )
        : Math.ceil( el.viewport.width()/_itemWidth );
      // 占쎌쉸肉� 占쎌빘苑�옙�몃빍占쏙옙
      for( i=0; i<_mirrorCount; i++ ){
        var _entry = el.items.eq( options.idx.max-i ).clone().addClass( "build pre-mirror" );
        el.list.prepend( _entry );
      };
      el.preMirror = $( ".pre-mirror", el.list );
      // 占썬끉肉� 占쎌빘苑�옙�몃빍占쏙옙
      for( i=0; i<_mirrorCount; i++ ){
        var _entry = el.items.eq( options.idx.min+i ).clone().addClass( "build ap-mirror" );
        el.list.append( _entry );
      };
      el.apMirror = $( ".ap-mirror", el.list );
    };

    // interface DOT 占쏙옙 占쎌빘苑�옙�몃빍占쏙옙
    if( options.interface.dots ){
      for( i=0; i<options.idx.length; i++ ){
        el.root.append( "<div class='dot' />" );
      };

      $( ".dot", el.root ).wrapAll( "<div class='dots'>" );
      $( ".dots", el.root ).wrapAll( "<div class='row'>" );
      el.dots = $( ".dot", el.root );
    };

    // interface POINTER �쒙옙 占쎌빘苑�옙�몃빍占쏙옙
    if( options.interface.pointers ){
      el.root.append( "<div class='pointer left' /><div class='pointer right' />" );
      el.pointers = $( ".pointer", el.root );
    };

    // 占쎈떯苡э옙占썲칰占� 獄쏅뗄�ㅿ옙占�
    bindEvent();
    jump( options.idx.current );

  };

  function bindEvent(){

    // DOT 占쎈��� 占쏙옙, Update
    if( options.interface.dots ){
      el.dots.click(function(){
        update( $( this ).index() );
      });
    };

    // POINTER 占쎈��� 占쏙옙, Update
    if( options.interface.pointers ){
      el.pointers.click(function(){
        if( $( this ).hasClass( "left" ) ){
          update( options.idx.current-1 );
        }else if( $( this ).hasClass( "right" ) ){
          update( options.idx.current+1 );
        };
      });
    };

    // window �귐딄텢占쎈똻已� 占쏙옙, 占쎌꼶�곭솒�노뱜 占쎈Ŧ�� 占썩넄�� Update
    $( window ).resize(function(){
      resizeAndPosition();
      update( options.idx.current );
    }).resize();

    // Draggable 占쏙옙 揶쏉옙占싸쎈막 占쏙옙, 占쎌뮆�믤뉩占� 占쎈�源쏙옙占� 獄쏅뗄�ㅿ옙占�
    if( options.interface.draggable ){
      el.list.on( "mousedown touchstart", bindDragEvent );
    };

  }

  function resizeAndPosition(){

    if( options.style.alignedPointer ){
      var _offset = el.viewport.width() - options.style.alignedPointer >= 0 ? ( el.viewport.width() - options.style.alignedPointer ) / 2 : 0;
      $( el.pointers ).each(function(){
        if( $( this ).hasClass( "left" ) ){
          $( this ).css({ "left": _offset });
        }else if( $( this ).hasClass( "right" ) ){
          $( this ).css({ "right": _offset });
        };
      });
    };

    if( options.update.mode == "slide" ){

      _itemWidth = _itemWidthUnit == "px" && parseFloat( options.style.itemWidth ) > el.viewport.width()
        ? el.viewport.width()
        : parseFloat( options.style.itemWidth );

      $( "li", el.list ).css({ "width": _itemWidth+_itemWidthUnit });

      el.items.each(function(){
        $( this ).css({
          "left": _itemWidth*el.items.index( this )+_itemWidthUnit
        });
      });

      if( options.style.infinite ){
        el.preMirror.each(function(){
          $( this ).css({
            "left": _itemWidth*( el.preMirror.index( this ) - el.preMirror.length )+_itemWidthUnit
          });
        });
        el.apMirror.each(function(){
          $( this ).css({
            "left": _itemWidth*( el.items.length + el.apMirror.index( this ) )+_itemWidthUnit
          });
        });
      };

      if( options.style.onPosition == "center" ){
        var _pos = _itemWidthUnit == "%"
          ? ( 100 - _itemWidth )/2+"%"
          : ( el.viewport.width() - _itemWidth )/2+"px"
        el.list.css({ "margin-left": _pos });
      };

    }else if( options.update.mode == "fade" ){

      el.items.css({ "top": 0, "left": 0 });

    };

  }

  function bindDragEvent( e ){

    el.list.stop( true, true ); // 占싼됱뵬占쎈�諭� 餓ο옙 占쎌뮆�믤뉩占� 占쏙옙 占쎌뮆�쇿쳞怨뺚뵝 獄쎻뫗占�

    var dragStart = e.type == "mousedown"
    	? { x: e.clientX, y: e.clientY }
    	: { x: e.originalEvent.touches[0].clientX, y: e.originalEvent.touches[0].clientY };
    var dragMove = { x: 0, y: 0 };

    $( window ).on( "mousemove touchmove", function( e ){
      //e.preventDefault();
      dragMove = e.type == "mousemove"
        ? { x: e.clientX - dragStart.x, y: e.clientY - dragStart.y }
        : { x: e.originalEvent.touches[0].clientX - dragStart.x, y: e.originalEvent.touches[0].clientY - dragStart.y };
      if( Math.abs( dragMove.x/dragMove.y ) > 1.4 ){
        if( options.update.mode == "slide" ){
          el.list.css({
            "left": dragMove.x - options.idx.current*el.items.eq(0).innerWidth() + "px"
          });
        };
      }else{
        return false;
      };
    });

    $( window ).on( "mouseup touchend", function(){
      if( Math.abs( dragMove.x ) > el.root.innerWidth()/5 ){
        if( dragMove.x < 0 ){
          update( options.idx.current + 1, dragMove.x );
        }else{
          update( options.idx.current - 1, dragMove.x );
        };
      }else{
        update( options.idx.current );
      };
      $( window ).off( "mousemove mouseup touchmove touchend" );
    });
  }

  function destroy(){


  }

  function update( index, dragged ){

    // Current 占쎈뿮��
    if( index > options.idx.max ){
      if( options.update.mode == "slide" && options.style.infinite ) jump( -1, dragged );
      options.idx.current = options.idx.min;
    }else if( index < options.idx.min ){
      if( options.update.mode == "slide" && options.style.infinite ) jump( options.idx.max + 1, dragged );
      options.idx.current = options.idx.max;
    }else{
      options.idx.current = index;
    };

    // Dot 占쎌럥�뀐옙�꾨뱜
    if( options.interface.dots ){
      el.dots.removeClass( "on" );
      setTimeout( function(){
        el.dots.eq( options.idx.current ).addClass( "on" );
      }, 1000);
    };

    el.items.removeClass( "on" );
    el.items.eq( options.idx.current ).addClass( "on" );

    // Pointer Hide 占썬끋六�
    if( !options.style.infinite ){
      el.root.removeClass( "min max" );
      if( options.idx.current == options.idx.max ){
        el.root.addClass( "max" );
      };
      if( options.idx.current == options.idx.min ){
        el.root.addClass( "min" );
      };
    };

    // Height 癰귨옙野껓옙
    if( !options.style.parentHeight ){
      el.list.css({ "height": el.items.eq( options.idx.current ).innerHeight() });
    };

    // Slide or Fade 占썬끋六�
    if( options.update.mode == "slide" ){
      slide( options.idx.current );
    }else if( options.update.mode == "fade" ){
      fade( options.idx.current );
    };

    // Auto Update
    if( options.update.auto ){
      clearTimeout( _autoUpdate );
      _autoUpdate = setTimeout(function(){
        update( options.idx.current + 1 );
      }, options.update.auto );
    };

  }

  function slide( moveTo ){
    el.list.stop().animate({ "left": -moveTo*_itemWidth+_itemWidthUnit }, options.update.speed, "easeOutExpo" );
  }

  function fade( moveTo ){
    el.items.stop( true, true ).fadeOut( options.update.speed );
    el.items.eq( moveTo ).fadeIn( options.update.speed );
  }

  function jump( moveTo, dragged ){
    var dragged = dragged ? dragged : 0;
    el.list.css({ "left": -moveTo*el.items.eq(0).innerWidth()+dragged+"px" });
  }

  this.build = build;

};
