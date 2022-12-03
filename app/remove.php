<?php 
include("../dbConnect.php");

$id = $_GET['id'];

if(empty($id)) {
  echo "<script>alert('고유 ID값이 확인되지 않았습니다.');</script>";
  echo "<script>location.replace('../index.php');</script>";
  exit;
} else {
  $sql = "delete from todo where id = '$id'";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("Location: ../index.php");
}
?>