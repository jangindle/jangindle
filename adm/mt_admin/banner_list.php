<?php
$sub_menu = "700300";
include_once('./_common.php');

// 테이블이 없다면 생성
if(!sql_query(" DESC motif_banner ", false)) {
sql_query(" CREATE TABLE `motif_banner` (
  `mm_id` int(11) unsigned NOT NULL auto_increment,
  `mm_subject` varchar(255) default NULL,
  `mm_content` text,
  `mm_create_time` timestamp NULL default NULL,
  `mm_update_time` timestamp NULL default NULL,
  `mm_display_time` varchar(20) default NULL,
  `mm_order` int(10) default NULL,
  `mm_type` varchar(20) default NULL,
  `mm_category` varchar(100) default NULL,
  `mm_writer` varchar(100) default NULL,
  `mm_json` text,
  `mm_hide` varchar(5) default NULL,
  `mm_descript` varchar(255) default NULL,
  `mm_location` varchar(100) default NULL,
  `mm_designer` varchar(100) default NULL,
  `mm_season` varchar(100) default NULL,
  `mm_notice` varchar(5) default NULL,
  PRIMARY KEY  (`mm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  ", false);
}

$sql_common = " from motif_banner ";
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
    $sst  = "mm_order, mm_id";
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

$g5['title'] = '배너 관리';
include_once('../admin.head.php');

$colspan = 5;
?>

<div class="local_ov01 local_ov">
    <?php echo $listall ?>
	배너 수 <?php echo number_format($total_count) ?>개
</div>

<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
<label for="sfl" class="sound_only">검색대상</label>
<select name="sfl" id="sfl">
    <option value="mm_subject" <?php echo get_selected($_GET['sfl'], "mm_subject"); ?>>제목</option>
    <option value="mm_descript" <?php echo get_selected($_GET['sfl'], "mm_descript"); ?>>요약</option>
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
        <th scope="col">제목 </th>
        <th scope="col">카테고리 </th>
        <!-- <th scope="col">출력 일자</th> -->
        <th scope="col">등록 일자</th>
        <th scope="col"><?php echo subject_sort_link('mm_order') ?>출력 순서</a></th>
        <th scope="col">관리</th>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        $one_update = '<a href="./banner_form.php?w=u&amp;mm_id='.$row['mm_id'].'&amp;'.$qstr.'">수정</a>';
		$one_delete = '<a onclick="list_delete('.$row['mm_id'].');" >삭제</a>';
        $bg = 'bg'.($i%2);
    ?>
    <tr class="<?php echo $bg; ?>">
        <td class="">
            <?php echo $row["mm_subject"]?>
        </td>
        <td><?php echo $row["mm_category"]?></td>
        <!-- <td><?php echo $row["mm_display_time"]?></td> -->
        <td><?php echo $row["mm_create_time"]?></td>
        <td><?php echo $row["mm_order"]?></td>
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

<div class="btn_list01 btn_list">
    <input type="button" value="배너등록" onclick="location.href='banner_form.php';">
</div>

<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['PHP_SELF'].'?'.$qstr.'&amp;page='); ?>

<script>

function list_delete( no )
{
	if( confirm( "삭제하시겠습니까?" ) )
	{
		location.href = "./banner_update.php?w=d&mm_id=" + no + "&<?php echo $qstr?>";

		return false;
	}

	return false;
}

function delete_check( id )
{
	if( confirm( "삭제하시겟습니까?" ) ) {
		location.href='banner_update.php?w=d&mm_id='+id;
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
