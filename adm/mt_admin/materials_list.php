<?php
$sub_menu = "700300";
include_once('./_common.php');

$sql_common = " from motif_materials ";
$sql_search = " where (1) ";
if ($stx) {
    $sql_search .= " and ( ";
    switch ($sfl) {
        default :
            $sql_search .= " ({$sfl} like '%{$stx}%') ";
            break;
    }
    $sql_search .= " ) ";
}

if (!$sst) {
    $sst  = "mm_id";
    $sod = "desc";
}
$sql_order = " order by $sst $sod ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";

$result = sql_query($sql);

$listall = '<a href="'.$_SERVER['PHP_SELF'].'" class="ov_listall">전체목록</a>';

$g5['title'] = '자재 관리';
include_once('../admin.head.php');

$colspan = 5;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
	자재 수 <?php echo number_format($total_count) ?>개
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl">
    <option value="mm_code" <?php echo get_selected($_GET['sfl'], "mm_code"); ?>>코드</option>
    <option value="mm_descript" <?php echo get_selected($_GET['sfl'], "mm_descript"); ?>>설명</option>
    <option value="mm_category" <?php echo get_selected($_GET['sfl'], "mm_category"); ?>>카테고리</option>
</select>
<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
<input type="submit" class="btn_submit" value="검색">
</form>

<form name="fsearch" id="fsearch" class="local_sch01 local_sch" method="get">

<input type="hidden" name="sst" value="<?php echo $sst ?>">
<input type="hidden" name="sod" value="<?php echo $sod ?>">
<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
<input type="hidden" name="stx" value="<?php echo $stx ?>">
<input type="hidden" name="page" value="<?php echo $page ?>">
<input type="hidden" name="token" value="<?php echo $token ?>">

<div class="tbl_head01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?> 목록</caption>
    <thead>
    <tr>
        <th scope="col">자재명</th>
        <th scope="col">카테고리 </th>
        <th scope="col">자재코드 </th>
        <th scope="col">등록 일자</th>
        <th scope="col">랭킹</th>
        <th scope="col">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $one_update = '<a href="./materials_form.php?w=u&amp;mm_id='.$row['mm_id'].'&amp;'.$qstr.'">수정</a>';
		$one_delete = '<a onclick="list_delete('.$row['mm_id'].');" >삭제</a>';
        $bg = 'bg'.($i%2);
    ?>

    <tr class="<?php echo $bg; ?>">
        <td class="mm_subject">
            <?php echo $row["mm_name"]?>
            <?php $bimg = G5_DATA_URL."/motif/materials/{$row['mm_id']}/{$row['mm_id']}.jpg";?>
            <img class="m-img" src="<?php echo $bimg?>"/>
        </td>
        <td>
        	<?php echo $row["mm_category"]?>

        	| <?php echo $row["mm_category_wallpaper1"]?> <?php echo $row["mm_category_floorpaper1"]?> <?php echo $row["mm_category_floor"]?>
        	| <?php echo $row["mm_category_wallpaper2"]?> <?php echo $row["mm_category_floorpaper2"]?>
        </td>
        <td><?php echo $row["mm_code"]?></td>
        <!-- <td><?php echo $row["mm_display_time"]?></td> -->
        <td><?php echo $row["mm_create_time"]?></td>
        <td><?php echo $row["mm_ranking"]?></td>
        <td class="td_mngsmall">
            <?php echo $one_update ?>
            <?php $member = get_member($_SESSION['ss_mb_id']); if($member['mb_id'] == 'admin') echo $one_delete ?>
        </td>
    </tr>
    <?php
    }
    if ($i == 0)
        echo '<tr><td colspan="'.$colspan.'" class="empty_table">자료가 없습니다.</td></tr>';
    ?>
    </tbody>
    </table>
</div>

<style>
.mm_subject{ position: relative; }
.mm_subject img{ display: none; position:absolute; border: 1px solid #ddd; width: 140px; height: auto; z-index: 1; top: 36px; left: 0; }
</style>
<script>

        $(".mm_subject").hover(function( e ){

            var _thumb = $( "img", $(this) );
            _thumb.show();

        }, function(){

            var _thumb = $( "img", $(this) );
            _thumb.hide();

        })

</script>

<div class="btn_list01 btn_list">
    <input type="button" value="자재 등록" onclick="location.href='materials_form.php';">
</div>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['PHP_SELF'].'?'.$qstr.'&amp;page='); ?>

<script>

function list_delete( no )
{
	if( confirm( "삭제하시겠습니까?" ) )
	{
		location.href = "./materials_update.php?w=d&mm_id=" + no + "&<?php echo $qstr?>";

		return false;
	}

	return false;
}

function delete_check( id )
{
	if( confirm( "삭제하시겟습니까?" ) ) {
		location.href='materials_update.php?w=d&mm_id='+id;
	}
}

function fboardlist_submit(f)
{
    if (!is_checked("chk[]")) {
        alert(document.pressed+" 하실 항목을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택삭제") {
        if(!confirm("선택한 자료를 정말 삭제하시겠습니까?")) {
            return false;
        }
    }

    return true;
}

$(function(){
    $(".board_copy").click(function(){
        window.open(this.href, "win_board_copy", "left=100,top=100,width=550,height=450");
        return false;
    });
});
</script>

<?php
include_once('../admin.tail.php');
?>
