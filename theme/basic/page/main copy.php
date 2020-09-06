<script>
$(window).resize(function(){
	//$( "#site-landing" ).height( $(window).height());//site-landing
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
	#site-landing{ height:600px;}
	#site-landing .section-header{color:#494949; margin-bottom: 20px;}
	#site-landing .section-header .primary{font-size:3em; }
	#site-landing .section-header .secondary{font-size:3.5em; font-weight:bold;}
	#site-landing .section-header .third{margin-top:15px;}



	#site-landing .vertical-center > .container {display: block;}
	#site-landing .contents-div{text-align: left;margin-left: 10px; line-height:1.2;}

	#site-landing .btn-div a{background:#4C4442; color: #FFF; padding:10px 20px;transition: 0.3s; display: inline-block;}
	#site-landing .btn-div a:hover{background: #fdac6b;}
	.vertical-center:before{height: 30%; }

	.carousel .dots{text-align: right;}
	.carousel .dots .dot{width: 7px; height: 7px; border-radius: 100px;}
	.carousel .dots .dot.on{width: 25px; border-radius: 100px;}
	.carousel .dots .dot.on:before{transition: 5s width linear; border-radius: 100px;}
</style>


<div id="site-landing" class="wrapper">
	<div class="landing-slider" style="color: #4a4142;">
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
								<a>견적내기 ></a>
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
								<a>견적내기 ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
            </li>
		</ul>
	</div>
</div><!--.section-->

<div id=section-estimate class="wrapper">
	<div class="row">

			<div id="estimate-tabs">
           		<a class="fl">도배</a>
           		<a class="fl">장판</a>
           		<a class="fl">마루</a>
			</div>


            <script>

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
                            // console.log($(this).text());

							$( this ).parent().hide();

							_idx = $(this).parent().find('li').index( $(this) );
							$(this).parent().next().find( 'li:eq('+_idx+')' ).attr('selected', 'selected');

                            var _input = $(this).parent().find('input');

                            _input.val($(this).text());


						});


					});

				});

			</script>


			<form action="./?p=estimate-update" method="post">
			<input type="hidden" name="type" value="도배"/>

            <div class="estimate-group">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>

                        <div class="estimate-select white w-12-6 fl" data-name="option-area">

                        	<div class="label"><span>해당지역 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul>
                                <input type="hidden" name="option-area" value="" />
                        	</ul>
                        	<select>
                        		<option value="">해당지역</option>
                        		<option value="옵션 A">옵션 A</option>
                        		<option value="옵션 B">옵션 B</option>
                        		<option value="옵션 C">옵션 C</option>
                        	</select>

                        </div>

                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">

                        	<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul>
                                <input type="hidden" name="option-pyeong" value="" />
                        	</ul>
                        	<select>
                        		<option value="20평 이하">20평 이하</option>
                        		<option value="20~30평">20~30평</option>
                        		<option value="60평 이상">60평 이상</option>
                        	</select>

                        </div>

                        <div class="clear"> </div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="w-veranda" value="있음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="w-veranda" value="없음"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>천장시공 포함</span><input type="radio" name="w-ceiling" value="포함" checked="checked"/></label>
                        	<label class="w-12-6 fl"><span>천장시공 미포함</span><input type="radio" name="w-ceiling" value="미포함"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="w-stay" value="거주중/가구있음"/></label>
                        	<label class="w-12-6 fl"><span>빈집/가구없음</span><input type="radio" name="w-stay" value="빈집/가구없음"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>


				<div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">벽지 종류</div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>실크도배</span><input type="radio" name="w-papering" value="실크도배"/></label>
                        	<label class="w-12-6 fl"><span><b>24</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span>합지도배</span><input type="radio" name="w-papering" value="합지도배"/></label>
                        	<label class="w-12-6 fl"><span><b>43</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span style="line-height:20px">거실벽 실크+<br/>천장 및 방합지</span><input type="radio" name="w-papering" value="합지도배"/></label>
                        	<label class="w-12-6 fl"><span><b>74</b> 만원</span></label>
							<div class="clear"></div>
                        </div>

						<div class="clear"></div>
                    </div>


                    <ul class="im-x add-explain">
                        <li>
                            <i class="fal fa-question-circle"></i>
                            <a>실크 VS 합지 차이가 궁금하세요?</a>
                        </li>
                        <li>
                            <i class="fal fa-check-circle"></i>
                            <a>울 화이트 패키지</a>
                            <img src="/assets/images/main/sale_icon.png" />
                        </li>
                    </ul>
                </div>

                <div class="information w-12-4 fl">
                    <div class="im-x ipb-20">
                        <ul class="imb-10 ">
                            <li class="iprl-10">고객 정보</li>
                            <li class="iprl-10"><label>이름</label><input type="text" name="name" placeholder="홍길동"/></li>
                            <li class="iprl-10"><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000"/></li>
                            <li class="iprl-10"><label>시공날짜</label><input type="text" name="c-date" placeholder="2018.02.20"/></li>
                            <li class="iprl-10"><label>총 견적</label><input type="text" name="total" placeholder="24만원"/></li>
                        </ul>
                        <div class="agree">
                            <div class="iprl-10">
                                <!--<input type="checkbox" id="agree" />-->
                            	<i class="fal fa-check-circle"></i>
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

		<input type="hidden" name="type" value="장판"/>
			<div class="estimate-group">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>
                        <div class="estimate-select white w-12-6 fl" data-name="option-area">
							<div class="label"><span>해당지역 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                            <ul>
                                <input type="hidden" name="option-area" value="" />
                        	</ul>
							<select>
                                <option value="">해당지역</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">
							<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                            <ul>
                                <input type="hidden" name="option-pyeong" value="" />
                        	</ul>
							<select>
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

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="p-veranda" value="있음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="p-veranda" value="없음"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>집 전체 포함</span><input type="radio" name="p-all" value="집 전체 포함"/></label>
                        	<label class="w-12-6 fl"><span>방 만 시공</span><input type="radio" name="p-all" value="방 만 시공"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="p-stay" value="거주중/가구있음"/></label>
                        	<label class="w-12-6 fl"><span>빈집/가구 없음</span><input type="radio" name="p-stay" value="빈집/가구 없음"/></label>
							<div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>


				<div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">장판 종류</div>

						 <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>장판 두께 1.8MM</span><input type="radio" name="p-floorpaper" value="장판 두께 1.8MM"/></label>
                        	<label class="w-12-6 fl"><span><b>24</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span>장판 두께 2.0MM</span><input type="radio" name="p-floorpaper" value="장판 두께 2.0MM"/></label>
                        	<label class="w-12-6 fl"><span><b>43</b> 만원</span></label>
							<div class="clear"></div>
							<label class="w-12-6 fl"><span>장판 두께 2.3MM</span><input type="radio" name="p-floorpaper" value="장판 두께 2.3MM"/></label>
                        	<label class="w-12-6 fl"><span><b>74</b> 만원</span></label>
							<div class="clear"></div>
							<label class="w-12-6 fl"><span>더 두꺼운 장판</span><input type="radio" name="p-floorpaper" value="더 두꺼운 장판"/></label>
                        	<label class="w-12-6 fl"><span><b>상담필요</b></span></label>
							<div class="clear"></div>
                        </div>
						<div class="clear"></div>
                    </div>


                    <ul class="im-x add-explain">
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

                <div class="information w-12-4 fl">
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
                                <!-- <input type="checkbox" id="agree" /> -->
                                <i class="fal fa-check-circle"></i>
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
			<input type="hidden" name="type" value="마루"/>

			<div class="estimate-group">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>
                        <div class="estimate-select white w-12-6 fl" data-name="option-area">
							<div class="label"><span>해당지역 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                            <ul>
                                <input type="hidden" name="option-area" value="" />
                        	</ul>
                            <select>
                                <option value="">해당지역</option>
                                <option value="1">옵션1</option>
                                <option value="2">옵션2</option>
                                <option value="3">옵션3</option>
                                <option value="4">옵션4</option>
                                <option value="5">옵션5</option>
                            </select>
                        </div>
                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">
							<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                            <ul>
                                <input type="hidden" name="option-pyeong" value="" />
                        	</ul>
                            <select>
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

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="f-veranda" value="있음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="f-veranda" value="없음"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>기존바닥재 없음/장판</span><input type="radio" name="f-existing" value="기존바닥재 없음/장판"/></label>
                        	<label class="w-12-6 fl"><span>기존바닥재 마루/대리석</span><input type="radio" name="f-existing" value="기존바닥재 마루/대리석"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="f-stay" value="거주중/가구있음"/></label>
                        	<label class="w-12-6 fl"><span>빈집/가구 없음</span><input type="radio" name="f-stay" value="빈집/가구 없음"/></label>
							<div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>


				<div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">마루 종류</div>

						<div class="estimate-radio">
						   <label class="w-12-6 fl"><span>강마루</span><input type="radio" name="f-floor" value="강마루"/></label>
						   <label class="w-12-6 fl"><span><b>24</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl"><span>강화마루</span><input type="radio" name="f-floor" value="강화마루"/></label>
						   <label class="w-12-6 fl"><span><b>43</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl"><span>데코타일</span><input type="radio" name="f-floor" value="데코타일"/></label>
						   <label class="w-12-6 fl"><span><b>74</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl"><span>원목마루</span><input type="radio" name="f-floor" value="원목마루"/></label>
						   <label class="w-12-6 fl"><span><b>상담필요</b></span></label>
						   <div class="clear"></div>
					   </div>
					   <div class="clear"></div>
				   </div>

                    <ul class="im-x add-explain">
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

                <div class="information w-12-4 fl">
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
                                <!-- <input type="checkbox" id="agree" /> -->
                                <i class="fal fa-check-circle"></i>
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


