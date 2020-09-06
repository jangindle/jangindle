<?php

	include_once('./_common.php');

	$id = $_GET["id"];

    $sql = " select * from motif_performance where mm_id = '$id' ";
    $performance = sql_fetch($sql);

?>


<script>
	$(function(){


		var performanceSlider = new SCarousel( "#performance-info-wrapper .performance-slider", {
			style: {
				parentHeight: true,
				itemWidth: "100%", // string
				itemMaxWidth: "100%", // string
				onPosition: "center", // left, center
				infinite: true, // boolean
			},
			update: {
				mode: "slide", // slide,
				speed: 1000, // number
				relative: false, // boolean
				auto: 8000, // number
			},
			interface: {
				dots: true, // boolean
				pointers: true, // boolean
				draggable: true, // boolean
			},
		});
		performanceSlider.build();

	});
</script>
<style>
	.mobile #performance-info-wrapper .carousel .dots{ bottom:0px;}

	#performance-info-wrapper .carousel .dots{ text-align:center; }
	.performance-slider{height:100%;}
	.performance-slider ul li{ background-size:cover; background-position:center; }
</style>



<div style="position:relative;" id="performance-info-wrapper">

	<div class="fl w-12-8" style="height:440px;">

		<div class="performance-slider">
			<ul>
				<li style="background-image:url(/data/motif/performance/<?php echo $performance['mm_id'] ?>/<?php echo $performance['mm_id'] ?>.jpg)"></li>
				<?php
				for( $i = 1; $pic = $performance['mm_img'.$i]; $i++ ){?>
				<li style="background-image:url(/data/motif/performance/<?php echo $performance['mm_id'] ?>/<?php echo $pic?>)"></li>
				<?php }?>
			</ul>
		</div>

	</div>
	<div class="fl w-12-4 texts" >
		<div class="im-x">

			<div class="title"><?php echo $performance['mm_title'] ?></div>
			<div class="date"><?php echo $performance['mm_day'] ?></div>

			<div class="detail">
				<?php echo $performance['mm_descript'] ?>
			</div>

		</div>
	</div>

<?php

$id = $_GET["chip"];
$sql = "select * from motif_qna where qa_add_status = '처리 완료' and qa_id = '$id' ";
$result = sql_fetch($sql);
$detail = explode(',' , $result['qa_add_code']);
$sql = "select * from motif_materials where mm_code in ('".implode( "', '",$detail  )."')";
$result = sql_query($sql);
?>


	<div class="chips">
		<?php for($i=0; $chip = sql_fetch_array($result); $i++ ){ ?>
		<div class="fl">
			<img style="width:40px;height:40px; margin:0 auto;" src="/data/motif/materials/<?php echo $chip['mm_id'] ?>/<?php echo $chip['mm_id'] ?>.jpg"/>
			<div class="title">ED80291</div>
		</div>
	<?php } ?>
	</div>
	<div class="clear"></div>
</div>
