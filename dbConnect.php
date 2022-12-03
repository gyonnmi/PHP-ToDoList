<?php 
// DB 정보
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "1234";
$mysql_db = "project";
// DB연결
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
// 연결 오류 발생 시
if (!$conn) {
	die("연결 실패: " . mysqli_connect_error()); // die() 메세지 출력 후, 현재 스크립트를 종료한다.
}
// PHP 오류 메세지 숨김
ini_set('display_errors', 'off');
?>