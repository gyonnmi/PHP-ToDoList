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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>

<body>
  <div class="wrap">
    <h1 class="title">TO DO LIST</h1>

    <div class="container">
      <div class="addTodo">
        <form action="./app/add.php" method="post" id="todoForm">
          <input type="text" name="title" placeholder="할 일을 입력하세요." />
          <input type="submit" value="+" class="addBtn" />
        </form>
      </div>

      <div class="todo-container">
        <!-- DB 테이블에 저장된 데이터가 없다면 -->
        <?php if(mysqli_num_rows($result) <= 0) { ?>
        <div>
          할 일을 추가해 주세요.
        </div>
        <?php } ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="todos">
          <div>
            <input type="checkbox" class="input_checkbox"
              onclick="location.href='./app/check.php?id=<?php echo $row['id'] ?>'"
              <?php echo $row['checked'] ? 'checked' : '' ?>>
          </div>
          <p class="<?php echo $row['checked'] ? 'completed' : 'todo' ?>">
            <?php echo $row['title'] ?>
          </p>
          <div class="icon">
            <!-- <a href="#">
              <span class="material-symbols-outlined">
                edit_note
              </span>
            </a> -->
            <a href="./app/remove.php?id=<?php echo $row['id'] ?>" id="<?php echo $row['id'] ?>" class="delete_btn">
              <span class="material-symbols-outlined">
                delete
              </span>
            </a>
          </div>
        </div>
        <?php endwhile; //while문 대체 문법 ?>
      </div> <!-- todos -->
    </div> <!-- container -->
  </div> <!-- wrap -->
</body>

</html>