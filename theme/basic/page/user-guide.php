<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-user-guide' );
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
			<li>이용가이드</li>
		</ul>
	</div>
</div>


<style>
#section-step ul {height:173px;}
#section-step ul li.orange{font-size: 1.2em;}
#section-step ul .arrow{position: absolute;right: -15px;top: 55px;}
#section-step ul li img{margin:0 auto; max-width: 130px;}
#section-step ul li.arrow img{max-width:15px;}
#section-step ul li{line-height: 20px;text-align: center;}
.mobile #section-step .w_5_1 {width: 50%;}
.mobile #section-step ul li.arrow img{display: none;}
</style>


<div id="section-step" class="section">
    <div class="row">
        <div class="im-x">
            <div class="section-main-title">서비스 진행 절차</div>
            <div class="section-sub-explain imb-50">견적 요청부터 시공 완료까지 프로세스</div>

            <div>
                <div class="w_5_1 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li class="ipb-20"><img src="/assets/images/user-guide/step01.png"/></li>
                        <li class="orange imb-10">견적 요청</li>
                    </ul>
                </div>
                <div class="w_5_1 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li class="ipb-20"><img src="/assets/images/user-guide/step02.png"/></li>
                        <li class="orange imb-10">상담 진행</li>
                    </ul>
                </div>
                <div class="w_5_1 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li class="ipb-20"><img src="/assets/images/user-guide/step03.png"/></li>
                        <li class="orange">시공 계약</li>
                        <li class="gray imb-10">계약금 50%</li>
                    </ul>
                </div>
                <div class="w_5_1 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li class="ipb-20"><img src="/assets/images/user-guide/step04.png"/></li>
                        <li class="orange imb-10">현장 시공</li>
                    </ul>
                </div>
                <div class="w_5_1 fl imb-20">
                    <ul class="im-x">
                        <li class="ipb-20"><img src="/assets/images/user-guide/step05.png"/></li>
                        <li class="orange">완료 확인</li>
                        <li class="gray imb-10">잔액 50%</li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<style>
#section-benefits{background: url("/assets/images/user-guide/benefits-bg.jpg"); background-position: center;background-repeat: no-repeat;background-size: cover;}
#section-benefits ul {text-align: center; margin-bottom: 30px;}
#section-benefits ul li span{border-top: 1px solid #ff9022;padding: 3px 3px 0; }
#section-benefits ul li.orange{font-size: 1.2em;line-height: 20px;}
</style>

<div id="section-benefits" class="section">
    <div class="row">
        <div class="im-x">
            <div class="section-main-title">장인들만의 혜택</div>
            <div class="section-sub-explain imb-50">고객님들을 특별한 혜택으로 모십니다.</div>
            <ul>
                <li class="orange"><span>01</span></li>
                <li class="orange">1년 무상 A/S</li>
                <li>서비스 이용 후 고객이 안심할 수 있도록 1년간 무상 수리를 보증해드립니다.</li>
            </ul>
            <ul>
                <li class="orange"><span>02</span></li>
                <li class="orange">장인들 현장매니저 관리</li>
                <li>1:1 현장매니저가 현장을 직접 방문 및 관리, 감독합니다.</li>
            </ul>
            <ul>
                <li class="orange"><span>03</span></li>
                <li class="orange">안전 결제 서비스</li>
                <li>고객의 불안 요소를 해소하기 위해 안전 결제 에스크로 서비스를 제공합니다.</li>
            </ul>
        </div>
    </div>
</div>


<script>
$(function(){
	var article = $('.faq ul li');
	var arrow = article.find('i');
	var arrow_class = arrow.attr('class');
	article.find('.a').hide();
	$('.faq ul li .q a').click(function(){
		var myArticle = $(this).parents('li:first');
		var updown = $(this).children('i');
		var _class = updown.attr('class');
		if(myArticle.hasClass('hide')){
			arrow.attr("class",arrow_class.replace("up", "down"));
			article.addClass('hide').removeClass('show');
			article.find('.a').slideUp(100);
			myArticle.removeClass('hide').addClass('show');
			myArticle.find('.a').slideDown(100);
			updown.attr("class", _class.replace("down", "up"));
		} else {
			arrow.attr("class",arrow_class.replace("up", "down"));
			myArticle.removeClass('show').addClass('hide');
			myArticle.find('.a').slideUp(100);
		}
		return false;
	});
});


