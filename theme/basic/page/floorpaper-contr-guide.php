<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-floorpaper' );
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
           		<a class="fl" href="/?p=estimate-floorpaper">견적요청</a>
           		<a class="fl active">시공가이드</a>
           		<a class="fl" href="/?p=choose-floorpaper">장판선택</a>
			</div>

<!-- 시공가이드 시작 -->
			<div class="estimate-group contr-guide">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">시공 기간</div>
                        <ul>
                            <li>- 장판일 경우 : 당일 시공 원칙 </li>
                            <li>- 마루일 경우 : 당일 시공 원칙<br />
                             (현장 여건에 따라 변동 가능)
                            </li>
                        </ul>

                        <div class="title">시공 인원</div>
                        <ul>
                            <li>- 장판일 경우 : 작업자 1인</li>
                            <li>- 마루일 경우 : 시공 면적에 따라 인원수 변동 가능 </li>
                        </ul>

                        <div class="title">시공 순서</div>
                        <ul>
                            <li>- 바탕면 처리 > 재단 > 장판시공 > 정리 및 점검</li>
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
                                <col width="20%" />
                                <col width="40%" />
                                <col width="40%" />
                            </colgroup>
                            <thead>
                                <tr class="white-bottom">
                                    <th scope="col" class="title white-right"></th>
                                    <th scope="col" class="title white-right">장판</th>
                                    <th scope="col" class="title">마루</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="white-bottom">
                                    <td class="white-right">장점</th>
                                    <td class="white-right">- 가격이 상대적으로 저렴함<br />
                                                            - 열전도율, 방수성, 위생성이 우수함<br />
                                                            - 시공과 철거가 간편함</td>
                                    <td>- 원목의 느낌에 가까워 고급스럽움<br />
                                        - 표면 강도가 우수함 (강화마루, 강마루)<br />
                                        - 전반적으로 보행감이 우수함</td>
                                </tr>
                                <tr class="white-bottom">
                                    <td class="white-right">단점</th>
                                    <td class="white-right">- 디테일이 떨어져 외관상 부자연스러움<br />
                                                            - 표면이 약해 외부 충격에 흠집이 발생함<br />
                                                            - 두께에 따라 보행감이 저조함</td>
                                    <td>- 장판과 비교해 가격이 고가임<br />
                                        - 열과 수분에 취약해 변형이 발생함<br />
                                        - 시공 및 철거가 복잡함</td>
                                </tr>
                                <tr class="white-bottom">
                                    <td class="white-right">유지관리</th>
                                    <td class="white-right">고온의 스팀 청소기를 제외하고는 일반 가정용 청소기나 물걸레 사용 가능 </td>
                                    <td>물기를 꼭 짠 물걸레 사용 가능 부분 오염 시 알코올로 제거</td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="im-x-2 add-explain">
                            <li>
                                <i class="fal fa-check-circle"></i>
                                <a>절대적 기준이 아닌 장판과 마루의 상대적인 비교입니다.</a>
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
			<li><a>장판</a></li> >
			<li>시공 가이드</li>
		</ul>
	</div>
</div>

<div id="detail-guide">
	<div id="section-guide" class="section section-guide">
		<div class="row">
	        <div class="im-x">
	            <div class="underline-black-18"></div>
	    		<div class="section-title">장판 시공 가이드</div>
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
	#section-procedure .section-title {text-align: left;}
	#section-procedure p{line-height: 20px}
	#section-procedure ul {text-align: center;}
	#section-procedure ul li img{margin:0 auto;}
	#section-procedure ul li.title{font-size: 1.3em;}
	#section-procedure ul li.arrow{position: absolute; right: 0; top: 60px;}
	#section-procedure ul li:last-child{line-height: 20px; min-height: 100px;}
	/* #section-procedure ul .arrow{position: absolute;right: -15px;top: 55px;}
	#section-procedure ul li img{margin:0 auto;}
	#section-procedure ul li.arrow img{max-width:15px;}
	#section-procedure ul li{line-height: 20px;text-align: center;} */

		.mobile #section-procedure ul li.arrow{ display: none;;}
	 .mobile #section-procedure .w-12-3 {width: 50%;}
	/*.mobile #section-procedure ul li.arrow img{display: none;} */
	.ipb-50{padding-bottom: 50px;}
	</style>

	<div id="section-procedure" class="section">
	    <div class="row">
	        <div class="im-x ipb-50">
				<div class="underline-black-18"></div>
	    		<div class="section-title">장판 시공 과정</div>
				<p class="gray">
	                장판 시공은 보통 1인의 작업자가 당일 시공을 원칙으로 하나 현장 여건이나 기존 바닥재 철거가 필요할 경우 그 기간이 길어질 수 있습니다.
	도배와 장판을 같은 날 함께 시공하기도 하지만 도배 시공 이후 바닥을 정리하고 바닥재를 시공을 하는것이 일반적입니다.
	            </p>
	        </div>
	            <div>
	                <div class="w-12-3 fl imb-20">
	                    <ul class="im-x">
	                        <li class="arrow"><img src="/assets/images/common/arrow-right-b.png"/></li>
	                        <li class="imb-30"><img src="/assets/images/floorpaper/procedure01.png"/></li>
	                        <li class="imb-10 title">기존 바닥재 철거</li>
	                        <li class="gray">열 전도율을 높이기 위해 기존 바닥재를 철거합니다. 접착 시공된 바닥재의 경우 철거 비용이 발생합니다.</li>
	                    </ul>
	                </div>
	                <div class="w-12-3 fl imb-20">
	                    <ul class="im-x">
	                        <li class="arrow"><img src="/assets/images/common/arrow-right-b.png"/></li>
	                        <li class="imb-30"><img src="/assets/images/floorpaper/procedure02.png"/></li>
	                        <li class="imb-10 title">바탕면 정리</li>
	                        <li class="gray">바닥 시공 완성도를 위해 바닥의 상태를 점검하고 바닥에 먼지나 이물질을 깨끗하게 청소합니다.</li>
	                    </ul>
	                </div>
	                <div class="w-12-3 fl imb-20">
	                    <ul class="im-x">
	                        <li class="arrow"><img src="/assets/images/common/arrow-right-b.png"/></li>
	                        <li class="imb-30"><img src="/assets/images/floorpaper/procedure03.png"/></li>
	                        <li class="imb-10 title">장판 재단 및 시공</li>
	                        <li class="gray">장판은 사전에 재단하여 시공 현장으로 배송됩니다. 이음매 부분에 접착재를 사용하여 시공합니다.</li>
	                    </ul>
	                </div>
	                <div class="w-12-3 fl imb-20">
	                    <ul class="im-x">
	                        <li class="imb-30"><img src="/assets/images/floorpaper/procedure04.png"/></li>
	                        <li class="imb-10 title">정리 및 점검</li>
	                        <li class="gray">시공 뒤 접착제가 굳기 전 바닥 난방을 자제합니다. 이틀 정도는 환기시켜주고 이후에 난방을 합니다.</li>
	                    </ul>
	                </div>
	                <div class="clear"></div>
	            </div>
	    </div>
	</div>
</div>
<style>
#section-recommand, #section-look {background-color: #f5f5f5}
</style>

<?php
    include_once(G5_THEME_PATH.'/page/recommend-floorpaper.php');
?>
