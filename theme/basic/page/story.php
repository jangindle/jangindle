

<?php
include_once('./_common.php');

$sql_common = " from motif_post where mm_category ='story'";
$sql_order = " order by mm_id desc ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];
//echo $total_count;

$config['cf_page_rows'] = 12;
$rows = $config['cf_page_rows'];
$page = $_GET[page];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";

$result = sql_query($sql);
?>

<style>
#section-story img{margin:0 auto; width: 100%;}
#section-story .story-item{ margin-bottom:20px; cursor:pointer; }

#section-story .contents-div{background: #fff; position: absolute; bottom: 0;width: 100%} /* opacity: 0.98;  */
#section-story .contents-div .contents-inner{padding: 10px 0px;}
#section-story .contents-div .contents-inner .underline{border-bottom: 1px solid black;}
#section-story .contents-div .contents-inner .underline .category {color: #ff8d20; font-weight:700; ;} /* font-size:1.3em */
#section-story .contents-div .contents-inner .underline .more{color:#bdbdbd; line-height: 33px;}
#section-story .contents-div .contents-inner .title{font-weight: 600; font-size: 1.2em;}
#section-story .contents-div .contents-inner .description{line-height: 1.5em; height: 44px; overflow-y:hidden;}
#section-story .story-item .im-x{ background-size:cover; padding-top:400px; background-position: center;}
</style>

<script>

	$(function(){

		$( '#section-story .story-item' ).click(function(){
			location.href = $(this).find( 'a' ).attr('href');
		}) ;

	})
</script>
<div id="section-story" class="section" style="padding-top:120px;">
	<div id="link-area" style="padding-bottom:60px;">
		<div class="row">
			<ul class="im-x">
				<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> >
				<li><a>장인들</a></li> >
				<li>장인들이야기</li>
			</ul>
		</div>
	</div>

	<div class="section-title">
		장인들 이야기
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

        <?php if ($total_count == 0)
        	echo '<div class="empty" style="text-align:center;">자료가 없습니다.</div>';
        ?>
    	<div class="list-paging clear">
    		<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, '/?p=story'.$qstr.'&amp;page='); ?>
    	</div>
	</div>
</div>
