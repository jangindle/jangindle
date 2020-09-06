
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script> -->


<!-- <div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>
			<li class="lading-slider-li-view" >
				<div class="vertical-center" style="background:url(/assets/images/floor/package-banner01.jpg); background-size: cover;background-position: center;">
					<div class="container row">
						<div class="contents-div">
							<div class="section-header" style="color:#fff">
								<div class="primary">첫 마루 시공을 위한</div>
								<div class="secondary">간단 시공 가이드</div>
                                <div class="third">클릭한번으로 쉽게 인테리어를 바꿔보세요</div>
							</div>
							<div class="btn-div">
								<a><button>견적내기 ></button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"> </div>
			</li>
            <li class="lading-slider-li-view" >
                <div class="vertical-center" style="background:url(/assets/images/main/banner.jpg); background-size: cover;background-position: center;">
                    <div class="container row">
                        <div class="contents-div">
                            <div class="section-header">
                                <div class="primary">첫 도배를 위한</div>
                                <div class="secondary">간단 시공 가이드</div>
                                <div class="third">클릭한번으로 쉽게 인테리어를 바꿔보세요</div>
                            </div>
                            <div class="btn-div">
                                <a><button>견적내기</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </li>
		</ul>
	</div>
</div><!--.section--> -->

<div id="link-area">
	<div class="row">
		<ul class="im-x">
			<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> >
			<li><a>도배</a></li> >
			<li>풀바른 벽지 이벤트</li>
		</ul>
	</div>
</div>
<style>
#section-intro .item-div{text-align: center;}
#section-intro .orange{margin-right: 5px;}
#section-intro .price{margin-left: 5px}
#section-intro .item-div a{border: 1px solid #000; padding:5px 10px;}
#section-intro .item-div a:first-child{margin-right: 10px;}
#section-intro .underline-gray {border-bottom: 1px solid #dadada; margin-top: 50px;}

</style>
<div id="section-intro" class="section">
    <div class="row">
        <div class="im-x">
            <div class="section-main-title">만능 풀 바른 벽지 EVENT</div>
            <div class="section-sub-title imb-20">알뜰한 당신을 위한 셀프 도배 특가 이벤트</div>
            <div class="item-div">
                <a><span class="orange">합지</span>|<span class="price">3,000원 ~</span></a>
                <a><span class="orange">실크</span>|<span class="price">6,000원 ~</span></a>
            </div>
            <div class="underline-gray"></div>
        </div>
    </div>
</div>

