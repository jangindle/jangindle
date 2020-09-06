<?php
include_once('./_common.php');

if ($_GET[mm_code]!='') {

	$sql_search .= " and mm_code like '%" .$_GET[mm_code]. "%' ";

} else {

    if ($_GET[mm_category_floorpaper1]!='') $sql_search .= " and mm_category_floorpaper1 = '$_GET[mm_category_floorpaper1]' ";

    if ($_GET[mm_category_solid]!='' || $_GET[mm_category_herringbone]!='' || $_GET[mm_category_tile]!='' || $_GET[mm_category_wood]!='') $sql_search .= "and (";
    if ($_GET[mm_category_solid]!='') $sql_search .= " mm_category_floorpaper2 = '$_GET[mm_category_solid]' or";
    if ($_GET[mm_category_herringbone]!='') $sql_search .= " mm_category_floorpaper2 = '$_GET[mm_category_herringbone]' or";
    if ($_GET[mm_category_tile]!='') $sql_search .= " mm_category_floorpaper2 = '$_GET[mm_category_tile]' or";
    if ($_GET[mm_category_wood]!='') $sql_search .= " mm_category_floorpaper2 = '$_GET[mm_category_wood]' or";
    if ($_GET[mm_category_solid]!='' || $_GET[mm_category_herringbone]!='' || $_GET[mm_category_tile]!='' || $_GET[mm_category_wood]!='') $sql_search .= " 1=0) ";
}

$sql_common = " from motif_materials where mm_category ='장판'";

$sql_order = " order by mm_create_time desc ";

if ( $_GET["sorting"] && $_GET["sorting"]  == "ranking" ) $sql_order = " order by mm_ranking desc ";
else $sql_order = " order by mm_create_time desc ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 10;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";
//print_r($sql);
$result = sql_query($sql);

?>

<div id="floorpaper-items">
<?php for($i=0; $row = sql_fetch_array($result); $i++) {?>
    <div class="w-12-6 fl">
        <div class="item-over im-x">
            <div class="detail-div" style="display:none;">
                <img src="/data/motif/materials/<?php echo $row['mm_id']?>/<?php echo $row['mm_img1']?>"/>
            </div>
            <img src="/data/motif/materials/<?php echo $row['mm_id']?>/<?php echo $row['mm_id']?>.jpg"/>
            <div class="txt">
                <div class="txt-div">
                    <div class="primary"><?php echo $row['mm_name']?> / <?php echo $row['mm_code']?></div>
					<div class="secondary"><?php echo $row['mm_descript']?></div>
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
        <?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=choose-floorpaper'.$qstr.'&amp;page='); ?>
    </div>
</div>


<script>
$(function(){
	$('.section-choose .sorting li a').click(function(){
		_idx = $('.section-choose .sorting li a').index($(this));
		$('.section-choose .sorting li a').removeClass('active');
		$('.section-choose .sorting li a').eq(_idx).addClass('active');
	});

	$( "#floorpaper-items .item-over" ).click(function(){
		var child = $( "<img/>" ).attr( "src", $(this).find('.detail-div img').attr( "src" ) );
		popup( child, function(){ });
	});


	$( "#floorpaper-items .list-paging a").click(function(){

		_href = $(this).attr("href");
		_tmp = _href.split('page=');

		console.log(_tmp);

		page_search_items( _tmp[1] );
		return false;
	});

});

</script>
