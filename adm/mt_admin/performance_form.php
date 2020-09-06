<?php
$sub_menu = '800300';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '실적';
$g5['title'] = $html_title.'현황';

if ($w=="u")
{
    $html_title .= ' 수정';
    $sql = " select * from motif_performance where mm_id = '$mm_id' ";
    $performance = sql_fetch($sql);
}
else
{
    $html_title .= ' 입력';
	$performance['mm_display_time'] = date("Y-m-d 00:00:00", time());
}


$mm_qa_id = ( $_GET[qa_id] ) ? $_GET[qa_id] : $performance["mm_qa_id"];

/*
 * motif_performance
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
</script>

<form name="fperformance" action="./performance_update.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="mm_id" value="<?php echo $mm_id; ?>">
<input type="hidden" name="mm_qa_id" value="<?php echo $mm_qa_id; ?>">

<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>
<?php

$sql = "select * from motif_qna where qa_id = '$mm_qa_id'";
$qna = sql_fetch($sql);
//print_r($qna);
?>

    <tr>
        <th scope="row">문의 정보</th>

        <td>
            <a href="/adm/mt_admin/qna_form.php?w=u&qa_id=<?php echo $qna['qa_id']?>&sst=&sod=&sfl=&stx=&page=">
            <?php echo $qna['qa_name'].' / '.$qna['qa_tel']; ?>
            </a>
        </td>

    </tr>


    <?php if($performance['mm_create_time'] != "") {?>
    <tr>
        <th scope="row">등록 일자</th>
        <td>
        	<input type="text" name="mm_display_time" value="<?php echo $performance['mm_create_time']; ?>" class="frm_input" size=21 maxlength=19 readonly>
        </td>
    </tr>
    <?php } ?>

    <tr>
        <th scope="row"><label for="mm_title">실적명</label></th>
        <td>
            <input type="text" name="mm_title" value="<?php echo $performance['mm_title']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_day">시공 일자</label></th>
        <td>
            <input type="text" name="mm_day" value="<?php echo $performance['mm_day']; ?>" class="frm_input" size="100" placeholder="예시) 2018-12-12">
        </td>
    </tr>
    <tr class="category">
        <th scope="row"><label for="mm_alt">평형별</label></th>
        <td>
			<input type="radio" id="mm_20y" name="mm_category" value="20PY" <?php if (isset($performance['mm_category']) && $performance['mm_category'] == "20PY") echo "checked"; ?>/>
			<label for="mm_20y">20PY</label>
			<input type="radio" id="mm_30y" name="mm_category" value="30PY" <?php if (isset($performance['mm_category']) && $performance['mm_category'] == "30PY") echo "checked"; ?>/>
			<label for="mm_30y">30PY</label>
            <input type="radio" id="mm_40y" name="mm_category" value="40PY 이상" <?php if (isset($performance['mm_category']) && $performance['mm_category'] == "40PY 이상") echo "checked"; ?>/>
			<label for="mm_40y">40PY 이상</label>
        </td>
    </tr>
    <tr class="category">
        <th scope="row"><label for="mm_alt">영역별</label></th>
        <td>
			<input type="radio" id="mm_domain1" name="mm_category_domain" value="거실" <?php if (isset($performance['mm_category_domain']) && $performance['mm_category_domain'] == "거실") echo "checked"; ?>/>
			<label for="mm_domain1">거실</label>
			<input type="radio" id="mm_domain2" name="mm_category_domain" value="안방" <?php if (isset($performance['mm_category_domain']) && $performance['mm_category_domain'] == "안방") echo "checked"; ?>/>
			<label for="mm_domain2">안방</label>
			<input type="radio" id="mm_domain3" name="mm_category_domain" value="작은방" <?php if (isset($performance['mm_category_domain']) && $performance['mm_category_domain'] == "작은방") echo "checked"; ?>/>
			<label for="mm_domain3">작은방</label>
			<input type="radio" id="mm_domain4" name="mm_category_domain" value="현관" <?php if (isset($performance['mm_category_domain']) && $performance['mm_category_domain'] == "현관") echo "checked"; ?>/>
			<label for="mm_domain4">현관</label>
			<input type="radio" id="mm_domain5" name="mm_category_domain" value="주방" <?php if (isset($performance['mm_category_domain']) && $performance['mm_category_domain'] == "주방") echo "checked"; ?>/>
			<label for="mm_domain5">주방</label>
			<input type="radio" id="mm_domain6" name="mm_category_domain" value="욕실" <?php if (isset($performance['mm_category_domain']) && $performance['mm_category_domain'] == "욕실") echo "checked"; ?>/>
			<label for="mm_domain6">욕실</label>
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_descript">설명</label></th>
        <td>
            <textarea name="mm_descript"><?php echo $performance['mm_descript']; ?></textarea>
        </td>
    </tr>

    <tr>
        <th scope="row">대표이미지</th>
        <td>
            <input type="file" name="mm_bimg" <?php if( $w != "u" ) echo "require"; ?> >
            <?php
            $bimg_str = "";
            $bimg = G5_DATA_PATH."/motif/performance/{$performance['mm_id']}/{$performance['mm_id']}.jpg";

            if (file_exists($bimg) && $performance['mm_id']) {
                $size = @getimagesize($bimg);
                if($size[0] && $size[0] > 950)
                    $width = 950;
                else
                    $width = $size[0];

                echo '<input type="checkbox" name="mm_bimg_del" value="1" id="mm_bimg_del"> <label for="mm_bimg_del">삭제</label>';
                $bimg_str = '<img src="'.G5_DATA_URL.'/motif/performance/'.$performance['mm_id'].'/'.$performance['mm_id'].'.jpg" style="max-height:300px"'.'>';
            }
            if ($bimg_str) {
                echo '<div class="banner_or_img">';
                echo $bimg_str;
                echo '</div>';
            }
            ?><br/>
            <!-- 950 X 400 -->
        </td>
    </tr>
<style>
/* .detail-img {margin-top:10px}; */
</style>
    <tr>
        <th scope="row">상세이미지1</th>
        <td>
            <input type="file" name="mm_img1" value="<?php if( $w == "u" ) echo $performance['mm_img1']?>">
            <div class="detail-img">
                <a href="<?php echo '/data/motif/performance/'.$performance['mm_id'].'/'.$performance['mm_img1']?>" target="_blank"><?php echo $performance['mm_img1']?></a>
                <?php if($performance['mm_img1']){?>
                    <input type="checkbox" name="mm_img1_del" value="1" id="mm_img1_del"> <label for="mm_img1_del">삭제</label>
                <?php } ?>
            </div>
        </td>
    </tr>

    <tr>
        <th scope="row">상세이미지2</th>
        <td>
            <input type="file" name="mm_img2" value="<?php if( $w == "u" ) echo $performance['mm_img2']?>">
            <div class="detail-img">
                <a href="<?php echo '/data/motif/performance/'.$performance['mm_id'].'/'.$performance['mm_img2']?>" target="_blank"><?php echo $performance['mm_img2']?></a>
                <?php if($performance['mm_img2']){?>
                    <input type="checkbox" name="mm_img2_del" value="1" id="mm_img2_del"> <label for="mm_img2_del">삭제</label>
                <?php } ?>
            </div>
        </td>
    </tr>

    <tr>
        <th scope="row">상세이미지3</th>
        <td>
            <input type="file" name="mm_img3" value="<?php if( $w == "u" ) echo $performance['mm_img3']?>">
            <div class="detail-img">
                <a href="<?php echo '/data/motif/performance/'.$performance['mm_id'].'/'.$performance['mm_img3']?>" target="_blank"><?php echo $performance['mm_img3']?></a>
                <?php if($performance['mm_img3']){?>
                    <input type="checkbox" name="mm_img3_del" value="1" id="mm_img3_del"> <label for="mm_img3_del">삭제</label>
                <?php } ?>
            </div>
        </td>
    </tr>

    <tr>
        <th scope="row">상세이미지4</th>
        <td>
            <input type="file" name="mm_img4" value="<?php if( $w == "u" ) echo $performance['mm_img4']?>">
            <div class="detail-img">
                <a href="<?php echo '/data/motif/performance/'.$performance['mm_id'].'/'.$performance['mm_img4']?>" target="_blank"><?php echo $performance['mm_img4']?></a>
                <?php if($performance['mm_img4']){?>
                    <input type="checkbox" name="mm_img4_del" value="1" id="mm_img4_del"> <label for="mm_img4_del">삭제</label>
                <?php } ?>
            </div>
        </td>
    </tr>

    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./performance_list.php">목록</a>
</div>

</form>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