<style>
#section-yourself .gray{text-align: center;}
#section-yourself .section-sub-explain{line-height: 1.2em;}
#section-yourself .add-explain li {margin-bottom: 14px;}
</style>
<div id="section-yourself" class="section">
    <div class="row">
        <div class="im-x ipb-50">
            <div class="section-main-title imb-20">Do It Yourself!</div>
            <div class="section-sub-explain gray">벽지 선택부터 직접 도배까지 원하는 인테리어를 완성해보세요</div>
            <div class="gray">*개봉한 제품은 반품이 어려우니 도배하기 전 주의사항을 꼭 숙지하시기 바랍니다.</div>
        </div>
		<img src="assets/images/event/event_banner.jpg"/>
		<div id=section-estimate class="wrapper">
			<div class="row">
					<form id="estimate-event-form" action="/wallpaper/update_event.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); reset_estimate(); } } );">
					<input type="hidden" name="type" value="이벤트"/>
					<input type="hidden" name="price" value=""/>

		            <div class="estimate-group">
		                <div class="w-12-4 fl">
		                    <div class="im-x-2">
		                        <div class="title">주문 가이드</div>

								<ul class="add-explain">
									<li><i class="fal fa-exclamation-circle"></i> TIP<br />해당 옵션을 설정하고 구매 하고자 하는 상품과 구매자 정보를 입력하여 주문 요청해 주세요.</li>
									<li><i class="fal fa-question-circle"></i> <a href="/?p=wallpaper-contr-guide"  target="_blank">실크 VS 합지 차이가 궁금하세요?</a> </li>
							  	</ul>

		                        <div class="clear"> </div>
		                    </div>

		                    <div class="im-x-2">
		                        <div class="title">배송비 2,500원</div>

		                        <div class="estimate-radio">
		                        	<label class="w-12-6 fl"><span>주문시 결제(선불)</span><input type="radio" name="shipping" value="선불"/></label>
		                        	<label class="w-12-6 fl"><span>수령시 결제(착불)</span><input type="radio" name="shipping" value="착불"/></label>
									<p>*5만원 이상 주문시 배송비 무료</p>
									<div class="clear"></div>
		                        </div>

		                        <div class="clear"></div>
		                    </div>
		                </div>

						<style>
						.wallpaper-number{background: transparent; border-bottom: 1px solid #fff;margin-top: 7px;font-size: 0.9em;text-align: center;color: #fff}
						</style>

						<script>

							$(function(){

								$('.ea_down').click(function(){
									//console.log('down');
									_input = $(this).parent().parent().next('ul').find('input');
									_input_val = parseInt(_input.val());
									_input_val -= 1;
									if(_input_val < 0 ) {return false;}
									_input.val(_input_val);
									$(this).prev().text(_input_val);
									//console.log(_input_val);

								});

								$('.ea_up').click(function(){
									//console.log('up');
									_input = $(this).parent().parent().next('ul').find('input');
									_input_val = parseInt(_input.val());
									_input_val += 1;
									_input.val(_input_val);
									$(this).prev().prev().text(_input_val);
								});


								//$('.estimate-radio label input, input[name=silk-option], input[name=silk-option-ea], input[name=lumber-option], input[name=lumber-option-ea], input[name=subsidiary-option] , input[name=subsidiary-option-ea]').blur(function(){
									$(document).on('blur click', '.estimate-radio label input, input[name=silk-option], input[name=silk-option-ea], input[name=lumber-option], input[name=lumber-option-ea], input[name=subsidiary-option] , input[name=subsidiary-option-ea], .ea_up, .ea_down', function() {
									$('.estimate-radio label').each(function(){
										if($(this).hasClass('active')) _shipping = $(this).find('input').val();
									});

									_silk_option = $('input[name=silk-option]').val();
									_silk_option_ea = $('input[name=silk-option-ea]').val();
									_lumber_option = $('input[name=lumber-option]').val();
									_lumber_option_ea = $('input[name=lumber-option-ea]').val();
									_subsidiary_option = $('input[name=subsidiary-option]').val();
									_subsidiary_option_ea = $('input[name=subsidiary-option-ea]').val();

									if(_silk_option.indexOf('(') != -1 ){
										_silk_option = _silk_option.replace(')','');
										_silk_option = _silk_option.replace('원','');
										_silk_option = _silk_option.replace(',','');
										_silk_option = _silk_option.split('(');
										_silk_option = _silk_option[1];
									}

									if(_lumber_option.indexOf('(') != -1 ){
										_lumber_option = _lumber_option.replace(')','');
										_lumber_option = _lumber_option.replace('원','');
										_lumber_option = _lumber_option.replace(',','');
										_lumber_option = _lumber_option.split('(');
										_lumber_option = _lumber_option[1];
									}

									if(_subsidiary_option.indexOf('(') != -1 ){
										_subsidiary_option = _subsidiary_option.replace(')','');
										_subsidiary_option = _subsidiary_option.replace('원','');
										_subsidiary_option = _subsidiary_option.replace(',','');
										_subsidiary_option = _subsidiary_option.split('(');
										_subsidiary_option = _subsidiary_option[1];
									}

									( isNaN(_silk_option) != true ) ? ( _total_silk = _silk_option * _silk_option_ea ) : ( _total_silk = 0 );
									if( _silk_option_ea == 0 ) {_total_silk = 0 ;}

									( isNaN(_lumber_option) != true ) ? ( _total_lumber = _lumber_option * _lumber_option_ea ) : ( _total_lumber = 0 );
									if( _lumber_option_ea == 0 ) {_total_lumber = 0;}

									( isNaN(_subsidiary_option) != true ) ? ( _total_subsidiary = _subsidiary_option * _subsidiary_option_ea ) : ( _total_subsidiary = 0 );
									if( _subsidiary_option_ea == 0 ) {_total_subsidiary = 0 ;}

									_total = _total_silk + _total_lumber + _total_subsidiary;
									if( (_total < 50000 && _shipping == '선불') && _total !=0 ) {_total = _total + 2500;}

									$('input[name=price]').val(_total);
									$('#estimate-total-form .estimate-price').text(_total.toLocaleString());

								});


							});



						</script>
						<style>
						.ea_down { position: absolute; bottom: 5; top: 17px; right: 10px; cursor: pointer;}
						.ea_up { position: absolute; top: 8px;right: 10px; cursor: pointer;}
						.count {padding-right: 10px;}
						</style>

						<div class="w-12-4 fl">
		                    <div class="im-x-2">
		                        <div class="title">실크 옵션 <input class="fr wallpaper-number" name="wallpaper-number" placeholder="벽지 번호를 입력해주세요."/></div>
								<div class="estimate-select white w-12-8 fl" data-name="silk-option">
									 <div class="label"><span>옵션 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
									 <ul><input type="hidden" name="silk-option" value="" class="" data-label="실크 옵션"/></ul>
									 <select id="silk-select">
										 <!-- <option value="없음" data-prices="">없음</option> -->
										 <option value="200cm" data-prices="">200cm(6,000원)</option>
										 <option value="220cm" data-prices="">220cm(7,500원)</option>
										 <option value="240Cm" data-prices="">240Cm(9,000원)</option>
										 <option value="260Cm" data-prices="">260Cm(10,500원)</option>
										 <option value="280Cm" data-prices="">280Cm(12,000원)</option>
										 <option value="300Cm" data-prices="">300Cm(13,500원)</option>
									 </select>
								</div>

								<div class="estimate-select w-12-4 fr" data-name="silk-option-ea">
									<div class="label"><span>수량 <a class="count">0</a> <i class="fa fa-angle-down ea_down" aria-hidden="true"></i><i class="fa fa-angle-up ea_up" aria-hidden="true"></i></span></div>
									<ul><input type="hidden" name="silk-option-ea" value="0" class="" data-label="실크 옵션 수량" /></ul>
									<!-- <select>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select> -->
								</div>
								<div class="ipb-10 clear"></div>
								<div class="title">합지 옵션 </div>
								<div class="estimate-select white w-12-8 fl" data-name="lumber-option">
									  <div class="label"><span>재단 길이 선택(필수) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
									  <ul><input type="hidden" name="lumber-option" value="" class="" data-label="합지 옵션"/></ul>
									  <select>
										 <!-- <option value="없음" data-prices="">없음</option> -->
 										 <option value="200cm" data-prices="">200cm(3,000원)</option>
 										 <option value="220cm" data-prices="">220cm(4,000원)</option>
 										 <option value="240Cm" data-prices="">240Cm(5,000원)</option>
 										 <option value="260Cm" data-prices="">260Cm(6,000원)</option>
 										 <option value="280Cm" data-prices="">280Cm(7,000원)</option>
 										 <option value="300Cm" data-prices="">300Cm(8,000원)</option>
									  </select>
							 	</div>

								<div class="estimate-select w-12-4 fr" data-name="lumber-option-ea">
									 <div class="label"><span>수량 <a class="count">0</a><i class="fa fa-angle-down ea_down" aria-hidden="true"></i><i class="fa fa-angle-up ea_up" aria-hidden="true"></i></span></div>
									 <ul><input type="hidden" name="lumber-option-ea" value="0" class="" data-label="합지 옵션 수량" /></ul>
									 <!-- <select>
										 <option value="0">0</option>
										 <option value="1">1</option>
										 <option value="2">2</option>
										 <option value="3">3</option>
										 <option value="4">4</option>
										 <option value="5">5</option>
									 </select> -->
								</div>
								<div class="ipb-10 clear"></div>

								<div class="title">부자재 옵션 </div>
								<div class="estimate-select white w-12-8 fl" data-name="subsidiary-option">
									  <div class="label"><span>옵션 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
									  <ul><input type="hidden" name="subsidiary-option" value="" class="" data-label="합지 옵션"/></ul>
									  <select>
										  <!-- <option value="없음" data-prices="0">없음</option> -->
										  <option value="A 도배용 커터칼 SET" data-prices="">A. 도배용 커터칼 SET(6,000원)</option>
										  <option value="B 칼받이" data-prices="">B. 칼받이(4,000원)</option>
										  <option value="C 정배솔" data-prices="">C. 정배솔(12,000원)</option>
										  <option value="D 밀풀" data-prices="">D. 밀풀(1,000원)</option>
										  <option value="E 지물본드" data-prices="">E. 지물본드(3,000원)</option>
										  <option value="F 초배지 20장" data-prices="">F. 초배지 20장(3,000원)</option>
										  <option value="A+B+C" data-prices="">G. A+B+C(22,000원)</option>
										  <option value="A+B+C+D+E+F" data-prices="">H. A+B+C+D+E+F(29,000원)</option>
									  </select>
							 	</div>

								<div class="estimate-select w-12-4 fr" data-name="subsidiary-option-ea">

									 <div class="label"><span>수량 <a class="count">0</a><i class="fa fa-angle-down ea_down" aria-hidden="true"></i><i class="fa fa-angle-up ea_up" aria-hidden="true"></i></span></div>
									 <ul><input type="hidden" name="subsidiary-option-ea" value="0" class="" data-label="합지 옵션 수량" /></ul>
									 <!-- <select>
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									 </select> -->
								</div>
								<div class="clear ipb-10"></div>

		                    </div>

		                </div>

		                <div class="information w-12-4 fl" id="estimate-total-form">
		                    <div class="im-x-2">
		                        <ul>
		                            <li class="information-title">구매자 정보</li>
		                            <li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
		                            <li><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
		                            <li><label>주소</label><input type="text" name="address" placeholder="주소를 입력 주세요" class="submit-required" data-label="고객정보 주소"/></li>
									<li>
										<label>총 견적</label>
										<div>
											<span><b class="estimate-price">??</b> 원 <a></a></span> &nbsp;
										</div>
									</li>
		                        </ul>

		                        <label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <span style="color:#fff" class="view-terms">(약관보기)</span> <input type="checkbox" name="privacy" class="submit-required" data-label="정보수집 동의"></label>
		                    </div>
		                    <div class="consulting-div">
		                        <button>선택한 조건으로 주문 요청하기 ></button>
		                    </div>
		                </div>

		                <div class="clear"></div>
		            </div>
				</form>
		    </div>
		</div>
    </div>
</div>


<style>
#section-recommend-silk .section-sub-explain{line-height: 1.3em;}
#section-recommend-silk .inform{text-align: center;}

.package .area-text{text-align: center;}
.package .section-main-title{line-height:normal; margin-bottom: 20px;}
.package .section-sub-explain{line-height: 1.3em; margin-bottom: 10px;}
.package .area-contents .primary{font-size: 1.2em;}
.package .area-contents .secondary{line-height: 20px; font-size: 1.1em;}
.package .area-contents .border{padding:20px 10px; position: relative}
.package .area-contents .border .text-div{padding-right: 10px;}
.package .area-contents .border .text-div .small{font-size: 0.9em;}

.package .item-over img{margin:0 auto;}
.package .more{display: none;background: #000; opacity: 0.5; position: absolute; color: #FFF; width: 100%; height: 100%;text-align: center;top:0; z-index: 10}
.package .more .more-div{position: absolute;top:50%;margin-top: -60px; width: 100%; font-size: 1.3em;}
.package .more .more-div img{margin:0 auto;}
.package .item-over:hover .more{display: block;}

.mobile .package .item-over .image-div img {width: 100%;}
.mobile .package .item-over .border img {width: 100%;}
.mobile .package .w-12-8{width: 66.6%;}
.mobile .package .area-contents .border .w-12-4{width: 33.3%;}
.mobile .package .area-contents .border .w-12-4 img{height: 100px; float: right;}
</style>
<script>
$(window).resize(function(){

	_t_h_1 = $("#section-recommend-silk .point .text-div").height();
	_t_h_2 = $("#section-recommend-lumber .point .text-div").height();
	_t_h_3 = $("#section-recommend-subsidiary .point .text-div").height();

	if($('body').hasClass('tablet') && $('body').hasClass('mobile')){
		$( ".package .border" ).height( 'auto');
		$( ".package .border" ).css('min-height', 'auto');
	} else {
		$( "#section-recommend-silk .border" ).height( _t_h_1);
		$( "#section-recommend-lumber .border" ).height( _t_h_2);
		$( "#section-recommend-subsidiary .border" ).height( _t_h_3);
	}

});

</script>
<div id="section-recommend-silk" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="section-main-title imb-20">장인들 추천 벽지(실크)</div>
            <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 <br />실크벽지 best 3 특가 상품을 소개해 드립니다.</div>
            <div class="gray inform">* 상품의 색상은 모니터에 따라 약간의 차이가 있을 수 있습니다.</div>
        </div>

        <div class="area-contents">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
                        <div class="image-div">
							<img src="/assets/images/wallpaper/basic01.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border">
                        <div class="w-12-8 fl">
                            <div class="text-div">
                                <p class="primary">A 화이트 49146-10</p>
                                <p class="secondary gray">집안을 보다 환하고 널어보이게 도와주는 화이트</p>
                                <p class="gray small">*미세한 펄 입자가 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/wallpaper/basic01-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
                        <div class="image-div">
							<img src="/assets/images/wallpaper/basic02.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border">
                        <div class="w-12-8 fl">
                            <div class="text-div">
                                <p class="primary">B 아이보리 49425-2</p>
                                <p class="secondary gray">집안을 따뜻하게 감싸주는 톤 다운된 아이보리</p>
                                <p class="gray small">*미세한 펄 입자가 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/wallpaper/basic02-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
                        <div class="image-div">
							<img src="/assets/images/wallpaper/basic03.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border point">
                        <div class="w-12-8 fl">
                            <div class="text-div">
                                <p class="primary">A 화이트 49146-10</p>
                                <p class="secondary gray">밝고 세련된 분위기를 연출하는 트렌디한 라이트 그레이</p>
                                <p class="gray small">*미세한 펄 입자가 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/wallpaper/basic03-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>


<div id="section-recommend-lumber" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">장인들 추천 벽지(합지)</div>
                <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 포인트벽지 best 3를 특가 상품으로 소개드립니다.<br /> 본 제품은 광폭 합지 기준이니 구매 전 확인 부탁드립니다.</div>
                <div class="gray">*상품의 색상은 모니터에 따라 약간의 차이가 있을 수 있습니다.</div>
            </div>
        </div>
        <div class="area-contents imb-50">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
                        <div class="image-div">
							<img src="/assets/images/wallpaper/option01.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border">
                        <div class="w-12-8 fl">
                            <div class="text-div">
                                <p class="primary">A 블루 49425-4</p>
                                <p class="secondary gray">푸른빛에 그레이가 감도는 차분한 블루</p>
                                <p class="gray small">*미세한 펄 입자가 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/wallpaper/option01-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
                        <div class="image-div">
							<img src="/assets/images/wallpaper/option02.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border">
                        <div class="w-12-8 fl">
                            <div class="text-div">
                                <p class="primary">B 핑크 49475-4</p>
                                <p class="secondary gray">사랑스럽고 화목한 가정을 위한 핑크</p>
                                <p class="gray small">*미세한 펄 입자가 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/wallpaper/option02-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <style>

            </style>

            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
                        <div class="image-div">
							<img src="/assets/images/wallpaper/option03.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border point">
                        <div class="w-12-8 fl">
                            <div class="text-div">
                                <p class="primary">C 딥 그레이 54002-11</p>
                                <p class="secondary gray">감성적이고 세련된 분위기 연출을 위한 그레이</p>
                                <p class="gray small">*미세한 펄 입자가 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/wallpaper/option03-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <style>
        .more-div{text-align: center;}
        .more-div p{font-size: 1.4em;line-height: 1.2em;margin-bottom: 50px;}
        .more-div a{border: 1px solid #ff9932;padding: 10px 50px;color: #ff9932;}
        </style>

        <div class="more-div">
            <p>
                장인들이 엄선한 다양한 종류의 벽지들을 직접 비교하고 선택하세요.<br />주문하기 원하시는 <span class="orange">벽지의 제품 번호</span>를 꼭 메모해주세요.
            </p>
            <a href="/?p=choose-wallpaper">더 다양한 벽지 보러 가기 ></a>
        </div>
    </div>
</div>


<style>
#section-recommend-subsidiary{background:#f4f4f4}
#section-recommend-subsidiary .area-contents .border{padding: 20px 10px}
.mobile #section-recommend-subsidiary .image-div img {width: 100%;}
</style>

<div id="section-recommend-subsidiary" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">부자재 선택</div>
                <div class="section-sub-explain gray">장인들은 도배 시공시 가장 많이 사용하는 부자재를 함께 판매하고 있습니다.<br />
고객의 필요에 따라 선별적으로 선택하여 주문하시기 바랍니다.</div>
            </div>
        </div>
        <div class="area-contents">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="image-div">
						<img src="/assets/images/event/subsidiary01.jpg" class="imb-20"/>
					</div>
                    <div class="border point">
                        <div class="text-div">
                            <p class="primary">A 도배용 커터칼 SET (+6,000원)</p>
                            <p class="secondary gray">칼과 헤라가 연결되어 있어 벽지를 밀고 자르는데
                            편리합니다. 칼날을 항상 날카롭게 유지하기 위해 칼날을 부러뜨리면서 사용하셔야 합니다. </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
					<div class="image-div">
						<img src="/assets/images/event/subsidiary02.jpg" class="imb-20"/>
					</div>
                    <div class="border">
                        <div class="text-div">
                            <p class="primary">B 칼받이 (+4,000원)</p>
                            <p class="secondary gray">몰딩에 받치고 벽지 끝단을 재단할 때 사용합니다.
                            시공품질과 안전을 위해 가급적 문구용 자 사용을 자제해주세요.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="image-div">
						<img src="/assets/images/event/subsidiary03.jpg" class="imb-20"/>
					</div>
                    <div class="border">
                        <div class="text-div">
                            <p class="primary">C 정배솔 (+12,000원)</p>
                            <p class="secondary gray">벽지를 부착하고 조금씩 울거나 주름져 있는 부분을
                                쓸어서 펼치는데 사용합니다.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="image-div">
						<img src="/assets/images/event/subsidiary04.jpg" class="imb-20"/>
					</div>
                    <div class="border">
                        <div class="text-div">
                            <p class="primary">D 밀풀 (+1,000원)</p>
                            <p class="secondary gray">밀풀 1봉지당 종이컵을 이용해 물을 6~7컵 정도
                            부어 개어내고 사용합니다.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="image-div">
						<img src="/assets/images/event/subsidiary05.jpg" class="imb-20"/>
					</div>
                    <div class="border">
                        <div class="text-div">
                            <p class="primary">E 지물본드 (+3,000원)</p>
                            <p class="secondary gray">개어낸 풀과 함께 2:1 비율로 혼합하여 사용하시면
                                접착력이 좋아지게 됩니다.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="image-div">
						<img src="/assets/images/event/subsidiary06.jpg" class="imb-20"/>
					</div>
                    <div class="border">
                        <div class="text-div">
                            <p class="primary">F 초배지 20장 (+3,000원)</p>
                            <p class="secondary gray">시멘트 노출면이나 고르지 않은 벽면을 완화해
                                주는 역할을 하며 벽지의 접착력을 높입니다.</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

        <style>
        .area-gift {background: #666666;opacity: 0.9; color: #fff; padding:50px 40px; position: relative;}
        .area-gift .image-div{position: absolute;top: 25px}
        .mobile .area-gift .image-div{top:55px;}
        .area-gift .gray{color:#cdcdcd}
        .area-gift .text-div{margin-left: 200px;}
        .area-gift .text-div .primary{font-size: 1.2em; margin-bottom: 10px;}
        .area-gift .text-div .secondary{line-height: 20px;}
        </style>
        <div class="area-gift">
            <div>
                <div class="image-div">
                    <img src="/assets/images/event/gift.png"/>
                </div>
                <div class="text-div">
                    <p class="primary"><100% 사은품 증정></p>
                    <p class="secondary gray">풀 바른 벽지를 구매하는 모든 고객에게 셀프 도배 초보자를 위한 장인들 시공가이드를 보내드립니다.<br />
        <span style="color:#fff1e8">3만원 이상 구매 고객에게는 도배용 헤라를 사은품으로 드립니다.</span></p>
                </div>
            </div>
        </div>

    </div>
</div>




<style>
#section-procedure ul .arrow{position: absolute;right: -15px;top: 55px;}
#section-procedure ul .orange{font-size: 1.2em;}
#section-procedure ul li img{margin:0 auto; max-width: 130px;}
#section-procedure ul li.arrow img{max-width:15px;}
#section-procedure ul li{line-height: 20px;text-align: center;}
.mobile #section-procedure .w-12-3 {width: 50%;}
.mobile #section-procedure ul li.arrow img{display: none;}
</style>

<div id="section-procedure" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">시공절차</div>
            <div class="section-sub-explain imb-50">셀프 도배가 처음인 고객들을 위해 도배 시공 순서를 소개합니다.</div>
        </div>
            <div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li class="imb-20"><img src="/assets/images/event/step01.png"/></li>
                        <li class="orange imb-10">도배 준비</li>
                        <li class="gray">풀 바른 벽지와 칼, 자, 붓 등 기존 부자재를 준비합니다.</li>
                    </ul>
                </div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li class="imb-20"><img src="/assets/images/event/step02.png"/></li>
                        <li class="orange imb-10">바탕면 처리</li>
                        <li class="gray">도배 시공 품질을 위해 기존 실크 벽지를 제거합니다.</li>
                    </ul>
                </div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li class="imb-20"><img src="/assets/images/event/step03.png"/></li>
                        <li class="orange imb-10">벽지 바르기</li>
                        <li class="gray">벽지를 펴서 위에서 아래로 쓸어가며 부착합니다.</li>
                    </ul>
                </div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li class="imb-20"><img src="/assets/images/event/step04.png"/></li>
                        <li class="orange imb-10">정리 및 점검</li>
                        <li class="gray">주변을 정리하고 하자가 없는지 확인합니다.</li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
    </div>
</div>



<style>
#section-caution{background: #f4f4f4}
#section-caution .item-div{position: relative; margin-bottom: 30px;}
#section-caution ul li{line-height: 1.2em;}
#section-caution ul li:first-child{font-size: 2.5em; position: absolute; top:-6px;}
#section-caution ul .txt{margin-left: 60px;}
</style>

<div id="section-caution" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">주의 사항</div>
            <div class="section-sub-explain imb-50">주문하시기 전에 아래 주의 사항을 꼭 확인해주세요!</div>
        </div>

        <div class="item-div">
            <ul class="im-x">
                <li class="orange">01</li>
                <li class="orange txt">풀 바른 벽지는 가급적 빠른 시일내로 시공바랍니다.</li>
                <li class="gray txt">풀이 마르거나 벽지가 손상 될 수 있으니 시공 품질을 위해 가급적 상품 수령 당일이나 수령 후 2일 이내에 시공바랍니다. </li>
            </ul>
        </div>

        <div class="item-div">
            <ul class="im-x">
                <li class="orange">02</li>
                <li class="orange txt">기존 벽지가 실크인 경우 기존 벽지를 제거하시기 바랍니다.</li>
                <li class="gray txt">실크 벽지는 PVC 코팅이 되어있어 기존 실크벽지 위에 바로 부착하면 하자가 발생하오니 기존 벽지를 꼭 제거하시기 바랍니다. </li>
            </ul>
        </div>

        <div class="item-div">
            <ul class="im-x">
                <li class="orange">03</li>
                <li class="orange txt">도배상태가 만족스럽지 못해도 인내심을 가지고 지켜봐주세요.</li>
                <li class="gray txt">시공 후 벽지가 울거나 주름지는 현상은 매우 자연스러운 현상이며 건조 과정에서 벽면이 반듯해지니 걱정말고 지켜봐주세요.   </li>
            </ul>
        </div>

        <div class="item-div">
            <ul class="im-x">
                <li class="orange">04</li>
                <li class="orange txt">상품을 신중하게 선택하여 주문하시기 바랍니다.</li>
                <li class="gray txt">시공상 하자나 개봉후 단순 변심에 의한 교환 및 환불이 어려우니 주문시 신중하게 상품을 선택하여 주시기 바랍니다.    </li>
            </ul>
        </div>
    </div>
</div>

<style>
#section-refund ul{height: 160px;}
#section-refund ul li{line-height: 20px;}
#section-refund ul li:first-child{margin-bottom: 10px;font-size: 1.1em;}
</style>

<div id="section-refund" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">환불규정</div>
            <div class="section-sub-explain imb-50">주문하시기 전에 아래 환불 규정을 꼭 확인해주세요!</div>
        </div>

        <div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">구매 확정</li>
                    <li class="gray">1. 입금 순서대로 상품 배송이 진행됩니다.</li>
                    <li class="gray">2. 입금 확인 전까지 상품 배송은 진행되지 않습니다. </li>
                    <li class="gray">3. 정해진 기한 내에 입금이 되지 않는 경우 사전 통보없이 주문은 자동 취소됩니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">결제 정보</li>
                    <li class="gray">1. 무통장입금, 실시간 계좌이체만 가능합니다.</li>
                    <li class="gray">2. 구매자와 실제 입금자의 성명이 일치해야 합니다.</li>
                    <li class="gray">3. 현금영수증, 세금계산서를 발급해 드립니다.</li>
                </ul>
            </div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">배송 안내</li>
                    <li class="gray">1.  전국 어디든지 배송 가능합니다.</li>
                    <li class="gray">2.  산간 , 도서 지역의 경우 추가 금액이 발생 할 수 있습니다.</li>
                    <li class="gray">3. 결제 완료 후 평균 3일(영업일기준)이내 배송됩니다.</li>
                    <li class="gray">4. 시공 품질을 위해 토요일은 출고하지 않습니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">교환 및 환불 안내</li>
                    <li class="gray">1. 상품 수령 후 7일 이내 교환 및 환불이 가능합니다.</li>
                    <li class="gray">2. 단순 변심에 의한 교환 및 환불 배송비는 본인 부담입니다.</li>
                    <li class="gray">3. 상품 개봉 후 단순 변심에 의한 교환 및 환불이 불가합니다.   </li>
                    <li class="gray">4. 시공상 하자로 인한 교환 및 환불이 불가합니다. </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
