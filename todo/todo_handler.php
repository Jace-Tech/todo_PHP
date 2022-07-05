<?php 

require_once("../db/index.php");

// var_dump($conn);

// INSERT
if(isset($_POST['add'])) {
    $todoItem = $_POST['todo'];

    // INSERT
    $query = "INSERT INTO todo_table (content) VALUES ('$todoItem')";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Redirect to index page
        header('Location: ./index.php');
    }
    else {
        echo "Error: ";
    }
}

// DELETE
if(isset($_GET['delete'])) {
    // <!-- todo_handler.php?delete=10 -->

    $id = $_GET['delete'];
    
    // QUERY TO DELETE FROM db
    $query = "DELETE FROM todo_table WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Redirect to the index page
        header('Location: ./index.php');
    }
    else {
        echo "Error: deleting Todo Item";
    }

}

// UPADATE
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $todoItem = $_POST['todo'];

    // QUERY TO UPDATE THE TODO ITEM
    $query = "UPDATE todo_table SET content = '$todoItem' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Redirect to the index page
        header('Location: ./index.php');
    }
    else {
        echo "Error: updating Todo Item";
    }
}