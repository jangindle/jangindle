



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

<div id="section-works" class="section" style="padding-top:120px;">
	<div class="section-title">
		최근 실적 현황
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
    #section-works-items .txt-div {text-align: center; background-color: #fff}
    .slick-next{right:0px;}
    .slick-prev{left:0px;}
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
		
		if( _is_slick_build ) $('.slick').slick('destroy');
		_is_slick_build = true;
		
		$('.slick').slick({
		   slidesToShow: _show_item_count,
		   slidesToScroll: 1,
		   autoplay: false,
		   autoplaySpeed: 2000,
		 });
	}).resize();
	

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
#section-sorting .title-div{text-align: center;}
#section-sorting .area-sorting a{margin:0 10px;}
#section-sorting .area-sorting a.active{color: #ff9932}
#section-sorting .w-12-4 .im-x{margin: 10px;}

#section-sorting .more{display: none;background: #000; opacity: 0.5; position: absolute; color: #FFF; width: 100%; height: 100%;text-align: center;top:0; z-index: 10}
#section-sorting .more .more-div{position: absolute;top:50%;margin-top: -30px; width: 100%; font-size: 1.3em; line-height: 1.5;}
	
	#section-sorting .more .more-div i{ font-size:30px; }
#section-sorting .item-over img{margin:0 auto;}
#section-sorting .item-over:hover .more{display: block;}

#section-sorting .basic-tabs {margin-bottom: 0px;}
#section-sorting .area-sorting{margin-bottom: 20px; text-align: right;}
</style>

<script>

$(function(){
    $(".area-sorting a").click(function(){
        $(".area-sorting a").removeClass('active');
        $(this).addClass('active');
    });
});

</script>

<?php

// if ($_POST[mm_filter]!='') $sql_search .= " and mm_filter like '%" .$_POST[mm_filter]. "%' ";
// if ($_POST[mm_code]!='') $sql_search .= " and mm_code like '%" .$_POST[mm_code]. "%' ";

$sql_common = " from motif_performance where 1=1 ";
$sql_order = " order by mm_create_time desc ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 3;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";

$result = sql_query($sql);
$result2 = sql_query($sql);

?>

<div id="section-sorting" class="section">
    <div class="row">
		<div class="area-form basic-tabs-wrapper">

			<div class="form-div basic-tabs-body" style="display: block;">

				<div class="area-sorting">
					<a onclick="sort_search_item('')">전체</a> |
		            <a onclick="sort_search_item('20PY')">20PY</a> |
		            <a onclick="sort_search_item('30PY')">30PY</a> |
		            <a onclick="sort_search_item('40PY 이상')">40PY 이상</a>
		        </div>

				<div class="item-div" id="performance-items-wrapper">

				</div>

			</div>
<!--
			<div class="form-div basic-tabs-body">

				<div class="area-sorting gray">
		            <a>거실</a> |
		            <a>안방</a> |
		            <a>작은방</a> |
					<a>현관</a> |
					<a>주방</a> |
					<a>욕실</a>
		        </div>

				<?php for($i=0; $row=sql_fetch_array($result2); $i++) { ?>
		        <div class="w-12-4 fl">
		            <div class="item-over im-x" data-seq='<?php echo $row['mm_id'];?>' data-chip='<?php echo $row['mm_qa_id'];?>'>
		                <img src="/data/motif/performance/<?php echo $row['mm_id']?>/<?php echo $row['mm_id']?>.jpg"/>
		                <div class="more">
		                    <div class="more-div">
		                        <img src="/assets/images/common/more.png"/>
		                        <p>더보기</p>
		                    </div>
		                </div>
		            </div>
		        </div>
				<?php } ?>

		        <div class="clear"></div>
				<?php if ($total_count == 0)
					echo '<div class="empty" style="text-align:center;">자료가 없습니다.</div>';
				?>
				<div class="list-paging clear">
					<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=performance'.$qstr.'&amp;page='); ?>
				</div>
			</div>
 -->


		</div>
    </div>
</div>


<script>

	$(function(){
		search_items({});
	});

	var search_items_params = {};


	function search_items( _params ){

		$( "#performance-items-wrapper" ).load('/wallpaper/performance_list.php',$.param( _params ),function(rt){
			//console.log(rt);
		});
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

</script>
