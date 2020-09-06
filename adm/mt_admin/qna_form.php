<?php
$sub_menu = '800100';
include_once('./_common.php');
include_once(G5_EDITOR_LIB);

auth_check($auth[$sub_menu], "w");

$html_title = '문의';
$g5['title'] = $html_title.' 관리';


$sql = " select * from motif_qna where qa_id = '$qa_id' ";
$qna = sql_fetch($sql);
$json = json_decode($qna["qa_contents"], true);


include_once (G5_ADMIN_PATH.'/admin.head.php');
?>

<style>
	.tbl_frm01 tr th{width: 15%;}
	.tbl_frm01 tr td{width: 35%;}
</style>

<script>
	function fmagzineformcheck(f)
	{
    	<?php echo get_editor_js('qa_memo'); ?>
    	return true;
	}
	$( document ).ready(function(){
});
</script>

<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="qa_id" value="<?php echo $qa_id; ?>">
<div class="tbl_frm01 tbl_wrap">
    <table>
    <caption><?php echo $g5['title']; ?></caption>
    <colgroup>
        <col class="grid_4">
        <col>
    </colgroup>
    <tbody>

    <tr>
        <th scope="row"><label for="qa_title">성명</label></th>
        <td><?php echo $qna['qa_name']; ?></td>
        <th scope="row"><label for="qa_title">phone</label></th>
        <td><div><?php echo $qna['qa_tel']; ?></div></td>
    </tr>

    <tr>
        <th scope="row"><label for="c-date">시공날짜</label></th>
        <td><div><?php echo $json['c-date']; ?></div></td>
        <th scope="row"><label for="total">총 견적</label></th>
        <td><div><?php echo $json['price']; ?> 만원</div></td>
    </tr>

    <tr>
        <th scope="row"><label for="qa_title">카테고리</label></th>
        <td><div><?php echo $json["type"]?></div></td>
    </tr>


 <?php if($json['type'] =='도배'){ ?>

    <tr>
        <th scope="row"><label for="option-area">해당지역</label></th>
        <td><div><?php echo $json['option-area']; ?></div></td>
        <th scope="row"><label for="option-pyeong">공급면적(평)</label></th>
        <td><div><?php echo $json['option-pyeong']; ?></div></td>
    </tr>
    <tr>
        <th scope="row"><label for="w-veranda">배란다 확장 유무</label></th>
        <td><div><?php echo $json['w-veranda']; ?></div></td>
        <th scope="row"><label for="w-ceiling">천장시공 포함 유무</label></th>
        <td><div><?php echo $json['w-ceiling']; ?></div></td>
    </tr>
    <tr>
        <th scope="row"><label for="w-stay">거주중 유무</label></th>
        <td><div><?php echo $json['w-stay']; ?></div></td>
        <th scope="row"><label for="w-papering">벽지종류</label></th>
        <td><div><?php echo $json['w-papering']; ?></div></td>
    </tr>

<?php } else if ($json['type'] =='장판') {?>

    <tr>
        <th scope="row"><label for="option-area">해당지역</label></th>
        <td><div><?php echo $json['option-area']; ?></div></td>
        <th scope="row"><label for="option-pyeong">공급면적(평)</label></th>
        <td><div><?php echo $json['option-pyeong']; ?></div></td>
    </tr>
    <tr>
        <th scope="row"><label for="p-veranda">배란다 확장 유무</label></th>
        <td><div><?php echo $json['p-veranda']; ?></div></td>
        <th scope="row"><label for="p-all">집 전체 or 방</label></th>
        <td><div><?php echo $json['p-all']; ?></div></td>
    </tr>
    <tr>
        <th scope="row"><label for="p-stay">거주중 유무</label></th>
        <td><div><?php echo $json['p-stay']; ?></div></td>
        <th scope="row"><label for="p-floorpaper">장판 종류</label></th>
        <td><div><?php echo $json['p-floorpaper']; ?></div></td>
    </tr>

<?php } else if($json['type'] == '마루') { ?>

    <tr>
        <th scope="row"><label for="option-area">해당지역</label></th>
        <td><div><?php echo $json['option-area']; ?></div></td>
        <th scope="row"><label for="option-pyeong">공급면적(평)</label></th>
        <td><div><?php echo $json['option-pyeong']; ?></div></td>
    </tr>
    <tr>
        <th scope="row"><label for="f-veranda">배란다 확장 유무</label></th>
        <td><div><?php echo $json['f-veranda']; ?></div></td>
        <th scope="row"><label for="f-existing">기존 바닥재 유무</label></th>
        <td><div><?php echo $json['f-existing']; ?></div></td>
    </tr>
    <tr>
        <th scope="row"><label for="f-stay">거주중 유무</label></th>
        <td><div><?php echo $json['f-stay']; ?></div></td>
        <th scope="row"><label for="f-floor">마루 종류</label></th>
        <td><div><?php echo $json['f-floor']; ?></div></td>
    </tr>
<?php } ?>

    <!-- <tr>
        <th scope="row"><label for="qa_check">처리</label></th>
        <td><input ="checkbox" name="qa_check" value="Y" <?php if( $qna["qa_check"] == "Y" ) echo "checked=checked"; ?>/> 처리후 체크하세요</td>
    </tr>

    <tr>
        <th scope="row"><label for="qa_memo">메모</label></th>
        <td>
            <textarea name="qa_memo"><?php echo $qna["qa_memo"]?></textarea>
        </td>
    </tr> -->

    </tbody>
    </table>
