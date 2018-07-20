<?php
include 'connect.php';

if (isset($_FILES['img-file'])) {
    $caption = $_POST['caption'];
    $file = $_FILES['img-file'];
    $file_name = $file['name'];
    $file_type = $file['type'];
    $file_size = $file['size'];
    $temp_name = $file['tmp_name'];
    echo $temp_name;
    $file_ext = explode(".", $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed_files = ['png', 'jpg', 'gif', 'jpeg'];

    $response = array();
    $response['file-name'] = $file_name;
    $response['caption'] = $caption;
    $response['error'] = '';
    $response['messages'] = '';

    if (in_array($file_ext, $allowed_files)) {
        $response['messages'] .= '<br>file accepted<br>';
        $file_dest = "../images/" . $file_name;
        //echo '<img src="' . $file_dest . '" alt="">';
        if (move_uploaded_file($temp_name, $file_dest)) {
            $response['messages'] .= '<br>file moved<br>';
        } else {
            $response['error'] .= '<br>file not moved<br>';
        }
    } else {
        $response['error'] .= '<br>file extension is not allowed<br>';
    }

    if ($file_dest !== '') {
        $query = "INSERT INTO images VALUES (NULL,'$file_dest','$caption')";
        if ($result = $conn->query($query)) {
            $response['messages'] .= '<div class="alert alert-success">Upload image successfully!</div>';
        }
    } else {
        $response['error'] .= '<div class="alert alert-danger">Failed to upload!</div>';
    }
    //echo $response;
    // echo json_encode($response);
}

if (isset($_POST['getImages'])) {
    $query = "SELECT * FROM images";
    $result = $conn->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($rows);
}
