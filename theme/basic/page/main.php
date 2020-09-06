
<script>
$(function(){

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

 	$( "#estimate-tabs a" ).click(function(){
      	$( 'html, body' ).animate( { scrollTop : 400 }, 400 );
 	});

	$("#customAlert .bottom").click(function() {
		$("#customAlert").addClass("hide");
	});
	$('#customSuccess .bottom').click(function() {
		$("#customSuccess").addClass("hide");
	});
});
</script>

<div id="site-landing" class="wrapper" >
	<div class="landing-slider">
		<ul>
			<?php
// $result_banner_main_slide = get_banner_items( 'slider-main' );
// while($row=sql_fetch_array($result_banner_main_slide)){
for($val = 10; $val < 15; $val++) {
?>
<li class="lading-slider-li-view" >
	<div class="vertical-center" style="background:url(/data/motif/banner/<?php //echo $row['mm_id'];
	echo $val; ?>.jpg); background-size: cover;background-position: center;">
		<div class="container row">
			<div class="contents-div" >
				<div class="section-header">
					<div class="primary"><?php // echo str_replace('|', '<br/>', $row['mm_subject']);
					echo 'description'; ?></div>
					<div class="third"><?php // echo $row['mm_descript'];
					echo 'mm_descript'; ?></div>
				</div>
				<div class="btn-div">
					<a href="<?php // echo $row['mm_writer']
					echo 'mm_writer'; ?>"><?php // echo $row['mm_content']
					echo 'mm_content'; ?></a>
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
           		<a class="fl">도배</a>
           		<a class="fl">장판</a>
           		<a class="fl">마루</a>
			</div>

			<!-- <form id="estimate-wallpaper-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt, username){ if( rt.result == 'success' ){ alert( '' + username + '님 요청되었습니다.' ); reset_estimate(); } } );"> -->
			<form id="estimate-wallpaper-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt, username){ if( rt.result == 'success' ){ $('#customSuccessMsg').text(username + '님 감사합니다.'); $('#customSuccess').removeClass('hide'); reset_estimate(); } } );">
			<input type="hidden" name="type" value="도배"/>
            <input type='hidden' name="price" value=""/>

            <div class="estimate-group">
                <div class="w-12-4 fl">
                    <div class="im-x-2">
                        <div class="title">집 전체 면적</div>

                        <div class="estimate-select white w-12-6 fl" data-name="option-area">


                        	<div class="label"><span>해당지역 <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-area" value="" class="submit-required" data-label="해당지역"/></ul>
                        	<select>
                        		<option value="">해당지역</option>
                                <option value="대전">대전</option>
                                <option value="세종">청주</option>
                        	</select>

                        </div>

                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">

                        	<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-pyeong" value="" class="submit-required" data-label="공급면적" /></ul>
                        	<select>
                        		<option value="">공급면적 (평)</option>
                        		<?php foreach( $esimate_data_wallpaper as $k => $v ){ ?>
                        		<option value="<?php echo $k;?>평" data-prices='<?php echo json_encode( $v );?>'><?php echo $k;?>평</option>
                        		<?php }?>
                        	</select>
                        </div>

                        <div class="clear"> </div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="w-veranda" value="없음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="w-veranda" value="있음"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>천장시공 포함</span><input type="radio" name="w-ceiling" value="포함" checked="checked"/></label>
                        	<label class="w-12-6 fl"><span>천장시공 미포함</span><input type="radio" name="w-ceiling" value="미포함"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>빈집/가구없음</span><input type="radio" name="w-stay" value="빈집/가구없음"/></label>
                            <label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="w-stay" value="거주중/가구있음"/></label>
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
                        	<label class="w-12-6 fl"><span><b class="estimate-price">24</b> 만원 </span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span>합지도배</span><input type="radio" name="w-papering" value="합지도배"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">43</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span style="line-height:20px">거실벽 실크+<br/>천장 및 방합지</span><input type="radio" name="w-papering" value="합지도배"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">74</b> 만원</span></label>
							<div class="clear"></div>
                        </div>

						<div class="clear"></div>

	                    <ul class="add-explain">
	                        <li><i class="fal fa-question-circle"></i> <a href="/?p=wallpaper-contr-guide"  target="_blank">실크 VS 합지 차이가 궁금하세요?</a> </li>
	                        <li><i class="fal fa-check-circle"></i> <a href="/?p=package01"  target="_blank">올 화이트 패키지</a> <!--<img src="/assets/images/main/sale_icon.png" />--> </li>
	                    </ul>
                    </div>


                </div>

                <div class="information w-12-4 fl">
                    <div class="im-x-2">
                        <ul>
                            <li class="information-title">고객 정보</li>
                            <li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
                            <li><label>연락처</label><input type="text" name="tel" placeholder="010-0000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
                            <li><label>시공날짜</label><input type="text" name="c-date" placeholder="2020.02.20" class="datepicker"/></li>
                            <li>
                            	<label>총 견적</label>
                            	<div>
                            		<span><b class="estimate-price">24</b> 만원 <a></a></span> &nbsp;
                            	</div>
                            </li>
                        </ul>

                        <label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <span style="color:#fff" class="view-terms">(약관보기)</span> <input type="checkbox" name="privacy" class="submit-required" data-label="정보수집 동의"></label>
                    </div>
                    <div class="consulting-div">
                        <button>선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
		</form>

		<form id="estimate-floorpaper-form" action="/wallpaper/update_estimate.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); } } );">

        <input type='hidden' name="price" value=""/>
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
                                <option value="대전">대전</option>
                                <option value="세종">세종</option>
                            </select>
                        </div>
                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">

                        	<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-pyeong" value="" class="submit-required" data-label="공급면적" /></ul>
                        	<select>
                        		<option value="">공급면적 (평)</option>
                        		<?php foreach( $esimate_data_floorpaper as $k => $v ){ ?>
                        		<option value="<?php echo $k;?>평" data-prices='<?php echo json_encode( $v );?>'><?php echo $k;?>평</option>
                        		<?php }?>
                        	</select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

						<div class="estimate-radio">
                            <label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="p-veranda" value="없음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="p-veranda" value="있음"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>집 전체 포함</span><input type="radio" name="p-all" value="집 전체 포함"/></label>
                        	<label class="w-12-6 fl"><span>방 만 시공</span><input type="radio" name="p-all" value="방 만 시공"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>빈집/가구없음</span><input type="radio" name="p-stay" value="빈집/가구없음"/></label>
                            <label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="p-stay" value="거주중/가구있음"/></label>
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
                        	<label class="w-12-6 fl"><span><b class="estimate-price">24</b> 만원</span></label>
							<div class="clear"></div>
                        	<label class="w-12-6 fl"><span>장판 두께 2.0MM</span><input type="radio" name="p-floorpaper" value="장판 두께 2.0MM"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">43</b> 만원</span></label>
							<div class="clear"></div>
							<label class="w-12-6 fl"><span>장판 두께 2.3MM</span><input type="radio" name="p-floorpaper" value="장판 두께 2.3MM"/></label>
                        	<label class="w-12-6 fl"><span><b class="estimate-price">74</b> 만원</span></label>
							<div class="clear"></div>
							<label class="w-12-6 fl consulting"><span>더 두꺼운 장판</span><input type="radio" name="p-floorpaper" value="더 두꺼운 장판"/></label>
                        	<label class="w-12-6 fl"><span><b>상담필요</b></span></label>
							<div class="clear"></div>
                        </div>
						<div class="clear"></div>

	                    <ul class="add-explain">
	                        <li>
	                        	<i class="fal fa-question-circle"></i>
	                        	<a href="/?p=floorpaper-contr-guide" target="_blank">장판 두께의 차이가 궁금하세요?</a>
	                        </li>
	                        <li>
	                        	<i class="fal fa-check-circle"></i>
	                        	<a href="/?p=package02" target="_blank">도배+장판 패키지</a>
	                        </li>
	                    </ul>
                    </div>

                </div>

                <div class="information w-12-4 fl">
                    <div class="im-x-2">
                        <ul class="imb-10">
                            <li class="information-title">고객 정보</li>
                            <li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
                            <li><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
                            <li><label>시공날짜</label><input type="text" name="c-date" placeholder="2018.02.20" class="datepicker"/></li>
                            <li>
                            	<label>총 견적</label>
                            	<div>
                            		<span><b class="estimate-price">24</b> 만원 <a></a></span>&nbsp;
                            	</div>
                            </li>
                        </ul>
                        <label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <span style="color:#fff" class="view-terms">(약관보기)</span> <input type="checkbox" name="mach" value="풀기계 있음" class="submit-required" data-label="정보수집 동의"></label>
                    </div>
                    <div class="consulting-div">
                        <button>선택한 조건으로 상담신청하기 ></button>
                    </div>
                </div>

                <div class="clear"></div>

            </div>
		</form>

			<form id="estimate-floor-form" action="./?p=estimate-update" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); } } );">
			<input type='hidden' name="price" value=""/>
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
                                <option value="대전">대전</option>
                                <option value="세종">세종</option>
                            </select>
                        </div>
                        <div class="estimate-select w-12-6 fr" data-name="option-pyeong">

                        	<div class="label"><span>공급면적 (평) <i class="fa fa-angle-down" aria-hidden="true"></i></span></div>
                        	<ul><input type="hidden" name="option-pyeong" value="" class="submit-required" data-label="공급면적" /></ul>
                        	<select>
                        		<option value="">공급면적 (평)</option>
                        		<?php foreach( $esimate_data_floor as $k => $v ){ ?>
                        		<option value="<?php echo $k;?>평" data-prices='<?php echo json_encode( $v );?>'><?php echo $k;?>평</option>
                        		<?php }?>
                        	</select>
                        </div>
                        <div class="clear"> </div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">현장 조건</div>

						<div class="estimate-radio">
                            <label class="w-12-6 fl"><span>배란다 확장 없음</span><input type="radio" name="f-veranda" value="없음"/></label>
                        	<label class="w-12-6 fl"><span>배란다 확장 있음</span><input type="radio" name="f-veranda" value="있음"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span style="line-height:1.45">기존바닥재<br />없음/장판</span><input type="radio" name="f-existing" value="기존바닥재 없음/장판"/></label>
                        	<label class="w-12-6 fl"><span style="line-height:1.45">기존바닥재<br />마루/대리석</span><input type="radio" name="f-existing" value="기존바닥재 마루/대리석"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>빈집/가구없음</span><input type="radio" name="f-stay" value="빈집/가구없음"/></label>
                            <label class="w-12-6 fl"><span>거주중/가구있음</span><input type="radio" name="f-stay" value="거주중/가구있음"/></label>
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
						   <label class="w-12-6 fl"><span><b class="estimate-price">24</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl"><span>강화마루</span><input type="radio" name="f-floor" value="강화마루"/></label>
						   <label class="w-12-6 fl"><span><b class="estimate-price">43</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl"><span>데코타일</span><input type="radio" name="f-floor" value="데코타일"/></label>
						   <label class="w-12-6 fl"><span><b class="estimate-price">74</b> 만원</span></label>
						   <div class="clear"></div>
						   <label class="w-12-6 fl consulting"><span>원목마루</span><input type="radio" name="f-floor" value="원목마루"/></label>
						   <label class="w-12-6 fl"><span><b>상담필요</b></span></label>
						   <div class="clear"></div>
					   </div>
					   <div class="clear"></div>

	                   <ul class="add-explain">
							<li>
								<i class="fal fa-question-circle"></i>
								<a href="/?p=floor-contr-guide" target="_blank">마루 종류의 차이가 궁금하세요?</a>
							</li>
							<li>
                   				<i class="fal fa-check-circle"></i>
                   				<a href="/?p=package03" target="_blank">도배+마루 패키지</a>
                   			</li>
	                   </ul>
				   </div>

                </div>

                <div class="information w-12-4 fl">
                    <div class="im-x-2">
                        <ul class="imb-10">
                            <li class="information-title">고객 정보</li>
                            <li><label>이름</label><input type="text" name="name" placeholder="홍길동" class="submit-required" data-label="고객정보 이름"/></li>
                            <li><label>연락처</label><input type="text" name="tel" placeholder="010-6000-0000" class="submit-required" data-label="고객정보 연락처"/></li>
                            <li><label>시공날짜</label><input type="text" name="c-date"placeholder="2018.02.20" class="datepicker"/></li>
                            <li>
                            	<label>총 견적</label>
                            	<div>
                            		<span><b class="estimate-price">24</b> 만원 <a></a></span>&nbsp;
                            	</div>
                            </li>
                        </ul>
                        <label class="estimate-check fa-radio"><i class="fal fa-check-circle"></i> 정보수집에 동의 <span style="color:#fff" class="view-terms">(약관보기)</span> <input type="checkbox" name="mach" value="풀기계 있음" class="submit-required" data-label="정보수집 동의"></label>
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
</style>


