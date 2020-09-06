<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-package02' );
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
			<li><a>도배</a></li> >
			<li>도배+장판 패키지</li>
		</ul>
	</div>
</div>

<style>
#section-intro ul {text-align: center;}
#section-intro ul li{display: inline-block;border: 1px solid #000;padding: 0 10px;margin:0 5px;}
#section-intro ul li span{ color: #ff8d27; font-weight: bold;; }
.underline-full {border-bottom: 1px solid #dadada}
</style>

<div id="section-intro" class="section">
    <div class="row">
        <div class="im-x">
            <div class="title-div">
                <div class="section-main-title">도배+장판 패키지</div>
                <div class="section-sub-title imb-20">아파트&오피스텔 시공자 대상 특가 이벤트</div>
                <ul class="imb-50">
                    <li><span>패키지1</span> | 29~32평</li>
                    <li><span>패키지2</span> | 45~48평</li>
                </ul>
            </div>
            <div class="underline-full"></div>
        </div>
    </div>
</div>

<style>
.package .area-text{text-align: center;}
.package .section-main-title{line-height:normal; margin-bottom: 20px;}
.package .section-sub-explain{line-height: 1.3em; margin-bottom: 10px;}
.package .area-contents .primary{font-size: 1.2em; line-height: 1.3; margin-bottom:5px;}
.package .area-contents .secondary{line-height: 1.3;font-size: 1.1em;}
.package .area-contents .border{padding:20px 10px; position: relative}
.package .area-contents .border .text-div{padding-right: 10px;}
.package .area-contents .border .w-12-4{width: 33.33%;}

.package .item-over img{margin:0 auto;}
.package .more{display: none;background: #000; opacity: 0.5; position: absolute; color: #FFF; width: 100%; height: 100%;text-align: center;top:0; z-index: 10}
.package .more .more-div{position: absolute;top:50%;margin-top: -60px; width: 100%; font-size: 1.3em;}
.package .more .more-div img{margin:0 auto;}
.package .item-over:hover .more{display: block;}
</style>

<div id="section-best" class="section package">
    <div class="row">
        <div class="im-x">
            <div class="area-text imb-50">
                <div class="section-main-title">BEST SELLER</div>
                <div class="section-sub-explain gray">하단의 자재(벽지,장판)이미지를 선택해서 원하는 인테리어를 완성해보세요</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
            <div class="area-best">

              	<style>

					#simulation-wall{ display: none; position:absolute; top:0px; left:0px}
					#simulation-point-wall{ display: none; position:absolute; top:0px; left:0px}
					#simulation-floor{ display: none; position:absolute; top:0px; left:0px}
					.material-group .area-choose-wallpaper img{border:2px solid rgba(138, 187, 228, 0);}
					.material-group .area-choose-wallpaper img.choose { border: 2px solid #fff;}

				</style>

              	<script>

					$(function(){

						setTimeout( function(){
							$( "#simulation-wall-chooser img" ).eq(0).click();
							$( "#simulation-floor-chooser img" ).eq(0).click();
						},0 );

						$( '#simulation-wall-chooser img' ).click(function(){

							$( '#simulation-wall-chooser img.choose' ).removeClass( 'choose' );
							_idx = $( '#simulation-wall-chooser img' ).index( $(this) );
							$(this).addClass('choose');

							$( "#simulation-wall" ).attr( 'src', '/assets/images/package02/simulation-m-0' + ( _idx + 1 ) +'.png' );
							$( "#simulation-wall").fadeIn();

							$('#estimate-pacakge-form input[name=wall]').val(  '일반벽지' + '' + ( _idx + 1 ) );
						})

						$( '#simulation-floor-chooser img' ).click(function(){

							$( '#simulation-floor-chooser img.choose' ).removeClass( 'choose' );
							_idx = $( '#simulation-floor-chooser img' ).index( $(this) );
							$(this).addClass('choose');

							$( "#simulation-floor" ).attr( 'src', '/assets/images/package02/simulation-f-0' + ( _idx + 1 ) +'.png' );
							$( "#simulation-floor").fadeIn();

							$('#estimate-pacakge-form input[name=floor]').val(  '장판 ' + '' + ( _idx + 1 ) );
						})


						$( '#simulation-wall-point-chooser img' ).click(function(){

							if($(this).hasClass('choose')){

								$(this).removeClass( 'choose' );
								$( "#simulation-point-wall").fadeOut();

							} else {

							$( '#simulation-wall-point-chooser img.choose' ).removeClass( 'choose' );
							_idx = $( '#simulation-wall-point-chooser img' ).index( $(this) );

								$(this).addClass('choose');
								$( "#simulation-point-wall" ).attr( 'src', '/assets/images/package02/simulation-s-0' + ( _idx + 1 ) +'.png' );
								$( "#simulation-point-wall").fadeIn();
								$('#estimate-pacakge-form input[name=wall]').val(  '포인트벽지' + '' + ( _idx + 1 ) );

							}

						})

					});

				</script>

               	<div id="simulation" style="position: relative;">
               		<img src='' id="simulation-wall"/>
					<img src='' id="simulation-point-wall"/>
               		<img src='' id="simulation-floor"/>
               		<img src='/assets/images/package02/simulation-bg.png'/>
               	</div>
            </div>




			<script>
				$(function(){

					$( "#estimate-pacakge-form [name=pyung], #estimate-pacakge-form [name=veranda]" ).blur(function(){

						_p = $('#estimate-pacakge-form [name=pyung]:checked').val();
						_v = $('#estimate-pacakge-form [name=veranda]:checked').val();

						if( _p == "29-32평" && _v=="없음")
						{
							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("133");
							$('#estimate-pacakge-form input[name=price]').val( '133' );
						} else if ( _p == "45-48평" && _v=="없음" ){

							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("193");
							$('#estimate-pacakge-form input[name=price]').val( '193' );
						} else if ( _p == "29-32평" && _v=="있음" ){
							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("146");
							$('#estimate-pacakge-form input[name=price]').val( '146' );
						} else if ( _p == "45-48평" && _v=="있음" ){
							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("230");
							$('#estimate-pacakge-form input[name=price]').val( '230' );
						}

					});

					$( "#estimate-pacakge-form [name=pyung]:first" ).click();

				});
			</script>
            <div id=section-estimate class="wrapper">
            	<div class="row">

						<form method="post" id="estimate-pacakge-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); $( '#estimate-pacakge-form .information input[type=text]' ).val('');  } } );">
						<input type="hidden" name="option-area" value="" />
						<input type="hidden" name="type" value="장판-도배+장판 패키지"/>
						<input type='hidden' name="price" value=""/>
                        <input type='hidden' name="wall" value=""/>
                        <input type='hidden' name="floor" value=""/>


                        <div class="estimate-group">
                            <div class="w-12-4 fl">
                                <div class="im-x-2">
                                    <div class="title">자재선택</div>
                                    <div class="area-tip">
                                        <div><i class="fal fa-question-circle"></i> <span class="iml-10">TIP</span></div>
                                        <div style="line-height:1.8;">해당 자재 썸네일을 클릭하시면 시뮬레이션 이미지를 바로 확인하실 수 있습니다.</div>
                                    </div>
                                </div>

                                <div class="scene-div im-x-2">
                                    <div class="title" style='padding-top:10px;'>현장 조건</div>

                                    <div class="estimate-radio">
										<label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="veranda" value="없음"/></label>
										<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="veranda" value="있음"/></label>
            							<div class="clear"></div>
                                    </div>

                                    <div class="title" style='padding-top:0px;'>공급면적(평)</div>
                                    <div class="estimate-radio">
                                    	<label class="w-12-6 fl"><span>29-32평</span><input type="radio" name="pyung" value="29-32평"/></label>
                                    	<label class="w-12-6 fl"><span>45-48평</span><input type="radio" name="pyung" value="45-48평"/></label>
            							<div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>

							<style>
							.area-choose-wallpaper { }
							.area-choose-wallpaper li{display: inline-block; width:30%; margin-right:1%;}

							.mobile .material-group{ float:left; width:50%;}
							.mobile #section-estimate .estimate-group .material-group .title{ padding-top:0px;}
							</style>

            				<div class="w-12-4 fl">
                                <div class="im-x-2">

                                    <div class="material-group">
										<div class="title">벽지선택(기본)</div>
										<ul class="area-choose-wallpaper" id="simulation-wall-chooser">
											<li><img src="/assets/images/floorpaper/choose-best01.jpg"/></li>
											<li><img src="/assets/images/floorpaper/choose-best02.jpg"/></li>
											<li><img src="/assets/images/floorpaper/choose-best03.jpg"/></li>
										</ul>
									</div>

                                    <div class="material-group">
	                                    <div class="title" style='padding-top:0px;'>포인트 벽지선택(옵션)</div>
	                                    <ul class="area-choose-wallpaper" id="simulation-wall-point-chooser">
											<li><img src="/assets/images/floorpaper/choose-best04.jpg"/></li>
											<li><img src="/assets/images/floorpaper/choose-best05.jpg"/></li>
											<li><img src="/assets/images/floorpaper/choose-best06.jpg"/></li>
	                                    </ul>
									</div>

                                    <div class="material-group">
	                                    <div class="title" style='padding-top:0px;'>장판선택</div>
	                                    <ul class="area-choose-wallpaper" id="simulation-floor-chooser">
	                                        <li><img src="/assets/images/floorpaper/choose-best07.jpg"/></li>
	                                        <li><img src="/assets/images/floorpaper/choose-best08.jpg"/></li>
											<li><img src="/assets/images/floorpaper/choose-best09.jpg"/></li>
	                                    </ul>
									</div>
            						<div class="clear"></div>
                                </div>

                            </div>

                            <div class="information w-12-4 fl">
                                <div class="im-x-2" style="padding-bottom:26px;">
                                    <ul class="imb-10 ">
										<li class="information-title">고객 정보</li>
										<li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
										<li><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
										<li><label>시공날짜</label><input type="text" name="c-date" placeholder="2018.02.20" class="datepicker"/></li>
										<li>
											<label>총 견적</label>
											<div>
												<span><b class="estimate-price">??</b> 만원</span> &nbsp;
											</div>
										</li>
                                    </ul>

									<div class="">
										<label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <span style="color:#fff" class="view-terms">(약관보기)</span> <input type="checkbox" name="mach" value="풀기계 있음" class="submit-required" data-label="정보수집 동의"></label>
									</div>
                                </div>
                                <div class="consulting-div">
                                    <button>선택한 조건으로 상담신청하기 ></button>
                                </div>
                            </div>

                            <div class="clear"></div>
                        </div>
            		</form>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
.area-contents .detail-view{display: none;}

.mobile .package .area-contents .border .w-12-8 {width: 66.6%;}
.mobile .package .area-contents .border .w-12-4 img{height: 100px; margin: 0 auto; float: right;}
.mobile .package .item-over .image-div img {width: 100%;}
</style>

<script>
	$(function(){
		$( ".area-contents .item-over" ).click(function(){
			var child = $( "<img/>" ).attr( "src", $(this).find('.detail-view img').attr( "src" ) );
			popup( child, function(){ });
		});
	})
</script>

<script>
$(window).resize(function(){

	_t_h_1 = $("#section-select-basic .point .text-div").height();
	_t_h_2 = $("#section-select-option .point .text-div").height();
	_t_h_3 = $("#section-select-floorpaper .point .text-div").height();

	if($('body').hasClass('tablet') && $('body').hasClass('mobile')){
		$( ".package .border" ).height( 'auto');
		$( ".package .border" ).css('min-height', 'auto');
	} else {
		$( "#section-select-basic .border" ).height( _t_h_1);
		$( "#section-select-option .border" ).height( _t_h_2);
		$( "#section-select-floorpaper .border" ).height( _t_h_3);
	}

});

</script>


<div id="section-select-basic" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">벽지 선택(기본)</div>
                <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 벽지 best 3를 특가 상품으로 소개드립니다.<br /> 본 제품은 광폭합지 기준입니다.</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
        </div>
        <div class="area-contents">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floorpaper/basic01-detail-view.jpg"/>
						</div>
						<div class="image-div">
							<img src="/assets/images/floorpaper/basic01.jpg"/>
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
                                <p class="primary">A. 45148-3 디알로 연그레이</p>
                                <p class="secondary gray">밝고 편안한 분위기를 연출하는 세련된 연그레이</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floorpaper/basic01-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floorpaper/basic02-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/basic02.jpg"/>
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
                                <p class="primary">B. 45142-2 레이 연그레이</p>
                                <p class="secondary gray">페인트를 바른듯한 질감의 모던한 연그레이</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floorpaper/basic02-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floorpaper/basic03-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/basic03.jpg"/>
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
                                <p class="primary">C. 45138-2 브렌더 연베이지</p>
                                <p class="secondary gray">공간을 따뜻하게 감싸주는 연한 베이지</p>
                                <p class="gray">*펄이 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floorpaper/basic03-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>

<style>
#section-select-option .area-contents .border{min-height: 117px;}
</style>



<div id="section-select-option" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">포인트 벽지 선택(옵션)</div>
                <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 포인트벽지 best 3를 특가 상품으로 소개드립니다.<br /> 본 제품은 광폭합지 기준이니 구매 전 확인 부탁드립니다.</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
        </div>
        <div class="area-contents imb-50">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floorpaper/option01-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/option01.jpg"/>
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
                                <p class="primary">A. 45149-5  맬리사 진블루</p>
                                <p class="secondary gray">모던하면서도 세련된 진한 블루계열의 그레이</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floorpaper/option01-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floorpaper/option02-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/option02.jpg"/>
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
                                <p class="primary">B. 45119-3 클레오</p>
                                <p class="secondary gray">어느 공간이든 어울리는 톤 다운된 민트</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floorpaper/option02-detail.jpg"/>
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
						<div class="detail-view">
							<img src="/assets/images/floorpaper/option03-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/option03.jpg"/>
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
                                <p class="primary">C. 45166-5</p>
                                <p class="secondary gray">공간을 은은하면서도 화려하게 만들어줄 연보라</p>
                                <p class="gray">*펄이 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floorpaper/option03-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <style>
        .area-qna {background: #666666;opacity: 0.9; color: #fff; padding:50px 40px; position: relative;}
        .area-qna .image-div{position: absolute;top: 25px}
        .mobile .area-qna .image-div{top:55px;}
        .area-qna .gray{color:#cdcdcd}
        .area-qna .text-div{margin-left: 200px;}
        .area-qna .text-div .primary{font-size: 1.2em; margin-bottom: 10px;}
        .area-qna .text-div .secondary{line-height: 1.8;}
        </style>
        <div class="area-qna">
            <div>
                <div class="image-div">
                    <img src="/assets/images/wallpaper/option-qna.png"/>
                </div>
                <div class="text-div">
                    <p class="primary">Q. 천장도 시공하나요?</p>
                    <p class="secondary gray">네. 천장도 패키지 상품에 포함됩니다. 천장은 천장지 39034-1(합지)로 시공됩니다.<br />*아주 미세한 펄 입자가 있는 제품입니다.</p>
                </div>
            </div>

        </div>

    </div>
</div>


<style>
#section-select-floorpaper {background: #f4f4f4}
#section-select-floorpaper .area-contents .border{min-height: 67px;}
</style>

<div id="section-select-floorpaper" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">장판선택</div>
                <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 장판best 3를 특가 상품으로 소개드립니다.<br />본제품의 장판 두께는 1.8mm기준입니다.</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
        </div>
        <div class="area-contents imb-50">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floorpaper/floorpaper01-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/floorpaper01.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border">
                        <div class="text-div">
                            <p class="primary">A. CM21351</p>
                            <p class="secondary gray">어떠한 공간이든 잘 어울리는 인기만점의 라이트브라운</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floorpaper/floorpaper02-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/floorpaper02.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border point">
                        <div class="text-div">
                            <p class="primary">B. CM20051</p>
                            <p class="secondary gray">심심한 공간에 개성을 더하는 트렌디한 베이지 헤링본</p>
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
						<div class="detail-view">
							<img src="/assets/images/floorpaper/floorpaper03-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floorpaper/floorpaper03.jpg"/>
						</div>
                        <div class="more">
                            <div class="more-div">
                                <img src="/assets/images/common/more.png"/>
                                <p>상품 더보기</p>
                            </div>
                        </div>
                    </div>
                    <div class="border">
                        <div class="text-div">
                            <p class="primary">C. CM21881</p>
                            <p class="secondary gray">공간을 부드럽고 따뜻하게 연출해주는 다크 브라운</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="area-qna">
            <div class="">
                <div class="image-div">
                    <img style="margin-bottom:15px;" src="/assets/images/wallpaper/floorpaper-qna01.png"/>
                    <img src="/assets/images/wallpaper/floorpaper-qna02.png"/>
                </div>
                <div class="text-div imb-30">
                    <p class="primary">Q. 걸레받이(굽도리)를 추가하고 싶으면 어떻게 해야하나요?</p>
                    <p class="secondary gray">거실: 굽도리 시공(백색)<br />
거실에 현재 걸레받이가 없을 시, 백색 굽도리로 마감 처리 합니다.</p>
                </div>
                <div class="text-div imb-30">
                    <p class="secondary gray">방: 장판을 꺾어 올리는 시공<br />
장판으로 마감처리 되므로 굽도리가 필요 없습니다.</p>
                </div>
                <div class="text-div imb-30">
                    <p class="secondary gray">*방에도 굽도리 시공을 원하실 경우, 현장에서 추가 기능하며<br />
약 2~4만원의 추가 금액이 발생합니다.</p>
                </div>
            </div>

        </div>

    </div>
</div>








<style>
#section-procedure ul .arrow{position: absolute;right: -15px;top: 55px;}
#section-procedure ul li img{margin:0 auto; max-width: 130px;}
#section-procedure ul li.arrow img{max-width:15px;}
#section-procedure ul li{line-height: 1.8;text-align: center;}
.mobile #section-procedure .w-12-3 {width: 50%;}
.mobile #section-procedure ul li.arrow img{display: none;}
</style>

<div id="section-procedure" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">시공절차</div>
            <div class="section-sub-explain imb-50">기획전 페이지를 통해, 아래 순서대로 시공이 진행 됩니다.</div>
        </div>
            <div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li><img src="/assets/images/wallpaper/procedure01.png"/></li>
                        <li class="orange imb-10">상품 선택</li>
                        <li class="gray">원하시는 제품을 선택하신 후 ‘상담신청하기’를 진행해주세요.</li>
                    </ul>
                </div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li><img src="/assets/images/wallpaper/procedure02.png"/></li>
                        <li class="orange imb-10">계약확인</li>
                        <li class="gray">시공일과 반장님 배정 등 해피콜을 통해 계약 사항을 확인 합니다.</li>
                    </ul>
                </div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li class="arrow"><img src="/assets/images/common/arrow-right.png"/></li>
                        <li><img src="/assets/images/wallpaper/procedure03.png"/></li>
                        <li class="orange imb-10">예약금 입금</li>
                        <li class="gray">예약금 금액은 문자로 안내드립니다.</li>
                    </ul>
                </div>
                <div class="w-12-3 fl imb-20">
                    <ul class="im-x">
                        <li><img src="/assets/images/wallpaper/procedure04.png"/></li>
                        <li class="orange imb-10">시공 진행</li>
                        <li class="gray">계약 사항대로 시공이 진행됩니다.</li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
    </div>
</div>

<style>
#section-notice {background: #f4f4f4;}
#section-notice ul {height: 100px}
#section-notice ul li{line-height: 1.5;}
.mobile #section-notice ul {padding-bottom: 30px; height: auto}
</style>

<div id="section-notice" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">유의사항</div>
            <div class="section-sub-explain imb-50">신청하시기 전에 아래 유의 사항을 꼭 확인해주세요!</div>
        </div>
        <div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">견적기준</li>
                    <li class="gray"><b>공급면적, 베란다 확장 없음</b>(확장된 경우 전화문의), <b>시공 당일 빈집 기준</b> 입니다. 그 외의 다른 환경 조건일 경우 견적 금액이 변동 될 수 있습니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">시공제품</li>
                    <li class="gray">본 이벤트는 <b>지정된 마감재를 사용하시는 경우에만 시공이 가능</b>합니다. 상기 조건 이외의 마감재를 시공하기 원하시는 경우 고객센터로 연락바랍니다.</li>
                </ul>
            </div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">시공지역</li>
                    <li class="gray"><b>대전,세종</b> 지역만 시공하고 있습니다.<br />타 지역 고객님들의 너그러운 양해 부탁드립니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">시공기간</li>
                    <li class="gray"><b>1~2일 소요</b>됩니다.<br />현장 조건에 따라 기간이 변동 될 수 있습니다.</li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>

<style>
#section-refund ul{height: 190px}
#section-refund ul li{line-height: 1.5;}
#section-refund ul li:first-child{margin-bottom: 10px;}
.mobile #section-refund ul{height: auto; padding-bottom: 30px; }
</style>

<div id="section-refund" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">환불규정</div>
            <div class="section-sub-explain imb-50">신청하시기 전에 아래 환불 규정을 꼭 확인해주세요!</div>
        </div>

        <div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">예약 확정</li>
                    <li class="gray">1. 계약금 입금 순서대로 예약이 확정됩니다.</li>
                    <li class="gray">2. 계약금 입금 확인 전에는 예약이 확정된 것이 아닙니다.</li>
					<li class="gray">3. 정해진 기한 내에 입금이 되지 않는 경우 예약은 자동 취소됩니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">일정 취소 및 계약금 환불</li>
                    <li class="gray imb-10">고객의 개인적인 사유로 인한 일정 취소는 아래 명시된 기준에 따라 계약금의 일부 혹은 전액을 환불해 드립니다</li>
                    <li>- 계약금 전액 환불 (100%) :시공일 기준 14일 이전 취소건</li>
                    <li>- 계약금 반액 환불 (50%) :시공일 기준 7일 이전 취소건</li>
                    <li>- 계약금 환불 불가 : 시공일 기준 6일 이전 취소건 </li>
                </ul>
            </div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">일정 변경</li>
                    <li class="gray">1. 일정 변경은 시공예정일 기준 7일 이전까지 가능합니다.</li>
                    <li class="gray">2. 일정 변경이 가능한 경우 즉시 일정을 변경해 드립니다.</li>
                    <li class="gray">3. 예약이 가득 찬 경우 원하시는 일정으로 변경이  불가 할 수 있습니다.</li>
                    <li class="gray">4. 일정 변경이 불가한 사유로 인한 시공 취소는 계약금 환불이 불가합니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">시공이 불가할 경우의 환불</li>
                    <li class="gray">1. 현장 조건이 상담한 내용과 다를 경우 견적 금액이 변동 될 수 있습니다.</li>
                    <li class="gray">2. 시공이 불가능 하다고 판단될 경우 시공이 취소 될 수 있으며 이 경우 계약금 환불이 불가합니다.</li>
					<li class="gray">3. 천재지변의 사유로 인해 시공이 취소된 경우 계약금 전액을 환불해 드립니다.</li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>


    </div>
</div>
