

<?php
if($_FILES['resume']['name']){
    $resume = $_FILES['resume']['name'];
}

$sql = " insert into motif_recruit
            set
                recruit_type		= '$type',
                recruit_name		= '$name',
                recruit_tel		    = '$tel',
                recruit_resd		= '$resd',
                recruit_career		= '$career',
                recruit_master		= '$master',
                recruit_car		    = '$car',
                recruit_mach		= '$mach',
                recruit_resume		= '$resume',
                recruit_ip  		= '$_SERVER[REMOTE_ADDR]',
                recruit_create_time  = current_timestamp()
       ";

sql_query($sql);

$recruit_no = sql_insert_id();

if ($_FILES['resume']['name']) {
    @mkdir(G5_DATA_PATH."/jangin/recruit", G5_DIR_PERMISSION);
    $it_resume_dir = G5_DATA_PATH.'/jangin/recruit/' . $recruit_no . '/';
    @mkdir($it_resume_dir, G5_DIR_PERMISSION);
    $file_name = $_FILES['resume']['name'];

    move_uploaded_file($_FILES['resume']['tmp_name'], $it_resume_dir.$file_name);
    chmod($it_resume_dir.$file_name, G5_FILE_PERMISSION);
}

?>
