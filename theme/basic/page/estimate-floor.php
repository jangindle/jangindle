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
                <a class="fl active">견적요청</a>
           		<a class="fl" href="/?p=floor-contr-guide">시공가이드</a>
           		<a class="fl" href="/?p=choose-floor">마루선택</a>
			</div>
			<form id="estimate-floor-form" action="./?p=estimate-update" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); } } );">
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
                        	<label class="w-12-6 fl"><span>빈집/가구 없음</span><input type="radio" name="f-stay" value="빈집/가구 없음"/></label>
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
							<li><i class="fal fa-question-circle"></i><a href="/?p=floor-contr-guide" target="_blank"> 마루 종류의 차이가 궁금하세요?</a> </li>
							<li><i class="fal fa-check-circle"></i><a href="/?p=package03" target="_blank"> 도배+마루 패키지</a> </li>
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
                            		<span><b class="estimate-price">??</b> 만원 <a></a></span> &nbsp;
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

<div id="link-area">
	<div class="row">
		<ul class="im-x-2">
			<li><a href="/"><img src="/assets/images/common/home-icon.png"/>HOME</a></li> >
			<li><a>마루</a></li> >
			<li>견적요청</li>
		</ul>
	</div>
</div>

<?php
    include_once(G5_THEME_PATH.'/page/recommend-floor.php');
?>
