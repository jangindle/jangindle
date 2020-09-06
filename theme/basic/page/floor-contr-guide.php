<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-floor' );
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
           		<a class="fl" href="/?p=estimate-floor">견적요청</a>
           		<a class="fl active">시공가이드</a>
           		<a class="fl" href="/?p=choose-floor">마루선택</a>
			</div>
            <!-- 시공가이드 시작 -->
    			<div class="estimate-group contr-guide">
                    <div class="w-12-4 fl">
                        <div class="im-x-2">
                            <div class="title">시공 기간</div>
                            <ul>
                                <li>- 장판일 경우 : 당일 시공 원칙</li>
                                <li>- 마루일 경우 : 당일 시공 원칙<br />
                                    (현장 여건에 따라 변동 가능)
                                </li>
                            </ul>

                            <div class="title">시공 인원</div>
                            <ul>
                                <li>- 장판일 경우 : 작업자 1인</li>
                                <li>- 마루일 경우 : 시공 면적에 따라 인원수 변동 가능</li>
                            </ul>

                            <div class="title">시공 순서</div>
                            <ul>
                                <li>- 바탕면 처리 > 재단 > 마루시공 > 정리 및 점검</li>
                            </ul>
                            <div class="clear"> </div>
                        </div>

                    </div>
    <style>
    .mobile .w-12-8 {width: 100%}
    </style>

    				<div class="w-12-8 fl contr-guide-table">
                        <div class="im-x-2">
                            <table>
                                <colgroup>
                                    <col width="19%" />
                                    <col width="27%" />
                                    <col width="27%" />
                                    <col width="27%" />
                                </colgroup>
                                <thead>
                                    <tr class="white-bottom">
                                        <th scope="col" class="title white-right"></th>
                                        <th scope="col" class="title white-right">강마루</th>
                                        <th scope="col" class="title white-right">강화마루</th>
                                        <th scope="col" class="title">데코타일</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="white-bottom">
                                        <td class="white-right">심미성</td>
                                        <td class="white-right">★ ★ ★<br/>원목과 가까운 자연스러움</td>
                                        <td class="white-right">★ ★ ★<br/>원목과 가까운 자연스러움</td>
                                        <td>★ ☆ ☆<br/>디테일이 부족함</td>
                                    </tr>
                                    <tr class="white-bottom">
                                        <td class="white-right">기능성</td>
                                        <td class="white-right">★ ★ ★<br/>접착시공으로 열전도율 높음</td>
                                        <td class="white-right">★ ★ ☆<br/>표면 강도 우수함</td>
                                        <td>★ ★ ★<br/>내마모성, 내화학성 우수함</td>
                                    </tr>
                                    <tr class="white-bottom">
                                        <td class="white-right">경제성</th>
                                        <td class="white-right">★ ☆ ☆<br/>단가가 비싸고 시공이 복잡함 </td>
                                        <td class="white-right">★ ★ ☆<br/>강마루와 비교해 저렴함</td>
                                        <td>★ ★ ★<br/>단가가 싸고 시공이 간편함</td>
                                    </tr>
                                    <tr>
                                        <td class="white-right">유지관리</td>
                                        <td class="white-right" colspan="2">물기를 꼭 짠 물걸레 사용 가능<br />  부분 오염 시 알코올로 제거</td>
                                        <td>고온 스팀 청소기나<br />물걸레 사용 가능 </td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="im-x-2 add-explain">
                                <li>
                                    <i class="fal fa-check-circle"></i>
                                    <a>절대적 기준이 아닌 상대적인 비교입니다.</a>
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
			<li><a>마루</a></li> >
			<li>시공 가이드</li>
		</ul>
	</div>
</div>


<style>

