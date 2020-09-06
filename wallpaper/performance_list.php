<?php
include_once('./_common.php');

$sql_common = " from motif_performance where 1=1";

if($_GET[sorting]!='') $sql_search = " and mm_category = '$_GET[sorting]' ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 16;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";

$result = sql_query($sql);
?>



<style>
.section-sorting .title-div{text-align: center;}
.section-sorting .area-sorting a{margin:0 10px}
.section-sorting .area-sorting a.active{color: #ff9932}
.section-sorting .w-12-4 .im-x{margin: 10px;}

.section-sorting .more{display: none;background: #000; opacity: 0.5; position: absolute; color: #FFF; width: 100%; height: 100%;text-align: center;top:0; z-index: 10}
.section-sorting .more .more-div{position: absolute;top:50%;margin-top: -30px; width: 100%; font-size: 1.3em;}
.section-sorting .item-over {margin-bottom: 10px;cursor: pointer;}
.section-sorting .item-over img{margin:0 auto;}
.section-sorting .item-over:hover .more{display: block;}

.section-sorting .basic-tabs {margin-bottom: 0px;}
.section-sorting .area-sorting{margin-bottom: 20px;}
</style>


<div id="performance-items" class="section-sorting">
	<?php for($i=0; $row=sql_fetch_array($result); $i++) { ?>
	<div class="w-12-3 fl">
		<div class="item-over im-x" data-seq='<?php echo $row['mm_id'];?>' data-chip='<?php echo $row['mm_qa_id'];?>'>
			<img src="/data/motif/performance/<?php echo $row['mm_id']?>/<?php echo $row['mm_id']?>.jpg"/>
			<div class="more">
				<div class="more-div">
					<!--<img src="/assets/images/common/more.png"/>-->
					<i class="fa fa-search-plus"></i>
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
		<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=choose-wallpaper'.$qstr.'&amp;page='); ?>
	</div>
</div>

<script>
$(function(){

	$( "#performance-items .list-paging a").click(function(){

		_href = $(this).attr("href");
		_tmp = _href.split('page=');

		page_search_items( _tmp[1] );
		return false;
	});

});

$( ".item-over" ).click(function(){
	_id = $(this).data('seq');
	_chip = $(this).data('chip');
	//console.log(_id);
	//console.log(_chip);
	child = $(  "<div id='section-works'></div>" ).load( '/wallpaper/performance_view.php?id='+_id+'&chip='+_chip);
	popup( child, function(){ });
});
</script>