<div id="section-tip" class="section" style="display:none;">
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
#section-construction img{ width:90%; margin: 0 auto; }
#section-construction .w-12-4{ position:relative;}
#section-construction .contents { position:absolute; top:50%; width:100%; text-align: center; margin-top: -45px; ;}
#section-construction .count{ font-size: 4em; line-height: 80px; color: #ff9932; }
.mobile #section-construction .count{ font-size: 3em; }
#section-construction .title{color: #444444; }

.mobile #section-construction .w-12-4{ width: 50%;  }
.mobile #section-construction .w-12-4.last{ float:none; margin:0 auto; clear:both; }
</style>

<script>
$(function(){ $('.count').counterUp({ delay: 10,  time: 700 }); });
</script>

<?php

$sql = "select count(*) as cnt from motif_qna where left(qa_create_time,10) = curdate();";
$today = sql_fetch($sql);

$sql = "select count(*) as cnt from motif_qna";
$total = sql_fetch($sql);

$sql = "select count(*) as cnt from motif_recruit";
$staff = sql_fetch($sql);
?>

<div id="section-construction" class="section">
	<div class="row">
		<div class="im-x">
			<div class="section-title">
				온라인 인테리어 시공의 기준
			</div>

			<div class="w-12-4 fl">
				<img src='/assets/images/main/numbers-bg.png'/>
				<div class="circle">
					<div class="contents">
						<div class="count"><?php echo $today['cnt']?></div>
						<div class="title">오늘의 견적 발행 수</div>
					</div>
				</div>
			</div>
			<div class="w-12-4 fl">

				<img src='/assets/images/main/numbers-bg.png'/>
				<div class="contents">
					<div class="count"><?php echo $total['cnt'] + 1000 ?></div>
					<div class="title">누적 견적 발행수</div>
				</div>
			</div>
			<div class="w-12-4 fl last">
				<img src='/assets/images/main/numbers-bg.png'/>
				<div class="contents">
					<div class="count"><?php echo $staff['cnt'] + 50 ?></div>
					<div class="title">함께하는 장인들</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<style>
	#section-works{ background: url(/assets/images/motif/patter-gray-bias.png); }
	#section-works .texts { padding:10px 0px; line-height: 1.6; }
	#section-works .texts .title{ font-size:1.4em; }
	#section-works .texts .date{ font-size:0.8em; color: #444; }
	#section-works .texts .detail{ margin-top:30px; font-size:0.9em; padding-bottom:70px; }

	#section-works .chips{ position: absolute;right:10px ;bottom:10px; font-size: 0.8em; }
	#section-works .chips .fl{ margin-left:5px; }

	.section-title .title-more{position:absolute;right:10px; bottom:5px; font-size:0.5em;font-weight:normal; display: block;}

	#section-works-items .w-12-3 {  }
	#section-works-items .w-12-3 img{ cursor: pointer; }
	#section-works-items .w-12-3 .im-x { padding-top:10px; background-position:center; background-size:cover;; }
	#section-works-items .w-12-3 .im-x div{ width:100%; text-align: center; }
