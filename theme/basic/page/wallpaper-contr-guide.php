
<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-wallpaper' );
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

<div id=section-estimate class="wrapper">
	<div class="row">

			<div id="estimate-tabs">
           		<a class="fl" href="/?p=estimate-wallpaper">견적요청</a>
           		<a class="fl active" >시공가이드</a>
           		<a class="fl" href="/?p=choose-wallpaper">벽지선택</a>
			</div>
<!-- 시공가이드 시작 -->
			<div class="estimate-group contr-guide">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">시공 기간</div>
                        <ul>
                            <li>- 합지일 경우 : 당일 시공 원칙</li>
                            <li>- 실크일 경우 : 중형 평수 (20~30평) 1일 소요<br />
                                대형 평수 (40평이상) 2일 소요
                            </li>
                        </ul>

                        <div class="title">시공 인원</div>
                        <ul>
                            <li>- 바닥면적(평) x 2.5 = 도배평수</li>
                            <li>- 합지일 경우 : 도배사 한 명이 1일 기준 30평 내외</li>
                            <li>- 실크일 경우 : 도배사 한 명이 1일 기준 15평 내외</li>
                        </ul>

                        <div class="title">시공 순서</div>
                        <ul>
                            <li>- 바탕면 처리 > 초배 > 재단 > 정배 > 정리 및 점검</li>
                        </ul>
                        <div class="clear"> </div>
                    </div>

                </div>
<style>
.mobile .w-12-8 {width: 100%}
</style>

				<div class="w-12-8 fl contr-guide-table">
                    <div class="im-x">
                        <table>
                            <colgroup>
                                <col width="20%" />
                                <col width="40%" />
                                <col width="40%" />
                            </colgroup>
                            <thead>
                                <tr class="white-bottom">
                                    <th scope="col" class="title white-right"></th>
                                    <th scope="col" class="title white-right">실크 도배</th>
                                    <th scope="col" class="title">합지 도배</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="white-bottom">
                                    <td class="white-right">내구성</td>
                                    <td class="white-right">★ ★ ★<br/>표면이 PVC 코팅되어 유지관리에 용이</td>
                                    <td>★ ☆ ☆<br/>PVC 코팅이 없어 오염되기 쉬움</td>
                                </tr>
                                <tr class="white-bottom">
                                    <td class="white-right">기능성</td>
                                    <td class="white-right">★ ★ ☆<br/>심미성, 탄력성, 보온성, 흡음성 양호</td>
                                    <td>★ ★ ☆<br/>친환경성, 통풍성 상대적 양호</td>
                                </tr>
                                <tr class="white-bottom">
                                    <td class="white-right">경제성</td>
                                    <td class="white-right">★ ☆ ☆<br/>가격이 비싸고 시공과정이 복잡함</td>
                                    <td>★ ★ ★<br/>가격이 저렴하고 시공이 간편함</td>
                                </tr>
                                <tr>
                                    <td class="white-right">시공방식</td>
                                    <td class="white-right"><img src="/assets/images/wallpaper/fit01.png"/>이음매 맞춤시공</td>
                                    <td><img src="/assets/images/wallpaper/fit02.png"/>이음매 겹침시공</td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="im-x add-explain">
                            <li>
                                <i class="fal fa-check-circle"></i>
                                <a>절대적 기준이 아닌 실크와 합지의 상대적인 비교입니다.</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="more more-guide">
                    <span>시공가이드 더 보기</span> <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>
<!-- 시공가이드 끝 -->
    </div>
</div>

<script>

$(function(){
	$("#detail-guide").addClass('hide');
	$("#detail-guide").hide();

	$(".more-guide").click(function(){
		_updown = $(this).find('i');
		_class = $(this).find('i').attr('class');
		_detail   = $('#detail-guide');
		if(_detail.hasClass('hide')){
			_detail.removeClass('hide').addClass('show');
			_updown.attr('class', _class.replace("down", "up"));
			_detail.slideDown();
		} else {
			_detail.removeClass('show').addClass('hide');
			_updown.attr('class', _class.replace("up", "down"));
			_detail.slideUp();
		}
	});
});

</script>



<div id="link-area">
	<div class="row">
		<ul class="im-x">
			<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> >
			<li><a>도배</a></li> >
			<li>시공 가이드</li>
		</ul>
	</div>
</div>

