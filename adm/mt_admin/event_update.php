<?php
$sub_menu = '800200';
include_once('./_common.php');

check_demo();

if ($w=="")
{
    $sql = " insert into motif_event
                set
                	event_check		= '$event_check',
                	event_memo			= '$event_memo',
                    event_create_time  = current_timestamp(),
                    event_update_time  = current_timestamp()
           ";
    sql_query($sql);

    //$event_id = sql_insert_id();
}
else if ($w=="u")
{
    $sql = " update motif_event
                set
                	event_check		= '$event_check',
                	event_memo			= '$event_memo',
                    event_update_time  = current_timestamp()
              where event_id = '$event_id' ";

    sql_query($sql);
}
else if ($w=="d")
{
    $sql = " delete from motif_event where event_id = $event_id ";
    $result = sql_query($sql);
}


if ($w == "" || $w == "u")
{
    goto_url("./event_form.php?w=u&amp;event_id=$event_id");
} else {
    goto_url("./event_list.php");
}
?>
