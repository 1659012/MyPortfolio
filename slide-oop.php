<?php
session_start();
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
    $_SESSION['user'] = '';
}
include 'includes/connect.php';
date_default_timezone_set("Asia/Bangkok");
class Slider
{
    protected $conn;
    protected $images; //array type
    protected $gallery; //string type

    public function __construct($conn)
    {
        $this->conn = $conn;

        $query = "SELECT * FROM images";
        $result = $this->conn->query($query);
        $this->images = $result->fetch_all(MYSQLI_ASSOC);

        $this->gallery = '';
        $query = "SELECT * FROM images";
        if ($results = $conn->query($query)) {
            $rowNum = $results->num_rows;
            $this->gallery .= "<h3 class='gallery-info'>Total " . $rowNum . " pictures</h3>";
            $rows = $results->fetch_all(MYSQLI_ASSOC);
            $this->gallery .= "<div class='row'>";
            $index = 0;
            foreach ($rows as $x) {
                if ($index % 3 == 0) {
                    $this->gallery .= "</div><div class='row'>";
                }
                $this->gallery .= "<div class='col-md-4'><img class='img img-responsive' src='" . $x['name'] .
                    "'><h3>" . $x['caption'] . "<span style='font-size:14px;'> by " . $x['uid'] . "</span></div>";
                $index++;
            }
            $this->gallery .= "</div>";
        }
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getGalery()
    {
        return $this->gallery;
    }
}

$mySlide = new Slider($conn);

if (isset($_FILES['img-file'])) {
    $caption = $_POST['caption'];
    $uid = $_SESSION['user'];
    $date_post = date('Y-m-d H:i:s');
    $file = $_FILES['img-file'];
    $file_name = $file['name'];
    $file_type = $file['type'];
    $file_size = $file['size'];
    $temp_name = $file['tmp_name'];
    $file_ext = explode(".", $file_name);
    $file_ext = strtolower(end($file_ext));
    $allowed_files = ['png', 'jpg', 'gif', 'jpeg'];

    $response = array();
    $response['file'] = $file_name;
    $response['caption'] = $caption;
    $response['error'] = '';
    $response['messages'] = '';

    if (in_array($file_ext, $allowed_files)) {
        $response['messages'] .= '<br>File accepted<br>';
        $file_dest = "images/" . $file_name;
        echo '<img src="' . $file_dest . '" alt="">';
        if (move_uploaded_file($temp_name, $file_dest)) {
            $response['messages'] .= '<br>File moved<br>';
        } else {
            $response['error'] .= '<br>file not moved<br>';
        }
    } else {
        $response['error'] .= '<br>File extension is not allowed<br>';
    }

    if ($file_dest !== '') {
        $query = "INSERT INTO images VALUES (NULL,'$file_dest','$caption','$uid','$date_post')";
        if ($result = $conn->query($query)) {
            $response['messages'] .= '<div class="alert alert-success">Upload image successfully!</div>';
        }
    } else {
        $response['error'] .= '<div class="alert alert-danger">Failed to upload!</div>';
    }
    //echo $response;
    echo json_encode($response);
}

if (isset($_POST['getImages'])) {
    echo json_encode($mySlide->getImages());
}

if (isset($_POST['getGallery'])) {
    echo ($mySlide->getGalery());
}