</style>

<div id="section-works" class="section">
	<div class="section-title">
		최근 실적 현황
		<div class="row"><a class="title-more" href="/?p=performance">더보기+</a></div>
	</div>

	<div class="row" >

		<div class="im-x" style="background:#fff" id="display-performance">
		<!-- /wallpaper/display_performance -->
		</div>

<script>

	$(function(){

		$( "#section-works-items .work" ).click(function(){
			_id = $(this).data('seq');
			_chip = $(this).data('chip');
			$( "#display-performance" ).load( '/wallpaper/display_performance_main.php?id='+_id+'&chip='+_chip, function(){ });
		});
		$( "#section-works-items .work:first" ).click();
	});
</script>

<style>
    #section-works-items .slick{margin-top: 10px;}
    #section-works-items .txt-div {text-align: center;  line-height: 1.5; padding:5px 0px;}
    .slick-next{right:-10px;}
    .slick-prev{left:-10px;}

</style>

<script>
$(function(){


	_is_slick_build = false;
	_is_before_mobile = $( "body" ).hasClass('mobile');
	$(window).resize(function(){

		if( _is_before_mobile == $( "body" ).hasClass('mobile') && _is_slick_build ) return;
		_is_before_mobile = $( "body" ).hasClass('mobile');

		if( _is_before_mobile ) _show_item_count = 2;
		else 					_show_item_count = 4;

		if( _is_slick_build ) $('#section-works-items .slick').slick('destroy');
		_is_slick_build = true;

		$('#section-works-items .slick').slick({
		   slidesToShow: _show_item_count,
		   slidesToScroll: 1,
		   autoplay: false,
		   autoplaySpeed: 2000,
		 });
	});

});
</script>
        <?php
        	$sql = "select * from motif_performance ";
        	$result = sql_query( $sql );
        ?>
        <div id="section-works-items" >
            <div class="slick im-x">
                <?php for($i = 0; $row = sql_fetch_array( $result ); $i++ ) { ?>
                <div class="work" data-seq='<?php echo $row['mm_id'];?>' data-chip='<?php echo $row['mm_qa_id'];?>'>
                    <div class="im-x">
                        <img src="/data/motif/performance/<?php echo $row['mm_id'] ?>/<?php echo $row['mm_id'] ?>.jpg"/>
                        <div class="txt-div"><?php echo $row['mm_title']?></div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
	</div>
</div>



<style>
#section-miracle .background_slow{background-image: url(/assets/images/main/miracle-bg.jpg)}
#section-miracle .contents{max-width: 400px; margin: 0 auto;background:rgba(255,255,255,0.8); padding: 20px;}
#section-miracle .contents-div{padding: 50px 20px; line-height: 1.5; background: #fff;}

#section-miracle .under-line img{margin:0 auto; }

#section-miracle .primary{font-size: 1.8em; padding-top:10px;}
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
#section-story .story-item{ margin-bottom:20px; cursor:pointer; display:block;; }

#section-story .contents-div{background: #fff;  bottom: 0;width: 100%} /* opacity: 0.98;  */
#section-story .contents-div .contents-inner{padding: 10px 0px;}
#section-story .contents-div .contents-inner .underline{border-bottom: 1px solid black;}
#section-story .contents-div .contents-inner .underline .category {color: #ff8d20; font-weight:700; ;} /* font-size:1.3em */
#section-story .contents-div .contents-inner .underline .more{color:#bdbdbd; line-height: 33px;}
#section-story .contents-div .contents-inner .title{font-weight: 600; font-size: 1.2em;}
#section-story .contents-div .contents-inner .description{line-height: 1.5em; height: 44px; overflow-y:hidden;}
#section-story .story-item .im-x{ background-size:cover; background-position: center;}
</style>

<?php
$sql = "select * from motif_post where 	 = 'story' order by mm_id desc limit 4";
$result = sql_query($sql);
?>

<div id="section-story" class="section">

	<div class="section-title">
		장인들 이야기
		<div class="row"><a class="title-more" href="/?p=story">더보기+</a></div>
	</div>

	<div class="row">

        <?php while($row=sql_fetch_array($result)){ ?>
        <a class="w-12-3 fl story-item" href="/?p=story-view&key=<?php echo $row['mm_id']?>">
			<div class="im-x" >
				<div class="contents-div">
					<div><img src='/data/motif/post/<?php echo $row['mm_id'] ?>.jpg'/></div>
					<div class="contents-inner">
						<div class="underline">
							<div class="category fl"><?php echo $row['mm_sub_category']?></div>
							<!--<div class="more fr"><a ">more ></a></div>-->
							<div class="clear"></div>
						</div>
						<div class="title"><?php echo $row['mm_subject']?></div>
						<div class="description"><?php echo $row['mm_descript']?></div>
					</div>
				</div>
			</div>
		</a>
        <?php } ?>

		<div class="clear"> </div>
	</div>
</div>

<!-- alert 추가 시작 -->
<div class="container hide" id="customAlert">
	<svg class="top" id="svgTriangle" style="background:#fff;">
	<polygon points="25 5, 45 45, 5 45" fill="#f65656" stroke-linejoin="round" stroke-width="5" stroke="#f65656" />
	<text x="20.5" y="37.5" font-size="30px" fill="#fff" font-family="Open Sans">!</text>
	</svg>
	<div class="middle">
	<p>견적 요청서 확인!</p>
	<span id="customAlertMsg"></span>
	</div>
	<div class="bottom">닫기</div>
</div>
<!-- alert 추가 끝 -->
<!-- 성공 추가 시작 -->
<div class="container hide" id="customSuccess">
	<svg class="top" id="svgTriangle" style="background:#fff;">
	<polygon points="25 5, 45 45, 5 45" fill="#f65656" stroke-linejoin="round" stroke-width="5" stroke="#f65656" />
	<text x="20.5" y="37.5" font-size="30px" fill="#fff" font-family="Open Sans">!</text>
	</svg>
	<div class="middle">
	<p>요청이 완료되었습니다.</p>
	<span id="customSuccessMsg"></span>
	</div>
	<div class="bottom">닫기</div>
</div>
<!-- 성공 추가 끝 -->