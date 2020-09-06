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
	        <a class="fl" href="/?p=estimate-floor">견적요청</a>
	        <a class="fl" href="/?p=floor-contr-guide">시공가이드</a>
	        <a class="fl active">마루선택</a>
		</div>
<style>
#section-estimate .estimate-group .title{font-size: 1.2em; padding-top: 20px;}
.choose-floor .image {background-position: center;}
.choose-floor .right-side{background: #0F5E9C;}
.choose-floor .image-div{margin-bottom: 20px;}
.choose-floor .image-div img{margin: 0 auto;}
.choose-floor .area-ranking ul {text-align: center;}
.choose-floor .area-ranking ul li{line-height: 20px;}
.choose-floor .choose-color ul li {line-height: 20px;width: 15%;display: inline-block;}
.choose-floor .choose-color ul{padding-bottom: 14px;}
.choose-floor .choose-color ul li:last-child{padding-right: 0px;}
.choose-floor .area-search {margin-bottom: 42px;position: relative;}
.choose-floor .area-search input{background: transparent; border-bottom: 1px solid #fff;line-height: 35px;height: 35px;text-align: center;width: 100%; color: #fff}
.choose-floor .area-search button{height: 100%; width: 60px; background:#ff9932; color: #fff; position: absolute;right: 0px; top: 1px}


.mobile .ranking .w-12-4{ width:33.33%; margin-bottom:20px; }
</style>

<script>
	$(function(){

		$(window).resize(function(){

			$( '.ranking .image' ).each(function(){ $(this).height( $(this).width() ) });

		}).resize();

	})
</script>


            <!-- 벽지 선택 시작 -->
            			<form id="floor-items-loader">

            			<div class="estimate-group choose-floor">
                            <div class="w-12-8 fl">
                                <div class="im-x-2">
                                    <div class="title">장인들 마루 랭킹</div>
                                </div>
								<div id="floor-rank" class="ranking">
									<script>
										$(function(){

											$( "#floor-rank .w-12-4" ).click(function(){
												var child = $( "<img/>" ).attr( "src", $(this).data('view') );
												popup( child, function(){ });
											});

											$( "[name=mm_category_floor]:first" ).click();
										})
									</script>
			                    	<div class="im-x">
			                 			<?php
											$sql = "select * from motif_materials where mm_category = '마루' order by mm_ranking desc limit 3";
											$result = sql_query( $sql );
											for( $i=1; $row = sql_fetch_array( $result ); $i++ ){
										?>
			                    		<div class="w-12-4 fl rank-silk" data-view="/data/motif/materials/<?php echo $row['mm_id']?>/<?php echo $row['mm_img1']?>">
			                    			<div class="im-x">
												<div class="image" style='background-image:url(/data/motif/materials/<?php echo $row['mm_id']?>/<?php echo $row['mm_id']?>.jpg)'></div>
												<div class="descript">
													<div class="primary"><?php echo $i;?>위 <span><?php echo $row['mm_name']?> / <?php echo $row['mm_code']?></span></div>
													<div class="secondary"><?php echo $row['mm_descript']?></div>
												</div>
											</div>
			                    		</div>
			                   			<?php }?>
			                    	</div>
			                    </div>
                            </div>

                            <div class="w-12-4 fl right-side">
                                <div class="im-x-2 ipb-20">
                                    <div class="title fl">마루 종류 선택</div>
                                    <a onclick="refresh_item('refresh'); return false;"><img src="/assets/images/common/refresh.png" class="fr" style="margin-top:18px;"/></a>
                                    <div class="clear"></div>
                                </div>

                                <div class="scene-div im-x-2">
            						<div class="estimate-radio">
										<label class="w-12-6 fl"><span>전체</span><input type="radio" name="mm_category_floor" value="" <?php if (isset($_POST[mm_category_floor]) && $_POST[mm_category_floor] == "") echo "checked"; ?>/></label>
										<label class="w-12-6 fl"><span>강마루</span><input type="radio" name="mm_category_floor" value="강마루" <?php if (isset($_POST[mm_category_floor]) && $_POST[mm_category_floor] == "강마루") echo "checked"; ?>/></label>
                                    	<label class="w-12-6 fl"><span>강화마루</span><input type="radio" name="mm_category_floor" value="강화마루" <?php if (isset($_POST[mm_category_floor]) && $_POST[mm_category_floor] == "강화마루") echo "checked"; ?>/></label>
                                        <label class="w-12-6 fl"><span>데코타일</span><input type="radio" name="mm_category_floor" value="데코타일" <?php if (isset($_POST[mm_category_floor]) && $_POST[mm_category_floor] == "데코타일") echo "checked"; ?> /></label>
            							<div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="choose-color imb-20">
                                    <div class="im-x-2">
                                        <div class="title">색상 선택</div>
                                    </div>
                                    <ul class="im-x-2">
										<li><label class="color-check"><img src="/assets/images/floor/color01.png"/><input type='checkbox' name="mm_color_wh" value="Y" <?php if (isset($_POST[mm_color_wh]) && $_POST[mm_color_wh] == "Y") echo "checked"; ?> /></label></li>
										<li><label class="color-check"><img src="/assets/images/floor/color02.png"/><input type='checkbox' name="mm_color_be" value="Y" <?php if (isset($_POST[mm_color_be]) && $_POST[mm_color_be] == "Y") echo "checked"; ?> /></label></li>
						                <li><label class="color-check"><img src="/assets/images/floor/color03.png"/><input type='checkbox' name="mm_color_oc" value="Y" <?php if (isset($_POST[mm_color_oc]) && $_POST[mm_color_oc] == "Y") echo "checked"; ?> /></label></li>
						                <li><label class="color-check"><img src="/assets/images/floor/color04.png"/><input type='checkbox' name="mm_color_bn" value="Y" <?php if (isset($_POST[mm_color_bn]) && $_POST[mm_color_bn] == "Y") echo "checked"; ?> /></label></li>
						                <li><label class="color-check"><img src="/assets/images/floor/color05.png"/><input type='checkbox'name="mm_color_bk" value="Y" <?php if (isset($_POST[mm_color_bk]) && $_POST[mm_color_bk] == "Y") echo "checked"; ?> /></label></li>
						                <li><label class="color-check"><img src="/assets/images/floor/color06.png"/><input type='checkbox' name="mm_color_etc" value="Y" <?php if (isset($_POST[mm_color_etc]) && $_POST[mm_color_etc] == "Y") echo "checked"; ?> /></label></li>
                                    </ul>
                                </div>
								<div class="area-search im-x-2">
			                        <div style="padding-right:60px;"><input type="text" name="mm_code" placeholder="마루번호를 입력해주세요."/></div>
			                        <button>검색</button>
			                    </div>
                            </div>

                            <div class="clear"></div>
                        </div>
            			</form>
            <!-- 벽지선택 끝 -->
                </div>
            </div>


<script>

	var search_items_params = {};

	function search_items( _params ){

		if( _params.refresh == 'refresh')
		{
			_params = {};
			search_items_params = {};
		} else {
			search_items_params = _params;
		}

		$( "#floor-items-wrapper" ).load('/wallpaper/items_floor.php',$.param( _params ),function(rt){
			//console.log(rt);
		});
	}

	function refresh_item( _refresh )
	{
		$(".estimate-radio").each(function(){
			$(this).find( "input:first" ).click();
		});
		$(".choose-color ul li label.active").each(function(){

			$(this).find("input").click();

		});

		search_items_params.refresh = _refresh;
		search_items(search_items_params);
	}

	function sort_search_item( _sort )
	{
		search_items_params.sorting = _sort;
		search_items( search_items_params );
	}

	function page_search_items( _page )
	{
		search_items_params.page = _page;
		search_items( search_items_params );
	}

	$(function(){
		search_items({});

		$("#floor-items-loader").submit(function(){

			var _serialize = $(this).serializeArray();
			var _params = {};
			$( _serialize ).each(function(index, obj){
				_params[obj.name] = obj.value;
			});

			search_items(_params);

			return false;
		});
	});
</script>

<div id="link-area">
	<div class="row">
		<ul class="im-x">
			<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> >
			<li><a>마루</a></li> >
			<li>마루 선택</li>
		</ul>
	</div>
</div>


<div id=section-choose-floor class="section section-choose">
    <div class="row">
		<ul class="sorting im-x fr">
			<li><a onclick="sort_search_item( 'ranking' ); return false;">장인들 랭킹순</a></li>|
			<li><a onclick="sort_search_item( 'reg' ); return false;" >등록일순</a></li>
		</ul>
		<div class="clear"></div>
        <div class="item-div" id="floor-items-wrapper">

        </div>
    </div>
</div>

<style>
#popup-continaer img{margin: 0 auto;}
#section-recommand, #section-look {background-color: #f5f5f5}
</style>

<?php
    include_once(G5_THEME_PATH.'/page/recommend-floor.php');
?>
