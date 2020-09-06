<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_THEME_PATH.'/head.sub.php');
?>

<?php

	function get_banner_items( $type )
	{
		$sql = "select * from motif_banner where mm_category = '{$type}' order by mm_order desc ";
		$result = sql_query( $sql );

		return $result;
	}
?>

<style>

	body{ display: none; }
	#site-landing{ height:700px;}
	.mobile #site-landing{ height: 600px; }

	#site-landing .section-header{ margin-bottom: 35px;}
	#site-landing .section-header .primary{font-size:3em; }
	#site-landing .section-header .secondary{font-size:3em; }
	#site-landing .section-header .third{margin-top:10px;}

	#site-landing .vertical-center > .container {display: block;}
	#site-landing .contents-div{text-align: left;margin-left: 10px; line-height:1.2;}

	.carousel .dots{text-align: right;}
	.carousel .dots .dot{width: 7px; height: 7px; border-radius: 100px; transition-duration: 0.3s; background: rgba(255,255,255,0.5)}
	.carousel .dots .dot.on{width: 30px; border-radius: 100px;}
	.carousel .dots .dot.on:before{transition: 7.5s width linear; border-radius: 100px;}

	.vertical-center:before{height: 35%; }


	body #section-look{ padding-bottom:50px; }

	#site-header { position: fixed; z-index: 10000;  }


	#site-header-body{ transition-duration: 0.3s; height:90px; }
	#site-header.scrolled #site-header-body{ box-shadow: 0px 1px 10px #333; background-color: rgba( 255, 255, 255, 0.9 ); }

