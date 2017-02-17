<?php


$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die (mysql_error());

// Convert chaset to UFT-8 to use Albaninan language

if (!mysqli_set_charset($connect, "utf8")) {
    mysqli_error($connect);
    exit();
} else {
    mysqli_character_set_name($connect);
}

// if($connect){

// 	echo "connected";

// }

?>