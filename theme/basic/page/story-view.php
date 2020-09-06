<?php
$sql = "select * from motif_post where mm_category = 'story' and mm_id = '$_GET[key]'";
$story = sql_fetch($sql);
?>


<div class="section" style="padding-top:120px;">
   
   
   <div id="link-area">
		<div class="row">
			<ul class="im-x">
				<li><a href="/"><i class="fa fa-home"></i>&nbsp; HOME</a></li> &gt;
				<li><a>장인들 이야기</a></li> &gt;
				<li><?php echo $story['mm_subject']?></li>
			</ul>
		</div>
	</div>
  <br/>
   
    <div class="row">
        <div class="im-x">
            <?php echo $story['mm_content']?>
        </div>
    </div>
</div>
