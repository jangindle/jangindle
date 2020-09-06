<?php
$sub_menu = "800100";
include_once('./_common.php');

// 테이블이 없다면 생성
if(!sql_query(" DESC motif_qna ", false)) {
sql_query(" CREATE TABLE `motif_qna` (
  `qa_id` int(11) NOT NULL auto_increment,
  `mb_id` varchar(255) NOT NULL,

  `qa_name` varchar(255) default NULL,
  `qa_email` varchar(255) default NULL,
  `qa_tel` varchar(255) default NULL,
  `qa_ordernum` varchar(255) NOT NULL,

  `qa_title` varchar(255) NOT NULL,
  `qa_contents` longtext default NULL,
  `qa_ip` varchar(255) NOT NULL,
  `qa_update_time` timestamp NULL default NULL,
  `qa_create_time` timestamp NULL default NULL,
    PRIMARY KEY  (`qa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  ", false);
}


$sql_common = " from motif_qna ";
$sql_search = " where (1) ";

if (!$sst) {
    $sst  = "qa_id";
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

$g5['title'] = '문의 관리';
include_once('../admin.head.php');

$colspan = 5;
?>
<style>
tbody tr{text-align: center;}

</style>
<div class="local_ov01 local_ov">
    <?php echo $listall ?>
	문의 수<?php echo number_format($total_count) ?>개
</div>

<form name="fsearch" id="fsearch"  action="./qna_update.php" class="local_sch01 local_sch" method="post" onsubmit="return fboardlist_submit(this);">

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
        <th scope="col" width="100">진행상태</th>
        <th scope="col">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $one_update = '<a href="./qna_form.php?w=u&amp;qa_id='.$row['qa_id'].'&amp;'.$qstr.'">관리</a>';
		$one_delete = '<a onclick="list_delete('.$row['qa_id'].');" >삭제</a>';

        $bg = 'bg'.($i%2);
        $json = json_decode($row["qa_contents"], true);
    ?>

    <tr class="<?php echo $bg; ?>">
        <input type="hidden" name="qa_id[<?php echo $i ?>]" value="<?php echo $row['qa_id'] ?>" id="qa_id_<?php echo $i ?>">
        <td><input type="checkbox" name="chk[]" value="<?php echo $i ?>" id="chk_<?php echo $i ?>"></td>
        <td><a href='qna_form.php?w=u&amp;qa_id=<?php echo $row["qa_id"]?>'><?php echo $json["name"]."/".$json["tel"]."/".$json["c-date"]?></a></td>
        <td><?php echo $json["type"]?></td>
        <td><?php echo $row["qa_create_time"]?></td>
        <td><?php echo $row["qa_add_status"]?></td>
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
		location.href = "./qna_update.php?w=d&qa_id=" + no + "&<?php echo $qstr?>";

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
