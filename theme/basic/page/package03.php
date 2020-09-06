<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-package03' );
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
			<li><a>마루</a></li> >
			<li>도배+마루 패키지</li>
		</ul>
	</div>
</div>

<style>
#section-intro ul {text-align: center;}
#section-intro ul li{display: inline-block;border: 1px solid #000;padding: 0 10px;margin:0 5px;}
#section-intro ul li span{ color: #ff8d27; font-weight: bold;; }
.underline-full {border-bottom: 1px solid #dadada}

#section-estimate .title-div{color: #000;}
.title-div{margin-bottom: 20px;}
.explain-div{text-align: center;}
.explain-div p:first-child{font-size:1.2em;}

#section-about .item-div img{margin: 0 auto;}
#section-about .item-div .circle-div{position: relative;}
#section-about .item-div .circle-div .txt{position: absolute; width: 100%; text-align: center;top:50%;font-size: 1.2em;margin-top: -60px;}
#section-about .item-div .circle-div .txt .orange{font-size: 1.5em;}
#section-about .item-div .circle-div .txt div:last-child{line-height: 25px;}

.detail {height: 416px; overflow: hidden; margin-bottom: 40px;}
.detail .main-image{overflow: hidden;height: 416px; background-size: cover;background-position: center;}
.detail .w-12-4 .right{overflow: hidden;height:383px;padding:30px 10px 0px}
.detail .w-12-4 .right > .title{font-size: 1.2em;}
.detail .right > .gray{line-height: 20px;}
.detail .right .detail-image{position: relative; background-size: cover; background-position: center; height: 50px; }
.detail .right .detail-image p {text-align: right; position:absolute; right: 10px;bottom: 5px;}
.price-zone {background: #f4f4f4; padding:50px 0;}
.price-zone img{display: inline; width: 18px;}
.price-zone .orange{font-size: 1.2em;}

.mobile #section-estimate .w-12-8{width: 100%;}
.mobile .price-zone .w-12-4{width:50%;}
.mobile .detail .w-12-4{width:33.33%;}
.mobile .detail .right .imb-50 {margin-bottom: 20px;}
.mobile .detail .detail-image p{right:14px;}
.lh-25{line-height: 25px;}

</style>

<div id="section-intro" class="section">
    <div class="row">
        <div class="im-x">
            <div class="title-div">
                <div class="section-main-title">도배+마루 패키지</div>
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

<div id="section-best" class="section package">
    <div class="row">
        <div class="im-x">
            <div class="area-text imb-50">
                <div class="section-main-title">BEST SELLER</div>
                <div class="section-sub-explain gray">하단의 자재(벽지,마루)이미지를 선택해서 원하는 인테리어를 완성해보세요</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
            <div class="area-best">

              	<style>

					#simulation-wall{ display: none; position:absolute; top:0px; left:0p;x}
					#simulation-point-wall{ display: none; position:absolute; top:0px; left:0p;x}
					#simulation-floor{ display: none; position:absolute; top:0px; left:0p;x}

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

							$( "#simulation-wall" ).attr( 'src', '/assets/images/package03/simulation-m-0' + ( _idx + 1 ) +'.png' );
							$( "#simulation-wall").fadeIn();

							$('#estimate-pacakge-form input[name=wall]').val(  '일반벽지' + '' + ( _idx + 1 ) );
						})

						$( '#simulation-floor-chooser img' ).click(function(){

							$( '#simulation-floor-chooser img.choose' ).removeClass( 'choose' );
							_idx = $( '#simulation-floor-chooser img' ).index( $(this) );
							$(this).addClass('choose');

							$( "#simulation-floor" ).attr( 'src', '/assets/images/package03/simulation-f-0' + ( _idx + 1 ) +'.png' );
							$( "#simulation-floor").fadeIn();

							$('#estimate-pacakge-form input[name=floor]').val(  '마루 ' + '' + ( _idx + 1 ) );
						})


						$( '#simulation-wall-point-chooser img' ).click(function(){

							if($(this).hasClass('choose')){

								$(this).removeClass( 'choose' );
								$( "#simulation-point-wall").fadeOut();

							} else {

								$( '#simulation-wall-point-chooser img.choose' ).removeClass( 'choose' );
								_idx = $( '#simulation-wall-point-chooser img' ).index( $(this) );

								$(this).addClass('choose');

								$( "#simulation-point-wall" ).attr( 'src', '/assets/images/package03/simulation-s-0' + ( _idx + 1 ) +'.png' );
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
               		<img src='/assets/images/package03/simulation-bg.png'/>
               	</div>
            </div>




			<script>
				$(function(){

					$( "#estimate-pacakge-form [name=pyung], #estimate-pacakge-form [name=veranda]" ).blur(function(){

						_p = $('#estimate-pacakge-form [name=pyung]:checked').val();
						_v = $('#estimate-pacakge-form [name=veranda]:checked').val();

						if( _p == "29-32평" && _v=="없음")
						{
							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("290");
							$('#estimate-pacakge-form input[name=price]').val( '290' );
						} else if ( _p == "45-48평" && _v=="없음" ){

							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("462");
							$('#estimate-pacakge-form input[name=price]').val( '462' );
						} else if ( _p == "29-32평" && _v=="있음" ){
							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("340");
							$('#estimate-pacakge-form input[name=price]').val( '340' );
						} else if ( _p == "45-48평" && _v=="있음" ){
							$( '#estimate-pacakge-form .estimate-price:eq(0)' ).text("524");
							$('#estimate-pacakge-form input[name=price]').val( '524' );
						}

					});

					$( "#estimate-pacakge-form [name=pyung]:first" ).click();

				});
			</script>
            <div id=section-estimate class="wrapper">
            	<div class="row">

						<form method="post" id="estimate-pacakge-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); $( '#estimate-pacakge-form .information input[type=text]' ).val('');  } } );">
						<input type="hidden" name="option-area" value="" />
						<input type="hidden" name="type" value="마루-도배+마루 패키지"/>
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
											<li><img src="/assets/images/floor/choose-best01.jpg"/></li>
											<li><img src="/assets/images/floor/choose-best02.jpg"/></li>
											<li><img src="/assets/images/floor/choose-best03.jpg"/></li>
										</ul>
									</div>

                                    <div class="material-group">
                                    <div class="title" style='padding-top:0px;'>포인트 벽지선택(옵션)</div>
                                    <ul class="area-choose-wallpaper" id="simulation-wall-point-chooser">
                                        <li><img src="/assets/images/floor/choose-best04.jpg"/></li>
                                        <li><img src="/assets/images/floor/choose-best05.jpg"/></li>
                                        <li><img src="/assets/images/floor/choose-best06.jpg"/></li>
                                    </ul>
									</div>

                                    <div class="material-group">
                                    <div class="title" style='padding-top:0px;'>마루선택</div>
                                    <ul class="area-choose-wallpaper" id="simulation-floor-chooser">
                                        <li><img src="/assets/images/floor/choose-best07.jpg" style="max-height:74px"/></li>
                                        <li><img src="/assets/images/floor/choose-best08.jpg" style="max-height:74px"/></li>
										<li><img src="/assets/images/floor/choose-best09.jpg" style="max-height:74px"/></li>
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
.area-contents .detail-view{display: none;}
</style>

<style>
#section-select-basic .area-contents .border{min-height:120px;}
.mobile .package .item-over .image-div img {width: 100%;}
.mobile .package .item-over .border img {width: 100%;}
.mobile .package .w-12-8{width: 66.6%;}
.mobile .package .area-contents .border .w-12-4 img{height: 100px; float: right;}
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
	_t_h_3 = $("#section-select-floor .point .text-div").height();

	if($('body').hasClass('tablet') && $('body').hasClass('mobile')){
		$( ".package .border" ).height( 'auto');
		$( ".package .border" ).css('min-height', 'auto');
	} else {
		$( "#section-select-basic .border" ).height( _t_h_1);
		$( "#section-select-option .border" ).height( _t_h_2);
		$( "#section-select-floor .border" ).height( _t_h_3);
	}

});

</script>



<div id="section-select-basic" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">벽지 선택(기본)</div>
                <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 벽지 best 3를 특가 상품으로 소개드립니다.<br /> 본 제품은 실크 벽지 기준입니다.</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
        </div>
        <div class="area-contents">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/basic01-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floor/basic01.jpg"/>
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
                                <p class="primary">A. 56079-2 긱스 라이트 그레이</p>
                                <p class="secondary gray">모던하면서도 세련된 텍스쳐의 라이트 그레이</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floor/basic01-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/basic02-detail-view.jpg"/>
						</div>
						<div class="image-div">
							<img src="/assets/images/floor/basic02.jpg"/>
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
                                <p class="primary">B. 56089-3 디아망 블루</p>
                                <p class="secondary gray">어떤 공간이든 어울리는 세련된 은은한 블루</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floor/basic02-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/basic03-detail-view.jpg"/>
						</div>
						<div class="image-div">
                        	<img src="/assets/images/floor/basic03.jpg"/>
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
                                <p class="primary">C. 56084-1 에디스 화이트</p>
                                <p class="secondary gray">공간을 환하게 밝혀주면서도 심심하지 않은 화이트 </p>
                                <p class="gray">*펄이 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floor/basic03-detail.jpg"/>
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
#section-select-option .area-contents .border{min-height:110px;}
</style>

<div id="section-select-option" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">포인트 벽지 선택(옵션)</div>
                <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 합지벽지 best 3를 특가 상품으로 소개드립니다.<br /> 본 제품은 실크 벽지 기준이니 구매 전 확인 부탁드립니다.</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
        </div>
        <div class="area-contents imb-50">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/option01-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floor/option01.jpg"/>
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
                                <p class="primary">A. 56061-5 울 네이비</p>
                                <p class="secondary gray">모던한 감성의 세련된 딥 네이비</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floor/option01-detail.jpg"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/option02-detail-view.jpg"/>
						</div>
						<div class="image-div">
							<img src="/assets/images/floor/option02.jpg"/>
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
                                <p class="primary">B. 56108-3</p>
                                <p class="secondary gray">공간에 산뜻함을 더해줄 민트계열의 포인트</p>
                                <p class="gray">*펄이 있는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floor/option02-detail.jpg"/>
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
							<img src="/assets/images/floor/option03-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floor/option03.jpg"/>
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
                                <p class="primary">C. 56092-3</p>
                                <p class="secondary gray">내츄럴한 석재 느낌 그대로의 포인트 벽지</p>
                                <p class="gray">*펄이 없는 제품입니다.</p>
                            </div>
                        </div>

                        <div class="w-12-4 fl">
                            <img src="/assets/images/floor/option03-detail.jpg"/>
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
        .area-qna .text-div .secondary{line-height: 20px;}
        </style>
        <div class="area-qna">
            <div>
                <div class="image-div">
                    <img src="/assets/images/wallpaper/option-qna.png"/>
                </div>
                <div class="text-div">
                    <p class="primary">Q. 천장도 시공하나요?</p>
                    <p class="secondary gray">네. 천장도 패키지 상품에 포함됩니다. 천장은 천장지 54150-2(실크)로 시공됩니다.<br />*아주 미세한 펄 입자가 있는 제품입니다.</p>
                </div>
            </div>

        </div>

    </div>
</div>


<style>
#section-select-floor {background: #f4f4f4}
</style>

<div id="section-select-floor" class="section package">
    <div class="row">
        <div class="area-text imb-50">
            <div class="im-x">
                <div class="section-main-title">마루선택</div>
                <div class="section-sub-explain gray">장인들 고객님들이 가장 많이 시공하셨던 마루 best 3를 특가 상품으로 소개드립니다.<br />본 제품은 강화마루 기준입니다.</div>
                <div class="gray">*아래의 이미지는 이해를 돕기 위한 합성 이미지입니다.</div>
            </div>
        </div>
        <div class="area-contents imb-50">
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/floor01-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floor/floor01.jpg"/>
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
                            <p class="primary">A. 하임 내추럴 오크 2202</p>
                            <p class="secondary gray">한층 내추럴한 디자인의 심플하면서 세련된 느낌의 오크 패턴</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/floor02-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floor/floor02.jpg"/>
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
                            <p class="primary">B. 하임 워시오크 2200</p>
                            <p class="secondary gray">화이트와 밀크 아이보리 칼라로 따뜻하면서 여성스럽게 표현된 패턴</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div class="w-12-4 fl imb-50">
                <div class="im-x">
                    <div class="imb-20 item-over">
						<div class="detail-view">
							<img src="/assets/images/floor/floor03-detail-view.jpg"/>
						</div>
                        <div class="image-div">
							<img src="/assets/images/floor/floor03.jpg"/>
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
                            <p class="primary">C. 밀키 체스트넛 2232</p>
                            <p class="secondary gray">부드럽고 소프트한 체스트넛 그레인에 따뜻함이 느껴지는 패턴</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

		<div class="area-qna">
            <div>
                <div class="image-div">
                    <img src="/assets/images/floor/floor-qna.png"/>
                </div>
                <div class="text-div">
                    <p class="primary">Q. 걸레받이(하바키)를 추가하고 싶으면 추가금액이 발생하나요? </p>
                    <p class="secondary gray">본 패키지는 거실과 방의 거레받이 시공이 포함되어 있는 상품입니다.<br />걸레받이 제품 변경시 추가 금액이 발생할 수 있습니다.</p>
                </div>
            </div>

        </div>

    </div>
</div>


<style>
#section-procedure ul .arrow{position: absolute;right: -15px;top: 55px;}
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
                    <li class="orange">시공기준</li>
                    <li class="gray"><b>해당 공급면적, 베란다 확장 없음, 시공 당일 빈집</b> 기준입니다. 그 외의 다른 환경 조건일 경우 견적 금액이 변동 될 수 있습니다.</li>
                </ul>
                <ul class="im-x">
                    <li class="orange">시공제품</li>
                    <li class="gray">본 이벤트는 <b>지정된 마감재를 사용하시는 경우에만 시공</b>이 가능합니다. 상기 조건 이외의 마감재를 시공하기 원하시는 경우 고객센터로 연락바랍니다.</li>
                </ul>
            </div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">시공지역</li>
                    <li class="gray"><b>장인들은 대전,세종</b> 지역만 시공하고 있습니다.<br />타 지역 고객님들의 너그러운 양해 부탁드립니다.</li>
                </ul>
				<ul class="im-x">
                    <li class="orange">시공기간</li>
                    <li class="gray"><b>1~2일 정도 소요</b>됩니다.<br />현장 조건에 따라 기간이 변동 될 수 있습니다.</li>
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
                    <li class="orange">예약의 확정</li>
                    <li class="gray">1. 계약금 입금 순서대로 예약이 확정됩니다.</li>
                    <li class="gray">2. 계약금 입금 확인 전에는 예약이 확정된 것이 아닙니다.</li>
					<li class="gray">3. 정해진 기한 내에 입금이 되지 않는 경우 예약은 자동 취소됩니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">일정의 취소 및 예약금 환불</li>
                    <li class="gray imb-10">고객의 개인적인 사유로 인한 일정 취소는 아래 명시된 기준에 따라 계약금의 일부 혹은 전액을 환불해 드립니다</li>
                    <li>- 계약금 전액 환불 (100%) :시공일 기준 14일 이전 취소건</li>
                    <li>- 계약금 반액 환불 (50%) :시공일 기준 7일 이전 취소건</li>
                    <li>- 계약금 환불 불가 : 시공일 기준 6일 이전 취소건 </li>
                </ul>
            </div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">일정의 변경</li>
                    <li class="gray">1. 일정 변경은 시공예정일 기준 7일 이전까지 가능합니다.</li>
                    <li class="gray">2. 일정 변경이 가능한 경우 즉시 일정을 변경해 드립니다.</li>
                    <li class="gray">3. 예약이 가득 찬 경우 원하시는 일정으로 변경이 불가 할 수 있습니다.</li>
                    <li class="gray">4. 일정 변경이 불가한 사유로 인한 시공 취소는 계약금 환불이 불가합니다.</li>
                </ul>

                <ul class="im-x">
                    <li class="orange">시공이 불가능한 경우 환불</li>
                    <li class="gray">1. 현장 조건이 상담한 내용과 다를 경우 견적 금액이 변동 될 수 있습니다.</li>
                    <li class="gray">2. 시공이 불가능 하다고 판단될 경우 시공이 취소 될 수 있으며 이 경우 계약금 환불이 불가합니다.</li>
					<li class="gray">3. 천재지변의 사유로 인해 시공이 취소된 경우 계약금 전액을 환불해 드립니다.</li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>


    </div>
</div>
