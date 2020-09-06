<?php
	include_once('./_common.php');

 	$result = $_REQUEST;
	$json = json_encode($result,JSON_UNESCAPED_UNICODE);

	$sql = "

		insert into motif_qna
		set
                	qa_name     	= '$name',
                	qa_tel     		= '$tel',
                    qa_contents            = '$json',
                    qa_ip  			= '$_SERVER[REMOTE_ADDR]',
                    qa_create_time  = current_timestamp(),
                    qa_update_time  = current_timestamp()
	";

	// echo $sql;
	// exit;

	$result = sql_query( $sql );

	$return = array();

	$return["result"] = "success";
	$return["username"] = $name;
	//$return["sql"] = $sql;


	echo json_encode( $return );


/*
print_r($json);

					qa_add_status	- '상담요청',
exit();
*/
	// $email = "mskimm0501@gmail.com";
	// $msg = $_POST["qa_name"]. "/".$_POST["qa_tel"];
	// $subject = "=?UTF-8?B?".base64_encode("contact us 등록 알림")."?=";
	// mail($email,$subject,$msg);
	//goto_url("/");
?>
