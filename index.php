<?php 
include("./dbConnect.php");
$sql = "select * from todo order by id desc";
$result = mysqli_query($conn, $sql);
mysqli_close($conn); // DB 접속 종료
?>
<html>

<head>
  <title>To Do List</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <div class="wrap">
    <h1 class="title">TO DO LIST</h1>

    <div id="toDo" class="container">
      <div class="addTodo">
        <form action="./app/add.php" method="post" id="todoForm">
          <input type="text" placeholder="할 일을 입력하세요." />
          <input type="submit" value="+" class="addBtn" />
        </form>
      </div>

      <div class="sec">
        <?php if(mysqli_num_rows($result) <= 0) { ?>
        <div>
          할 일을 추가해 주세요.
        </div>
        <?php } ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div>
          <input type="checkbox" class="input_checkbox"
            onclick="location.href'./app/check.php?id=<?php echo $row['id'] ?>'"
            <?php echo $row['checked'] ? 'checked' : '' ?>>
        </div>
        <h5 class="<?php echo $row['checked'] ? 'gw_checked' : '' ?>">
          <?php echo $row['title'] ?>
        </h5>
        <?php endwhile; //while문 대체 문법 ?>
      </div>
      <a href="./app/remove.php?id=<?php echo $row['id'] ?>" id="<?php echo $row['id'] ?>" class="delete_btn">삭제</a>
    </div> <!-- container -->
  </div> <!-- wrap -->
</body>

</html>