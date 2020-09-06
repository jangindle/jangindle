<?php
$sub_menu = '700100';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '포스트';
$g5['title'] = $html_title.'관리';

if ($w=="u")
{
    $html_title .= ' 수정';
    $sql = " select * from motif_post where mm_id = '$mm_id' ";
    $post = sql_fetch($sql);
}
else
{
    $html_title .= ' 입력';
	$post['mm_display_time'] = date("Y-m-d 00:00:00", time());
}

/*
 * motif_post
 * id / subject / content / type / create_time / update_time / order / display_time
*/

include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<style>
	.type-option{ display:none; }
	.category td label, .brand td label {margin-right:10px;}
</style>

<script>
	function fmagzineformcheck(f)
	{
    	<?php echo get_editor_js('mm_content'); ?>
    	return true;
	}

	$( document ).ready(function(){
	});
</script>

<form name="fpost" action="./post_update.php" method="post" enctype="multipart/form-data" onsubmit="return fmagzineformcheck(this)">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="mm_id" value="<?php echo $mm_id; ?>">

<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>

    <tr>
        <th scope="row">일자</th>
        <td>
        	<input type="text" name="mm_display_time" value="<?php echo $post['mm_display_time']; ?>" class="frm_input" size=21 maxlength=19>
        </td>
    </tr>

    <!-- <tr>
        <th scope="row">옵션</th>
        <td>
        	<input type="checkbox" name="mm_hide" value="Y" > 숨기기
        	<script><?php if( $post["mm_hide"] == "Y" )	echo "$( '[name=mm_hide]' ).attr( 'checked', 'checked' );"; ?></script>

        </td>
    </tr> -->

    <tr>
        <th scope="row">대표이미지</th>
        <td>
            <input type="file" name="mm_bimg" <?php if( $w != "u" ) echo "require"; ?> >
            <?php
            $bimg_str = "";
            $bimg = G5_DATA_PATH."/motif/post/{$post['mm_id']}.jpg";
            if (file_exists($bimg) && $post['mm_id']) {
                $size = @getimagesize($bimg);
                if($size[0] && $size[0] > 950)
                    $width = 950;
                else
                    $width = $size[0];

                echo '<input type="checkbox" name="mm_bimg_del" value="1" id="mm_bimg_del"> <label for="mm_bimg_del">삭제</label>';
                $bimg_str = '<img src="'.G5_DATA_URL.'/motif/post/'.$post['mm_id'].'.jpg" style="max-height:300px"'.'>';
            }
            if ($bimg_str) {
                echo '<div class="banner_or_img">';
                echo $bimg_str;
                echo '</div>';
            }
            ?><br/>
            950 X 400
        </td>
    </tr>


    <script>

    $(function(){
        $('.sub_category').hide();

        $(".custom_fields_category").click(function(){

            _cate = $(this).val();

            $('.sub_category').hide();

            $(".sub_category[custom_fields="+_cate+"]").show();

        });

        $(".custom_fields_category:checked").click();
    });

    </script>

    <tr class="category">
        <th scope="row"><label for="mm_alt">Category</label></th>
        <td>
			<input type="radio" id="mm_post" name="mm_category" class="custom_fields_category"  value="post" <?php if (isset($post['mm_category']) && $post['mm_category'] == "post") echo "checked"; ?>/>
			<label for="mm_post">포스트</label>
            <input type="radio" id="mm_story" name="mm_category" class="custom_fields_category" value="story" <?php if (isset($post['mm_category']) && $post['mm_category'] == "story") echo "checked"; ?>/>
			<label for="mm_story">장인들 이야기</label>
        </td>
    </tr>

    <tr class="category sub_category" custom_fields="story">
        <th scope="row"><label for="mm_alt">상세 카테고리</label></th>
        <td>
			<input type="radio" id="mm_tip" name="mm_sub_category" value="INTERIOR TIP" <?php if (isset($post['mm_sub_category']) && $post['mm_sub_category'] == "INTERIOR TIP") echo "checked"; ?>/>
			<label for="mm_tip">INTERIOR TIP</label>
            <input type="radio" id="mm_design" name="mm_sub_category" value="DESIGN TREND" <?php if (isset($post['mm_sub_category']) && $post['mm_sub_category'] == "DESIGN TREND") echo "checked"; ?>/>
			<label for="mm_design">DESIGN TREND</label>
        </td>
    </tr>

    <tr>
        <th scope="row"><label for="mm_alt">대제목</label></th>
        <td>
            <input type="text" name="mm_subject" value="<?php echo $post['mm_subject']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_subject_en">대제목(영어)</label></th>
        <td>
            <input type="text" name="mm_subject_en" value="<?php echo $post['mm_subject_en']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_descript">요약 설명</label></th>
        <td>
            <textarea name="mm_descript" class="frm_input" size="100"><?php echo $post['mm_descript']; ?></textarea>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_alt">내용</label></th>
        <td>
            <?php echo editor_html('mm_content', $post['mm_content']); ?>
        </td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./post_list.php">목록</a>
</div>

</form>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
