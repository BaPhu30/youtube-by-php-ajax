<?php

session_start();

$ID = $_SESSION["ID"];

include 'config.php';

if (isset($_POST)) {
    $IDPost = $_POST["IDPost"];

    $sql_like = "SELECT * FROM post_like WHERE ID_user = $ID AND ID_post= $IDPost";
    $result_like = mysqli_query($conn, $sql_like);
    $count_like = mysqli_num_rows($result_like);

    if ($count_like == 1) {
        $sql_delete = "DELETE FROM post_like WHERE ID_user = $ID AND ID_post= $IDPost";
        if ($conn->query($sql_delete) === TRUE) {
            echo "Bỏ like thành công";

            $sql_countLike = "SELECT COUNT(ID_user) AS Count_Like FROM post_like WHERE ID_post = $IDPost";
            $result_countLike = $conn->query($sql_countLike);
            if ($result_countLike->num_rows > 0) {
                while ($row = $result_countLike->fetch_assoc()) {
                    echo $row["Count_Like"];
                }
            }

        } else {
            echo "Lỗi rồi đại vương ơi!";
        }
    } else {
        $sql_insert = "INSERT INTO post_like (ID_user, ID_post) VALUES ($ID, $IDPost)";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Like thành công";

            $sql_countLike = "SELECT COUNT(ID_user) AS Count_Like FROM post_like WHERE ID_post = $IDPost";
            $result_countLike = $conn->query($sql_countLike);
            if ($result_countLike->num_rows > 0) {
                while ($row = $result_countLike->fetch_assoc()) {
                    echo $row["Count_Like"];
                }
            }

        } else {
            echo "Lỗi rồi đại vương ơi!";
        }
    }
}

$conn->close();