<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-introduce-jangin' );
				while($row=sql_fetch_array($result_banner_main_slide)){
			 ?>

			<li class="lading-slider-li-view" >
				<div class="vertical-center" style="background:url(/data/motif/banner/<?php echo $row['mm_id'] ?>.jpg); background-size: cover;background-position: center;">
					<div class="container row">
						<div class="contents-div" >
							<div class="section-header">
								<div class="primary"><?php echo str_replace('|', '<br/>', $row['mm_subject']) ?></div>
                                <div class="third"><?php echo $row['mm_descript']?></div>
							</div>
							<div class="btn-div">
								<a href="<?php echo $row['mm_writer']?>"><?php echo $row['mm_content']?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"> </div>
			</li>

			<?php } ?>

		</ul>
	</div>
</div><!--.section-->


<div id="link-area">
	<div class="row">
		<ul class="im-x">
			<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> >
			<li><a>장인들</a></li> >
			<li>장인들소개</li>
		</ul>
	</div>
</div>

<style>

#section-introduce .w-12-6 {min-height: 200px;}
#section-introduce .intro-div img{margin-bottom: 50px;}
#section-introduce .w-12-6 .title{font-size: 1.3em;font-weight: 600;}
#section-introduce .w-12-6 p{  }

body.mobile #section-introduce .w-12-6 p{ min-height: 0px; }
</style>


<script>
	$(function(){


		var introduceSlider = new SCarousel( "#introduce-info-wrapper .introduce-slider", {
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
				pointers: true, // boolean
				draggable: true, // boolean
			},
		});
		introduceSlider.build();

	});
</script>
<style>

	#introduce-info-wrapper{ height:600px; }
	.mobile #introduce-info-wrapper{ height:400px; }
	.mobile #introduce-info-wrapper .carousel .dots{ bottom:0px;}

	#introduce-info-wrapper .carousel .dots{ text-align:center; }
	.introduce-slider{height:100%;}
	.introduce-slider ul li{ background-size:cover; background-position:center; }
</style>


<div id="section-introduce" class="section">
    <div class="row">
        <div class="im-x">
            <div class="intro-div" >
                <div class="section-title">장인들 소개</div>

				<div id="introduce-info-wrapper" >
					<div class="introduce-slider" >
						<ul>
							<li style="background-image:url(/assets/images/jangin/slider-01.jpg)"></li>
							<li style="background-image:url(/assets/images/jangin/slider-02.jpg)"></li>
							<li style="background-image:url(/assets/images/jangin/slider-03.jpg)"></li>
						</ul>
					</div>
                </div>
				<br/>
            </div>
        </div>
        <div class="w-12-6 fl">
            <div class="im-x">
                <div class="underline-black-18"></div>
                <div class="title">장인들 소개</div>
                <p class="gray imb-20">
                    장인들은 기존의 어렵고 복잡한 인테리어 시공 절차를 간소화하고 신뢰감 없는
                    가격 견적 체계를 개선하여 소비자에게 보다 투명하고 합리적인 가격과 품질을
                    제공하는 온라인 기반의 인테리어 시공업체입니다.
                </p>
            </div>
        </div>
        <div class="w-12-6 fl">
            <div class="im-x">
                <div class="underline-black-18"></div>
                <div class="title">장인들 목표</div>
                <p class="gray imb-20">
                    기술 중심의 전문 인재 양성를 통한 홈 스타일링 시장의 인적 네트워크를 구축하여
                    국내 인테리어 시장의 잘못된 선입견을 바로 세우고 시공의 패러다임을 바꾸는
                    신뢰 기반의 홈 스타일링 One-stop Service 체계를 지향합니다.
                </p>
            </div>
        </div>
        <div class="w-12-6 fl">
            <div class="im-x">
                <div class="underline-black-18"></div>
                <div class="title">장인들 역할</div>
                <p class="gray imb-20">
                    장인들의 현장매니저는 최초 견적요청부터 공사 후 AS까지 시공의 전 과정을
                    고객의 입장에서 함께 고민하고 좋은 작업 환경을 만들기 위해 최선을 다하고 있습니다.
                    장인들은 지역 대표 기술자들과의 동반 성장을 지향합니다.
                </p>
            </div>
        </div>
        <div class="w-12-6 fl">
            <div class="im-x">
                <div class="underline-black-18"></div>
                <div class="title">서비스 영역</div>
                <p class="gray">
                    장인들은 현재 도배, 장판, 마루의 시공 서비스를 제공하고 있으며
                    앞으로 다양한 인테리어 시공 영을 추가 확장할 계획입니다.
                    장인들은 현재 대전과 세종 지역만 서비스가 가능합니다.
                    타 지역 고객님들의 너그러운 양해 부탁 드립니다.
                </p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<style>
