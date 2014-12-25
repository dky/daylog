<?php

$LOGHOST="";
$SYSLOG_PORT="";
$HOME_REDIRECT="http://localhost/daylog";

if ("" == trim($_POST['count'])) {
	header ("location: $HOME_REDIRECT");
	exit();
} 
else {      
	$postValue = $_POST['selectValue']; 
	$postCount = $_POST['count'];
	$msg="$postValue=$postCount";
	$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
	$len = strlen($msg);
	socket_sendto($sock, $msg, $len, 0, "$LOGHOST", "$SYSLOG_PORT");
	socket_close($sock);
	header ("location: $HOME_REDIRECT");
	exit();
}

?>
