<?php
$sub_menu = '800400';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '입사 지원';
$g5['title'] = $html_title.' 관리';

$sql = " select * from motif_recruit where recruit_no = '$recruit_no' ";

$recruit = sql_fetch($sql);

include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<style>
	.tbl_frm01 tr th{width: 15%;}
	.tbl_frm01 tr td{width: 35%;}
</style>

<script>
function fmagzineformcheck(f)
{
	<?php echo get_editor_js('recruit_memo'); ?>
	return true;
}
</script>

<form name="fcontent" action="./recruit_update.php" method="post" enctype="multipart/form-data" onsubmit="return fmagzineformcheck(this)">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="recruit_no" value="<?php echo $recruit_no; ?>">
<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>

    <tr>
        <th scope="row"><label for="recruit_name">성명</label></th>
        <td><?php echo $recruit['recruit_name']; ?></td>
        <th scope="row"><label for="qa_title">tel</label></th>
        <td><div><?php echo $recruit['recruit_tel']; ?></div></td>
    </tr>

    <tr>
        <th scope="row"><label for="recruit_resd">거주지</label></th>
        <td><div><?php echo $recruit['recruit_resd']; ?></div></td>
        <th scope="row"><label for="recruit_career">경력</label></th>
        <td><div><?php echo $recruit['recruit_career']; ?></div></td>
    </tr>

    <tr>
        <th scope="row"><label for="recruit_type">카테고리</label></th>
        <td><div><?php echo $recruit['recruit_type']?></div></td>
    <?php if($recruit['recruit_type']=='장인') { ?>
        <th scope="row"><label for="recruit_master">비고</label></th>
        <td><div><?php echo $recruit['recruit_master_wallpaper'].' &nbsp; '.$recruit['recruit_master_floorpaper'].' &nbsp; '.$recruit['recruit_master_floor']?></div></td>
    <?php } else { ?>
        <th scope="row"><label for="recruit_resume">이력서</label></th>
        <td><div><a target="_blank" href="<?php echo '/data/jangin/recruit/'.$recruit['recruit_no'].'/'.$recruit['recruit_resume']?>"><?php echo $recruit['recruit_resume'] ?></a></div></td>
    <?php } ?>
    </tr>
    <?php if($recruit['recruit_type']=='장인') { ?>
    <tr>
        <th scope="row"><label for="recruit_car">차량 유무</label></th>
        <td><div><?php echo $recruit['recruit_car']?></div></td>
        <th scope="row"><label for="recruit_mach">풀기계 유무</label></th>
        <td><div><?php echo $recruit['recruit_mach']?></div></td>
    </tr>
    <?php } ?>

	<tr>
	  <th scope="row"><label for="recruit_check">확인</label></th>
	  <td><input type="checkbox" id="recruit_check" name="recruit_check" value="Y" <?php if( $recruit["recruit_check"] == "Y" ) echo "checked=checked"; ?>/> 처리후 체크하세요</td>
	  <th></th><td></td>
  	</tr>

    <tr>
        <th scope="row"><label for="recruit_memo">메모</label></th>
		<td colspan="3">
            <?php echo editor_html('recruit_memo', $recruit['recruit_memo']); ?>
        </td>
		<td></td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./recruit_list.php">목록</a>
</div>

</form>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
