<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-floorpaper' );
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
            <a class="fl" href="/?p=estimate-floorpaper">견적요청</a>
       		<a class="fl" href="/?p=floorpaper-contr-guide">시공가이드</a>
       		<a class="fl active">장판선택</a>
		</div>
<style>
#section-estimate .estimate-group .title{font-size: 1.2em; padding-top: 20px;}
.choose-floorpaper .image { background-position: center;}
.choose-floorpaper .right-side{background: #0F5E9C; padding-top:15px;}
.choose-floorpaper .image-div{margin-bottom: 20px;}
.choose-floorpaper .image-div img{margin: 0 auto;}
.choose-floorpaper .area-ranking ul {text-align: center;}
.choose-floorpaper .area-ranking ul li{line-height: 20px;}
.choose-floorpaper .choose-color ul li{line-height: 20px; padding-right: 15px;}
.choose-floorpaper .choose-color ul li{display: inline-block;}
.choose-floorpaper .area-search {margin-bottom: 42px;position: relative;}
.choose-floorpaper .area-search input{background: transparent; border-bottom: 1px solid #fff;line-height: 35px;height: 35px;text-align: center;width: 100%; color: #fff}
.choose-floorpaper .area-search button{height: 100%; width: 60px; background:#ff9932; color: #fff; position: absolute;right: 0px; top: 1px}


.mobile .w-12-8{ width:100%; }
	
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
			<form id="floorpaper-items-loader">
			<div class="estimate-group choose-floorpaper">
                <div class="w-12-8 fl">
                    <div class="im-x-2">
                        <div class="title">장인들 장판 랭킹</div>
                    </div>

                    <div id="floorpaper-rank" class="ranking">

						<script>
							$(function(){

								$( "#floorpaper-rank .w-12-4" ).click(function(){
									var child = $( "<img/>" ).attr( "src", $(this).data('view') );
									popup( child, function(){ });
								});

								$( "[name=mm_category_wallpaper1]:first" ).click();
							})
						</script>
                    	<div class="im-x">

                 			<?php
								$sql = "select * from motif_materials where mm_category = '장판' order by mm_ranking desc limit 3";
								$result = sql_query( $sql );
								for( $i=1; $row = sql_fetch_array( $result ); $i++ ){
							?>
                    		<div class="w-12-4 fl rank-floorpaper" data-view="/data/motif/materials/<?php echo $row['mm_id']?>/<?php echo $row['mm_img1']?>">
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
				<style>
				.choose-item-floorpaper input{display: none;}
				.choose-item-floorpaper label span{display: block; border: 1px solid #fff; text-align: center;}
				.choose-item-floorpaper label { display: block;line-height: 40px; transition-duration: 0.2s;}
				.choose-item-floorpaper label.active {background: #fff;color: #8abbe4;}
				.scene-div .choose-item-floorpaper span img{margin: 0 auto; padding-top: 10px;}
				#section-estimate .choose-item-floorpaper .clear {height: 15px;}
				</style>
				<script>

				$(function(){
					$(".choose-item-floorpaper").each(function(){
						( $(this).find( "input" ).prop( "checked" ) ) ? $( this ).addClass( "active" ) : $( this ).removeClass( "active" ) ;
					});
				});

				$(function(){
					$(".choose-item-floorpaper label").click(function(){

						$(".choose-item-floorpaper label").each(function(){
							if($(this).find("input").is(":checked")){

								$(this).find('img').attr( "src", $(this).find('img').attr( "src" ).replace( "white", "blue" ) );

								$(this).addClass( "active" );
							} else {

								$(this).find('img').attr( "src", $(this).find('img').attr( "src" ).replace( "blue", "white" ) );

								$(this).removeClass( "active" );
							}
						});
					});
				})


				</script>

                <div class="w-12-4 fl right-side">
                    <div class="im-x-2">
                        <div class="title fl">장판 종류 선택</div>
                        <a onclick="refresh_item('refresh'); return false;"><img src="/assets/images/common/refresh.png" class="fr" style="margin-top:18px;"/></a>
                        <div class="clear"></div>
                    </div>

                    <div class="scene-div im-x-2">
						<div class="estimate-radio">
                        	<label class="w-12-6 fl"><span>두께 1.8MM</span><input type="radio" name="mm_category_floorpaper1" value="두께 1.8MM" <?php if (isset($_POST[mm_category_floorpaper1]) && $_POST[mm_category_floorpaper1] == "두께 1.8MM") echo "checked"; ?> /></label>
                        	<label class="w-12-6 fl"><span>두께 2.0MM</span><input type="radio" name="mm_category_floorpaper1" value="두께 2.0MM" <?php if (isset($_POST[mm_category_floorpaper1]) && $_POST[mm_category_floorpaper1] == "두께 2.0MM") echo "checked"; ?> /></label>
                            <label class="w-12-6 fl"><span>두께 2.3MM</span><input type="radio" name="mm_category_floorpaper1" value="두께 2.3MM" <?php if (isset($_POST[mm_category_floorpaper1]) && $_POST[mm_category_floorpaper1] == "두께 2.3MM") echo "checked"; ?> /></label>
                            <label class="w-12-6 fl"><span>더 두꺼운 장판</span><input type="radio" name="mm_category_floorpaper1" value="더 두꺼운 장판" <?php if (isset($_POST[mm_category_floorpaper1]) && $_POST[mm_category_floorpaper1] == "더 두꺼운 장판") echo "checked"; ?> /></label>
							<div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="im-x-2">
                        <div class="title">장판 선택</div>
                    </div>
                    <style>
                    .scene-div .estimate-radio span img{margin: 0 auto; padding-top: 10px;}
                    .mobile .select-floorpaper .w-12-3{ width:25%; }
                    .tablet .select-floorpaper .w-12-3{ width:25%; }

                    </style>
                    <div class="scene-div im-x-2 select-floorpaper">
						<div class="choose-item-floorpaper">
							<!--
							<label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-01.png"/>솔리드</span><input type="radio" name="mm_category_floorpaper2" value="솔리드" <?php if (isset($_POST[mm_category_floorpaper2]) && $_POST[mm_category_floorpaper2] == "솔리드") echo "checked"; ?> /></label>
                        	<label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-02.png"/>우드</span><input type="radio" name="mm_category_floorpaper2" value="우드" <?php if (isset($_POST[mm_category_floorpaper2]) && $_POST[mm_category_floorpaper2] == "우드") echo "checked"; ?>/></label>
                            <label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-03.png"/>헤링본</span><input type="radio" name="mm_category_floorpaper2" value="헤링본" <?php if (isset($_POST[mm_category_floorpaper2]) && $_POST[mm_category_floorpaper2] == "헤링본") echo "checked"; ?>/></label>
                            <label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-04.png"/>타일</span><input type="radio" name="mm_category_floorpaper2" value="타일" <?php if (isset($_POST[mm_category_floorpaper2]) && $_POST[mm_category_floorpaper2] == "타일") echo "checked"; ?>/></label>
							-->
							<label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-01.png"/>솔리드</span><input type="checkbox" name="mm_category_solid" value="솔리드" <?php if (isset($_POST[mm_category_solid]) && $_POST[mm_category_solid] == "솔리드") echo "checked"; ?> /></label>
                        	<label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-02.png"/>우드</span><input type="checkbox" name="mm_category_wood" value="우드" <?php if (isset($_POST[mm_category_wood]) && $_POST[mm_category_wood] == "우드") echo "checked"; ?>/></label>
                            <label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-03.png"/>헤링본</span><input type="checkbox" name="mm_category_herringbone" value="헤링본" <?php if (isset($_POST[mm_category_herringbone]) && $_POST[mm_category_herringbone] == "헤링본") echo "checked"; ?>/></label>
                            <label class="w-12-3 fl"><span><img src="/assets/images/floorpaper/pattern-white-04.png"/>타일</span><input type="checkbox" name="mm_category_tile" value="타일" <?php if (isset($_POST[mm_category_tile]) && $_POST[mm_category_tile] == "타일") echo "checked"; ?>/></label>
							<div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>

					<div class="area-search im-x-2">
                        <div style="padding-right:60px;"><input type="text" name="mm_code" placeholder="장판번호를 입력해주세요."/></div>
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
$(function(){
	$('.section-choose .sorting li a').click(function(){
		_idx = $('.section-choose .sorting li a').index($(this));
		$('.section-choose .sorting li a').removeClass('active');
		$('.section-choose .sorting li a').eq(_idx).addClass('active');
	});
});
</script>
<div id="link-area">
	<div class="row">
		<ul class="im-x-2">
			<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> >
			<li><a>장판</a></li> >
			<li>장판 선택</li>
		</ul>
	</div>
</div>

<script>

	var search_items_params = {};

	function search_items( _params ){
		console.log(_params);
		if( _params.refresh == 'refresh')
		{
			_params = {};
			search_items_params = {};
		} else {
			search_items_params = _params;
		}

		$( "#floorpaper-items-wrapper" ).load('/wallpaper/items_floorpaper.php',$.param( _params ),function(rt){
			//console.log(rt);
		});
	}

	function refresh_item( _refresh )
	{
		$(".estimate-radio").each(function(){
			$(this).find( "input:first" ).click();
		});
		search_items_params.refresh = _refresh;
		search_items(search_items_params);
	}

	function sort_search_item( _sort )
	{
		//console.log(_sort);
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

		$("#floorpaper-items-loader").submit(function(){

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


<div id=section-choose-floorpaper class="section section-choose">
    <div class="row">
		<ul class="sorting im-x-2 fr">
			<li><a onclick="sort_search_item( 'ranking' ); return false;">장인들 랭킹순</a></li>|
			<li><a onclick="sort_search_item( 'reg' ); return false;" >등록일순</a></li>
		</ul>
		<div class="clear"></div>
        <div class="item-div" id="floorpaper-items-wrapper">
        </div>
    </div>
</div>


<style>
#popup-continaer img{margin: 0 auto;}
#section-recommand, #section-look {background-color: #f5f5f5}
</style>

<?php
    include_once(G5_THEME_PATH.'/page/recommend-floorpaper.php');
?>
