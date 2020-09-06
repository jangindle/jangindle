<?php
include_once('./_common.php');

$result = $_REQUEST;

$json = json_encode($result,JSON_UNESCAPED_UNICODE);


	$sql = "

		insert into motif_qna
		set
                	qa_name     	= '$name',
                	qa_tel     		= '$tel',
                    json            = '$json',
                    qa_ip  			= '$_SERVER[REMOTE_ADDR]',
                    qa_create_time  = current_timestamp(),
                    qa_update_time  = current_timestamp()
	";



	sql_query( $sql );



/*
print_r($json);

exit();
*/
	// $email = "mskimm0501@gmail.com";
	// $msg = $_POST["qa_name"]. "/".$_POST["qa_tel"];
	// $subject = "=?UTF-8?B?".base64_encode("contact us 등록 알림")."?=";
	// mail($email,$subject,$msg);
	//goto_url("/");
?>