#section-appointment{background: #f4f4f4;}
#section-appointment img{margin: 0 auto; max-width: 80%; }
#section-appointment .w-12-4 .txt{font-size: 1.1em; margin-top: 5px;text-align: center; }
.mobile #section-appointment .w-12-4{ width:33.33% }

</style>

<div id="section-appointment" class="section">
    <div class="row_narrow">
        <div class="intro-div im-x">
            <div class="section-title">장인들 약속</div>
        </div>

        <div class="w-12-4 fl">
            <div class="im-x">
                <img src="/assets/images/jangin/appointment01.png"/>
                <div class="txt">투명하고 합리적인 가격</div>
            </div>
        </div>
        <div class="w-12-4 fl">
            <div class="im-x">
            	<img src="/assets/images/jangin/appointment02.png"/>
                <div class="txt">정직한 재료의 사용</div>
            </div>
        </div>
        <div class="w-12-4 fl">
            <div class="im-x">
                <img src="/assets/images/jangin/appointment03.png"/>
                <div class="txt">최선의 시공 품질</div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<style>
#section-compare .section-title{margin-bottom: 0px;}
#section-compare .section-sub-title{line-height: 1.5; margin-bottom: 20px;}
#section-compare .section-sub-title:last-child{margin-bottom: 50px;}
#section-compare .image-div img{margin: 0 auto; width: 70%;}
#section-compare table { margin: 0 auto; border-top: 2px solid #000;width: 80%; text-align: center; border-collapse: collapse;}
#section-compare table th, td {border-bottom: 1px solid #000;}
#section-compare table th{font-size: 1.5em;font-weight:normal;}
#section-compare table td{font-size: 1.6em;}
</style>
<div id="section-compare" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="intro-div">
                <div class="section-title">왜 온라인 시공 업체인가?</div>
                <div class="section-sub-title">오프라인 업체와 견적비교</div>
                <div class="section-sub-title">
                    <span class="orange">32평</span> 아파트를 <span class="orange">도배+장판 패키지</span>를 기준으로 했을때?
                </div>
            </div>
            <div class="image-div imb-50">
                <img src="/assets/images/jangin/compare01.png"/>
            </div>
            <table>
                <colgroup>
                    <col width="50%"/>
                    <col width="50%"/>
                </colgroup>
                <thead>
                    <tr>
                        <th>장인들</th>
                        <th>오프라인 업체</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="orange">133만원</td>
                        <td>158만원</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
#section-president{background: url(/assets/images/motif/patter-gray-bias.png);text-align: center;}
#section-president .btn-div{margin-top: 20px;}
#section-president .btn-div a{padding: 5px 30px;}
.mobile #section-president .president img{width: 100%;}
</style>

<div id="section-president" class="section">
    <div class="row">
        <div class="im-x">
            <div class="intro-div">
                <div class="section-title">반장님 소개</div>
            </div>

            <div class="president">
				<?php
					$result_banner_main_slide = get_banner_items( 'banjang' );
					while($row=sql_fetch_array($result_banner_main_slide)){
				 ?>
					<div class="im-x">
	                    <img src="/data/motif/banner/<?php echo $row['mm_id'] ?>.jpg"/>
	                </div>
				<?php } ?>
            </div>

            <div class="btn-div">
                <a class="btn-recruit" >장인들 모집 ></a>
            </div>

        </div>
    </div>
</div>

<script>
$(function(){

	_is_slick_build = false;
	_is_before_mobile = $( "body" ).hasClass('mobile');
	$(window).resize(function(){

		if( _is_before_mobile == $( "body" ).hasClass('mobile') && _is_slick_build ) return;
		_is_before_mobile = $( "body" ).hasClass('mobile');

		if( _is_before_mobile ) _show_item_count = 1;
		else 					_show_item_count = 3;

		if( _is_slick_build ) $('.president').slick('destroy');
		_is_slick_build = true;

		$('.president').slick({
		   slidesToShow: _show_item_count,
		   slidesToScroll: 1,
		   autoplay: false,
		   autoplaySpeed: 2000,
		 });
	}).resize();

});
</script>

<style>

	#section-partner .w-12-3{ width:25% !important; height:80px; position: relative;}
	#section-partner .w-12-3 img{ width: 100px; margin: 0 auto; max-width: 80%;;  }
	.mobile #section-partner .w-12-3{  }
</style>

<div id="section-partner" class="section">
    <div class="row">
        <div class="im-x">
            <div class="intro-div">
                <div class="section-title">장인들 파트너</div>

                <div class="partner">
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp01.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp02.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp03.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp04.png" style="width:80px;"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp05.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp06.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp07.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp08.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp09.png"/></div>
                    <div class="w-12-3 fl"><img src="/assets/images/jangin/cp10.png"/></div>
					<div class="w-12-3 fl"><img src="/assets/images/jangin/cp11.png"/></div>
					<div class="w-12-3 fl"><img src="/assets/images/jangin/cp12.png"/></div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
