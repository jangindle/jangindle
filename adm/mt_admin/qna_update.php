<?php
$sub_menu = '800100';
include_once('./_common.php');

check_demo();

if ($_POST['act_button'] == "선택삭제") {

    print_r($_POST);

    for ($i=0; $i<count($_POST['chk']); $i++)
    {
        // 실제 번호를 넘김
        $k = $_POST['chk'][$i];

        $mm = $_POST['qa_id'][$k];

        $sql = " delete from motif_qna where qa_id = $mm ";

        $result = sql_query($sql);

    }

    goto_url("./qna_list.php");
}


if ($w=="")
{
    $sql = " insert into motif_qna
                set
                	qa_add_tel		= '$qa_add_tel',
                	qa_add_addr		= '$qa_add_addr',
                    qa_add_code		= '$qa_add_code',
                    qa_add_status	= '$qa_add_status',

                    qa_create_time  = current_timestamp(),
                    qa_update_time  = current_timestamp()
           ";
    sql_query($sql);

    $qa_id = sql_insert_id();
}
else if ($w=="u")
{
    $sql = " update motif_qna
                set
                    qa_add_tel		= '$qa_add_tel',
                    qa_add_addr		= '$qa_add_addr',
                    qa_add_code		= '$qa_add_code',
                    qa_add_status	= '$qa_add_status',
                    qa_update_time  = current_timestamp()
              where qa_id = '$qa_id' ";

    sql_query($sql);
}
else if ($w=="d")
{
    $sql = " delete from motif_qna where qa_id = $qa_id ";
    $result = sql_query($sql);
}



if ($w == "" || $w == "u")
{
    goto_url("./qna_form.php?w=u&amp;qa_id=$qa_id");
} else {
    goto_url("./qna_list.php");
}
?>
