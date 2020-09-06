<div id="recruit-jangin" class="recruit section">
    <div class="row_narrow">
        <div class="im-x">
            <div class="area-explain imb-50">
                <div class="section-title">장인들 모집</div>
                <div class="section-sub-explain gray">
                    징그럽게도 변하지 않는 인테리어 시공업을 뒤엎고 싶은 우리는 장인들입니다.<br/>
                    장인들과 함께 성장하고 싶은 열정 반장님을 모집합니다.
                </div>
            </div>

            <div class="area-form basic-tabs-wrapper">

                <div class="title-div">
                    <div class="w-12-6 fl left basic-tabs active">반장님 모집</div>
                    <div class="w-12-6 fl right basic-tabs">직원 채용</div>
                    <div class="clear"></div>
                </div>

                <div class="form-div basic-tabs-body" style="display: block;">
                    <form class="basic-ajax-submit" action="/wallpaper/update_recruit.php" method="post" onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); $('#popup-close').click(); } } );">
                        <input type="hidden" name="type" value="장인" />
                        <div class="field-div">
                            <label>이름</label>
                            <input type="text" name="name" placeholder="홍길동"/>
                        </div>
                        <div class="field-div">
                            <label>휴대폰 번호</label>
                            <input type="text" name="tel" placeholder="010-0000-0000"/>
                        </div>
                        <div class="field-div">
                            <label>시공가능 지역</label>
                            <input type="text" name="resd" placeholder="세종시"/>
                        </div>
                        <div class="field-div">
                            <label>경력</label>
                            <input type="text" name="career" placeholder="0년차"/>
                        </div>
                        <div class="check-div">
                            <div class="master">
                                <label class="fa-radio"><i class="fal fa-check-circle"></i> 도배 장인 <input type="checkbox" name="master_wallpaper" value="도배 장인" /></label>
                                <label class="fa-radio"><i class="fal fa-check-circle"></i> 장판 장인 <input type="checkbox" name="master_floorpaper" value="장판 장인"/></label>
                                <label class="fa-radio"><i class="fal fa-check-circle"></i> 마루 장인 <input type="checkbox" name="master_floor" value="마루 장인" /></label>
                            </div>
                            <div class="possession">
                                <label class="fa-radio"><i class="fal fa-check-circle"></i> 차량 있음 <input type="checkbox" name="car" value="차량 있음" /></label>
                                <label class="fa-radio"><i class="fal fa-check-circle"></i> 풀기계 있음 <input type="checkbox" name="mach" value="풀기계 있음" /></label>
                            </div>
                        </div>
                        <div class="button-div">
                            <button>지원하기></button>
                        </div>

                    </form>
                </div>

                <div class="form-div basic-tabs-body">
                    <form class="basic-ajax-submit" action="./?p=recruit-update" method="post" enctype="multipart/form-data"  onsubmit="return simple_ajax_submit( this, function(rt){ if( rt.result == 'success' ){ alert( '요청되었습니다.' ); $('#popup-close').click(); } } );">
                        <input type="hidden" name="type" value="직원" />
                        <div class="field-div">
                            <label>이름</label>
                            <input type="text" name="name" placeholder="홍길동"/>
                        </div>
                        <div class="field-div">
                            <label>휴대폰 번호</label>
                            <input type="text" name="tel" placeholder="010-0000-0000"/>
                        </div>
                        <div class="field-div">
                            <label>지원분야</label>
                            <input type="text" name="resd" placeholder="예) 시공/현장매니저"/>
                        </div>
                        <div class="field-div">
                            <label>신입/경력</label>
                            <input type="text" name="career" placeholder="예) 경력/4년차"/>
                        </div>
                        <div class="field-div" style="border:none;margin-bottom:50px;">
                            <label>이력서 업로드</label>
                            <input type="file" name="resume"/>
                        </div>
                        <div class="button-div">
                            <button>지원하기></button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
