<?php
$key = $_GET['key'];
$sql = "select * from motif_post where mm_id = '$key' order by mm_id desc";
$post = sql_fetch($sql);
?>


<div class="section">
    <div class="row">
        <div class="im-x">
            <?php echo $post['mm_content']?>
        </div>
    </div>
</div>