<div id="detail-guide">
	<div id="section-guide" class="section section-guide">
		<div class="row">
	        <div class="im-x">
	            <div class="underline-black-18"></div>
	    		<div class="section-title">도배 시공 가이드</div>
	            <p>
	                벽지는 공간을 완성시키는 인테리어의 가장 중요한 마감재입니다.<br />
	                벽지의 선택에 따라 집 안의 분위기가 좌우되기 때문에  본인의 취향과 개성을 고려하여 신중하게 선택하셔야 합니다.<br />
	                그리고 한번 시공하면 쉽게 바꿀 수 없기 때문에 벽지를 결정하기 전에  집 구조와 용도, 본인의 예산 정도를 꼼꼼하게 따져봐야 합니다.
	            </p>
	            <ul>
	                <li><img src="/assets/images/wallpaper/small.png"/></li>
	                <li class="primary">소형 평수 (10평대)</li>
	                <li class="secondary">소형 평수일 경우 공간이 답답해 보이지 않도록 <span class="orange">밝은 컬러의 벽지</span>를 선택하는 것이 좋습니다.<br />
	                무늬가 큰 패턴이나 짙은 색상의 벽지는 공간을 더 좁아 보이게 하므로, 작은 텍스쳐가 틀어간 밝은 색상 계열의 벽지를 추천합니다.
	                </li>
	            </ul>
	            <ul>
	                <li><img src="/assets/images/wallpaper/medium.png"/></li>
	                <li class="primary">중형 평수 (20~30평대)</li>
	                <li class="secondary">엠보싱이 뚜렷하고 프린트가 잘 표현된 <span class="orange">밝은 색상의 벽지</span>와 함께 상대적으로 <span class="orange">짙은 포인트 벽지</span>를 활용하시길 추천합니다.<br />
	                포인트벽지는 비교적 공간이 넓은 거실의 TV 뒷면이나 안방의 침대 헤드부분에 도배하는 것이 일반적입니다.
	                </li>
	            </ul>
	            <ul>
	                <li><img src="/assets/images/wallpaper/large.png"/></li>
	                <li class="primary">대형 평수 (40평대 이상)</li>
	                <li class="secondary">대형 평형대에서는 각 공간의 경계가 분명해지고 독립성을 지니게 됩니다. 여러 공간을 같은 벽지로 할 경우 다소 지루해 보일 수 있습니다.<br />
	                각 공간에 맞는 <span class="orange">적절한 컬러 배색</span>과 함께 비교적 <span class="orange">무늬가 큰 패턴의 벽지</span>를 포인트로 사용하여 공간에 재미를 줄 수 있습니다.
	                </li>
	            </ul>
	        </div>
		</div>
	</div>

	<style>
	#section-silk-lumber {background-color: #f5f5f5;color:#707070}
	#section-silk-lumber .w-12-6{position: relative;}
	#section-silk-lumber .contents-top .explain{line-height: 20px;}
	#section-silk-lumber .contents-left p{line-height: 20px;}

	#section-silk-lumber .section-title{text-align: left; color: #000}
	#section-silk-lumber ul .title{font-size: 1.4em;color: #000; margin-bottom: 20px;}
	#section-silk-lumber img{margin: 0 auto;}
	#section-silk-lumber .material{text-align: center;font-size: 1.4em;color: #000;}
	#section-silk-lumber ul li .material-ul {margin-top: 33px;}

	.mobile #section-silk-lumber .group{width:50% !important;}
	.mobile #section-silk-lumber .group .w-12-4{width:33.3% !important;}

	</style>
	<div id="section-silk-lumber" class="section">
	    <div class="row">
	        <div class="im-x">
	            <div class="contents-top imb-50">
	                <div class="underline-black-18"></div>
	        		<div class="section-title">실크 VS 합지</div>
	                <div class="explain">
	                    도배를 하기로 결정하고 난 후에 고객들이 처음 결정해야 하는 사항은 벽지 선택입니다.<br />
	                    벽지의 종류는 생산 회사와 색상 등 그 종류가 너무나도 다양하기 때문에 모두들 벽지 고르는게 쉽지 않다고 합니다.<br />
	                    일반적으로 가정에 사용하는 벽지는 크게 실크와 합지로 나뉘게 됩니다. 두 벽지를 쉽게 구분 할 수 있도록 간단한 그림과 함께 설명해 드리겠습니다.
	                </div>
	            </div>

	            <ul class="imb-30 contents-left">
	                <li class="w-12-6 fl">
	                    <div class="imr-30">
	                        <div class="title">재질의 차이</div>
	                        <p class="imb-20">
	                            실크벽지는 백상지 위에 PVC 코팅이 되어 있어 합지보다 두껍고
	                            내구성이 좋으며 내오염성이 뛰어나 물 걸레로 쉽게 닦을 수 있습니다.
	                        </p>
	                        <p class="imb-20">
	                            합지벽지는 두 장의 백상지를 압축하고 그 위에 인쇄한 제품으로
	                            PVC 코팅이 없어 환경 친화적이지만 습기에 약하며 변색되기 쉽다.
	                        </p>
	                    </div>
	                </li>
	                <li class="w-12-6 fl">
	                    <div class="w-12-6 fl group">
							<div class="im-x-2">
								<img src="/assets/images/wallpaper/silk0001.png" />
							</div>
	                    </div>

	                    <div class="w-12-6 fl group">
							<div class="im-x-2">
								<img src="/assets/images/wallpaper/silk0002.png"/>
							</div>
	                    </div>
	                </li>
	                <li class="clear"></li>
	            </ul>

	            <ul class="contents-left">
	                <li class="w-12-6 fl">
	                    <div class="imr-30">
	                        <div class="title">시공방식의 차이</div>
	                        <p class="imb-20">
	                            실크와 합지의 가장 큰 시공방식의 차이점은 이음새입니다.
	                            합지는 겹침시공을 하기 때문에 5mm 가량의 겹침 부분이 보이는
	                            반면 실크는 맞댐시공으로 이음새가 없다는 특징이 있습니다.
	                        </p>
	                        <p class="imb-20">
	                            또한 실크의 경우 부직포로 초배지 작업을 하기 때문에 바탕면이
	                            좋지 못해도 깔끔한 마감을 지을 수 있습니다.  이처럼 실크 벽지
	                            시공이 좀 더 복잡하기 때문에 더 많은 시간과 비용이 소요됩니다.
	                        </p>
	                    </div>
	                </li>

	                <li class="w-12-6 fl">
	                    <div class="w-12-6 fl group">
							<div class="im-x-2">
	                        	<img src="/assets/images/wallpaper/silk0003.png"/>
							</div>
	                    </div>
	                    <div class="w-12-6 fl group">
							<div class="im-x-2">
	                        	<img src="/assets/images/wallpaper/silk0004.png"/>
							</div>
	                    </div>
	                </li>
	                <li class="clear"></li>
	            </ul>

	        </div>
	    </div>
	</div>
</div>


<?php
    include_once(G5_THEME_PATH.'/page/recommend-wallpaper.php');
?>