</div>


<br/>

<form name="fcontent" action="./qna_update.php" method="post" enctype="multipart/form-data" onsubmit="return fmagzineformcheck(this)">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="qa_id" value="<?php echo $qna['qa_id']; ?>">
<div class="tbl_frm01 tbl_wrap">
    <table>

		<tr>
			<th scope="row"><label for="qa_add_tel">연락처</label></th>
			<td><input type="text" class="frm_input" name="qa_add_tel" style="width:80%" value="<?php echo $qna['qa_add_tel'] ?>"  <?php $member = get_member($_SESSION['ss_mb_id']); if($member['mb_id'] == 'manager') echo "disabled" ?>/></td>
			<th scope="row"><label for="qa_add_addr">주소</label></th>
			<td><input type="text" class="frm_input" name="qa_add_addr" style="width:80%" value="<?php echo $qna['qa_add_addr'] ?>" <?php $member = get_member($_SESSION['ss_mb_id']); if($member['mb_id'] == 'manager') echo "disabled" ?>/></td>
		</tr>

		<tr>
			<th scope="row"><label for="qa_add_code">사용자재 코드 </label></th>
			<td colspan="3"><input type="text" class="frm_input" name="qa_add_code" style="width:40%" value="<?php echo $qna['qa_add_code'] ?>" <?php $member = get_member($_SESSION['ss_mb_id']); if($member['mb_id'] == 'manager') echo "disabled" ?>/> ','로 구분해서 넣으세요</td>
		</tr>

		<style>
		.status td label{margin-right: 5px;}
		</style>
		<tr class="status">
			<th scope="row"><label for="option-area">진행 상태</label></th>
			<td colspan="2">
				<label><input type="radio" name="qa_add_status" value="상담완료" <?php if(isset($qna['qa_add_status']) && $qna['qa_add_status'] == '상담완료') echo "checked"; ?>/> 상담완료</label>
				<label><input type="radio" name="qa_add_status" value="계약금 입금확인" <?php if(isset($qna['qa_add_status']) && $qna['qa_add_status'] == '계약금 입금확인') echo "checked"; ?>/> 계약금 입금확인</label>
				<label><input type="radio" name="qa_add_status" value="담당자 배정" <?php if(isset($qna['qa_add_status']) && $qna['qa_add_status'] == '담당자 배정') echo "checked"; ?>/> 담당자 배정</label>
				<label><input type="radio" name="qa_add_status" value="시공진행" <?php if(isset($qna['qa_add_status']) && $qna['qa_add_status'] == '시공진행') echo "checked"; ?>/> 시공진행</label>
				<label><input type="radio" name="qa_add_status" value="잔금 입금확인" <?php if(isset($qna['qa_add_status']) && $qna['qa_add_status'] == '잔금 입금확인') echo "checked"; ?>/> 잔금 입금확인</label>
				<label><input type="radio" name="qa_add_status" value="시공 완료" <?php if(isset($qna['qa_add_status']) && $qna['qa_add_status'] == '시공 완료') echo "checked"; ?>/> 시공 완료</label>
			</td>

			<style>
			.performance input, .performance a{padding: 7px}
			</style>

			<td class="btn_list01 btn_list performance" style="padding:0px;">
				<?php
				$sql = " select * from motif_performance where mm_qa_id = '$qa_id' ";
				$performance = sql_fetch($sql);
				if(isset($qna['qa_add_status']) && $qna['qa_add_status'] == '시공 완료' && $performance['mm_qa_id'] == '') { ?>
				<input type="button" value="실적 등록" onclick="location.href='performance_form.php?qa_id=<?php echo $qna['qa_id']; ?>';">
				<?php } ?>

				<?php if(isset($performance['mm_qa_id'])) {
					$one_update = '<a href="./performance_form.php?w=u&amp;mm_id='.$performance['mm_id'].'&amp;mm_qa_id='.$qna['qa_id'].'&amp;'.$qstr.'">실적 수정</a>';
					echo $one_update;
				}
				?>
			</td>
		</tr>
    </table>
