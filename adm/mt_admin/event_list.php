<?php
$sub_menu = "800200";
include_once('./_common.php');

$sql_common = " from motif_event ";
$sql_search = " where (1) ";

if (!$sst) {
    $sst  = "event_id";
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

$g5['title'] = '이벤트 관리';
include_once('../admin.head.php');

$colspan = 6;
?>
<style>
tbody tr{text-align: center;}

</style>
<div class="local_ov01 local_ov">
    <?php echo $listall ?>
	요청 수<?php echo number_format($total_count) ?>개
</div>

<form name="fsearch" id="fsearch"  action="./event_update.php" class="local_sch01 local_sch" method="post" onsubmit="return fboardlist_submit(this);">

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
        <th scope="col"  id="mb_list_chk">
            <label for="chkall" class="sound_only">회원 전체</label>
            <input type="checkbox" name="chkall" value="1" id="chkall" onclick="check_all(this.form)">
        </th>
        <th scope="col">고객 정보</th>
        <th scope="col" width="100">카테고리</th>
        <th scope="col" width="200">날짜</th>
        <th scope="col" width="100">확인 유무</th>
        <th scope="col">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $one_update = '<a href="./event_form.php?w=u&amp;event_id='.$row['event_id'].'&amp;'.$qstr.'">관리</a>';
		$one_delete = '<a onclick="list_delete('.$row['event_id'].');" >삭제</a>';

        $bg = 'bg'.($i%2);
        $json = json_decode($row["json"], true);
    ?>

    <tr class="<?php echo $bg; ?>">
        <input type="hidden" name="event_id[<?php echo $i ?>]" value="<?php echo $row['event_id'] ?>" id="event_id_<?php echo $i ?>">
        <td><input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>"></td>
        <td><a href='event_form.php?w=u&amp;event_id=<?php echo $row["event_id"]?>'><?php echo $json["name"]."/".$json["tel"]?></a></td>
        <td><?php echo $json["type"]?></td>
        <td><?php echo $row["event_create_time"]?></td>
        <td><?php echo $row["event_check"]?></td>
        <td class="td_mngsmall">
            <?php echo $one_update ?>
            <?php
            $member = get_member($_SESSION['ss_mb_id']);
            if($member['mb_id'] == 'admin') echo $one_delete ?>
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
<div class="btn_list01 btn_list">
    <input type="submit" name="act_button" value="선택삭제" onclick="document.pressed=this.value">
</div>

</form>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['PHP_SELF'].'?'.$qstr.'&amp;page='); ?>

<script>
function list_delete( no )
{
	if( confirm( "삭제하시겠습니까?" ) )
	{
		location.href = "./event_update.php?w=d&event_id=" + no + "&<?php echo $qstr?>";

		return false;
	}

	return false;
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
