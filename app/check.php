<?php 
include("../dbConnect.php");

$id = $_GET['id'];

if(empty($id)) {
  echo "<script>alert('고유 ID값이 확인되지 않았습니다.');</script>";
  echo "<script>location.replace('../index.php');</script>";
  exit;
} else {
  $sql = "select * from todo where id = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $checked = (int)$row['checked'];
  $checked_re = match($checked) {
    1 => 0,
    0 => 1,
  };
  $sql = "update todo set checked = '$checked_re' where id = '$id'";
  $result = mysqli_query($conn, $sql);
  mysqli_close($conn);
  header("Location: ../index.php");
}
?>