/*	.mobile #site-header.scrolled #site-header-body{ box-shadow:none; background:none; }*/
	#site-header .logo-div img {width: 110px;}
	#site-header .logo-div {padding-top:20px;}

	#site-header .menu-list{height:66px}
	#site-header .menu-list .menu {padding: 0; width: 100px;margin-top: 34px; margin-left:40px; text-align: center; font-size:1.3em;}
	#site-header .menu-list .menu-right {width: auto;margin-left: 30px;}
	#site-header .menu-list .menu:hover>a{color:#ff8b1b; text-decoration: none; }

	.tablet #site-header .menu-list .menu{ margin-left: 20px; }

	#site-header .menu-list .sub-menu-list {width: 150px;background-color: #FFF; display: none; position:absolute; margin-left:-20px; margin-top: 16px;}
	#site-header .menu-list .sub-menu-list li{ transition-duration: 0.3s; line-height: 2.5; font-size:0.8em; }
	#site-header .menu-list .sub-menu-list li:hover { background:#ff8923; opacity: 0.8}
	#site-header .menu-list .sub-menu-list li:hover a { color: #FFF; text-decoration: none;}


	#site-header .menu-list .menu#btn-search{background: transparent; margin-top: 40px;}

	.mobile #section-estimate .estimate-group .fl.w-12-4.information{ padding-top:15px; margin-top:15px; }

	.estimate-check{ color: #aaa; }
	.estimate-check.active{ color: #fff; }
	.estimate-check input{ display:none;}
</style>
<!-- 상단 시작 { -->


<script>

$(function(){
	$( "body" ).fadeIn();
	// slider
	var landingSlider = new SCarousel( "#site-landing .landing-slider", {
		style: {
			parentHeight: true,
			itemWidth: "100%", // string
			itemMaxWidth: "100%", // string
			onPosition: "center", // left, center
			infinite: true, // boolean
		},
		update: {
			mode: "slide", // slide,
			speed: 1000, // number
			relative: false, // boolean
			auto: 8000, // number
		},
		interface: {
			dots: true, // boolean
			pointers: false, // boolean
			draggable: true, // boolean
		},
	});
	landingSlider.build();

	$('.datepicker').datepicker({format: 'yyyy.mm.dd'});
});

</script>

<script>
$(function(){

    /* 모바일 메뉴 open & close */
    $("#nav_menu").click(function() {
        $("#menu,.page_cover,html").addClass("open");
        window.location.hash = "#open";
    });

    window.onhashchange = function() {
        if (location.hash != "#open") {
        $("#menu,.page_cover,html").removeClass("open");
    }
    };

    $(".close, .page_cover, #menu ul li:not(.group)").click(function(){
        $("#menu,.page_cover,html").removeClass("open");
        window.location.hash = "#close";
    });

    $( "#search-opener, #search-opener-m" ).click(function(){
        $( "#txt-dialog, #search-background" ).fadeIn();
    });

    $("#search-background" ).click(function(e){
        $( "#txt-dialog, #search-background" ).fadeOut();
    });

    $("#txt-dialog" ).click(function(e){ e.stopPropagation(); }); // bubbling stop

    /* 상단 메뉴 */
    $(".menu-list li").mouseover(function(){
		$(".sub-menu-list").hide();
		$(".sub-menu-list", this).show();
	});

	$( "#site-wrapper" ).mouseover(function(){ $(".sub-menu-list").hide(); });


    /* 검색 버튼 이벤트  */
    $('#btn-search').click(function(){
        var frm = $('#frm-search');

        if(frm.hasClass("active")){
            $('#frm-search').removeClass('active');
        } else {
            $('#frm-search').addClass('active');
            $('#frm-search input').focus();
        }
    });

    $('#frm-search input').blur(function(){
        $('#frm-search').removeClass('active');
    });

    /* 모바일 메뉴리스트 업다운*/
    $('#menu ul li.group a').click(function(){

        var submenu = $(this).next("ul");
        var updown =  $(this).prev("i");
        var _class = updown.attr("class");

        if(submenu.is(":visible")){
            submenu.slideUp();
            updown.attr("class", _class.replace("up", "down"));
        }else{
            submenu.slideDown();
            updown.attr("class", _class.replace("down", "up"));
        }

    });



	// for estimate select
	$(function(){

		$( ".estimate-select" ).each(function(){

			$(this).data( "label", $(this).find( ".label" ).text() );

			$(this).find( ".label" ).click(function(){ $(this).next().toggle(); });

			$( this ).find( "select option" ).each(function(){

				$(this).parent().prev().append( $( '<li><span>' + $(this).text() + '</span></li>' ) );
			});

			$( this ).find( "ul li" ).click(function(){

				$( this ).parent().prev().find( "span" ).text( $(this).text() );

				$( this ).parent().hide();

				_idx = $(this).parent().find('li').index( $(this) );
				$(this).parent().next().find( 'li:eq('+_idx+')' ).attr('selected', 'selected');

                var _input = $(this).parent().find('input');

                _input.val($(this).text());
				_input.blur();

			});


		});

	});


	/* for estimate radio active */
	$(".estimate-radio").each(function(){

		$(this).find( "input" ).click(function(){

            _label = $(this).closest('label');
            _group = $(this).closest('.estimate-radio');

			_group.find('.active').removeClass('active');
            _label.addClass('active');

            // 장판부분 이미지 포함 라디오 시작
            if( _label.find( "img" ).length > 0 ) {
                _group.find( "img" ).each(function(){
                    $(this).attr( "src", $(this).attr( "src" ).replace( "blue", "white" ) );
                });

                _label.find( "img" ).attr( "src", _label.find( "img" ).attr( "src").replace( "white", "blue" ) );
            }
            // 장판부분 이미지 포함 라디오 끝

			$(this).blur();
		});

	});

	// for estimate radio init
	setTimeout( function(){
		$(".estimate-radio").each(function(){
				if( $(this).find( "input:checked" ).length > 0 ) 	$(this).find( "input:checked" ).click();
				else 												$(this).find( "input:first" ).click();
			});
	},500 );



});
</script>

<style>
	body.popuped{ overflow-y:hidden;}
	#frm-search{margin-left:5px; overflow: hidden; width: 0px;line-height: 66px;transition-duration: .2s; transition-timing-function: ease-out;}
	#frm-search.active{width: 150px;}

	#nav_menu{width: 25px;position: absolute;right: 0;top: 35px; display: none;}

	#menu .list li.group{position:relative;}
	#menu .list li i {position: absolute;top: 20px;left: -18px;}
	#menu .hide {display:none;padding:0px;padding-left:10px;}
	#menu .hide a{font-size:12px;}
	#menu .close img{width: 15px;}

	.mobile .menu-list {display: none;}
	.mobile #nav_menu{display: block}
</style>

<!-- popup-layer start -->
<style>
	#popup-wrapper{
		z-index:1000000;position:fixed; top : 0px; left:0px; height: 100%; width:100%; background: rgba( 0,0,0,0.8 ) ;
		overflow-y: scroll;
		overflow-x:hidden;
		display:none;
	}
	#popup-wrapper #popup-continaer{ margin: 100px auto; background: #fff; min-height: 100px; }
	#popup-wrapper #popup-close{position:absolute; top: 0px; right:0px; margin-top: -43px; margin-right: 0px; z-index: 100; cursor:pointer; font-size: 2em; color:#fff}

	/* for basic-tabs */
	.basic-tabs.active{  border-bottom: 5px solid #ff8d27; color: #ff8d27; padding-bottom: 0px;}
	.mobile .basic-tabs.w-12-6{ width: 50%;}
	.basic-tabs{ text-align: center; font-size: 1.3em;margin-bottom: 10px; border-bottom: 2px solid #000; padding-bottom: 3px; cursor: pointer;}
	.basic-tabs-body{ display: none; }
</style>

<div id="popup-wrapper" class="popup-wrapper">
	<div class="row_narrow">
		<!-- <div id="popup-close"><img src='/assets/images/common/icon-popup-close-15.png'/></div> -->
		<div id="popup-close">X</div>
		<div id="popup-continaer">
		</div>
	</div>
</div>

<script>

	function ganginfunc(name) {

		return name;

		alert('안녕하세요. ' + name + '장인들입니다.');
		console.log(name);
	}

	function simple_ajax_submit( frm, callback )
	{

		var f = $( frm );

		var msg = "";
		var username = "";

		// check required
		f.find( ".submit-required" ).each(function(){

			if( $(this).val() == "" || ( $(this).attr( "type" ) == "checkbox" && !$(this).is( ":checked" ) ) ) msg = $( this ).data("label") + "는 필수 사항입니다.";

			// if( $(this).attr("name") == "name" ) msg = $( this ).val(); 

			if( $(this).attr("name") == "name" ) {
				username = $(this).val();
				if( $(this).val().length < 2 ) {
					msg = "이름은 한글자 이상 입력해주세요^^*";
				}
				var nameRegExp = /^[가-힣a-zA-Z\s]+$/;
				if ( !nameRegExp.test($(this).val()) ) {
					msg = "이름은 한글, 영문만 입력해주세요";
				}
			}

			if( $(this).attr("name") == "tel" ) {
				var phoneRegExp =  /^\d{2,3}-\d{3,4}-\d{4}$/;
				var phoneRegExp2 =  /^\d{2,3}\d{3,4}\d{4}$/;
				if ( !phoneRegExp.test($(this).val()) && !phoneRegExp2.test($(this).val()) ) {
					msg = "전화번호를 정확히 입력해주세요^^*";
				}
			}

		});

		/* 유저 입력 정보에 의한 검증로직 부분 */
		// if( msg != "" ) { alert( msg ); return false; }
		if( msg != "" ) {
			$("#customAlert").removeClass("hide");
			$("#customAlertMsg").text(msg);
			return false;
		}

		//console.log( f.serialize() );

		var _d = new FormData( f[0] );

		console.log(_d);

		$.ajax({

			url: f.attr( "action" ),
			method: f.attr( "method" ),
			data: f.serialize(), //_d,//
			dataType:'json',
			success: function( rt ){

				//console.log(rt);
				if( callback ) 	callback(rt, username);
				else 			location.reload();

			},
			complete: function( rt ){

			}

		});

		return false;

	}

</script>
<script>

	/* for popup start */
	function popup( child, cb )
	{
		$( "#popup-wrapper" ).fadeIn();
		$( "#popup-continaer" ).append( child );
		$( "body" ).addClass( "popuped" );

		if( cb != null ) cb();
	}

	$(function(){

		$( "#popup-close" ).click(function(){
			$( "body" ).removeClass( "popuped" );
			$( "#popup-wrapper" ).fadeOut(function(){ $( "#popup-continaer" ).html( "" ); });
			return false;
		});

		$( "#popup-wrapper" ).click(function(){
			if( $(event.target).hasClass('popup-wrapper') ) $( "#popup-close" ).click();
		});

		$( "#popup-continaer" ).click(function(event){
			//event.stopPropagation();
		});

	});
	/* for popup end */

	// color checked
	$(function(){
		$(".color-check").each(function(){
			( $(this).find( "input" ).prop( "checked" ) ) ? $( this ).addClass( "active" ) : $( this ).removeClass( "active" ) ;
		});
	});


	// for 폰트 어섬 이용한 라디오
	$( document ).on("click", ".fa-radio input, .fa-check input, .color-check input", function(){

		$(".fa-radio, fa-check, .color-check").each(function(){
			( $(this).find( "input" ).prop( "checked" ) ) ? $( this ).addClass( "active" ) : $( this ).removeClass( "active" ) ;
		});

	});



	// for basic tabs
	$( document ).on("click", ".basic-tabs",function(){

		if( $(this).hasClass( "active" ) ) return;

		wpr = $(this).closest(".basic-tabs-wrapper");
		chs = wpr.find( '.basic-tabs' );

		idx = wpr.find( ".active" ).length ? ( chs.index( wpr.find( ".basic-tabs.active" ) ) + 1 ) % chs.length : 0;

		wpr.find( ".basic-tabs.active" ).removeClass( "active" );
		$(this).addClass( "active" );

		wpr.find( ".basic-tabs-body" ).hide();
		wpr.find( ".basic-tabs-body:eq('"+idx+"')" ).show();
	});


</script>

<!-- popup-layer end -->

<script>
$(function(){

	$(window).scroll(function(){

		if( $(window).scrollTop() == 0 )	$( "#site-header" ).removeClass( "scrolled" );
		else								$( "#site-header" ).addClass( "scrolled" );

	}).scroll();

 	$('#section-estimate .estimate-group:first').show();
});
</script>

<?php
		$esimate_data_wallpaper = array(
		'10' => array( '50','32','42','38','23','30','55','36','46','42','26','33'),
		'11' =>	array( '59','36','46','42','26','33','64','39','51','46','28','37'),
		'12' =>	array( '64','39','51','46','28','36','70','43','56','51','31','40'),
		'13' =>	array( '69','42','55','50','30','39','76','46','60','55','33','43'),
		'14' =>	array( '75','45','59','54','33','42','82','50','65','59','36','47'),
		'15' =>	array( '80','48','63','57','35','46','88','53','70','63','38','50'),
		'16' => array( '85','52','67','61','37','49','94','57','74','67','41','53'),
		'17' => array( '91','55','72','65','40','52','100','60','79','72','44','57'),
		'18' => array( '96','58','76','69','42','55','105','64','83','76','46','60'),
		'19' => array( '101','61','80','73','44','58','111','68','88','80','49','63'),
		'20' => array( '106','65','84','77','47','61','117','71','93','84','51','67'),
		'21' => array( '112','68','89','80','49','64','123','75','97','89','54','70'),
		'22' => array( '117','71','93','84','51','67','129','78','102','93','56','73'),
		'23' => array( '122','74','97','88','54','70','135','82','107','97','59','77'),
		'24' => array( '128','78','101','92','56','73','141','85','111','101','61','80'),
		'25' => array( '133','81','105','96','58','76','146','89','116','105','64','83'),
		'26' => array( '138','84','110','100','61','79','152','92','121','110','67','87'),
		'27' => array( '144','87','114','103','63','82','158','96','125','114','69','90'),
		'28' => array( '149','91','118','107','65','85','164','100','130','118','72','93'),
		'29' => array( '154','94','122','111','67','88','170','103','134','122','74','97'),
		'30' => array( '160','97','126','115','70','91','176','107','139','126','77','100'),
		'31' => array( '165','100','131','119','72','94','182','110','144','131','79','103'),
		'32' => array( '170','103','135','123','74','97','187','114','148','135','82','107'),
		'33' => array( '176','107','139','126','77','100','193','117','153','139','84','110'),
		'34' => array( '181','110','143','130','79','103','199','121','158','143','87','113'),
		'35' => array( '186','113','148','134','81','106','205','124','162','148','90','117'),
		'36' => array( '192','116','152','138','84','109','211','128','167','152','92','120'),
		'37' => array( '197','120','156','142','86','112','217','132','172','156','95','124'),
		'38' => array( '202','123','160','146','88','115','223','135','176','160','97','127'),
		'39' => array( '208','126','164','149','91','118','228','139','181','164','100','130'),
		'40' => array( '209','127','166','151','91','119','230','140','182','166','101','131'),
		'41' => array( '214','130','170','154','94','122','236','143','187','170','103','134'),
		'42' => array( '220','133','174','158','96','125','241','147','191','174','106','138'),
		'43' => array( '225','136','178','162','98','128','247','150','196','178','108','141'),
		'44' => array( '230','140','182','166','101','131','253','154','200','182','111','144'),
		'45' => array( '235','143','186','169','103','134','259','157','205','186','113','147'),
		'46' => array( '240','146','190','173','105','137','264','161','209','190','116','151'),
		'47' => array( '246','149','194','177','107','140','270','164','214','195','118','154'),
		'48' => array( '251','152','199','181','110','143','276','168','218','199','121','157'),
		'49' => array( '256','156','203','184','112','146','282','171','223','203','123','161'),
		'50' => array( '259','157','205','186','113','148','285','173','225','205','125','162'),
		'51' => array( '264','160','209','190','115','151','291','176','230','209','127','166'),
		'52' => array( '269','164','213','194','118','153','296','180','235','213','129','169'),
		'53' => array( '274','167','217','198','120','156','302','183','239','217','132','172'),
		'54' => array( '280','170','221','201','122','159','308','187','244','221','134','175'),
		'55' => array( '285','173','225','205','125','162','313','190','248','226','137','179'),
		'56' => array( '290','176','230','209','127','165','319','194','253','230','139','182'),
		'57' => array( '295','179','234','213','129','168','325','197','257','234','142','185'),
		'58' => array( '300','182','238','216','131','171','330','201','262','238','144','188'),
		'59' => array( '306','186','242','220','134','174','336','204','266','242','147','192'),
		'60' => array( '311','189','246','224','136','177','342','208','271','246','149','195')
	);

	$esimate_data_wallpaper_renewal = array(
		'D' => array(
			'10' => array(
				'00' => array(38, 23, 30),
				'10' => array(42, 26, 38),
				'01' => array(50, 32, 42),
				'11' => array(55, 36, 46),
			)
		)
	);

	// $esimate_data_wallpaper_additional = array(
	// 	'10' => '5'
	// )

	$esimate_data_floorpaper = array(
		'10' => array( '25', '30', '35', '15', '20', '25', '30', '35', '40', '20', '25', '30'),
		'11' => array( '25', '32', '36', '15', '20', '25', '30', '36', '42', '20', '25', '30'),
		'12' => array( '26', '34', '38', '15', '20', '25', '32', '38', '46', '20', '25', '30'),
		'13' => array( '26', '35', '40', '15', '20', '25', '32', '42', '48', '20', '25', '30'),
		'14' => array( '28', '38', '43', '16', '21', '25', '34', '46', '52', '20', '25', '30'),
		'15' => array( '30', '41', '46', '17', '22', '26', '37', '49', '56', '20', '27', '31'),
		'16' => array( '33', '43', '50', '18', '24', '27', '39', '52', '59', '21', '29', '33'),
		'17' => array( '35', '46', '53', '19', '25', '29', '41', '55', '63', '23', '30', '35'),
		'18' => array( '37', '49', '56', '20', '27', '31', '44', '59', '67', '24', '32', '37'),
		'19' => array( '39', '51', '59', '21', '28', '32', '46', '62', '71', '25', '34', '39'),
		'20' => array( '41', '54', '62', '22', '30', '34', '49', '65', '74', '27', '36', '41'),
		'21' => array( '43', '57', '65', '23', '31', '36', '51', '68', '78', '28', '38', '43'),
		'22' => array( '45', '60', '68', '25', '33', '37', '54', '72', '82', '30', '39', '45'),
		'23' => array( '47', '62', '71', '26', '34', '39', '56', '75', '85', '31', '41', '47'),
		'24' => array( '49', '65', '74', '27', '36', '41', '59', '78', '89', '32', '43', '49'),
		'25' => array( '51', '68', '77', '28', '37', '43', '61', '81', '93', '34', '45', '51'),
		'26' => array( '53', '70', '81', '29', '39', '44', '63', '85', '97', '35', '47', '53'),
		'27' => array( '55', '73', '84', '30', '40', '46', '66', '88', '100', '36', '48', '55'),
		'28' => array( '57', '76', '87', '31', '42', '48', '68', '91', '104', '38', '50', '57'),
		'29' => array( '59', '79', '90', '32', '43', '49', '71', '94', '108', '39', '52', '59'),
		'30' => array( '61', '81', '93', '34', '45', '51', '73', '98', '112', '40', '54', '61'),
		'31' => array( '63', '84', '96', '35', '46', '53', '76', '101', '115', '42', '55', '63'),
		'32' => array( '65', '87', '99', '36', '48', '55', '78', '104', '119', '43', '57', '65'),
		'33' => array( '67', '89', '102', '37', '49', '56', '80', '107', '123', '44', '59', '67'),
		'34' => array( '69', '92', '105', '38', '51', '58', '83', '110', '126', '46', '61', '70'),
		'35' => array( '71', '95', '108', '39', '52', '60', '85', '110', '130', '47', '63', '72'),
		'36' => array( '73', '98', '112', '40', '54', '61', '88', '116', '134', '48', '64', '74'),
		'37' => array( '75', '100', '115', '41', '55', '63', '90', '119', '138', '50', '66', '76'),
		'38' => array( '77', '103', '118', '42', '57', '65', '93', '122', '141', '51', '68', '78'),
		'39' => array( '79', '106', '121', '44', '58', '66', '95', '125', '145', '52', '70', '80'),
		'40' => array( '81', '108', '124', '45', '60', '68', '98', '128', '149', '54', '72', '82'),
		'41' => array( '83', '110', '127', '46', '61', '70', '100', '128', '152', '55', '73', '84'),
		'42' => array( '85', '113', '130', '47', '63', '72', '102', '131', '156', '56', '75', '86'),
		'43' => array( '87', '116', '133', '48', '64', '73', '105', '136', '160', '58', '77', '88'),
		'44' => array( '89', '119', '136', '49', '66', '75', '107', '139', '164', '59', '79', '90'),
		'45' => array( '91', '122', '139', '50', '67', '77', '110', '142', '167', '60', '80', '92'),
		'46' => array( '94', '125', '142', '51', '69', '78', '112', '148', '171', '62', '82', '94'),
		'47' => array( '96', '127', '146', '53', '70', '80', '115', '153', '175', '63', '84', '96'),
		'48' => array( '98', '130', '149', '54', '72', '82', '117', '156', '178', '64', '86', '98'),
		'49' => array( '100', '133', '152', '55', '73', '83', '120', '157', '182', '66', '88', '100'),
		'50' => array( '102', '136', '155', '56', '75', '85', '122', '160', '186', '67', '89', '102'),
		'51' => array( '104', '138', '158', '57', '76', '87', '124', '163', '190', '68', '91', '104'),
		'52' => array( '106', '141', '161', '58', '78', '89', '127', '165', '193', '70', '93', '106'),
		'53' => array( '108', '144', '164', '59', '79', '90', '129', '168', '197', '71', '95', '108'),
		'54' => array( '110', '145', '167', '60', '80', '92', '132', '168', '201', '72', '97', '110'),
		'55' => array( '112', '149', '170', '61', '82', '94', '134', '179', '204', '74', '98', '112'),
		'56' => array( '114', '152', '173', '63', '83', '95', '137', '182', '208', '75', '100', '114'),
		'57' => array( '116', '154', '177', '64', '85', '97', '139', '185', '212', '76', '102', '117'),
		'58' => array( '118', '157', '180', '65', '86', '99', '141', '189', '216', '78', '104', '119'),
		'59' => array( '120', '160', '183', '66', '88', '101', '144', '192', '219', '79', '106', '121'),
		'60' => array( '122', '163', '186', '67', '89', '102', '146', '195', '223', '80', '107', '123')
	);

	$esimate_data_floor = array(
		'10' => array( '75', '60', '35', '95', '80', '55', '90', '75', '40', '105', '90', '60'),
		'11' => array( '80', '65', '35', '100', '85', '58', '96', '78', '42', '116', '98', '62'),
		'12' => array( '87', '71', '38', '109', '93', '60', '105', '85', '46', '126', '107', '68'), 
		'13' => array( '94', '77', '41', '118', '100', '65', '113', '92', '50', '137', '116', '73'),
		'14' => array( '102', '83', '44', '127', '108', '70', '122', '99', '53', '147', '125', '79'),
		'15' => array( '109', '88', '48', '136', '116', '75', '131', '106', '57', '158', '133', '84'),
		'16' => array( '116', '94', '51', '145', '123', '80', '139', '113', '61', '168', '142', '90'),
		'17' => array( '123', '100', '54', '154', '131', '85', '148', '120', '65', '179', '151', '96'),
		'18' => array( '131', '106', '57', '163', '139', '90', '157', '127', '69', '189', '160', '101'),
		'19' => array( '138', '112', '60', '172', '147', '95', '166', '134', '72', '200', '169', '107'),
		'20' => array( '145', '118', '64', '182', '154', '100', '174', '142', '76', '211', '178', '113'),
		'21' => array( '152', '124', '67', '191', '162', '105', '183', '149', '80', '221', '187', '118'),
		'22' => array( '160', '130', '70', '200', '170', '110', '192', '156', '84', '232', '196', '124'),
		'23' => array( '167', '136', '73', '209', '177', '115', '200', '163', '88', '242', '205', '129'),
		'24' => array( '174', '142', '76', '218', '185', '120', '209', '170', '91', '253', '213', '135'),
		'25' => array( '182', '147', '79', '227', '193', '125', '218', '177', '95', '263', '222', '141'),
		'26' => array( '189', '153', '83', '236', '201', '130', '227', '184', '99', '274', '231', '146'),
		'27' => array( '196', '159', '86', '245', '208', '135', '235', '191', '103', '284', '240', '152'),
		'28' => array( '203', '165', '89', '254', '216', '140', '244', '198', '107', '295', '249', '158'),
		'29' => array( '211', '171', '92', '263', '224', '145', '253', '205', '111', '305', '258', '163'),
		'30' => array( '218', '177', '95', '272', '231', '150', '261', '212', '114', '316', '267', '169'),
		'31' => array( '225', '183', '98', '281', '239', '155', '270', '219', '118', '326', '276', '174'),
		'32' => array( '232', '189', '102', '290', '247', '160', '279', '227', '122', '337', '285', '180'),
		'33' => array( '240', '195', '105', '299', '255', '165', '287', '234', '126', '347', '293', '186'),
		'34' => array( '247', '201', '108', '309', '262', '170', '296', '241', '130', '358', '302', '191'),
		'35' => array( '254', '206', '111', '318', '270', '175', '305', '248', '133', '368', '311', '197'),
		'36' => array( '261', '212', '114', '327', '278', '180', '314', '255', '137', '379', '320', '203'),
		'37' => array( '269', '218', '118', '336', '285', '185', '322', '262', '141', '389', '329', '208'),
		'38' => array( '276', '224', '121', '345', '293', '190', '331', '269', '145', '400', '338', '214'),
		'39' => array( '283', '230', '124', '354', '301', '195', '340', '276', '149', '411', '347', '219'),
		'40' => array( '290', '236', '127', '363', '309', '200', '348', '283', '152', '421', '356', '225'),
		'41' => array( '298', '242', '130', '372', '316', '205', '357', '290', '156', '432', '365', '231'),
		'42' => array( '305', '248', '133', '381', '324', '210', '366', '297', '160', '442', '374', '236'),
		'43' => array( '312', '254', '137', '390', '332', '215', '375', '304', '164', '453', '382', '242'),
		'44' => array( '319', '260', '140', '399', '339', '220', '383', '311', '168', '463', '391', '248'),
		'45' => array( '327', '265', '143', '408', '347', '225', '392', '319', '172', '474', '400', '253'),
		'46' => array( '334', '271', '146', '417', '355', '230', '401', '326', '175', '484', '409', '259'),
		'47' => array( '341', '277', '149', '427', '363', '235', '409', '333', '179', '495', '418', '264'),
		'48' => array( '348', '283', '152', '436', '370', '240', '418', '340', '183', '505', '427', '270'),
		'49' => array( '356', '289', '156', '445', '378', '245', '427', '347', '187', '516', '436', '276'),
		'50' => array( '363', '295', '159', '454', '386', '250', '436', '354', '191', '526', '445', '281'),
		'51' => array( '370', '301', '162', '463', '393', '255', '444', '361', '194', '537', '454', '287'),
		'52' => array( '378', '307', '165', '472', '401', '260', '453', '368', '198', '547', '462', '293'),
		'53' => array( '385', '313', '168', '481', '409', '265', '462', '375', '202', '558', '471', '298'),
		'54' => array( '392', '319', '172', '490', '417', '270', '470', '382', '206', '568', '480', '304'),
		'55' => array( '399', '324', '175', '499', '424', '275', '479', '389', '210', '579', '489', '309'),
		'56' => array( '407', '330', '178', '508', '432', '280', '488', '396', '213', '590', '498', '315'),
		'57' => array( '414', '336', '181', '517', '440', '285', '497', '403', '217', '600', '507', '321'),
		'58' => array( '421', '342', '184', '526', '447', '289', '505', '411', '221', '611', '516', '326'),
		'59' => array( '428', '348', '187', '535', '455', '294', '514', '418', '225', '621', '525', '332'),
		'60' => array( '436', '354', '191', '545', '463', '299', '523', '425', '229', '632', '534', '338')
	);
?>

<script>
	function reset_estimate()
	{
		$( "#estimate-wallpaper-form .estimate-select ul li:first" ).click();
		$( "#estimate-wallpaper-form .estimate-radio input:first" ).click();
		$( "#estimate-wallpaper-form .information input[type=text]" ).val("");
	}
	$(function(){

		$('#estimate-wallpaper-form [name=option-area], #estimate-wallpaper-form [name=option-pyeong], #estimate-wallpaper-form .estimate-radio input').blur(function(){

			_a = $('#estimate-wallpaper-form [name=option-area]').val();
			_p = $('#estimate-wallpaper-form [name=option-pyeong]').val();
			console.log(_p); // _p 평수
			// console.log(_a);
			// DB

			var add_price = 0;
			var check_value = "";

			if( _a ==  "대전") {
				add_price = 5;
				check_value = 'D';
			} else if ( _a == "세종" ) {
				add_price = 10;
				check_value = 'S';
			}

			if( _p == "" ) {

				$( '#estimate-wallpaper-form .estimate-price:eq(0)' ).text("??");
				$( '#estimate-wallpaper-form .estimate-price:eq(1)' ).text("??");
				$( '#estimate-wallpaper-form .estimate-price:eq(2)' ).text("??");
				$( '#estimate-wallpaper-form .estimate-price:eq(3)' ).text("??");
				return ;
			}

			var add_price_by_pyeong = _p.substr(0,2);
			var _veranda = false;
			var _ceil = false;
			var _empty = true;
			check_value += add_price_by_pyeong;

			_o = $('#estimate-wallpaper-form select option[value='+_p+']' );
			// console.log(_o); // _p평을 넣은 selector
			_p_idx = [];

			if( $( "#estimate-wallpaper-form [name=w-veranda]:checked" ).val() == "있음" ) {
				_veranda = true;
				( $( "#estimate-wallpaper-form [name=w-ceiling]:checked" ).val() == "미포함" ) ? _p_idx = [9,10,11] : _p_idx = [6,7,8] ;
				( $( "#estimate-wallpaper-form [name=w-ceiling]:checked" ).val() == "미포함" ) ? check_value += '10' : check_value += '11' ;

			}else{
				_veranda = false;
				( $( "#estimate-wallpaper-form [name=w-ceiling]:checked" ).val() == "미포함" ) ? _p_idx = [3,4,5]  :  _p_idx = [0,1,2];
				( $( "#estimate-wallpaper-form [name=w-ceiling]:checked" ).val() == "미포함" ) ? check_value += '00' : check_value += '01' ;

			}

			if($( "#estimate-wallpaper-form [name=w-ceiling]:checked" ).val() != "미포함") {
				_ceil = true;
			}

			console.log(check_value);
			// console.log(esimate_data_wallpaper_renewal[check_value.substr(0, 1)][check_value.substr(2, 4)][check_value.substr(5, 8)]);

			_idx = $( "#estimate-wallpaper-form [name=w-papering]input" ).index( $( "#estimate-wallpaper-form [name=w-papering]input:checked" ) );
			if( _idx < 0 ) _idx = 0;

			_prices = _o.data( 'prices' );
			$( '#estimate-wallpaper-form .estimate-price:eq(0)' ).text(parseInt(_prices[_p_idx[0]], 10) + add_price);
			$( '#estimate-wallpaper-form .estimate-price:eq(1)' ).text(parseInt(_prices[_p_idx[1]], 10) + add_price);
			$( '#estimate-wallpaper-form .estimate-price:eq(2)' ).text(parseInt(_prices[_p_idx[2]], 10) + add_price);
			$( '#estimate-wallpaper-form .estimate-price:eq(3)' ).text(parseInt(_prices[_p_idx[_idx]], 10) + add_price);

			$( '#estimate-wallpaper-form [name=price]' ).val(parseInt(_prices[_p_idx[_idx]], 10) + add_price);
			//alert($(this).val());

			if( $( '#estimate-wallpaper-form [name=w-stay]:checked' ).val() == "거주중/가구있음" ){
				var add_price_by_pyeong = _p.substr(0,2);
				_empty = false;
				// $( '#estimate-wallpaper-form .estimate-price:eq(3)' ).closest( 'span' ).find( "a" ).text( '+a' );
				$( '#estimate-wallpaper-form .estimate-price:eq(0)' ).text(parseInt(_prices[_p_idx[0]], 10) + add_price + parseInt(add_price_by_pyeong, 10));
				$( '#estimate-wallpaper-form .estimate-price:eq(1)' ).text(parseInt(_prices[_p_idx[1]], 10) + add_price + parseInt(add_price_by_pyeong, 10));
				$( '#estimate-wallpaper-form .estimate-price:eq(2)' ).text(parseInt(_prices[_p_idx[2]], 10) + add_price + parseInt(add_price_by_pyeong, 10));
				$( '#estimate-wallpaper-form .estimate-price:eq(3)' ).text(parseInt(_prices[_p_idx[_idx]], 10) + add_price + parseInt(add_price_by_pyeong, 10));

				$( '#estimate-wallpaper-form [name=price]' ).val(parseInt(_prices[_p_idx[_idx]], 10) + add_price + parseInt(add_price_by_pyeong, 10));
			}else{
				// $( '#estimate-wallpaper-form .estimate-price:eq(3)' ).closest( 'span' ).find( "a" ).text( '' );
				$( '#estimate-wallpaper-form .estimate-price:eq(0)' ).text(parseInt(_prices[_p_idx[0]], 10) + add_price);
				$( '#estimate-wallpaper-form .estimate-price:eq(1)' ).text(parseInt(_prices[_p_idx[1]], 10) + add_price);
				$( '#estimate-wallpaper-form .estimate-price:eq(2)' ).text(parseInt(_prices[_p_idx[2]], 10) + add_price);
				$( '#estimate-wallpaper-form .estimate-price:eq(3)' ).text(parseInt(_prices[_p_idx[_idx]], 10) + add_price);

				$( '#estimate-wallpaper-form [name=price]' ).val(parseInt(_prices[_p_idx[_idx]], 10) + add_price);
			}

			/**
			 * API 방식으로 변경
			 */

			// $.ajax({ type: "POST", url: url, data: data, success: success, dataType: dataType });
			
			// POST 방식으로 서버에 HTTP Request를 보냄. $.post("/examples/media/request_ajax.php", { name: "홍길동", grade: "A" }, // 서버가 필요한 정보를 같이 보냄. function(data, status) { $("#text").html(data + "<br>" + status); // 전송받은 데이터와 전송 성공 여부를 보여줌. } );

			// $.post("/api/calculator.php", {
			// 	name: 'name',
			// 	password: '2222',
			// 	py: add_price_by_pyeong
			// }, function(data, status) {
			// 	console.log(data);
			// 	// console.log(data["name"]);
			// 	console.log(status);
			// });

			$.ajax({
				type: "POST",
				url: "/api/calculator.php",
				cache: false,
				async: false,
				data: {
					'type': 'wallpaper',
					'py': add_price_by_pyeong,
					'veranda': _veranda,
					'ceil': _ceil,
					'empty': _empty,
					'code': check_value,
				},
				dataType: "json",
				success: function(data, status) {
					// console.log(data);
					// console.log(status);

					console.log(data);
					
					if(status == "success") {
						$( '#estimate-wallpaper-form .estimate-price:eq(0)' ).text(data[0]);
						$( '#estimate-wallpaper-form .estimate-price:eq(1)' ).text(data[1]);
						$( '#estimate-wallpaper-form .estimate-price:eq(2)' ).text(data[2]);
						
						_idx = $( "#estimate-wallpaper-form [name=w-papering]input" ).index( $( "#estimate-wallpaper-form [name=w-papering]input:checked" ) );
						$( '#estimate-wallpaper-form .estimate-price:eq(3)' ).text(data[_idx]);
						$( '#estimate-wallpaper-form [name=price]' ).val(data[_idx]);
						// console.log(_idx);
					}
					
					
					
					// console.log(status);
					// if(data.error) {
					// 	alert(data.error);
					// 	if(data.url)
					// 		document.location.href = data.url;

					// 	return false;
					// }

					// token = data.token;
				}
			});

		});


		$('#estimate-floorpaper-form [name=option-pyeong], #estimate-floorpaper-form .estimate-radio input').blur(function(){

			_p = $('#estimate-floorpaper-form [name=option-pyeong]').val();

			if( _p == "" ) {

				$( '#estimate-floorpaper-form .estimate-price:eq(0)' ).text("??");
				$( '#estimate-floorpaper-form .estimate-price:eq(1)' ).text("??");
				$( '#estimate-floorpaper-form .estimate-price:eq(2)' ).text("??");
				$( '#estimate-floorpaper-form .estimate-price:eq(3)' ).text("??");
				// $( '#estimate-floorpaper-form .estimate-price:eq(4)' ).text("??");
				return ;
			}
			_o = $('#estimate-floorpaper-form select option[value='+_p+']' );

			_p_idx = [];

			if( $( "#estimate-floorpaper-form [name=p-veranda]:checked" ).val() == "있음" ) {


				( $( "#estimate-floorpaper-form [name=p-all]:checked" ).val() == "방 만 시공" ) ? _p_idx = [9,10,11] :_p_idx = [6,7,8];


			}else{

				( $( "#estimate-floorpaper-form [name=p-all]:checked" ).val() == "방 만 시공" ) ? _p_idx = [3,4,5]  : _p_idx = [0,1,2];

			}

			_idx = $( "#estimate-floorpaper-form [name=p-floorpaper]input" ).index( $( "#estimate-floorpaper-form [name=p-floorpaper]input:checked" ) );

			if( _idx < 0 ) _idx = 0;

			_prices = _o.data( 'prices' );
			$( '#estimate-floorpaper-form .estimate-price:eq(0)' ).text(_prices[_p_idx[0]]);
			$( '#estimate-floorpaper-form .estimate-price:eq(1)' ).text(_prices[_p_idx[1]]);
			$( '#estimate-floorpaper-form .estimate-price:eq(2)' ).text(_prices[_p_idx[2]]);

			if($( "#estimate-floorpaper-form .consulting input").is(":checked")){

				$( '#estimate-floorpaper-form .estimate-price:eq(3)' ).text('상담필요 ??');
				$( '#estimate-floorpaper-form [name=price]' ).val('상담필요');


			} else {

				$( '#estimate-floorpaper-form .estimate-price:eq(3)' ).text(_prices[_p_idx[_idx]]);
				$( '#estimate-floorpaper-form [name=price]' ).val(_prices[_p_idx[_idx]]);
			}

			if( $( '#estimate-floorpaper-form [name=p-stay]:checked' ).val() == "거주중/가구있음" ){

				$( '#estimate-floorpaper-form .estimate-price:eq(3)' ).closest( 'div' ).find( "a" ).text( '+a' )

			}else{

				$( '#estimate-floorpaper-form .estimate-price:eq(3)' ).closest( 'div' ).find( "a" ).text( '' )
			}

		});


		$('#estimate-floor-form [name=option-pyeong], #estimate-floor-form .estimate-radio input').blur(function(){

			_p = $('#estimate-floor-form [name=option-pyeong]').val();
			if( _p == "" ) {

				$( '#estimate-floor-form .estimate-price:eq(0)' ).text("??");
				$( '#estimate-floor-form .estimate-price:eq(1)' ).text("??");
				$( '#estimate-floor-form .estimate-price:eq(2)' ).text("??");
				$( '#estimate-floor-form .estimate-price:eq(3)' ).text("??");
				// $( '#estimate-floorpaper-form .estimate-price:eq(4)' ).text("??");
				return ;
			}
			_o = $('#estimate-floor-form select option[value='+_p+']' );

			_p_idx = [];

			if( $( "#estimate-floor-form [name=f-veranda]:checked" ).val() == "있음" ) {

				( $( "#estimate-floor-form [name=f-existing]:checked" ).val() == "기존바닥재 마루/대리석" ) ?  _p_idx = [9,10,11] :_p_idx = [6,7,8];

			}else{

				( $( "#estimate-floor-form [name=f-existing]:checked" ).val() == "기존바닥재 마루/대리석" ) ?  _p_idx = [3,4,5] : _p_idx = [0,1,2];

			}

			_idx = $( "#estimate-floor-form [name=f-floor]input" ).index( $( "#estimate-floor-form [name=f-floor]input:checked" ) );
			if( _idx < 0 ) _idx = 0;

			_prices = _o.data( 'prices' );
			$( '#estimate-floor-form .estimate-price:eq(0)' ).text(_prices[_p_idx[0]]);
			$( '#estimate-floor-form .estimate-price:eq(1)' ).text(_prices[_p_idx[1]]);
			$( '#estimate-floor-form .estimate-price:eq(2)' ).text(_prices[_p_idx[2]]);

			if($( "#estimate-floor-form .consulting input").is(":checked")){

				$( '#estimate-floor-form .estimate-price:eq(3)' ).text('상담필요 ??');
				$( '#estimate-floor-form [name=price]' ).val('상담필요');

			} else {

				$( '#estimate-floor-form .estimate-price:eq(3)' ).text(_prices[_p_idx[_idx]]);
				$( '#estimate-floor-form [name=price]' ).val(_prices[_p_idx[_idx]]);
			}

			if( $( '#estimate-floor-form [name=f-stay]:checked' ).val() == "거주중/가구있음" ){

				$( '#estimate-floor-form .estimate-price:eq(3)' ).closest( 'div' ).find( "a" ).text( '+a' );
			}else{

				$( '#estimate-floor-form .estimate-price:eq(3)' ).closest( 'div' ).find( "a" ).text( '' );
			}


		});

	});
</script>

<script>
//정보수집동의 팝업
$(function(){
	$( ".view-terms" ).click(function(){
			child = $( "<div id='privacy-jangin'></div>" ).load( "/?p=privacy #privacy" );
			popup( child, function(){ });
	});
});



</script>

<style>
    #section-estimate .estimate-group{ display:none; }
	.estimate-select ul{max-height: 200px; overflow-y: auto; overflow-x:hidden;}
</style>



<div id="search-background">
	<div id="txt-dialog" class="search-popup-inner">
		<div class="container">
			<div class="search-input">
				<form action="/?p=search" method="POST">
					<i class="fa fa-search"></i>
					<input type="hidden" name="p"/>
					<input type="text" placeholder="Search" name="search" />
				</form>
			</div>
		</div>
	</div>
</div>

<div class="page_cover"></div>

<div id="menu">
	<div class="close"><img src="/assets/images/common/cancle_icon.png"></div>
	<ul class="list">
		<li class="group">
			<i class="fa fa-angle-down" aria-hidden="true"></i>
			<a>도배</a>
			<ul class="hide">
				<li><a href="/?p=estimate-wallpaper">도배 견적내기</a></li>
				<li><a href="/?p=wallpaper-contr-guide">도배 시공가이드</a></li>
				<li><a href="/?p=choose-wallpaper">벽지 고르러가기</a></li>
				<li><a href="/?p=package01">올 화이트 패키지</a></li>
			</ul>
		</li>
        <li class="group">
			<i class="fa fa-angle-down" aria-hidden="true"></i>
			<a>장판</a>
			<ul class="hide">
				<li><a href="/?p=estimate-floorpaper">장판 견적내기</a></li>
				<li><a href="/?p=floorpaper-contr-guide">장판 시공가이드</a></li>
				<li><a href="/?p=choose-floorpaper">장판 고르러가기</a></li>
				<li><a href="/?p=package02">도배+장판 패키지</a></li>
			</ul>
		</li>
        <li class="group">
			<i class="fa fa-angle-down" aria-hidden="true"></i>
			<a>마루</a>
			<ul class="hide">
				<li><a href="/?p=estimate-floor">마루 견적내기</a></li>
				<li><a href="/?p=floor-contr-guide">마루 시공가이드</a></li>
				<li><a href="/?p=choose-floor">마루 고르러가기</a></li>
				<li><a href="/?p=package03">도배+마루 패키지</a></li>
			</ul>
		</li>
		<li><a href="/?p=introduce-jangin">장인들 소개</a></li>
		<li><a href="/?p=user-guide">이용가이드</a></li>
		<li><a id="search-opener-m">통합 검색</a></li>
	</ul>
</div>


<style>
	#site-header-pop{ background: #000;   }
	#site-header-pop a{ color: #fff; display: block; line-height: 3;  text-align: center; font-size: 1em; }
	#site-header-pop a b{ color: #ffd3aa;}

	#site-header-pop #site-header-pop-closer{ position:absolute; right:10px; color:#fff; top: 50%; margin-top: -7px; }
</style>

<script>

		$(function(){

			$( "#site-header-pop #site-header-pop-closer" ).click(function(){
				$( "#site-header-pop" ).slideUp();
			});
			$( "#site-header-pop" ).slideDown();
		});
</script>

<div id="site-header" class="clear scrolled">

	<!--
	<div id="site-header-pop">
		<div class="row">
			<a href="/?p=event"><b>화이트 패키지를</b> 구매하시면 특별한 혜택을 드립니다!</a>
			<div id="site-header-pop-closer"><img src='/assets/images/common/icon-popup-close-15.png'/></div>
		</div>
	</div>
	-->

<script>
$(function(){
	try{
	var link = document.location.href.split('='); var str = link[1];



	if(str.indexOf('wallpaper') != -1 || str.indexOf('package01') != -1){
		$('#site-header-body .menu-left li .header-list').eq(0).addClass('active');

	} else if (str.indexOf('floorpaper') != -1 || str.indexOf('package02') != -1) {

		$('#site-header-body .menu-left li .header-list').eq(1).addClass('active');

	} else if (str.indexOf('floor') != -1 || str.indexOf('package03') != -1) {

		$('#site-header-body .menu-left li .header-list').eq(2).addClass('active');

	} else if (str.indexOf('introduce') != -1 ) {

		$('#site-header-body .menu-right li .header-list').eq(0).addClass('active');

	} else if (str.indexOf('guide') != -1 ) {

		$('#site-header-body .menu-right li .header-list').eq(1).addClass('active');

	}

		}catch(e){  }

});


</script>

<style>
#site-header-body ul .menu a.active{color:#ff8d27;}
#customAlert {
 width: 350px;
 display: -webkit-box;
 display: flex;
 -webkit-box-orient: vertical;
 -webkit-box-direction: normal;
 flex-direction: column;
 background-color: #fff;
 border-radius: 0.25rem;
 box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
 transition: 0.5s;
 position: fixed;
top: 150px;
left: 50%;
margin-left: -175px;
z-index: 9999;
}
#customAlert.hide {
 transition: 1s;
 transform: scale(0);
}
#customAlert .top {
 width: 50px;
 height: 50px;
 position: relative;
 left: calc(50% - 25px);
 margin-top: 25px;
}
#customAlert .middle {
 display: -webkit-box;
 display: flex;
 -webkit-box-orient: vertical;
 -webkit-box-direction: normal;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 padding: 1rem;
 padding-bottom: 2rem;
}
#customAlert .middle p {
 width: 100%;
 text-align: center;
 font-weight: 400;
 font-size: 1.5rem;
 margin: 0.25rem;
 color: #333;
}
#customAlert .middle span {
 width: 75%;
 text-align: center;
 color: #777;
 font-weight: 100;
}
#customAlert .bottom {
 width: 100%;
 text-align: center;
 background-color: #f65656;
 color: #ddd;
 font-size: 1.25rem;
 padding-top: 1rem;
 padding-bottom: 1rem;
 font-weight: 100;
 border-radius: 0 0 0.25rem 0.25rem;
 cursor: pointer;
}
#customAlert .bottom:hover {
 color: #fff;
 background-color: #c33;
}
#customSuccess {
 width: 350px;
 display: -webkit-box;
 display: flex;
 -webkit-box-orient: vertical;
 -webkit-box-direction: normal;
 flex-direction: column;
 background-color: #fff;
 border-radius: 0.25rem;
 box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
 transition: 0.5s;
 position: fixed;
