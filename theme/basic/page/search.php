<?php

if ($_POST[search]) {
    $sql_search1 .= " or mm_content like '%" .$_POST[search]. "%' ";
    $sql_search1 .= " or mm_subject like '%" .$_POST[search]. "%' ";
    $sql_search1 .= " or mm_subject_en like '%" .$_POST[search]. "%' ";
}

$sql_order = " order by mm_create_time desc ";
$sql_common = " from motif_post where 1=0 ";
$sql = " select count(*) as cnt {$sql_common} {$sql_search1} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 1000;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search1} {$sql_order} limit {$from_record}, {$rows} ";

$result = sql_query($sql);
?>


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

<div id="section-story" class="section section-choose" style="padding-top:120px;">
    <div class="row">
        <div class="total_count im-x gray">장인들 이야기 검색 결과 <?php echo $total_count ?></div>
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

        <?php if ($total_count == 0)
    	echo '<div class="empty" style="text-align:center;">자료가 없습니다.</div>';
        ?>
    	<div class="list-paging clear">
    		<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=search'.$qstr.'&amp;page='); ?>
    	</div>
    </div>
</div>


<?php

if ($_POST[search]) {
    $sql_search2 .= " or mm_category_wallpaper1 like '%" .$_POST[search]. "%' ";
    $sql_search2 .= " or mm_category_wallpaper2 like '%" .$_POST[search]. "%' ";
    $sql_search2 .= " or mm_name like '%" .$_POST[search]. "%' ";
    $sql_search2 .= " or mm_code like '%" .$_POST[search]. "%' ";
    $sql_search2 .= " or mm_descript like '%" .$_POST[search]. "%' ";
    $sql_search2 .= " ) ";
    $sql_common = " from motif_materials where mm_category = '도배' and ( 1 = 0 ";
}


$sql_order = " order by mm_category ,mm_create_time desc ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search2} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 1000;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search2} {$sql_order} limit {$from_record}, {$rows} ";

//print_r($sql);

$result = sql_query($sql);
?>


<div id=section-choose-wallpaper class="section section-choose">
    <div class="row">
        <div class="total_count im-x gray">도배 검색결과 <?php echo $total_count ?></div>
        <div class="item-div">
            <div class="search-items">
            <?php for($i=0; $row = sql_fetch_array($result); $i++) {?>
            	<div class="w-12-3 fl">
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
            		<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=search'.$qstr.'&amp;page='); ?>
            	</div>
            </div>
        </div>
    </div>
</div>



<?php

if ($_POST[search]) {
    $sql_search3 .= " or mm_category_floorpaper1 like '%" .$_POST[search]. "%' ";
    $sql_search3 .= " or mm_category_floorpaper2 like '%" .$_POST[search]. "%' ";
    $sql_search3 .= " or mm_name like '%" .$_POST[search]. "%' ";
    $sql_search3 .= " or mm_code like '%" .$_POST[search]. "%' ";
    $sql_search3 .= " or mm_descript like '%" .$_POST[search]. "%' ";
    $sql_search3 .= " ) ";
    $sql_common = " from motif_materials where mm_category = '장판' and ( 1 = 0 ";
}

$sql_order = " order by mm_category ,mm_create_time desc ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search3} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 1000;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search3} {$sql_order} limit {$from_record}, {$rows} ";

//print_r($sql);

$result = sql_query($sql);
?>


<div id=section-choose-floorpaper class="section section-choose">
    <div class="row">
        <div class="total_count im-x gray">장판 검색결과 <?php echo $total_count ?></div>
        <div class="item-div">
            <div class="search-items">
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
            		<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=search'.$qstr.'&amp;page='); ?>
            	</div>
            </div>
        </div>
    </div>
</div>



<?php

if ($_POST[search]) {
    $sql_search4 .= " or mm_category_floor like '%" .$_POST[search]. "%' ";
    $sql_search4 .= " or mm_name like '%" .$_POST[search]. "%' ";
    $sql_search4 .= " or mm_code like '%" .$_POST[search]. "%' ";
    $sql_search4 .= " or mm_descript like '%" .$_POST[search]. "%' ";
    $sql_search4 .= " ) ";
    $sql_common = " from motif_materials where mm_category = '마루' and ( 1 = 0 ";
}

$sql_order = " order by mm_category ,mm_create_time desc ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search4} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 1000;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search4} {$sql_order} limit {$from_record}, {$rows} ";

//print_r($sql);

$result = sql_query($sql);
?>


<div id=section-choose-floor class="section section-choose">
    <div class="row">
        <div class="total_count im-x gray">마루 검색결과 <?php echo $total_count ?></div>
        <div class="item-div">
            <div class="search-items">
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
            		<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=search'.$qstr.'&amp;page='); ?>
            	</div>
            </div>
        </div>
    </div>
</div>


<script>
$(function(){
	$( ".search-items .item-over" ).click(function(){
		var child = $( "<img/>" ).attr( "src", $(this).find('.detail-div img').attr( "src" ) );
		popup( child, function(){ });
	});
});
</script>
