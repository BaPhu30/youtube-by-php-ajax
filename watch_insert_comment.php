<?php

session_start();

$ID = $_SESSION["ID"];

$Name = $_SESSION["Name"];

$Email = $_SESSION["Email"];

$Avatar = $_SESSION["Avatar"];

include 'config.php';

if (isset($_POST)) {
    $IDPost = $_POST["IDPost"];
    $IDPost = stripcslashes($IDPost);
    $IDPost = mysqli_real_escape_string($conn, $IDPost);

    $IDCommentParent = $_POST["IDCommentParent"];
    $IDCommentParent = stripcslashes($IDCommentParent);
    $IDCommentParent = mysqli_real_escape_string($conn, $IDCommentParent);
    
    $Main = $_POST["Main"];
    $Main = stripcslashes($Main);
    $Main = mysqli_real_escape_string($conn, $Main);

    $sql_insert = "INSERT INTO comment (ID_user, ID_post, Main, ID_comment_parent) VALUES ($ID, $IDPost, '$Main', $IDCommentParent);";
    if ($conn->query($sql_insert) === TRUE) {
        echo "Yes";
    } else {
        echo "Error";
    }
}

$conn->close();