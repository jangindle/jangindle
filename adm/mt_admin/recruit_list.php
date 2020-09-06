<?php
$sub_menu = "800400";
include_once('./_common.php');

$sql_common = " from motif_recruit ";
$sql_search = " where (1) ";

if (!$sst) {
    $sst  = "recruit_no";
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

$g5['title'] = '입사 지원 관리';
include_once('../admin.head.php');

$colspan = 5;
?>
<style>
tbody tr{text-align: center;}

</style>
<div class="local_ov01 local_ov">
    <?php echo $listall ?>
	지원자 수<?php echo number_format($total_count) ?>명
</div>

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
        <th scope="col">성명</th>
        <th scope="col">전화번호</th>
        <th scope="col">거주지</th>
        <th scope="col">경력</th>
        <th scope="col">카테고리</th>
        <th scope="col">날짜</th>
        <th scope="col">확인</th>
        <th scope="col">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $one_update = '<a href="./recruit_form.php?w=u&amp;recruit_no='.$row['recruit_no'].'&amp;'.$qstr.'">관리</a>';
		$one_delete = '<a onclick="list_delete('.$row['recruit_no'].');" >삭제</a>';

        $bg = 'bg'.($i%2);
    ?>

    <tr class="<?php echo $bg; ?>">
        <td><?php echo $row["recruit_name"]?></td>
        <td><?php echo $row["recruit_tel"]?></td>
        <td><?php echo $row["recruit_resd"]?></td>
        <td><?php echo $row["recruit_career"]?></td>
        <td><?php echo $row["recruit_type"]?></td>
        <td><?php echo $row["recruit_create_time"]?></td>
        <td><?php echo $row["recruit_check"]?></td>
        <td class="td_mngsmall">
            <?php echo $one_update ?>
            <?php echo $one_delete ?>
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


<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['PHP_SELF'].'?'.$qstr.'&amp;page='); ?>

<script>
function list_delete( no )
{
	if( confirm( "삭제하시겠습니까?" ) )
	{
		location.href = "./recruit_update.php?w=d&recruit_no=" + no + "&<?php echo $qstr?>";

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