<style>
.section-title{font-size:1.8em; font-weight: bold;text-align: center; margin-bottom: 40px;}
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
				<div class="w-12-4 fl">
					<div class="circle">
						<div class="contents">
							<div class="count">245</div>
							<div class="title">오늘의 견적 발행 수</div>
						</div>
					</div>
				</div>
				<div class="w-12-4 fl">
					<div class="circle">
						<div class="contents">
							<div class="count">149,749</div>
							<div class="title">누적 견적 발행수</div>
						</div>
					</div>
				</div>
				<div class="w-12-4 fl">
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
#section-performance .contents-div .main-ul {padding-right: 200px;}
#section-performance .contents-div .sub-ul { position:absolute; right:0px; width:200px;}
#section-performance .contents-div .sub-ul li{margin-bottom:12px;}

#section-performance .explain {background:#fff; padding:10px;}
#section-performance .title-div{border-right: 1px solid #7f7f7f; margin-right:10px;}
#section-performance .title-div .title{font-size:1.2em;line-height:19px;}
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
#section-story img{margin:0 auto; width: 100%;}
#section-story .story-item{ margin-bottom:20px; }

#section-story .contents-div{background: #fff; opacity: 0.8; position: absolute; bottom: 0;}
#section-story .contents-div .contents-inner{padding: 10px;}
#section-story .contents-div .contents-inner .underline{border-bottom: 1px solid black;}
#section-story .contents-div .contents-inner .underline .category {color: #ff8d20; font-weight:700; font-size:1.3em;}
#section-story .contents-div .contents-inner .underline .more{color:#bdbdbd; line-height: 33px;}
#section-story .contents-div .contents-inner .title{font-weight: 600; font-size: 1.2em;}
#section-story .contents-div .contents-inner .description{line-height: 1.5em;}

.mobile #section-story .w-12-4{ width:33.3%; }

</style>

<div id="section-story" class="section">
	<div class="row">
	
		<div class="section-title">최근 실적 현황</div>
		<div class="w-12-4 fl story-item">
			<div class="im-x imb-10">
				<img src="/assets/images/main/story-01.jpg"/>
				
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
		<div class="w-12-4 fl story-item">
			<div class="im-x">
				<img src="/assets/images/main/story-02.jpg"/>
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
		<div class="w-12-4 fl story-item">
			<div class="im-x imb-10">
				<img src="/assets/images/main/story-03.jpg"/>
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
