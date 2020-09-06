<script>
$(window).resize(function(){

	$( "#site-landing" ).height( $(window).height()/2);

});


$(function(){
 var landingSlider = new SCarousel( "#site-landing .landing-slider", {
   style: {
     parentHeight: true,
     itemWidth: "100%", // string
     itemMaxWidth: "100%", // string
     onPosition: "center", // left, center
     infinite: true, // boolean
   },
   update: {
     mode: "slide", // slide, fade
     speed: 600, // number
     relative: false, // boolean
     auto: 5000, // number
   },
   interface: {
     dots: true, // boolean
     pointers: false, // boolean
     draggable: true, // boolean
   },
 });
 landingSlider.build();
});

</script>


<style>
#site-landing .section-header{color:#494949; margin-bottom: 20px;}
#site-landing .section-header .primary{font-size:2.5em; font-weight:500; font-family: 'Noto sans KR'; line-height: 1.5; }
#site-landing .section-header .secondary{font-size:2.5em; font-weight:800;}
.mobile #site-landing .section-header .primary{ font-size: 3em; }
#site-landing .vertical-center > .container {display: block;}
#site-landing .contents-div{text-align: left;line-height: 30px; margin-left: 10px;}
#site-landing .btn-div button{background:#4C4442; color: #FFF; padding:5px 15px;transition: 0.3s}
#site-landing .btn-div button:hover{background: #fdac6b;}
.vertical-center:before{height: 30%; }

.carousel .dots{text-align: right;}
.carousel .dots .dot{width: 7px; height: 7px; border-radius: 100px;}
.carousel .dots .dot.on{width: 25px;}
.carousel .dots .dot.on:before{transition: 5s width linear}
</style>


<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>
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
</div><!--.section-->

<script>

$(function(){
	
	$('#section-estimate .estimate-group:first').show();
	$( "#estimate-tabs a" ).click(function(){

		$('#section-estimate form').each(function(){
			$("input[type=radio][checked]").attr('checked', false);
			this.reset(); 	// ?
		});
		
		_idx = $('#estimate-tabs a').index( $(this) );
		
		$('#estimate-tabs a.active').removeClass('active');
		$('#estimate-tabs a').eq(_idx).addClass('active');
		
		
		$('#section-estimate .estimate-group').hide();
		$('#section-estimate .estimate-group').eq(_idx).show();
		
	});
	
	$( "#estimate-tabs a:first" ).click();
	
});
</script>


<style>
#section-estimate{color:#fff;}
#section-estimate .item-div li{background: #716b6d; color: #fff;padding: 5px 75px; border: 1px solid gray}
	
#section-estimate .item-div{position: absolute;top:-38px;}
	
	
#section-estimate .blue-bg{background: #85bee6; border: 1px solid #fff;}
#section-estimate .white-bg{background: #fff; border: 1px solid #fff;}
#section-estimate .select-h-w{width: 148px; height: 40px; text-align: center; margin-bottom: 10px;line-height: 40px;}
#section-estimate .item-div li.active{background: #85bee6; border: 1px solid #85bee6;}
	
	#estimate-tabs { position: absolute; top:-70px; }
	#estimate-tabs a { display: block; background: #716b6d; height:70px; width:200px; line-height:70px; text-align: center; font-size: 22px; max-width: 33.33%;}
	#estimate-tabs a:hover { text-decoration: none; color: inherit; }
	
	#estimate-tabs a.active{background: #85bee6; }
</style>

