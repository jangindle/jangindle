<?php
	include_once('./_common.php');

 	$result = $_REQUEST;
	$json = json_encode($result,JSON_UNESCAPED_UNICODE);

	//print_r($json);

	$sql = "

		insert into motif_event
		set
					event_name     		= '$name',
					event_tel     		= '$tel',
                    json            	= '$json',
                    event_ip  			= '$_SERVER[REMOTE_ADDR]',
                    event_create_time  	= current_timestamp(),
                    event_update_time  	= current_timestamp()
	";

	$result = sql_query( $sql );

	$return = array();

	$return["result"] = "success";

	echo json_encode( $return );

?>
