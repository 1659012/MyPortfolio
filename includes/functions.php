<?php
include 'connect.php';
// session_start();

// if (isset($_POST['getPostContent'])) {
//     $id = $_POST['postId'];
//     $query = "SELECT post_content AS content FROM wp_posts WHERE ID='$id'";
//     $result = $conn->query($query);
//     $row = $result->fetch_assoc(); //get 1st result
//     echo $row['content'];
// }

// if (isset($_GET['getMaxPost'])) {
//     $query = "SELECT COUNT(*) AS maxPost FROM wp_posts";
//     $result = $conn->query($query);
//     $row = $result->fetch_assoc(); //get 1st result
//     echo $row['maxPost'];
// }

// if (isset($_POST['getPageContent'])) {
//     $offset = ($_POST['page'] - 1) * 12;
//     $query = "SELECT wp_posts.id AS id, wp_posts.post_title AS title, wp_posts.post_content AS content, wp_posts.post_date AS date, wp_users.user_nicename AS author FROM wp_posts JOIN wp_users ON (wp_users.id = wp_posts.post_author) LIMIT 9  OFFSET $offset";
//     $result = $conn->query($query);
//     $rows = $result->fetch_all(MYSQLI_ASSOC);
//     echo json_encode($rows);
// }

// if (isset($_POST['changePostContent'])) {
//     $id = $_POST['id'];
//     $content = $_POST['content'];
//     $query = $sql = "UPDATE wp_posts SET post_content='$content',post_modified= CURRENT_TIMESTAMP WHERE id='$id'";
//     if ($conn->query($sql) === true) {
//         echo "Record updated successfully";
//     } else {
//         echo "Error updating record: " . $conn->error;
//     }
//     //$conn->close();
// }

// if (isset($_POST['deletePostContent'])) {
//     $id = $_POST['id'];
//     $query = $sql = "DELETE FROM wp_posts WHERE id='$id'";
//     if ($conn->query($sql) === true) {
//         echo "Record deleted successfully";
//     } else {
//         echo "Error deleting record: " . mysqli_error($conn);
//     }
//     //$conn->close();
// }

// if (isset($_POST['createNewPost'])) {
//     $title = $_POST['title'];
//     $content = $_POST['content'];
//     $sql = "INSERT INTO wp_posts (post_author, post_date,post_title,post_content) VALUES ('1', CURRENT_TIMESTAMP, '$title','$content')";

//     if ($conn->query($sql) === true) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// if (isset($_POST['getPageContent'])) {
//     $offset = ($_POST['page'] - 1) * 12;
//     $query = "SELECT wp_posts.id AS id, wp_posts.post_title AS title, wp_posts.post_content AS content, wp_posts.post_date AS date, wp_users.user_nicename AS author FROM wp_posts JOIN wp_users ON (wp_users.id = wp_posts.post_author) LIMIT 9  OFFSET $offset";
//     $result = $conn->query($query);
//     $rows = $result->fetch_all(MYSQLI_ASSOC);
//     echo json_encode($rows);
// }

if (isset($_POST['getUserData'])) {
    $uid = $_POST['uid'];
    $query = "SELECT * FROM  user WHERE uid='$uid'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

if (isset($_POST['getAllComments'])) {
    $query = "SELECT * FROM  comment";
    $result = $conn->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $result = '<h3 class="comment-title">Comments:</h3>';
    foreach ($rows as $x) {
        // $x['comment'] = mb_convert_encoding($x['comment'], "EUC-JP", "auto");
        $result .= '<div class="each-comment-container"><p class="comment-title">On ' . $x['date'] . ', ' . $x['uid'] . ' said:</p>';
        $result .= '<p class="comment-content">' . $x['comment'] . '</p><hr></div>';
    }
    echo $result;
}

if (isset($_POST['sendComment'])) {

    $date = date('Y-m-d H:i:s');
    $uid = $_POST['uid'];
    $comment = $_POST['comment'];
    $query = "INSERT INTO comment VALUE(NULL,'$uid','$comment','$date')";
    if ($conn->query($query)) {
        echo 'success';} else {
        echo 'error';
    }
}
