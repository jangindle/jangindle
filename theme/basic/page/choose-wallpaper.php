<div id="site-landing" class="wrapper">
	<div class="landing-slider">
		<ul>

			<?php
				$result_banner_main_slide = get_banner_items( 'slider-wallpaper' );
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
       		<a class="fl" href="/?p=estimate-wallpaper">견적요청</a>
       		<a class="fl" href="/?p=wallpaper-contr-guide">시공가이드</a>
       		<a class="fl active">벽지선택</a>
		</div>
<style>
#wallpaper-rank .fl.w-12-4{display:none;}
.mobile #section-estimate .choose-wallpaper .fl.w-12-8{width: 100%;}
.choose-wallpaper .right-side{background: #0F5E9C;}
.choose-wallpaper .image{ background-position:center;}

.mobile .choose-wallpaper .image{padding-top:150px; }

.choose-wallpaper .area-ranking ul {text-align: center;}
.choose-wallpaper .area-ranking ul li{line-height: 20px;}
.choose-wallpaper .choose-color ul {padding-bottom: 10px;}
.choose-wallpaper .choose-color ul li{line-height: 20px; width: 15%; display: inline-block;}
.choose-wallpaper .choose-color ul li:last-child{padding-right: 0px;}

.choose-wallpaper .area-search {margin-bottom: 42px;position: relative;}
.choose-wallpaper .area-search input{background: transparent; border-bottom: 1px solid #fff;line-height: 35px;height: 35px;text-align: center;width: 100%; color: #fff}
.choose-wallpaper .area-search button{height: 100%; width: 60px; background:#ff9932; color: #fff; position: absolute;right: 0px; top: 1px}

.mobile .ranking .w-12-4{ width:33.33%; margin-bottom:20px; }
</style>

<script>
	$(function(){
		setInterval(function() {
			$(window).resize();
		}, 1);

		$(window).resize(function(){

			$( '.ranking .image' ).each(function(){ $(this).height( $(this).width() ) });

		}).resize();

	})
</script>


<!-- 벽지 선택 시작 -->
			<form id="wallpaper-items-loader">
			<input type="hidden" name="option-area" value="" />
			<input type="hidden" name="type" value="search"/>

			<div class="estimate-group choose-wallpaper">
                <div class="w-12-8 fl">
					<div class="im-x-2">
                        <div class="title" >장인들 벽지 랭킹</div>
                    </div>

                    <div id="wallpaper-rank" class="ranking">
						<script>
							$(function(){

								$( "#wallpaper-rank .w-12-4" ).click(function(){
									var child = $( "<img/>" ).attr( "src", $(this).data('view') );
									popup( child, function(){ });
								});

								$( "[name=mm_category_wallpaper1]" ).click(function(){

									$( "#wallpaper-rank .w-12-4" ).hide();
									if( $(this).val() == '합지 벽지' )   $( "#wallpaper-rank .w-12-4.rank-mul" ).show();
									else 								$( "#wallpaper-rank .w-12-4.rank-silk" ).show();

								});

								$( "[name=mm_category_wallpaper1]:first" ).click();
							})
						</script>
                    	<div class="im-x">

                 			<?php
								$sql = "select * from motif_materials where mm_category_wallpaper1 = '실크 벽지' and  mm_category = '도배' order by mm_ranking desc limit 3";
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

                 			<?php
								$sql = "select * from motif_materials order by mm_ranking desc limit 3"; //where mm_category_wallpaper1 = '합지 벽지' and  mm_category = '도배'
								$result = sql_query( $sql );
								for( $i=1; $row = sql_fetch_array( $result ); $i++ ){
							?>
                    		<div class="w-12-4 fl rank-mul" data-view="/data/motif/materials/<?php echo $row['mm_id']?>/<?php echo $row['mm_img1']?>">
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
                    <div class="im-x-2">
                        <div class="title fl">벽지 종류 선택</div>
                        <a onclick="refresh_item('refresh'); return false;"><img src="/assets/images/common/refresh.png" class="fr" style="margin-top:28px;"/></a>
                        <div class="clear"></div>
                    </div>

                    <div class="scene-div im-x-2">
						<div class="estimate-radio">
                        	<label class="w-12-4 fl"><span>전체</span><input type="radio" name="mm_category_wallpaper1" value=""/></label>
                        	<label class="w-12-4 fl"><span>실크 벽지</span><input type="radio" name="mm_category_wallpaper1" value="실크 벽지"/></label>
                        	<label class="w-12-4 fl"><span>합지 벽지</span><input type="radio" name="mm_category_wallpaper1" value="합지 벽지"/></label>
							<div class="clear"></div>
                        </div>

						<div class="estimate-radio">
                        	<label class="w-12-4 fl"><span>전체</span><input type="radio" name="mm_category_wallpaper2" value=""/></label>
                        	<label class="w-12-4 fl"><span>단색 벽지</span><input type="radio" name="mm_category_wallpaper2" value="단색 벽지"/></label>
                        	<label class="w-12-4 fl"><span>패턴 벽지</span><input type="radio" name="mm_category_wallpaper2" value="패턴 벽지"/></label>
							<div class="clear"></div>
                        </div>

                        <div class="clear"></div>
                    </div>
					<div class="choose-color imb-20">
						<div class="im-x-2">
							<div class="title">색상 선택</div>
						</div>
						<ul class="im-x-2">
							<li><label class="color-check"><img src="/assets/images/wallpaper/color01.png"/><input type='checkbox' name="mm_color_wh" value="Y" <?php if (isset($_POST[mm_color_wh]) && $_POST[mm_color_wh] == "Y") echo "checked"; ?> /></label></li>
							<li><label class="color-check"><img src="/assets/images/wallpaper/color02.png"/><input type='checkbox' name="mm_color_pk" value="Y" <?php if (isset($_POST[mm_color_pk]) && $_POST[mm_color_pk] == "Y") echo "checked"; ?> /></label></li>
							<li><label class="color-check"><img src="/assets/images/wallpaper/color03.png"/><input type='checkbox' name="mm_color_bl" value="Y" <?php if (isset($_POST[mm_color_bl]) && $_POST[mm_color_bl] == "Y") echo "checked"; ?> /></label></li>
							<li><label class="color-check"><img src="/assets/images/wallpaper/color04.png"/><input type='checkbox' name="mm_color_gn" value="Y" <?php if (isset($_POST[mm_color_gn]) && $_POST[mm_color_gn] == "Y") echo "checked"; ?> /></label></li>
							<li><label class="color-check"><img src="/assets/images/wallpaper/color05.png"/><input type='checkbox' name="mm_color_ye" value="Y" <?php if (isset($_POST[mm_color_ye]) && $_POST[mm_color_ye] == "Y") echo "checked"; ?> /></label></li>
							<li><label class="color-check"><img src="/assets/images/wallpaper/color06.png"/><input type='checkbox' name="mm_color_etc" value="Y" <?php if (isset($_POST[mm_color_etc]) && $_POST[mm_color_etc] == "Y") echo "checked"; ?> /></label></li>
						</ul>
					</div>

                    <div class="area-search im-x-2">
                        <div style="padding-right:60px;"><input type="text" name="mm_code" placeholder="벽지번호를 입력해주세요."/></div>
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

		$( "#wallpaper-items-wrapper" ).load('/wallpaper/items_wallpaper.php',$.param( _params ),function(rt){
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
			//$(this).removeClass("active");
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

		$("#wallpaper-items-loader").submit(function(){

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
			<li><a>도배</a></li> >
			<li>벽지 선택</li>
		</ul>
	</div>
</div>
<div id=section-choose-wallpaper class="section section-choose">
    <div class="row">
		<ul class="sorting im-x fr">
			<li><a onclick="sort_search_item( 'ranking' ); return false;">장인들 랭킹순</a></li>|
			<li><a onclick="sort_search_item( 'reg' ); return false;" >등록일순</a></li>
		</ul>
		<div class="clear"></div>
        <div class="item-div" id="wallpaper-items-wrapper">

        </div>
    </div>
</div>

<style>
#popup-continaer img{margin: 0 auto;}
#section-recommand, #section-look {background-color: #f5f5f5}
</style>

<?php
    include_once(G5_THEME_PATH.'/page/recommend-wallpaper.php');
?>
