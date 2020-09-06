<?php
$sub_menu = '800200';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '이벤트';
$g5['title'] = $html_title.' 관리';

$sql = " select * from motif_event where event_id = '$event_id' ";

$event = sql_fetch($sql);
$json = json_decode($event["json"], true);

include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<style>
	.tbl_frm01 tr th{width: 15%;}
	.tbl_frm01 tr td{width: 35%;}
    tr{height: 36px;}
</style>

<script>
function fmagzineformcheck(f)
{
	<?php echo get_editor_js('event_memo'); ?>
	return true;
}
</script>

<form name="fcontent" action="./event_update.php" method="post" enctype="multipart/form-data" onsubmit="return fmagzineformcheck(this)">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>

    <tr>
        <th scope="row"><label for="event_name">성명</label></th>
        <td><?php echo $event['event_name']; ?></td>
        <th scope="row"><label for="event_tel">연락처</label></th>
        <td><div><?php echo $event['event_tel']; ?></div></td>
    </tr>

    <tr>
        <th scope="row"><label for="address">주소</label></th>
        <td><div><?php echo $json['address']; ?></div></td>
        <th scope="row"><label for="price">총 비용</label></th>
        <td><div><?php echo number_format($json['price']); ?> 원</div></td>
    </tr>

    <tr>
        <th scope="row"><label for="shipping">배송비</label></th>
        <td><div><?php echo $json['shipping']?></div></td>
        <th scope="row"><label for="wallpaper-number">벽지 번호</label></th>
        <td><div><?php echo $json['wallpaper-number']?></div></td>
    </tr>

    <tr>
        <th scope="row"><label for="silk-option">실크 옵션</label></th>
        <td><div><?php echo $json['silk-option']?></div></td>
        <th scope="row"><label for="silk-option-ea">수량</label></th>
        <td><div><?php echo $json['silk-option-ea']?></div></td>
    </tr>

    <tr>
        <th scope="row"><label for="lumber-option">합지 옵션</label></th>
        <td><div><?php echo $json['lumber-option']?></div></td>
        <th scope="row"><label for="lumber-option-ea">수량</label></th>
        <td><div><?php echo $json['lumber-option-ea']?></div></td>
    </tr>

    <tr>
        <th scope="row"><label for="subsidiary-option">부자재 옵션</label></th>
        <td><div><?php echo $json['subsidiary-option']?></div></td>
        <th scope="row"><label for="subsidiary-option-ea">수량</label></th>
        <td><div><?php echo $json['subsidiary-option-ea']?></div></td>
    </tr>



	<tr>
	  <th scope="row"><label for="event_check">확인</label></th>
	  <td><input type="checkbox" id="event_check" name="event_check" value="Y" <?php if( $event["event_check"] == "Y" ) echo "checked=checked"; ?>/> 처리후 체크하세요</td>
	  <th></th><td></td>
  	</tr>

    <tr>
        <th scope="row"><label for="event_memo">메모</label></th>
		<td colspan="3">
            <?php echo editor_html('event_memo', $event['event_memo']); ?>
        </td>
		<td></td>
    </tr>
    </tbody>
    </table>
</div>

<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./event_list.php">목록</a>
</div>

</form>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
