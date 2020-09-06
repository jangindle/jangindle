<?php
$sub_menu = '800400';
include_once('./_common.php');

check_demo();

if ($w=="")
{
    $sql = " insert into motif_recruit
                set
                	recruit_check		= '$recruit_check',
                	recruit_memo			= '$recruit_memo',
                    recruit_create_time  = current_timestamp(),
                    recruit_update_time  = current_timestamp()
           ";
    sql_query($sql);

    //$recruit_id = sql_insert_id();
}
else if ($w=="u")
{
    $sql = " update motif_recruit
                set
                	recruit_check		= '$recruit_check',
                	recruit_memo			= '$recruit_memo',
                    recruit_update_time  = current_timestamp()
              where recruit_no = '$recruit_no' ";

    sql_query($sql);
}
else if ($w=="d")
{
    $sql = " delete from motif_recruit where recruit_no = $recruit_no ";
    $result = sql_query($sql);
}


if ($w == "" || $w == "u")
{
    goto_url("./recruit_form.php?w=u&amp;recruit_no=$recruit_no");
} else {
    goto_url("./recruit_list.php");
}
?>
