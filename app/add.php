<?php 
include("../dbConnect.php");

//trim() = 문자열 앞, 뒤 공백 제거 함수
//$_POST = post방식으로 넘어온 슈퍼 글로벌 변수
$title = trim($_POST['title']); 
//empty() = 값이 비었는지 검사하는 함수, boolean 타입으로 리턴
if(empty($title)) {
  echo "<script>alert('할 일을 입력해 주세요!');</script>";
  echo "<script>location.replace('../index.php');</script>";
  exit;
} else { 
  $sql = "insert into todo set title = '$title'";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn); // DB 접속 종료
  header("Location: ../index.php");
}
?>