</script>

<style>
#section-faq .basic-tabs {margin-bottom: 0px;}
#section-faq .faq ul .show p i{color:#ff8d27;}
#section-faq .faq{border-bottom:1px solid #e4e4e4;}
#section-faq .faq ul li{position: relative;}
#section-faq .faq ul li p i{position: absolute;right: 10px;top:20px}
#section-faq .faq .q{margin:0;border-top:1px solid #e4e4e4}
#section-faq .faq .q a{display:block;padding:10px 20px;margin-left:10px; }
#section-faq .faq .a{margin:0;padding:25px 10px; padding-left: 50px; line-height:1.5; background-color: #f9f9f9; border-top:1px solid #e4e4e4}
</style>


<div id="section-faq" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">자주 묻는 질문</div>
            <div class="section-sub-explain imb-50">시공과 관련된 필수사항이니, 반드시 확인해주세요.</div>

			<div class="area-form basic-tabs-wrapper">

                <div class="title-div">
                    <div class="w-12-6 fl left basic-tabs active">시공 관련 질문</div>
                    <div class="w-12-6 fl right basic-tabs">이용 관련 기타</div>
                    <div class="clear"></div>
                </div>

				<div class="form-div basic-tabs-body" style="display: block;">
					<div class="faq">
						<ul>
							<li class="hide">
								<p class="q gray"><a>[도배] 실크와 합지의 차이는 무엇인가요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									합지의 재질은 종이이며 실크는 종이 위에 PVC 코팅이 된 제품입니다.<br />
									실크는 시공과정이 복잡하여 인력이 더 많이 들어가기 때문에 가격이 비싸지게 됩니다.<br />
									하지만 내구성이 우수하여 유지관리하기 편하고 이음매가 보이지 않아 깔끔해 보입니다.<br /><br />
									벽지 종류에 대한 더 자세한 정보는 도배 시공가이드 페이지를 참고하세요.<br />
									도배 시공가이드 : <a href="/?p=wallpaper-contr-guide">http://jangindle.com/?p=wallpaper-contr-guide</a>
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[도배] 도배하기 전에 어떤 기초작업을 하나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									도배 시공에 앞서 기존 벽지를 제거하고 벽면이 고르지 않은 경우 부직포 시공을 합니다.<br />
									기존 벽지를 제거함으로써 벽지가 들뜨는 현상을 방지하고 부직포 작업을 통해 울퉁불퉁한 벽면을 고르게 만들어 시공 품질을 높이고 있습니다.<br />
									실크의 경우, 도배 시공 전 면에 부직포를 시공하고 있습니다.<br />
									합지의 경우, 현장 여건에 따라 필요한 부분에 한하여 부직포 시공을 진행하고 있습니다.<br /><br />

									※ 벽지를 제거하지 않는 경우 <br />
									1. 벽면이 손상되어 시멘트가 부서지는 경우<br />
									2. 기존의 합지 벽면의 도배상태가 양호한 경우
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[도배] 시공 당일 가구가 있으면 어떻게 진행되나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									시공팀이 가구를 옮겨가며 도배를 시공하게 됩니다.<br />
									만약을 대비해 귀중품이나 분실 및 파손의 위험이 있는 가구는 미리 치워놓기를 권장합니다.<br />
									현장 상황이 상담 내용과 다를 경우, 추가 비용이 발생하거나 시공이 취소될 수 있습니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[도배] 곰팡이가 있을 때는 어떻게 시공하나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									곰팡이는 습한 환경에서 과다하게 난방을 하거나 환기가 되지 않으면 주로 발생하게 됩니다.<br />
									도배시 벽면에 곰팡이가 있을 경우 약품 처리를 통해 닦아내고 시공하게 됩니다. <br />
									곰팡이의 원인인 결로를 억제하기 위한 단열재 시공을 원하시면 장인들 고객센터로 연락바랍니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[도배] 겨울철 도배 시공 후 주의사항이 있나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									1) 시공 당일은 하자 방지를 위해 창문과 문을 모두 닫아주세요.<br />
									2) 온도는 너무 뜨겁지도 춥지도 않은 20도 내외를 유지해주세요.<br />
									3) 벽지가 울퉁불퉁해도 마르는 시간을 감안해 여유있게 지켜봐 주세요.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[장판] 장판 시공시 모서리 마감은 어떻게 하나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
								장판은 특별한 요청이 없으시면 거실은 테이프 형식의 굽도리로 시공하며 방은 장판을 벽면에 올려서 꺾어 마감하게 됩니다. <br />
								다만, 3mm 이상 두께의 장판은 꺾어서 마감처리가 불가능하기 때문에 MDF 걸레받이 혹은 테이프 형식의 굽도리 추가 시공이 필요합니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[장판] 기존 장판 위에 시공을 진행해도 되나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									네, 가능합니다. 바닥 상태가 너무 좋지 않은 일부 경우를 제외하면, 철거 작업 없이 새로운 장판의 시공이 가능합니다.<br />
									다만, 장판 철거가 필요한 상황이거나 특별히 철거를 요청하시면 장판 철거를 위한 폐기물 관련 비용이 추가됩니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[장판] 겨울철 장판 시공할 때 주의사항이 있나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									추운 날씨에 장판이 얼어 하자가 발생할 수 있기 때문에 시공일 전후 하루 정도는 보일러를 약하게 장판이 얼지 않도록 합니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[마루] 강화마루와 강마루의 차이는 무엇인가요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									강화마루는 목재가루를 압축시킨 섬유판 표면에 PVC코팅을 한 제품입니다.<br />
									본드을 사용하지 않고 조립하여 시공 하기 때문에 시간이 지나면 벌어지거나 살짝 들뜬 바닥에게 마찰 소음이 발생하는 경우가 있습니다. 그러나 표면이 긁힘에 강하고 가격이 강마루에 비해 저렴한 편입니다. 강마루는 내수합판 위에 필름을 입힌 제품으로 강화마루의 단점을 보완하여 시공 후 변형이 거의 없고 본드를 사용하여 바닥에 붙여 시공하기 때문에 들뜨는 현상이 없습니다..<br />
									장인들은 강마루를 시공하는 고객 비율이 좀 더 높은 편입니다.<br /><br />

									마루 종류에 대한 더 자세한 정보는 도배 시공가이드 페이지를 참고하세요..<br />
									마루 시공가이드 : <a href="/?p=floor-contr-guide">http://jangindle.com/?p=floor-contr-guide</a>
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[마루] 아파트에서 마루 공사를 할 때, 소음은 어떻게 하나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									아파트와 같은 공동주택의 경우, 주민 다수의 동의가 없으면 소음으로 인해서 마루 시공이 불가능한 경우가 있습니다. 보통 마루 시공은 하루면 끝나기 때문에 미리 관리사무소에 공사 예정임을 고지하고, 이웃 주민들에게 양해를 구해야 합니다. 일부 아파트의 경우, 소음이 발생하는 공사의 경우 정해진 시간에만 하도록 되어 있는데 보통 오전 9시에서 오후 5시 정도면 마루 시공이 마무리될 수 있기 때문에 일정상 크게 문제가 되지는 않습니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[마루] 마루에서 소리가 나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									강화마루는 본드를 사용하지 않는 조립 시공을 하기 때문에 바닥과 마루 사이에 이격 공간이 발생하게 되며 경우에 따라 소리가 날 수 있습니다. 이는 강화마루 고유의 특성으로 시간이 지나면 소리의 정도가 줄거나 자연적으로 없어지기도 하지만 그 정도가 기준치보다 심하여 생활에 지장을 주는 경우에는 소리가 심하게 나는 부분을 교체 시공 하기도 합니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>[마루] 마루의 올바른 유지관리 요령<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									어렵게 시공한 마루를 더 오래 사용하기 위해 기본적으로 숙지할 사항들이 있습니다.<br />
									1. 진공청소기를 사용하여 주시고 걸레는 물기를 꽉 짜서 결 방향으로 닦아주시기 바랍니다.<br />
									2 마루는 습기에 취약하므로 물을 쏟았을 때는 즉시 닦아주세요.<br />
									3. 주방싱크대 및 화장실 입구 등은 바닥에 방수매트를 사용하시고 자주 환기, 건조 해주세요.<br />
									4. 고압의 스팀 청소와 물 청소는 가능한 자제해주세요.<br />
									5. 마루가 긁히는 것을 방지하기 위해 이동이 잦은 가구 발에는 고무 패킹을 달아주세요.
								</p>
							</li>
						</ul>
					</div>
				</div>

				<div class="form-div basic-tabs-body">
					<div class="faq">
						<ul>
							<li class="hide">
								<p class="q gray"><a>시공 가능한 지역이 어디인가요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									장인들은 현재 대전과 세종 지역만 시공이 가능합니다.<br />
									타 지역 고객님들의 너그러운 양해 부탁 드립니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>마감재 샘플은 어디서 볼 수 있나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									장인들은 온라인 인테리어 업체입니다.<br />
									홈페이지 내 벽지, 장판, 마루 페이지에 보시면 각각 샘플선택 하시는 메뉴가 있습니다.<br />
									시공하시기 원하시는 마감재의 제품번호를 메모하시어 담당자에게 알려주시면 됩니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>시공 당일 마감재를 바꿀 수는 없나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									아쉽지만 시공 당일 마감재를 교체하시는 건 어렵습니다.<br />
									주문이 완료된 제품의 반품이 불가능하기 때문에 최소한 시공 1주일 전에는 알려주셔야 합니다.<br />
									샘플 선택의 어려움이 있다면 담당자와 상의해 보세요.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>방문 실측을 하시나요?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									장인들은 온라인 인테리어 업체입니다.<br />
									주거용도의 건물과 도면이 있는 공간은 방문 실측 없이 견적을 내는 것이 가능합니다.<br />
									그래도 혹시 방문하시기 원하시는 특별한 구조라면 장인들 고객센터에 연락주세요.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>시공 후 하자가 생기면 어떡하죠?<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									장인들은 시공 완료와 함께 1년 A/S인증서를 발급하여 드립니다.<br />
									인증 기간 발생하는 모든 시공상 하자는 무상으로 A/S 보수를 해드리고 있습니다.<br />
									장인들은 끝까지 고객님들의 만족을 위해 최선을 다하겠습니다.
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>장인들과 함께 일하고 싶습니다.<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									장인들은 해당 지역의 모든 기술자들을 위해 문을 활짝 열어 놓고 있습니다.<br />
									인테리어 시공의 패러다임을 바꿀 열정과 도전의식을 가진 분이라면 언제든지 환영합니다.<br />
									장인들 모집 : <a class="btn-recruit">http://jangindle.com/?p=recruit-jangin</a>
								</p>
							</li>
							<li class="hide">
								<p class="q gray"><a>홈페이지 내 페이지 오류가 생겨요.<i class="fa fa-angle-down" aria-hidden="true"></i></a></p>
								<p class="a">
									사용하시는 인터넷 브라우져 버전이 낮은 경우 화면이 보이지 않을 수 있습니다.<br />
									인터넷 익스플로러 및 크롬을 최신 버전으로 업데이트해주세요.<br />
									그래도 해결이 되지 않는다면 장인들 고객센터로 연락주세요.
								</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