</style>
<div id="detail-guide">
	<div id="section-guide" class="section section-guide">
		<div class="row">
	        <div class="im-x">
	            <div class="underline-black-18"></div>
	    		<div class="section-title">마루 시공 가이드</div>
	            <p>
	                바닥은 넓은 면적을 차지하는 주거 공간의 바탕으로 공간의 첫 인상을 결정 짓는 중요한 인테리어 요소입니다.<br />
	바닥재는 공간의 분위기를 좌우 할 뿐만 아니라 동시에 피부와 직접 닿는 생활 밀착형 제품으로 자재 선택에 주의를 기울이셔야 합니다.<br />
	생산 업체와 소재마다 디자인과 기능, 유리 관리 방법도 다르기 때문에 바닥 시공하기 전에 소재에 대한 꼼꼼한 이해가 필요합니다.
	            </p>
	            <ul>
	                <li><img src="/assets/images/floorpaper/guide01.png"/></li>
	                <li class="primary">가족 구성원에 대한 고려</li>
	                <li class="secondary">뛰어 놀기 좋아하는 아이들이 있는 가정과 무릎 충격에 취약한 노인이 있는 가정이라면 <span class="orange">보행감이 우수하고 소음 방지 효과</span>가 뛰어난 두꺼운
	장판을 시공하는 것이 좋습니다. 특히 갓난 아기가 있는 경우 <span class="orange">위생과 안전</span>을 감안하여 마루 보다는 장판을 시공하는 것이 좋습니다.
	                </li>
	            </ul>
	            <ul>
	                <li><img src="/assets/images/floorpaper/guide02.png"/></li>
	                <li class="primary">공간에 대한 고려</li>
	                <li class="secondary">중소형 평수(20-30평)의 경우 거실과 방을 모두 밝은 <span class="orange">색상의 패턴이 적은</span> 동일한 바닥재를 사용하시면  공간이 넓어보이는 효과가있습니다.
	대형 평수(40평 이상)의 경우 연출하려는 스타일에 따라 <span class="orange">과감하게 패턴과 색상</span>을 시도하여 차별화된 나만의 집을 시공하길 추천드립니다.
	                </li>
	            </ul>
	            <ul>
	                <li><img src="/assets/images/floorpaper/guide03.png"/></li>
	                <li class="primary">가격에 대한 고려</li>
	                <li class="secondary">전세나 월세인 경우는 거주하는 기간이 길지 않기 때문에 고가의 마루 보다는 <span class="orange">장판이나 데코타일</span>을 시공하는 것이 합리적입니다.
	마루를 시공할 경우 가구의 끌림에도 강하도록 표면에 필름지를 입혀 강도를 높힌 <span class="orange">강화 마루나 강마루</span> 시공을 추천드립니다.
	                </li>
	            </ul>
				<ul>
	                <li><img src="/assets/images/floorpaper/guide04.png"/></li>
	                <li class="primary">기능에 대한 고려</li>
	                <li class="secondary">바닥재는 피부와 가장 많이 접촉되는 마감재기 때문에 <span class="orange">인체에 무해한 친환경 재료</span>를 사용하였는지 확인해 볼 필요가 있습니다.
	또한 <span class="orange">보행성, 소음 흡수성, 위생성, 열효율성</span> 등 바닥재 선택시 고려해야 여러 기능들이 있습니다.
	                </li>
	            </ul>
	        </div>
		</div>
	</div>


	<style>
	#section-procedure{background-color: #f5f5f5}
	#section-procedure .section-title {text-align: left;}
	#section-procedure .subject{font-size: 1.3em;margin-bottom: 20px;}

	#section-procedure p{line-height: 20px}
	#section-procedure .group .w-12-6 { text-align: center;  }


	#section-procedure img{margin:0 auto 30px; width: 100%;}
	#section-procedure .title{font-size: 1.3em;}
	#section-procedure #section-procedure-detail .gray{line-height: 1.8em; height: 80px;}

	.mobile #section-procedure .group{width: 50%;}
	</style>

	<div id="section-procedure" class="section">
	    <div class="row">
	        <div class="im-x">
				<div class="underline-black-18"></div>
	    		<div class="section-title">강마루 VS 강화마루</div>
				<p class="gray" style="margin-bottom:30px;">
	                마루의 종류는 강화마루, 강마루, 온돌마루, 원목마루(저가순)가 있으며 일반 가정의 경우 합리적인 가격에 기능을 겸비한 강화마루와 강마루를 주로 시공합니다.
					원목마루를 시공하기 원하는 고객의 경우 원목마루가 고가인데다가 유지관리도 어려워 장인들은 고객들에게 주로 온돌마루를 추천 드리고 있습니다.
					이 중에서도 고객들이 가장 선호하시는 강마루와 강화마루를 비교하여 설명해 드리겠습니다.
	            </p>
	        </div>

	        <div id="section-procedure-detail">
	            <div class="w-12-6 fl group">
	                <div class="subject im-x">01. 마루 재질의 차이</div>
	                <div class="w-12-6 fl">
						<div class="im-x">
							<img src="/assets/images/floor/procedure01.jpg"/>
							<div class="title">강마루 - 합판</div>
							<div class="gray">얇은 목재를 직교하여 적층함 내습성, 내구성이 우수함</div>
	                    </div>
	                </div>
	                <div class="w-12-6 fl">
						<div class="im-x">
							<img src="/assets/images/floor/procedure02.jpg"/>
							<div class="title">강화마루 - 섬유판</div>
							<div class="gray">목재를 갈아서 본드를 섞어 압축함 가격이 저렴하고 내구성이 우수함</div>
	                    </div>
	                </div>
	            </div>

	            <div class="w-12-6 fl group">
	                <div class="subject im-x">02. 시공 방식의 차이</div>
	                <div class="w-12-6 fl">
						<div class="im-x">
							<img src="/assets/images/floor/procedure03.jpg"/>
							<div class="title">강마루 - 접착시공</div>
							<div class="gray">바당게 접착하여 시공하기 때문에 열전도율이 높고 소음 발생이 적음</div>
	                    </div>
	                </div>
	                <div class="w-12-6 fl">
						<div class="im-x">
							<img src="/assets/images/floor/procedure04.jpg"/>
							<div class="title">강화마루 - 클릭시공</div>
							<div class="gray">본드를 사용하지 않아 비교적 친환경 층간 소음 발생의 우려가 있음</div>
	                    </div>
	                </div>

	            </div>

	            <div class="clear"></div>
	        </div>

	        </div>
	    </div>
	</div>
</div>
<?php
    include_once(G5_THEME_PATH.'/page/recommend-floor.php');
?>