top: 150px;
left: 50%;
margin-left: -175px;
z-index: 9999;
}
#customSuccess.hide {
 transition: 1s;
 transform: scale(0);
}
#customSuccess .top {
 width: 50px;
 height: 50px;
 position: relative;
 left: calc(50% - 25px);
 margin-top: 25px;
}
#customSuccess .middle {
 display: -webkit-box;
 display: flex;
 -webkit-box-orient: vertical;
 -webkit-box-direction: normal;
 flex-direction: column;
 -webkit-box-align: center;
 align-items: center;
 padding: 1rem;
 padding-bottom: 2rem;
}
#customSuccess .middle p {
 width: 100%;
 text-align: center;
 font-weight: 400;
 font-size: 1.5rem;
 margin: 0.25rem;
 color: #333;
}
#customSuccess .middle span {
 width: 75%;
 text-align: center;
 color: #777;
 font-weight: 100;
}
#customSuccess .bottom {
 width: 100%;
 text-align: center;
 background-color: #2e856e;
 color: #ddd;
 font-size: 1.25rem;
 padding-top: 1rem;
 padding-bottom: 1rem;
 font-weight: 100;
 border-radius: 0 0 0.25rem 0.25rem;
 cursor: pointer;
}
#customSuccess .bottom:hover {
 color: #fff;
 background-color: #006a4e;
}
</style>
    <div id="site-header-body">
		<div class="row">
			<div class="im-x">
				<div class="logo-div fl">
					<a href="/"><img src="/assets/images/main/header-logo.png" /></a>
				</div>
				<ul class="menu-list fl menu-left">
					<li class="menu fl"><a class="header-list" href="/?p=estimate-wallpaper">도배</a>
						<ul class="sub-menu-list">
							<li><a href="/?p=estimate-wallpaper">도배 견적내기</a></li>
							<li><a href="/?p=wallpaper-contr-guide">도배 시공가이드</a></li>
							<li><a href="/?p=choose-wallpaper">벽지 고르러 가기</a></li>
							<li><a href="/?p=package01">올 화이트 패키지</a></li>
						</ul>
					</li>
					<li class="menu fl"><a class="header-list" href="/?p=estimate-floorpaper">장판</a>
						<ul class="sub-menu-list">
							<li><a href="/?p=estimate-floorpaper">장판 견적내기</a></li>
							<li><a href="/?p=floorpaper-contr-guide">장판 시공가이드</a></li>
							<li><a href="/?p=choose-floorpaper">장판 고르러 가기</a></li>
							<li><a href="/?p=package02">도배+장판 패키지</a></li>
						</ul>
					</li>
					<li class="menu fl"><a class="header-list" href="/?p=estimate-floor">마루</a>
						<ul class="sub-menu-list">
							<li><a href="/?p=estimate-floor">마루 견적내기</a></li>
							<li><a href="/?p=floor-contr-guide">마루 시공가이드</a></li>
							<li><a href="/?p=choose-floor">마루 고르러 가기</a></li>
							<li><a href="/?p=package03">도배+마루 패키지</a></li>
						</ul>
					</li>
				</ul>
				<ul class="menu-list fr menu-right">
					<li class="menu menu-right fl"><a class="header-list" href="/?p=introduce-jangin">장인들 소개</a></li>
					<li class="menu menu-right fl"><a class="header-list" href="/?p=user-guide">이용가이드</a></li>
					<button id="btn-search" class="menu menu-right fl"><i class="fa fa-search"></i></button>
						<form id="frm-search" class="fl" action="/?p=search" method="post">
							<input type="hidden" name="p"/>
							<input type="text" name="search" style="background: transparent; border-bottom:1px solid #000; margin-top: 43px;" placeholder=""/>
						</form>
					<div class="clear"></div>
				</ul>
				<a><img src="/assets/images/common/list_icon.png" id="nav_menu"></a>
			</div>
		<div class="clear"></div>
		</div>
    </div>
</div>
<!-- } 상단 끝 -->

<!-- 콘텐츠 시작 { -->
<div id="site-wrapper" class="clear">
