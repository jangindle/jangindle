<?php
$sub_menu = '800300';
include_once('./_common.php');
check_demo();

@mkdir(G5_DATA_PATH."/motif/performance", G5_DIR_PERMISSION);
@chmod(G5_DATA_PATH."/motif/performance", G5_DIR_PERMISSION);

function upload_file($srcfile, $destfile, $dir)
{
    if ($destfile == "") return false;
    // 업로드 한후 , 퍼미션을 변경함
    @move_uploaded_file($srcfile, $dir.'/'.$destfile);
    @chmod($dir.'/'.$destfile, G5_FILE_PERMISSION);

    return true;
}

if($w == 'u'){
    $sql = "select mm_img1, mm_img2, mm_img3, mm_img4 from motif_performance where mm_id = '$mm_id'";
    $file = sql_fetch($sql);

    $mm_img1    =   $file['mm_img1'];
    $mm_img2    =   $file['mm_img2'];
    $mm_img3    =   $file['mm_img3'];
    $mm_img4    =   $file['mm_img4'];
}

$mm_bimg      = $_FILES['mm_bimg']['tmp_name'];
$mm_bimg_name = $_FILES['mm_bimg']['name'];

if ( $mm_bimg_del ) { @unlink(G5_DATA_PATH."/motif/performance/$mm_id/$mm_id".".jpg"); }
if ( $mm_img1_del ) { $mm_img1 = ""; }
if ( $mm_img2_del ) { $mm_img2 = ""; }
if ( $mm_img3_del ) { $mm_img3 = ""; }
if ( $mm_img4_del ) { $mm_img4 = ""; }

if ( $_FILES['mm_img1']['name']){ $mm_img1 = $_FILES['mm_img1']['name']; }
if ( $_FILES['mm_img2']['name']){ $mm_img2 = $_FILES['mm_img2']['name']; }
if ( $_FILES['mm_img3']['name']){ $mm_img3 = $_FILES['mm_img3']['name']; }
if ( $_FILES['mm_img4']['name']){ $mm_img4 = $_FILES['mm_img4']['name']; }

if ($w=="")
{
    $sql = "insert into motif_performance
                set
                    mm_qa_id            = '$mm_qa_id',
                    mm_title            = '$mm_title',
                    mm_day		        = '$mm_day',
                    mm_descript		    = '$mm_descript',
                    mm_category		    = '$mm_category',
                    mm_category_domain	= '$mm_category_domain',
                    mm_img1		        = '$mm_img1',
                    mm_img2		        = '$mm_img2',
                    mm_img3		        = '$mm_img3',
                    mm_img4		        = '$mm_img4',
                    mm_create_time      = current_timestamp(),
                    mm_update_time      = current_timestamp()
           ";

    sql_query($sql);

    $mm_id = sql_insert_id();
}
else if ($w=="u")
{

    $sql = " update motif_performance
                set
                    mm_title            = '$mm_title',
                    mm_day  		    = '$mm_day',
                    mm_descript		    = '$mm_descript',
                    mm_category		    = '$mm_category',
                    mm_category_domain  = '$mm_category_domain',
                    mm_img1		        = '$mm_img1',
                    mm_img2		        = '$mm_img2',
                    mm_img3		        = '$mm_img3',
                    mm_img4		        = '$mm_img4',
                    mm_update_time      = current_timestamp()
              where mm_id = '$mm_id' ";

    sql_query($sql);

}
else if ($w=="d")
{
    @unlink(G5_DATA_PATH."/motif/performance/$mm_id/$mm_id");

    $sql = " delete from motif_performance where mm_id = $mm_id ";
    $result = sql_query($sql);
}

if($_FILES['mm_bimg']['name']){
    @mkdir(G5_DATA_PATH."/motif/performance", G5_DIR_PERMISSION);
    $it_img_dir = G5_DATA_PATH.'/motif/performance/' . $mm_id;

    @mkdir($it_img_dir, G5_DIR_PERMISSION);
    @chmod($it_img_dir, G5_DIR_PERMISSION);
}


if ($w == "" || $w == "u")
{
    if ($_FILES['mm_bimg']['name']) {upload_file($_FILES['mm_bimg']['tmp_name'], $mm_id.'.jpg', G5_DATA_PATH."/motif/performance/".$mm_id);}
    if ($_FILES['mm_img1']['name']) {upload_file($_FILES['mm_img1']['tmp_name'],$mm_img1, G5_DATA_PATH."/motif/performance/".$mm_id);}
    if ($_FILES['mm_img2']['name']) {upload_file($_FILES['mm_img2']['tmp_name'],$mm_img2, G5_DATA_PATH."/motif/performance/".$mm_id);}
    if ($_FILES['mm_img3']['name']) {upload_file($_FILES['mm_img3']['tmp_name'],$mm_img3, G5_DATA_PATH."/motif/performance/".$mm_id);}
    if ($_FILES['mm_img4']['name']) {upload_file($_FILES['mm_img4']['tmp_name'],$mm_img4, G5_DATA_PATH."/motif/performance/".$mm_id);}

    goto_url("./performance_form.php?w=u&amp;mm_id=$mm_id");
} else {
    goto_url("./performance_list.php");
}
?>
