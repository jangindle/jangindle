

<?php
$sql = "select * from motif_post where mm_category = 'post' order by mm_id desc";
$result = sql_query($sql);
?>

<div id="section-post" class="section" style="padding-top:120px;">
	<div id="link-area" style="padding-bottom:60px;">
		<div class="row">
			<ul class="im-x">
				<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> >
				<li><a>도배</a></li> >
				<li>장인들이야기</li>
			</ul>
		</div>
	</div>
    <div class="row">
        <div class="im-x">
			<?php for($i = 0 ; $row=sql_fetch_array($result); $i++){?>

            <div class="post">
				<a href="/?p=post-view&key=<?php echo $row['mm_id'] ?>">
	                <img src="/data/motif/post/<?php echo $row['mm_id']?>.jpg"/>
	                <p><?php echo $row['mm_subject'];?><span class="gray en"><?php echo $row['mm_subject_en'] ?></span></p>
	                <p class="gray"><?php echo nl2br($row['mm_descript'])?></p>
				</a>
            </div>
			<?php } ?>
        </div>
    </div>
</div>
