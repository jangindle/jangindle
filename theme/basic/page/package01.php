<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-package01' );
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
			<li>올 화이트 패키지</li>
		</ul>
	</div>
</div>

<style>

#section-estimate .title-div{color: #000;}

.title-div{margin-bottom: 20px;}
.explain-div{text-align: center;}
.explain-div p:first-child{font-size:1.2em;}

#section-about .item-div img{margin: 0 auto;}
#section-about .item-div .circle-div{position: relative;}
#section-about .item-div .circle-div .txt{position: absolute; width: 100%; text-align: center;top:50%;font-size: 1.2em;margin-top: -60px;}
#section-about .item-div .circle-div .txt .orange{font-size: 1.5em;}
#section-about .item-div .circle-div .txt div:last-child{line-height: 25px;}

.detail {height: 320px; overflow: hidden; margin-bottom: 40px; cursor: pointer;}
.detail .main-image{overflow: hidden;height: 320px; background-size: cover;background-position: right;}
.detail .w-12-4 .right{overflow: hidden;height:287px;padding:30px 10px 0px;}
.detail .w-12-4 .right > p:first-child{font-size: 1.2em; line-height: 1.5;}
.detail .right > .gray{line-height: 20px;}
.detail .right .detail-image{position: relative; background-size: cover; background-position: center; height: 113px; }
.detail .right .detail-image p {text-align: right; position:absolute; right: 10px;bottom: 5px;}
.price-zone {background: #f4f4f4; padding:50px 0;}
.price-zone img{display: inline; width: 18px;}
.price-zone .orange{font-size: 1.2em;}

#section-silk .detail .silk01{background-image: url('/assets/images/wallpaper/event-silk01.jpg');}
#section-silk .detail .silk02{background-image: url('/assets/images/wallpaper/event-silk02.jpg');}
#section-silk .detail .right .detail01{background-image: url('/assets/images/wallpaper/event-silk01-detail.jpg');}
#section-silk .detail .right .detail02{background-image: url('/assets/images/wallpaper/event-silk02-detail.jpg');}

.mobile #section-estimate .w-12-8{width: 100%;}
.mobile .price-zone .w-12-4{text-align: center; width: 50%;}
.mobile .detail .w-12-4{width:33.33%;}
.mobile .detail .right .imb-50 {margin-bottom: 20px;}
.mobile .detail .detail-image p{right:14px;}
.lh-25{line-height: 25px;}

.information .estimate-select ul li{ margin-top:0px; border-bottom:0px; }
.mobile #section-estimate .estimate-group .fl.w-12-4.information{ margin-top:0px;}

#package-estimate-wrapper{height: 490px;}
#package-estimate-wrapper .carousel .dots {text-align: center;}
.mobile  #package-estimate-wrapper{height: 450px;}
.mobile  #package-estimate-wrapper .carousel .dots {bottom:0px;}
</style>

<script>
	$(function(){


		var introduceSlider = new SCarousel( "#package-estimate-wrapper .package-slider", {
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


<div id="section-estimate" class="section">
    <div class="row">
        <div class="im-x">
			<div class="title-div imb-30">
	            <div class="section-main-title">ALL WHITE 도배 패키지</div>
	            <div class="section-sub-title">깔끔한 그대를 위한 화이트 벽지</div>
			</div>
			<div class="explain-div gray imb-50">
                <p>화이트 벽지는 시각적으로 공간을 넓어 보이게 하는 효과가 있으며 어떠한 색상의 가구와도 조화를 이룹니다.</p>
            </div>


			<?php

				$estimate_data_white = array(
					'20' => array( 91, 61 ),
					'24' => array( 110, 65 ),
					'28' => array( 119, 79 ),
					'32' => array( 147, 84 ),
					'36' => array( 156, 98 ),
					'40' => array( 165, 102 )
				);

			?>
			<script>
				$(function(){

					$( "#estimate-package-white-form [name=option-pyeong], #estimate-package-white-form [name=option-type]" ).blur(function(){

						_p = $('#estimate-package-white-form [name=option-pyeong]').val();
						_t = $('#estimate-package-white-form [name=option-type]').val();


						if( _p == "" || _t == "" ) {
							$( '#estimate-package-white-form .estimate-price:eq(0)' ).text("??");

							return;
						}

						_o = $('#estimate-package-white-form select option[value='+_p+']' );


						_prices = _o.data( 'prices' );
						//console.log(_prices);
						if( _t == '실크' )
						{
							$( '#estimate-package-white-form .estimate-price:eq(0)' ).text( _prices[0] );
							$('#estimate-package-white-form input[name=price]').val( _prices[0] );
						}else{
							$( '#estimate-package-white-form .estimate-price:eq(0)' ).text( _prices[1] );
							$('#estimate-package-white-form input[name=price]').val( _prices[1] );
						}

					});

				});
			</script>

			<form method="post" id="estimate-package-white-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); $( '#estimate-package-white-form .information input[type=text]' ).val('');  } } );">
			<input type="hidden" name="option-area" value="" />
			<input type="hidden" name="type" value="도배-화이트패키지"/>
            <input type='hidden' name="price" value=""/>


				<div class="estimate-group">
					<!-- <div class="w-12-8 fl" style="height:490px;background-image:url(/assets/images/wallpaper/white-wallpaper.jpg);background-size:cover;">
					</div> -->

					<div id="package-estimate-wrapper"  class="w-12-8 fl">
						<div class="package-slider" >
							<ul>
								<li style="background-image:url(/assets/images/wallpaper/slider01.jpg);background-size:cover;background-position:center"></li>
								<li style="background-image:url(/assets/images/wallpaper/slider02.jpg);background-size:cover;background-position:center"></li>
								<li style="background-image:url(/assets/images/wallpaper/slider03.jpg);background-size:cover;background-position:center"></li>
							</ul>
						</div>
	                </div>

					<div class="information w-12-4 fl">
						<div class="im-x-2 ipb-20">

							<div class="scene-div">
								<div class="title">벽지 선택</div>
								<div class="estimate-radio">

									<div class="estimate-select white w-12-6 fl" data-name="option-pyeong">

										<div class="label"><span>공급면적(평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
										<ul><input type="hidden" name="option-pyeong" value="" class="submit-required" data-label="공급면적"/></ul>
										<select>
											<option value="">공급면적</option>
											<?php foreach( $estimate_data_white as $k => $v ){ ?>
											<option value="<?php echo $k;?>평" data-prices='<?php echo json_encode( $v );?>'><?php echo $k;?>평</option>
											<?php }?>
										</select>

									</div>

									<div class="estimate-select w-12-6 fr" data-name="option-type">

										<div class="label"><span>벽지선택 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
										<ul><input type="hidden" name="option-type" value="" class="submit-required" data-label="벽지선택" /></ul>
										<select>
											<option value="">벽지선택</option>
											<option value="실크">실크</option>
											<option value="합지">합지</option>
										</select>
									</div>





									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
							<ul class="imb-10">

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

<style>
#section-about .item-div img{ width:90%; margin:0 auto 30px;}
.mobile #section-about .w-12-4{ width: 50%;  }
.mobile #section-about .w-12-4.last{ float:none; margin:0 auto; clear:both; }
</style>
<div id="section-about" class="section">
    <div class="row">
        <div class="im-x">
            <div class="section-main-title imb-50">ALL WHITE 도배란?</div>
            <div class="item-div">
                <div class="w-12-4 fl circle-div">
                    <img src="/assets/images/wallpaper/circle01.png"/>
                    <div class="txt">
                        <div class="orange">BEST SELLER</div>
                        <div>넓고 화사한 효과로<br /> 꾸준한 인기</div>
                    </div>
                </div>
                <div class="w-12-4 fl circle-div">
                    <img src="/assets/images/wallpaper/circle02.png"/>
                    <div class="txt">
                        <div class="orange">BEST CHOICE</div>
                        <div>남녀 노소 구분 없이<br />  큰 사랑을 받는 컬러</div>
                    </div>
                </div>
                <div class="w-12-4 fl circle-div last">
                    <img src="/assets/images/wallpaper/circle03.png"/>
                    <div class="txt">
                        <div class="orange">BEST SIMPLE</div>
                        <div>어떠한 인테리어와도<br />  조화로운 심플한 벽지</div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="explain-div imb-80">
                    <p class="gray lh-25">
                        ALL WHITE도배 패키지는 아래벽지로 진행이 됩니다.<br />
                        꼼꼼히 비교해 보시고 선택해주세요.
                    </p>
                </div>
			</div>
		</div>
	</div>
</div>

<style>
.mobile #section-silk .w-12-8 {width: 66.6%}
.detail .detail-view{display: none;}
</style>


<div id="section-silk" class="section">
    <div class="row">
        <div class="im-x">
			<div class="title-div imb-30">
				<div class="section-main-title">실크벽지</div>
				<div class="section-sub-title">화이트 65000-1/65000-2</div>
			</div>
			<div class="explain-div imb-30 gray">
				<p>가장 많이 팔린 벽지를 특별한 가격에 모십니다.</p>
				<div class="">*모니터에 따른 색상차이가 있을 수 있습니다.</div>
			</div>

			<div class="detail">
				<div class="w-12-8 fl main-image silk01"></div>
				<div class="detail-view"><img src="/assets/images/wallpaper/silk01-view.jpg"></div>
				<div class="w-12-4 fl">
					<div class="iml-10 border ip-30 right">
						<p>65000-1(펄 있음)</p>
						<p class="gray imb-50">사진에 보이는 입자는 빛에 반사되어 보이는 입자로 무늬, 색상이 아닙니다.</p>
						<div class="detail-image detail01">
							<p class="gray">디테일 이미지</p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="detail">
				<div class="w-12-8 fl main-image silk02"></div>
				<div class="detail-view"><img src="/assets/images/wallpaper/silk02-view.jpg"></div>
				<div class="w-12-4 fl">
					<div class="iml-10 border ip-30 right">
						<p>65000-2(펄 없음)</p>
						<p class="gray imb-50">사진에 보이는 입자는 빛에 반사되어 보이는 입자로 무늬, 색상이 아닙니다.</p>
						<div class="detail-image detail02">
							<p class="gray">디테일 이미지</p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="price-zone imb-80">
				<div class="row_narrow">
					<ul class="im-x">
						<li class="w-12-4 fl">
							<span>실크지 20평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">94만원</strike>
							<span class="orange">91만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>실크지 24평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">112만원</strike>
							<span class="orange">110만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>실크지 28평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">121만원</strike>
							<span class="orange">119만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>실크지 32평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">150만원</strike>
							<span class="orange">147만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>실크지 36평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">158만원</strike>
							<span class="orange">156만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>실크지 40평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">167만원</strike>
							<span class="orange">165만원</span>
						</li>
						<div class="clear"></div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<style>
.mobile #section-lumber .w-12-8 {width: 66.6%}
#section-lumber .detail .lumber01{background-image: url('/assets/images/wallpaper/event-lumber01.jpg');}
#section-lumber .detail .lumber02{background-image: url('/assets/images/wallpaper/event-lumber02.jpg');}
#section-lumber .detail .right .detail03{background-image: url('/assets/images/wallpaper/event-lumber01-detail.jpg');}
#section-lumber .detail .right .detail04{background-image: url('/assets/images/wallpaper/event-lumber02-detail.jpg');}
</style>

<div id="section-lumber" class="section">
    <div class="row">
        <div class="im-x">
			<div class="title-div imb-30">
				<div class="section-main-title">합지</div>
				<div class="section-sub-title">화이트 45000-1/45119-1</div>
			</div>
			<div class="explain-div imb-30 gray">
				<p>가장 많이 팔린 벽지를 특별한 가격에 모십니다.</p>
				<div class="">*모니터에 따른 색상차이가 있을 수 있습니다.</div>
			</div>

			<div class="detail">
				<div class="w-12-8 fl main-image lumber01"></div>
				<div class="detail-view"><img src="/assets/images/wallpaper/lumber01-view.jpg"></div>
				<div class="w-12-4 fl">
					<div class="iml-10 border ip-30 right">
						<p>45000-1(펄 있음)</p>
						<p class="gray imb-50">사진에 보이는 입자는 빛에 반사되어 보이는 입자로 무늬, 색상이 아닙니다.</p>
						<div class="detail-image detail03">
							<p class="gray">디테일 이미지</p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="detail">
				<div class="w-12-8 fl main-image lumber02"></div>
				<div class="detail-view"><img src="/assets/images/wallpaper/lumber02-view.jpg"></div>
				<div class="w-12-4 fl">
					<div class="iml-10 border ip-30 right">
						<p>45119-1(펄 없음)</p>
						<p class="gray imb-50">사진에 보이는 입자는 빛에 반사되어 보이는 입자로 무늬, 색상이 아닙니다.</p>
						<div class="detail-image detail04">
							<p class="gray">디테일 이미지</p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="price-zone imb-30">
				<div class="row_narrow">
					<ul class="im-x">
						<li class="w-12-4 fl">
							<span>합지 20평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">62만원</strike>
							<span class="orange">61만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>합지 24평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">66만원</strike>
							<span class="orange">65만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>합지 28평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">80만원</strike>
							<span class="orange">79만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>합지 32평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">85만원</strike>
							<span class="orange">84만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>합지 36평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">99만원</strike>
							<span class="orange">98만원</span>
						</li>
						<li class="w-12-4 fl">
							<span>합지 40평</span>
							<img src="/assets/images/wallpaper/won.png"/>
							<strike class="gray">103만원</strike>
							<span class="orange">102만원</span>
						</li>
						<div class="clear"></div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
#section-qna{background: #fff9f3}
#section-qna img{margin: 0 auto}
#section-qna .item-div{position: relative;}
#section-qna .item-div .orange{font-size:1.2em; margin-bottom: 10px;}
#section-qna .item-div .w-12-8 ul {padding-top: 42px;margin-left: 60px;}
#section-qna .item-div ul li{line-height: 20px}
.mobile #section-qna .item-div .w-12-8{width: 100%;}
.mobile #section-qna .item-div .w-12-8 ul {margin-left: 10px;}
</style>
<div id="section-qna" class="section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="section-main-title">Q&A</div>
            <div class="section-sub-explain imb-50">자주 묻는 질문을 알려드립니다.</div>
        </div>
        <div class="item-div imb-50">
            <ul class="w-12-4 fl">
                <li><img src="/assets/images/wallpaper/qna01.png" /></li>
            </ul>
            <div class="w-12-8 fl">
                <ul class="im-x">
                    <li class="orange">Q.합지와 실크는 뭐가 다른가요?</li>
                    <li class="gray">같은 색상이지만 이건 합지? 실크? 무엇이 더 좋을까요?
                    눈으로 보이는 확연한 차이는 이음새입니다. 합지는 겹침시공으로 이음새가 육안으로 보이고, 실크는 맞댐 시공으로 이음새가 보이지 않습니다. 더 자세한 설명은 도배 시공 가이드를 참고하세요.
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>

        <div class="item-div imb-50">
            <ul class="w-12-4 fl">
                <li><img src="/assets/images/wallpaper/qna02.png" /></li>
            </ul>
            <div class="w-12-8 fl">
                <ul class="im-x">
                    <li class="orange">Q.천장도 시공하나요?</li>
                    <li class="gray">네.물론이죠. 천장도 패키지 상품에 포함 됩니다.
                        천장은 선택하신 화이트 제품으로 동일하게 시공됩니다.
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
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
#section-notice {background: url(/assets/images/motif/patter-gray-bias.png);}
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
                    <li class="gray">본 이벤트는 <b>지정된 마감재를 사용하시는 경우에만 시공이 가능</b>합니다. 상기 조건 이외의 마감재를 시공하기 원하시는 경우 고객센터로 연락바랍</li>
                </ul>
            </div>
            <div class="w-12-6 fl">
                <ul class="im-x">
                    <li class="orange">시공지역</li>
                    <li class="gray">장인들은 <b>대전,세종</b> 지역만 시공하고 있습니다.<br />타 지역 고객님들의 너그러운 양해 부탁드립니다.</li>
                </ul>
				<ul class="im-x">
                    <li class="orange">시공지역</li>
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
                    <li class="orange">예약 확정</li>
                    <li class="gray">1. 계약금 입금 순서대로 예약이 확정됩니다.</li>
                    <li class="gray">2. 계약금 입금전에는 예약이 확정 된 것이 아닙니다.</li>
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


<script>
$(function(){
	$( ".detail" ).click(function(){
		var child = $( "<img/>" ).attr( "src", $(this).find('.detail-view img').attr( "src" ) );
		popup( child, function(){ });
	});
})

</script>
