<?php
require_once("../db/index.php");

if(isset($_GET['edit'])) {
    $id = $_GET['edit'];

    // QUERY TO GET THE TODO ITEM
    $query = "SELECT content FROM todo_table WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $TODO_ITEM = null;
    
    if(mysqli_num_rows($result)) {
        $TODO_ITEM = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO App</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <?php if (isset($_GET['edit'])) :  ?>
            <form action="./todo_handler.php" method="post" class="form-group">
                <input type="hidden" name="id" value="<?= $id; ?>" />
                <input type="text" required name="todo" value="<?= $TODO_ITEM['content'] ?>" class="form-input">
                <button type="submit" name="edit">Update</button>
            </form>
        <?php else : ?>
            <form action="./todo_handler.php" method="post" class="form-group">
                <input type="text" required name="todo" class="form-input">
                <button type="submit" name="add">Add</button>
            </form>
        <?php endif; ?>


        <div class="contents">

            <?php
            $query = "SELECT * FROM todo_table ORDER BY id DESC";
            $result = mysqli_query($conn, $query);
            $num_of_rows = mysqli_num_rows($result);

            if ($num_of_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="content">
                        <p>
                            <?= $row['content'] ?>
                        </p>
                        <div class="options">
                            <!-- http://localhost/PHP/mysql/todo/index.php?edit -->
                            <a href="./todo_handler.php?delete=<?= $row['id'] ?>" class="btn danger">delete</a>
                            <a href="?edit=<?= $row['id'] ?>" class="btn success">edit</a>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="content">
                    <p>No todo found</p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>