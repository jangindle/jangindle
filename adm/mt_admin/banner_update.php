
<?php
$sub_menu = '700300';
include_once('./_common.php');
check_demo();

@mkdir(G5_DATA_PATH."/motif/banner", G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH."/motif/banner", G5_DIR_PERMISSION);

function upload_file($srcfile, $destfile, $dir)
{
    if ($destfile == "") return false;
    // 업로드 한후 , 퍼미션을 변경함
    @move_uploaded_file($srcfile, $dir.'/'.$destfile);
    @chmod($dir.'/'.$destfile, G5_FILE_PERMISSION);

    return true;
}


$mm_bimg      = $_FILES['mm_bimg']['tmp_name'];
$mm_bimg_name = $_FILES['mm_bimg']['name'];

if ($mm_bimg_del) {
	@unlink(G5_DATA_PATH."/motif/banner/$mm_id".".jpg");
}

if ($w=="")
{
    $sql = "insert into motif_banner
                set mm_subject      = '$mm_subject',
                    mm_alt			= '$mm_alt',
                    mm_content		= '$mm_content',
                    mm_order		= '$mm_order',
                    mm_display_time	= '$mm_display_time',
                    mm_notice		= '$mm_notice',
                    mm_writer		= '$mm_writer',
                    mm_descript		= '$mm_descript',
                    mm_category		= '$mm_category',
                    mm_youtube		= '$mm_youtube',
                    mm_hide			= '$mm_hide',
                    mm_json			= '$mm_json',
                    mm_create_time  = current_timestamp(),
                    mm_update_time   = current_timestamp()
           ";
    sql_query($sql);

    $mm_id = sql_insert_id();
}
else if ($w=="u")
{
    $sql = " update motif_banner
                set mm_subject      = '$mm_subject',
                    mm_alt			= '$mm_alt',
                    mm_content		= '$mm_content',
                    mm_order		= '$mm_order',
                    mm_display_time	= '$mm_display_time',
                    mm_notice		= '$mm_notice',
                    mm_writer		= '$mm_writer',
                    mm_category		= '$mm_category',
                    mm_descript		= '$mm_descript',
                    mm_youtube		= '$mm_youtube',
                    mm_hide			= '$mm_hide',
                    mm_json			= '$mm_json',
                    mm_update_time  = current_timestamp()
              where mm_id = '$mm_id' ";
    sql_query($sql);
}
else if ($w=="d")
{
    @unlink(G5_DATA_PATH."/motif/banner/$mm_id");

    $sql = " delete from motif_banner where mm_id = $mm_id ";
    $result = sql_query($sql);
}

// print_r($_POST);
// exit;

if ($w == "" || $w == "u")
{
    if ($_FILES['mm_bimg']['name']) {upload_file($_FILES['mm_bimg']['tmp_name'], $mm_id.'.jpg', G5_DATA_PATH."/motif/banner");}

    goto_url("./banner_form.php?w=u&amp;mm_id=$mm_id");
} else {
    goto_url("./banner_list.php");
}
?>
