<?php
$sub_menu = '700300';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '자재';
$g5['title'] = $html_title.'관리';

if ($w=="u")
{
    $html_title .= ' 수정';
    $sql = " select * from motif_materials where mm_id = '$mm_id' ";
    $materials = sql_fetch($sql);
}
else
{
    $html_title .= ' 입력';
	$materials['mm_display_time'] = date("Y-m-d 00:00:00", time());
}

/*
 * motif_materials
 * id / subject / content / type / create_time / update_time / order / display_time
*/

include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<style>
	.type-option{ display:none; }
	.type td label{margin-right:10px;}
    .type input{margin-right: 5px;}
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

<form name="fmaterials" action="./materials_update.php" method="post" enctype="multipart/form-data" onsubmit="return fmagzineformcheck(this)">
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

        <?php if($materials['mm_create_time'] != "") {?>
        <tr>
            <th scope="row">등록 일자</th>
            <td>
            	<input type="text" name="mm_display_time" value="<?php echo $materials['mm_create_time']; ?>" class="frm_input" size=21 maxlength=19 readonly>
            </td>
        </tr>
        <?php } ?>
    <tr>
        <th scope="row">대표이미지</th>
        <td>
            <input type="file" name="mm_bimg" <?php if( $w != "u" ) echo "require"; ?> >
            <?php
            $bimg_str = "";
            $bimg = G5_DATA_PATH."/motif/materials/{$materials['mm_id']}/{$materials['mm_id']}.jpg";


            if (file_exists($bimg) && $materials['mm_id']) {
                $size = @getimagesize($bimg);
                if($size[0] && $size[0] > 950)
                    $width = 950;
                else
                    $width = $size[0];

                echo '<input type="checkbox" name="mm_bimg_del" value="1" id="mm_bimg_del"> <label for="mm_bimg_del">삭제</label>';
                $bimg_str = '<img src="'.G5_DATA_URL.'/motif/materials/'.$materials['mm_id'].'/'.$materials['mm_id'].'.jpg" style="max-height:300px"'.'>';
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
        <th scope="row">상세이미지</th>
        <td>
            <input type="file" name="mm_img1" value="<?php if( $w == "u" ) echo $materials['mm_img1']?>">
            <div class="detail-img">
                <a href="<?php echo '/data/motif/materials/'.$materials['mm_id'].'/'.$materials['mm_img1']?>" target="_blank"><?php echo $materials['mm_img1']?></a>
                <?php if($materials['mm_img1']){?>
                    <input type="checkbox" name="mm_img1_del" value="1" id="mm_img1_del"> <label for="mm_img1_del">삭제</label>
                <?php } ?>
            </div>
        </td>
    </tr>

<script>

$(function(){
    $( ".custom_fields" ).hide();

    $('.custom_fields_category').click(function(){

		_cate = $(this).attr( "custom_fields_category" );

		$( ".custom_fields" ).hide();
		$( ".custom_fields[custom_fields="+_cate+"]" ).show();

    });

	$('.custom_fields_category:checked').click();
});

</script>


    <tr class="type category">
        <th scope="row"><label for="mm_alt">Category</label></th>
        <td>
			<label><input type="radio" name="mm_category" class="custom_fields_category" custom_fields_category="wallpaper" value="도배" <?php if (isset($materials['mm_category']) && $materials['mm_category'] == "도배") echo "checked"; ?>/>도배</label>
			<label><input type="radio" name="mm_category" class="custom_fields_category" custom_fields_category="floorpaper" value="장판" <?php if (isset($materials['mm_category']) && $materials['mm_category'] == "장판") echo "checked"; ?>/>장판</label>
            <label><input type="radio" name="mm_category" class="custom_fields_category" custom_fields_category="floor"  value="마루" <?php if (isset($materials['mm_category']) && $materials['mm_category'] == "마루") echo "checked=checked"; ?>/>마루</label>
        </td>
    </tr>

    <tr class="type category-wallpaper custom_fields" custom_fields="wallpaper">
        <th scope="row"><label for="mm_alt">벽지 종류</label></th>
        <td>
			<label><input type="radio" name="mm_category_wallpaper1" value="실크 벽지" <?php if (isset($materials['mm_category_wallpaper1']) && $materials['mm_category_wallpaper1'] == "실크 벽지") echo "checked"; ?>/>실크 벽지</label>
            <label><input type="radio" name="mm_category_wallpaper1" value="합지 벽지" <?php if (isset($materials['mm_category_wallpaper1']) && $materials['mm_category_wallpaper1'] == "합지 벽지") echo "checked"; ?>/>합지 벽지</label>
        </td>
    </tr>

    <tr class="type category-wallpaper custom_fields" custom_fields="wallpaper">
        <th scope="row"><label for="mm_alt">벽지 종류</label></th>
        <td>
			<label><input type="radio" name="mm_category_wallpaper2" value="단색 벽지" <?php if (isset($materials['mm_category_wallpaper2']) && $materials['mm_category_wallpaper2'] == "단색 벽지") echo "checked"; ?>/>단색 벽지</label>
            <label><input type="radio" name="mm_category_wallpaper2" value="패턴 벽지" <?php if (isset($materials['mm_category_wallpaper2']) && $materials['mm_category_wallpaper2'] == "패턴 벽지") echo "checked"; ?>/>패턴 벽지</label>
        </td>
    </tr>

    <tr class="type category-wallpaper custom_fields" custom_fields="floorpaper">
        <th scope="row"><label for="mm_alt">장판 종류</label></th>
        <td>
			<label><input type="radio" name="mm_category_floorpaper1" value="두께 1.8MM" <?php if (isset($materials['mm_category_floorpaper1']) && $materials['mm_category_floorpaper1'] == "두께 1.8MM") echo "checked"; ?>/>두께 1.8MM</label>
            <label><input type="radio" name="mm_category_floorpaper1" value="두께 2.0MM" <?php if (isset($materials['mm_category_floorpaper1']) && $materials['mm_category_floorpaper1'] == "두께 2.0MM") echo "checked"; ?>/>두께 2.0MM</label>
            <label><input type="radio" name="mm_category_floorpaper1" value="두께 2.3MM" <?php if (isset($materials['mm_category_floorpaper1']) && $materials['mm_category_floorpaper1'] == "두께 2.3MM") echo "checked"; ?>/>두께 2.3MM</label>
            <label><input type="radio" name="mm_category_floorpaper1" value="더 두꺼운 장판" <?php if (isset($materials['mm_category_floorpaper1']) && $materials['mm_category_floorpaper1'] == "더 두꺼운 장판") echo "checked"; ?>/>더 두꺼운 장판</label>
        </td>
    </tr>

    <tr class="type category-wallpaper custom_fields" custom_fields="floorpaper">
        <th scope="row"><label for="mm_alt">장판 종류</label></th>
        <td>
			<label><input type="radio" name="mm_category_floorpaper2" value="솔리드" <?php if (isset($materials['mm_category_floorpaper2']) && $materials['mm_category_floorpaper2'] == "솔리드") echo "checked"; ?>/>솔리드</label>
            <label><input type="radio" name="mm_category_floorpaper2" value="우드" <?php if (isset($materials['mm_category_floorpaper2']) && $materials['mm_category_floorpaper2'] == "우드") echo "checked"; ?>/>우드</label>
            <label><input type="radio" name="mm_category_floorpaper2" value="헤링본" <?php if (isset($materials['mm_category_floorpaper2']) && $materials['mm_category_floorpaper2'] == "헤링본") echo "checked"; ?>/>헤링본</label>
            <label><input type="radio" name="mm_category_floorpaper2" value="타일" <?php if (isset($materials['mm_category_floorpaper2']) && $materials['mm_category_floorpaper2'] == "타일") echo "checked"; ?>/>타일</label>
        </td>
    </tr>

    <tr class="type category-floor custom_fields" custom_fields="floor">
        <th scope="row"><label for="mm_alt">마루종류</label></th>
        <td>
			<label><input type="radio" name="mm_category_floor" value="강마루" <?php if (isset($materials['mm_category_floor']) && $materials['mm_category_floor'] == "강마루") echo "checked"; ?>/>강마루</label>
            <label><input type="radio" name="mm_category_floor" value="강화마루" <?php if (isset($materials['mm_category_floor']) && $materials['mm_category_floor'] == "강화마루") echo "checked"; ?>/>강화마루</label>
			<label><input type="radio" name="mm_category_floor" value="데코타일" <?php if (isset($materials['mm_category_floor']) && $materials['mm_category_floor'] == "데코타일") echo "checked"; ?>/>데코타일</label>
        </td>
    </tr>


    <script>
    $(function(){
        $(".color-check").each(function(){
            ( $(this).find( "input" ).prop( "checked" ) ) ? $( this ).addClass( "active" ) : $( this ).removeClass( "active" ) ;
        });
    });

    $( document ).on("click", ".color-check input", function(){
        $(".color-check").each(function(){
            ( $(this).find( "input" ).prop( "checked" ) ) ? $( this ).addClass( "active" ) : $( this ).removeClass( "active" ) ;
        });

    });

    </script>

    <style>
    .color td {background-color: #ececec;}
    .color ul{padding: 0px;margin:0px;}
    .color ul li{list-style: none;display: inline-block;}
    .color-check input{display: none;}
    .color-check img{border: 2px solid #ececec;margin-right: 5px;}
    .color-check.active img {border: 2px solid #ff9932; border-radius: 50%}
    </style>
    <tr class="color">
        <th scope="row"><label for="mm_alt">color</label></th>
        <td>
            <ul>
                <li><label class="color-check"><img src="/assets/images/wallpaper/color01.png"/><input type='checkbox' name="mm_color_wh" value="Y" <?php if (isset($materials['mm_color_wh']) && $materials['mm_color_wh'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/wallpaper/color02.png"/><input type='checkbox' name="mm_color_pk" value="Y" <?php if (isset($materials['mm_color_pk']) && $materials['mm_color_pk'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/wallpaper/color03.png"/><input type='checkbox' name="mm_color_bl" value="Y" <?php if (isset($materials['mm_color_bl']) && $materials['mm_color_bl'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/wallpaper/color04.png"/><input type='checkbox' name="mm_color_gn" value="Y" <?php if (isset($materials['mm_color_gn']) && $materials['mm_color_gn'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/wallpaper/color05.png"/><input type='checkbox' name="mm_color_ye" value="Y" <?php if (isset($materials['mm_color_ye']) && $materials['mm_color_ye'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/floor/color02.png"/><input type='checkbox' name="mm_color_be" value="Y" <?php if (isset($materials['mm_color_be']) && $materials['mm_color_be'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/floor/color03.png"/><input type='checkbox' name="mm_color_oc" value="Y" <?php if (isset($materials['mm_color_oc']) && $materials['mm_color_oc'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/floor/color04.png"/><input type='checkbox' name="mm_color_bn" value="Y" <?php if (isset($materials['mm_color_bn']) && $materials['mm_color_bn'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/floor/color05.png"/><input type='checkbox'name="mm_color_bk" value="Y" <?php if (isset($materials['mm_color_bk']) && $materials['mm_color_bk'] == "Y") echo "checked"; ?> /></label></li>
                <li><label class="color-check"><img src="/assets/images/floor/color06.png"/><input type='checkbox' name="mm_color_etc" value="Y" <?php if (isset($materials['mm_color_etc']) && $materials['mm_color_etc'] == "Y") echo "checked"; ?> /></label></li>
            </ul>
        </td>
    </tr>
    <!-- <tr>
        <th scope="row"><label for="mm_filter">Filter</label></th>
        <td>
            <input type="text" name="mm_filter" value="<?php echo $materials['mm_filter']; ?>" class="frm_input" size="100">
        </td>
    </tr> -->
    <tr>
        <th scope="row"><label for="mm_name">자재명</label></th>
        <td>
            <input type="text" name="mm_name" value="<?php echo $materials['mm_name']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_alt">코드명</label></th>
        <td>
            <input type="text" name="mm_code" value="<?php echo $materials['mm_code']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_descript">설명</label></th>
        <td>
            <input type="text" name="mm_descript" value="<?php echo $materials['mm_descript']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    <tr>
        <th scope="row"><label for="mm_ranking">우선순위 (클수록)</label></th>
        <td>
            <input type="text" name="mm_ranking" value="<?php echo $materials['mm_ranking']; ?>" class="frm_input" size="100">
        </td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./materials_list.php">목록</a>
</div>

</form>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
