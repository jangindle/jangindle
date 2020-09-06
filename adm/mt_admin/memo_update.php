<?php
include_once('./_common.php');

check_demo();

if ($w=="" || $w=="u")
{
    $sql = "insert into motif_memo
                set
                    qa_id		= '$qa_id',
                	qa_memo		= '$qa_memo',
                    mb_id		= '$mb_id',
                    qa_create_time  = current_timestamp(),
                    qa_update_time  = current_timestamp()
           ";

    //print_r($sql)
    //exit();
    sql_query($sql);

    //$qa_id = sql_insert_id();
}
else if ($w=="d")
{
    $sql = " delete from motif_memo where qa_id = $qa_id and comment_num = $comment_num";

    print_r($sql);
    //exit();
    $result = sql_query($sql);


    goto_url("./qna_form.php?w=u&amp;qa_id=$qa_id");
}

if ($w == "" || $w == "u")
{
    goto_url("./qna_form.php?w=u&amp;qa_id=$qa_id");
} else {
    goto_url("./qna_list.php");
}

?>
