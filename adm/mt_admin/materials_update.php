
<?php
$sub_menu = '700300';
include_once('./_common.php');
check_demo();

@mkdir(G5_DATA_PATH."/motif/materials", G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH."/motif/materials", G5_DIR_PERMISSION);

if( $w == 'u') {

    $sql = "select mm_img1 from motif_materials where mm_id = '$mm_id'";
    $file = sql_fetch($sql);

    $mm_img1 = $file['mm_img1'];
}


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


if ($mm_bimg_del) {@unlink(G5_DATA_PATH."/motif/materials/$mm_id/$mm_id".".jpg");}

if ($mm_img1_del){$mm_img1="";}

if($_FILES['mm_img1']['name']){
    $mm_img1 = $_FILES['mm_img1']['name'];
}


if ($w=="")
{
    $sql = "insert into motif_materials
                set
                    mm_name         = '$mm_name',
                    mm_code         = '$mm_code',
                    mm_descript		= '$mm_descript',
                    mm_category		= '$mm_category',
                    mm_category_wallpaper1 = '$mm_category_wallpaper1',
                    mm_category_wallpaper2 = '$mm_category_wallpaper2',
                    mm_category_floorpaper1 = '$mm_category_floorpaper1',
                    mm_category_floorpaper2 = '$mm_category_floorpaper2',
                    mm_category_floor = '$mm_category_floor',
                    mm_ranking		= '$mm_ranking',
                    mm_img1		    = '$mm_img1',
                    mm_color_wh     = '$mm_color_wh',
                    mm_color_pk     = '$mm_color_pk',
                    mm_color_bl     = '$mm_color_bl',
                    mm_color_gn     = '$mm_color_gn',
                    mm_color_ye     = '$mm_color_ye',
                    mm_color_be     = '$mm_color_be',
                    mm_color_oc     = '$mm_color_oc',
                    mm_color_bn     = '$mm_color_bn',
                    mm_color_bk     = '$mm_color_bk',
                    mm_color_etc    = '$mm_color_etc',
                    mm_create_time  = current_timestamp(),
                    mm_update_time   = current_timestamp()
           ";

    sql_query($sql);

    $mm_id = sql_insert_id();
}
else if ($w=="u")
{
    $sql = " update motif_materials
                set
                    mm_name         = '$mm_name',
                    mm_code         = '$mm_code',
                    mm_category		= '$mm_category',
                    mm_category_wallpaper1 = '$mm_category_wallpaper1',
                    mm_category_wallpaper2 = '$mm_category_wallpaper2',
                    mm_category_floorpaper1 = '$mm_category_floorpaper1',
                    mm_category_floorpaper2 = '$mm_category_floorpaper2',
                    mm_category_floor = '$mm_category_floor',
                    mm_ranking		= '$mm_ranking',
                    mm_descript		= '$mm_descript',
                    mm_img1		    = '$mm_img1',
                    mm_color_wh     = '$mm_color_wh',
                    mm_color_pk     = '$mm_color_pk',
                    mm_color_bl     = '$mm_color_bl',
                    mm_color_gn     = '$mm_color_gn',
                    mm_color_ye     = '$mm_color_ye',
                    mm_color_be     = '$mm_color_be',
                    mm_color_oc     = '$mm_color_oc',
                    mm_color_bn     = '$mm_color_bn',
                    mm_color_bk     = '$mm_color_bk',
                    mm_color_etc    = '$mm_color_etc',
                    mm_update_time  = current_timestamp()
              where mm_id = '$mm_id' ";
    sql_query($sql);
}
else if ($w=="d")
{
    @unlink(G5_DATA_PATH."/motif/materials/$mm_id/$mm_id");

    $sql = " delete from motif_materials where mm_id = $mm_id ";
    $result = sql_query($sql);
}

if($_FILES['mm_bimg']['name']){
    @mkdir(G5_DATA_PATH."/motif/materials", G5_DIR_PERMISSION);
    $it_img_dir = G5_DATA_PATH.'/motif/materials/' . $mm_id;

    @mkdir($it_img_dir, G5_DIR_PERMISSION);
    @chmod($it_img_dir, G5_DIR_PERMISSION);

}


if ($w == "" || $w == "u")
{
    if ($_FILES['mm_bimg']['name']) {upload_file($_FILES['mm_bimg']['tmp_name'], $mm_id.'.jpg', G5_DATA_PATH."/motif/materials/".$mm_id);}
    if ($_FILES['mm_img1']['name']) {upload_file($_FILES['mm_img1']['tmp_name'],$mm_img1, G5_DATA_PATH."/motif/materials/".$mm_id);}

    goto_url("./materials_form.php?w=u&amp;mm_id=$mm_id");
} else {
    goto_url("./materials_list.php");
}
?>