<div id=section-estimate class="wrapper">
	<div class="row">
		<div class="im-x">
           
			<div id="estimate-tabs">
           		<a class="fl">도배</a>
           		<a class="fl">장판</a>
           		<a class="fl">마루</a>
			</div>
           
            <script type="text/javascript">
            $(function(){
                $(".select-box1").select_box({
                    width:'auto',
                    height:42
                });
                $(".select-box2").select_box({
                    width:150,
                    height:42
                });

				$('.selector input[type="radio"]').click(function(){
					_this = $(this);
					_idx = $('.selector input[type="radio"]').index(_this);

					if($('input[type="radio"]:checked')){
						$('#section-estimate .select-div .selector').eq(_idx).addClass('active');
						$("input:radio[type='radio']:not(:checked)").parents().removeClass('active');
					} else {
						$('#section-estimate .select-div .selector').removeClass('active');
					}
				});

            });

            </script>


		    <style>
            .estimate-group{font-size: 1.1em; display: none;}
            #section-estimate .select-box1>a{color:#85bee6}
            #section-estimate .select-div{background: #85bee6; height:286px;} /* border-right: 1px solid #74aed8; */
            #section-estimate .select-box2>a{background: #85bee6 url(/assets/images/main/white-arrow.png) 115px center no-repeat}
            #section-estimate .iptb-30{padding:30px 0;}
            #section-estimate .title{font-size:1.2em;}
            #section-estimate .blue-font{color: #85bee6;}
            #section-estimate .white-font{color: #FFF;}
            #section-estimate .money{font-size:2em;}

			#section-estimate .select-div .select-h-w.active{background: #FFF;color:#85bee6;}

			.select-h-w input{display: none;}

			.information{background:#0f5e9a !important; position: relative;}
			.information ul li {border-bottom: 1px solid #74a2c4; margin-top: 3px;}
			.information ul li label{width: 60px; position: absolute;}
			.information ul li input{background: transparent; width: 50%; color:#fff;margin-left: 60px;}
			.information .consulting-div{background: #ff9932; text-align: center; position: absolute;bottom: 0px; width: 100%; line-height: 80px; }
			.information .consulting-div button{background: transparent; color:#fff;}
			.information .agree label{margin-left:10px;}

			.add-explain li{line-height: 20px;}
			.add-explain li img {display: inline-block;margin-bottom:4px;}
            </style>
			<form action="./?p=estimate-update" method="post">
			<input type="hidden" name="type" value="wall"/>
			
            <div id="wall" class="estimate-group">
                <div class="select-div w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>
                        <div class="select-box1 fl imb-20">
                            <select name="option-area">
                                <option value="">해당지역</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="select-box2 fl">
                            <select name="option-pyeong">
                                <option value="">공급면적(평)</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="scene-div im-x-2">
                        <div class="title">현장 조건</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="w-veranda" id="w-veranda-y"/><label for="w-veranda-y">배란다 확장 있음</label>
						</div>
                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="N" name="w-veranda" id="w-veranda-n"/><label for="w-veranda-n">배란다 확장 없음</label>
						</div>
                        <div class="clear"></div>

                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="w-ceiling" id="w-ceiling-y"/><label for="w-ceiling-y">천장시공 포함</label>
						</div>
                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="N" name="w-ceiling" id="w-ceiling-n"/><label for="w-ceiling-n">천장시공 미포함</label>
						</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="w-stay" id="w-stay-y"/><label for="w-stay-y">거주중/가구있음</label>
						</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="w-stay" id="w-stay-n"/><label for="w-stay-n">빈집/가구 없음</label>
						</div>
                        <div class="clear"></div>
                    </div>
                </div>


				<div class="select-div w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">벽지 종류</div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="24" name="w-papering" id="w-papering-1"/><label for="w-papering-1">시크도배</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">24</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="43" name="w-papering" id="w-papering-2"/><label for="w-papering-2">합지도배</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">43</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="pack" name="w-papering" id="w-papering-3"/><label for="w-papering-3"><p style="line-height:20px;">거실벽 실크+<br/>천장 및 방 합지</p></label>
						</div>

						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">74</span>만원</p></div>

						<div class="clear"></div>
                    </div>


                    <ul class="im-x-2 add-explain">
                        <li>
                            <img src="/assets/images/main/question_icon.png" />
                            <a>실크 VS 합지 차이가 궁금하세요?</a>
                        </li>
                        <li>
                            <img src="/assets/images/main/check_icon.png" />
                            <a>울 화이트 패키지</a>
                            <img src="/assets/images/main/sale_icon.png" />
                        </li>
                    </ul>
                </div>

                <div class="select-div information w-12-4 fl">
                    <div class="im-x-2">
                        <ul class="imb-10">
                            <li class="iprl-10">고객 정보</li>
                            <li class="iprl-10"><label>이름</label><input type="text" name="name" placeholder="홍길동"/></li>
                            <li class="iprl-10"><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000"/></li>
                            <li class="iprl-10"><label>시공날짜</label><input type="text" name="c-date" placeholder="2018.02.20"/></li>
                            <li class="iprl-10"><label>총 견적</label><input type="text" name="total" placeholder="24만원"/></li>
                        </ul>
                        <div class="agree">
                            <div class="iprl-10">
                                <input type="checkbox" id="agree" />
                                <label for="agree">정보수집에 동의</label>
                            </div>
                        </div>
                    </div>
                    <div class="consulting-div">
                        <button>선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
		</form>

		<form action="./?p=estimate-update" method="post">
		<input type="hidden" name="type" value="plate"/>
			<div id="plate" class="estimate-group">
                <div class="select-div w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>
                        <div class="select-box1 fl imb-20">
                            <select name="option-area" >
                                <option value="">해당지역</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="select-box2 fl">
                            <select name="option-pyeong" id="select-tag2">
                                <option value="">공급면적(평)</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="scene-div im-x-2">
                        <div class="title">현장 조건</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="p-veranda" id="p-veranda-y"/><label for="p-veranda-y">배란다 확장 있음</label>
						</div>
                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="N" name="p-veranda" id="p-veranda-n"/><label for="p-veranda-n">배란다 확장 없음</label>
						</div>
                        <div class="clear"></div>

                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="p-all" id="p-all-y"/><label for="p-all-y">집 전체 포함</label>
						</div>
                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="N" name="p-all" id="p-all-n"/><label for="p-all-n">방 만 시공</label>
						</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="p-stay" id="p-stay-y"/><label for="p-stay-y">거주중/가구있음</label>
						</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="p-stay" id="p-stay-n"/><label for="p-stay-n">빈집/가구 없음</label>
						</div>
                        <div class="clear"></div>
                    </div>
                </div>


				<div class="select-div w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">장판 종류</div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="24" name="p-plate" id="p-plate-1"/><label for="p-plate-1">장판 두께 1.8MM</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">24</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="43" name="p-plate" id="p-plate-2"/><label for="p-plate-2">장판 두께 2.0MM</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">43</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="74" name="p-plate" id="p-plate-3"/><label for="p-plate-3">장판 두께 2.3MM</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">74</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="thick" name="p-plate" id="p-plate-4"/><label for="p-plate-4">더 두꺼운 장판</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font">상담 필요</p></div>

						<div class="clear"></div>
                    </div>


                    <ul class="im-x-2 add-explain">
                        <li>
                            <img src="/assets/images/main/question_icon.png" />
                            <a>장판 두께의 차이가 궁금하세요?</a>
                        </li>
                        <li>
                            <img src="/assets/images/main/check_icon.png" />
                            <a>장판 패키지(상담 필요)</a>
                        </li>
                    </ul>
                </div>

                <div class="select-div information w-12-4 fl">
                    <div class="im-x-2">
                        <ul class="imb-10">
                            <li class="iprl-10">고객 정보</li>
                            <li class="iprl-10"><label>이름</label><input type="text" name="name" placeholder="홍길동"/></li>
                            <li class="iprl-10"><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000"/></li>
                            <li class="iprl-10"><label>시공날짜</label><input type="text" name="c-date" placeholder="2018.02.20"/></li>
                            <li class="iprl-10"><label>총 견적</label><input type="text" name="total" placeholder="24만원"/></li>
                        </ul>
                        <div class="agree">
                            <div class="iprl-10">
                                <input type="checkbox" id="agree" />
                                <label for="agree">정보수집에 동의</label>
                            </div>
                        </div>
                    </div>
                    <div class="consulting-div">
                        <button>선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>

                <div class="clear"></div>

            </div>
		</form>

			<form action="./?p=estimate-update" method="post">
			<input type="hidden" name="type" value="floor"/>
			<div id="floor" class="estimate-group">
                <div class="select-div w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>
                        <div class="select-box1 fl imb-20">
                            <select name="option-area" id="select-tag1">
                                <option value="">해당지역</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="select-box2 fl">
                            <select name="option-pyeong" id="select-tag2">
                                <option value="">공급면적(평)</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="scene-div im-x-2">
                        <div class="title">현장 조건</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="f-veranda" id="f-veranda-y"/><label for="f-veranda-y">배란다 확장 있음</label>
						</div>
                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="N" name="f-veranda" id="f-veranda-n"/><label for="f-veranda-n">배란다 확장 없음</label>
						</div>
                        <div class="clear"></div>

                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="f-existing" id="f-existing-y"/><label for="f-existing-y"><p style="line-height:20px;">기존바닥재<br />없음/장판</p></label>
						</div>
                        <div class="fl blue-bg select-h-w selector">
							<input type="radio" value="N" name="f-existing" id="f-existing-n"/><label for="f-existing-n"><p style="line-height:20px;">기존바닥재<br />마루/대리석</p></label>
						</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="f-stay" id="f-stay-y"/><label for="f-stay-y">거주중/가구있음</label>
						</div>
						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="Y" name="f-stay" id="f-stay-n"/><label for="f-stay-n">빈집/가구 없음</label>
						</div>
                        <div class="clear"></div>
                    </div>
                </div>


				<div class="select-div w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">마루 종류</div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="24" name="f-floor" id="f-floor-1"/><label for="f-floor-1">강마루</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">24</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="43" name="f-floor" id="f-floor-2"/><label for="f-floor-2">강화마루</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">43</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="74" name="f-floor" id="f-floor-3"/><label for="f-floor-3">데코타일</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font"><span class="money">74</span>만원</p></div>

						<div class="fl blue-bg select-h-w selector">
							<input type="radio" value="wood" name="f-floor" id="f-floor-4"/><label for="f-floor-4">원목마루</label>
						</div>
						<div class="fl blue-bg select-h-w"><p class="white-font">상담 필요</p></div>


						<div class="clear"></div>
                    </div>


                    <ul class="im-x-2 add-explain">
                        <li>
                            <img src="/assets/images/main/question_icon.png" />
                            <a>마루 종류의 차이가 궁금하세요?</a>
                        </li>
                        <li>
                            <img src="/assets/images/main/check_icon.png" />
                            <a>해링본패턴 시공</a>
                        </li>
                    </ul>
                </div>

                <div class="select-div information w-12-4 fl">
                    <div class="im-x-2">
                        <ul class="imb-10">
                            <li class="iprl-10">고객 정보</li>
                            <li class="iprl-10"><label>이름</label><input type="text" name="name" placeholder="홍길동"/></li>
                            <li class="iprl-10"><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000"/></li>
                            <li class="iprl-10"><label>시공날짜</label><input type="text" name="c-date"placeholder="2018.02.20"/></li>
                            <li class="iprl-10"><label>총 견적</label><input type="text" name="total" placeholder="24만원"/></li>
                        </ul>
                        <div class="agree">
                            <div class="iprl-10">
                                <input type="checkbox" id="agree" />
                                <label for="agree">정보수집에 동의</label>
                            </div>
                        </div>
                    </div>
                    <div class="consulting-div">
                        <button type="submit">선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
			</form>
        </div>
    </div>
</div>


<style>
.section-title{font-size:1.8em; font-weight: bold;text-align: center; margin-bottom: 30px;}
</style>


<div id="section-tip" class="section">
	<div class="row">
			<div class="section-title">
				견적 TIP
			</div>
			<div class="img-div">
				<div class="w_2_1 fl">
					<div class="im-x">
						<img src="/assets/images/main/tip01.jpg"/>
					</div>
				</div>
				<div class="w_2_1 fl" >
					<div class="im-x">
						<img src="/assets/images/main/tip02.jpg"/>
					</div>
				</div>
				<div class="clear"></div>
			</div>
	</div>
</div>

<style>
#section-construction .circle {width:320px;height:320px;border-radius:50%;background:#fff9f3;margin:0 auto; text-align: center;display: table;}
#section-construction .contents {display: table-cell;vertical-align: middle;}
#section-construction .circle .count{color: #fdac6b; font-size: 5em; line-height: 80px}
#section-construction .circle .title{color: #444444; }
</style>

<script>
$(function(){
	$('.count').counterUp({
        delay: 10,
        time: 2000
    });
});

</script>

<div id="section-construction" class="section">
	<div class="row">
		<div class="im-x">
			<div class="section-title">
				온라인 인테리어 시공의 기준
			</div>
			<div class="circle-div">
				<div class="w_3_1 fl">
					<div class="circle">
						<div class="contents">
							<div class="count">245</div>
							<div class="title">오늘의 견적 발행 수</div>
						</div>
					</div>
				</div>
				<div class="w_3_1 fl">
					<div class="circle">
						<div class="contents">
							<div class="count">149,749</div>
							<div class="title">누적 견적 발행수</div>
						</div>
					</div>
				</div>
				<div class="w_3_1 fl">
					<div class="circle">
						<div class="contents">
							<div class="count">14,331</div>
							<div class="title">함께하는 장인들</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

<style>
#section-performance {background-image: url("/assets/images/main/performance-bg.jpg"); background-size: cover;background-position: center; background-repeat: no-repeat;}
#section-performance .contents-div .main-ul {max-width:70%}
#section-performance .contents-div .sub-ul {max-width: 30%}
#section-performance .contents-div .sub-ul li{margin-bottom:12px;}
#section-performance .contents-div .sub-ul li img{width: 70%;}
#section-performance .explain {background:#fff; padding:10px;}
#section-performance .title-div{border-right: 1px solid #7f7f7f; margin-right:10px;}
#section-performance .title-div .title{font-size:1.3em;line-height:19px;}
#section-performance .date{color:#7f7f7f}
#section-performance .review{color:#7f7f7f; line-height: 19px;margin-bottom: 10px;}
#section-performance .material-div .title{color:#5d5d5d}
.ipl-10{padding-left: 10px;}
</style>
<div id="section-performance" class="section">
	<div class="row">
		<div class="im-x">
			<div class="section-title">
				최근 실적 현황
			</div>
			<div class="contents-div">
				<ul class="main-ul fl">
					<li><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="explain">
						<div class="fl w_5_1">
							<div class="title-div">
								<div class="title">가락동 빌라 15평 도배 시공</div>
								<div class="date">2017-12-26</div>
							</div>
						</div>

						<div class="w_5_4 fl">
							<div class="review">
								집이 좁다면 무조건 화이트를 해야한다? 집이 넓지 않아도 선택할 수 있는 대안은 많습니다.
								가락동의 빌라에 사용된 블루 빛깔의 스트라이프 벽지도 마찬가지였는데요.
								그레이 빛깔의 톤다운 된 색상이었지만, 우려하시던 칙칙함은 느낄 수 없었답니다.
							</div>
							<div class="fr material-div">
								<div class="fl ipl-10">
									<img src="/assets/images/main/p-color-01.jpg"/>
									<div class="title">ED80291</div>
								</div>
								<div class="fl ipl-10">
									<img src="/assets/images/main/p-color-02.jpg"/>
									<div class="title">ED80291</div>
								</div>
								<div class="fl ipl-10">
									<img src="/assets/images/main/p-color-03.jpg"/>
									<div class="title">ED80291</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</li>
				</ul>
				<ul class="sub-ul fl">
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
					<li class="im-x"><img src="/assets/images/main/p-slider01.jpg"/></li>
				</ul>

				<div class="clear">

				</div>
			</div>

		</div>
	</div>
</div>

<style>
#section-miracle .background_slow{background-image: url(/assets/images/main/miracle-bg.jpg)}
#section-miracle .contents{max-width: 400px; margin: 0 auto;background: url(/assets/images/main/white-bg.png); background-size: cover;background-position: center;}
#section-miracle .contents-div{padding: 50px 20px}
#section-miracle .under-line img{margin:0 auto;}
#section-miracle .primary{font-size: 1.8em;}
#section-miracle .secondary{font-weight:700;font-size:2em;}
</style>

<div id="section-miracle" class="section background_slow_wrapper wrapper">
	<div class="background_slow_body">
		<div class="row_narrow">
			<div class="im-x">
				<div class="contents">
					<div class="contents-div">
						<div class="under-line"><img src="/assets/images/main/underline.png"/></div>
						<div class="primary">하루의 기적, 놀라지 마세요.</div>
						<div class="secondary">장인들과 함께라면 가능합니다!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="background_slow"></div>
	<div class="clear"> </div>
</div>


<style>
#section-story img{margin:0 auto;}
#section-story .contents-div{background: #fff; opacity: 0.8; position: absolute;bottom: 0;}
#section-story .contents-div .contents-inner{padding: 10px;}
#section-story .contents-div .contents-inner .underline{border-bottom: 1px solid black;}
#section-story .contents-div .contents-inner .underline .category {color: #ff8d20; font-weight:700; font-size:1.3em;}
#section-story .contents-div .contents-inner .underline .more{color:#bdbdbd; line-height: 33px;}
#section-story .contents-div .contents-inner .title{font-weight: 600; font-size: 1.2em;}
#section-story .contents-div .contents-inner .description{line-height: 15px;}
</style>

<div id="section-story" class="section">
	<div class="row">
		<div class="w_3_1 fl">
			<div class="im-x imb-10">
				<img src="/assets/images/main/story.png"/>
				<div class="contents-div">
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl">INTERIOR TIP</div>
							<div class="more fr"><a>MORE ></a></div>
							<div class="clear"></div>
						</div>
						<div class="title">디테일이 다른 가구</div>
						<div class="description">요즘 떠오르는 신진 디자이너의 가구와 인테리어 활용 방법을 상세히 알려드립니다.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="w_3_1 fl">
			<div class="im-x">
				<img src="/assets/images/main/story.png"/>
				<div class="contents-div">
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl">INTERIOR TIP</div>
							<div class="more fr"><a>MORE ></a></div>
							<div class="clear"></div>
						</div>
						<div class="title">디테일이 다른 가구</div>
						<div class="description">요즘 떠오르는 신진 디자이너의 가구와 인테리어 활용 방법을 상세히 알려드립니다.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="w_3_1 fl">
			<div class="im-x imb-10">
				<img src="/assets/images/main/story.png"/>
				<div class="contents-div">
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl">INTERIOR TIP</div>
							<div class="more fr"><a>MORE ></a></div>
							<div class="clear"></div>
						</div>
						<div class="title">디테일이 다른 가구</div>
						<div class="description">요즘 떠오르는 신진 디자이너의 가구와 인테리어 활용 방법을 상세히 알려드립니다.</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