</div>
<div class="btn_confirm01 btn_confirm">
	<?php
	$member = get_member($_SESSION['ss_mb_id']);
	if($member['mb_id'] == 'admin') { ?>
	<input type="submit" value="추가정보 저장" class="btn_submit" accesskey="s">
	<?php } ?>
</div>
</form>


<h2>상담내용</h2>

<?php
$sql = "select * from motif_memo where qa_id = '$qa_id' ";
$result = sql_query($sql);
?>

<div class="tbl_frm01 tbl_wrap">
    <form name="fcontent" action="./memo_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="w" value="d">
    <input type="hidden" name="qa_id" value="<?php echo $qa_id; ?>">


        <table>
            <?php for( $i=0; $row=sql_fetch_array($result); $i++ ){ ?>

            <input type="hidden" name="comment_num" value="<?php echo $row['comment_num']; ?>">
            <tr>
                <td>
                    <div style='padding:10px;'>
						<?php echo $row['qa_create_time'];?> / <?php echo $row['mb_id'];?><br/><br/>
						<?php echo $row["qa_memo"]?>

						<?php $ss_id = $_SESSION['ss_mb_id']; $mb_id = $row['mb_id'];
							if($ss_id == $mb_id){ ?>
							<!--<button type="submit" onclick="fn_delete_confirm();">삭제</button>-->
						<?php } ?>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>
    </form>
</div>




<form name="fcontent" action="./memo_update.php" method="post" enctype="multipart/form-data" onsubmit="return fmagzineformcheck(this)">
<input type="hidden" name="w" value="<?php echo $w; ?>">
<input type="hidden" name="qa_id" value="<?php echo $qna['qa_id']; ?>">
<input type="hidden" name="mb_id" value="<?php echo $_SESSION['ss_mb_id']; ?>">
<div class="tbl_frm01 tbl_wrap">
    <table>

        <tr>
            <td colspan="4">
               <?php echo editor_html('qa_memo', $post['qa_memo']); ?>
            </td>
        </tr>
    </table>
</div>
<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="상담내용 저장하기" class="btn_submit" accesskey="s">
    <a href="./qna_list.php">목록</a>
</div>
</form>


<script>

    function fn_delete_confirm(){
        if(!confirm("삭제 하시겠습니까?")){
            return false;
        }
    }

</script>

<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
