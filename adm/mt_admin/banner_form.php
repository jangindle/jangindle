<?php
$sub_menu = '700300';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '배너';
$g5['title'] = $html_title.'관리';

if ($w=="u")
{
    $html_title .= ' 수정';
    $sql = " select * from motif_banner where mm_id = '$mm_id' ";
    $banner = sql_fetch($sql);
}
else
{
    $html_title .= ' 입력';
	$banner['mm_display_time'] = date("Y-m-d 00:00:00", time());
}

    $sql_cate = "select mm_category from motif_banner group by mm_category";
    $result   = sql_query($sql_cate);

/*
 * motif_banner
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

<form name="fbanner" action="./banner_update.php" method="post" enctype="multipart/form-data" onsubmit="return fmagzineformcheck(this)">
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
        	<input type="text" name="mm_display_time" value="<?php echo $banner['mm_display_time']; ?>" class="frm_input" size=21 maxlength=19>
        </td>
    </tr>

    <!-- <tr>
        <th scope="row">옵션</th>
        <td>
        	<input type="checkbox" name="mm_hide" value="Y" > 숨기기
        	<script><?php if( $banner["mm_hide"] == "Y" )	echo "$( '[name=mm_hide]' ).attr( 'checked', 'checked' );"; ?></script>

        </td>
    </tr> -->

    <tr>
        <th scope="row">대표이미지</th>
        <td>
            <input type="file" name="mm_bimg" <?php if( $w != "u" ) echo "require"; ?> >
            <?php
            $bimg_str = "";
            $bimg = G5_DATA_PATH."/motif/banner/{$banner['mm_id']}.jpg";
            if (file_exists($bimg) && $banner['mm_id']) {
                $size = @getimagesize($bimg);
                if($size[0] && $size[0] > 950)
                    $width = 950;
                else
                    $width = $size[0];

                echo '<input type="checkbox" name="mm_bimg_del" value="1" id="mm_bimg_del"> <label for="mm_bimg_del">삭제</label>';
                $bimg_str = '<img src="'.G5_DATA_URL.'/motif/banner/'.$banner['mm_id'].'.jpg" style="max-height:300px"'.'>';
            }
            if ($bimg_str) {
                echo '<div class="banner_or_img">';
                echo $bimg_str;
                echo '</div>';
            }
            ?><!--<br/>
            950 X 400-->
        </td>
    </tr>
      <!-- <tr>
        <th scope="row"><label for="mm_youtube">Youtube</label></th>
        <td>
            <input type="text" name="mm_youtube" value="<?php echo $banner['mm_youtube']; ?>" class="frm_input" size="100">
        </td>
    </tr> -->

    <tr class="category">
        <th scope="row"><label for="mm_alt">출력위치</label></th>
        <td>
			<input class="frm_input" type="text" id="mm_category" name="mm_category" value="<?php echo $banner['mm_category'] ?>" />
			<!-- <label for="mm_banner">배너</label> -->
            <select id="select-category" onchange="document.getElementById('mm_category').value=this.value" >
                <option value="">선택</option>
                <?php for($i=0; $category=sql_fetch_array($result); $i++){?>
                <option value="<?php echo $category['mm_category']?>" <?php if($category['mm_category'] == $banner['mm_category']) {?> selected <?php } ?>><?php echo $category['mm_category']?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_alt">제목</label></th>
        <td>
            <input type="text" name="mm_subject" value="<?php echo $banner['mm_subject']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_descript">설명</label></th>
        <td>
            <input type="text" name="mm_descript" value="<?php echo $banner['mm_descript']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    
    <tr>
        <th scope="row"><label for="mm_writer">주소</label></th>
        <td>
            <input type="text" name="mm_writer" value="<?php echo $banner['mm_writer']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    
    
    <tr>
        <th scope="row"><label for="mm_order">우선순위 (클수록 먼저)</label></th>
        <td>
            <input type="text" name="mm_order" value="<?php echo $banner['mm_order']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    
    
    <tr>
        <th scope="row"><label for="mm_content">버튼</label></th>
        <td>
            <input type="text" name="mm_content" value="<?php echo $banner['mm_content']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./banner_list.php">목록</a>
</div>

</form>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
