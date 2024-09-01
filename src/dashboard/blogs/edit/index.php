<!DOCTYPE html>
<html lang="en">

<?php

include '../../../php/config/db_connection.php';

session_start();


if (!$_SESSION["user_id"]) {
    header("Location: ../../../admin/");
    exit;

}



// define variables and set to empty values
$article_id = $user_id = $title = $image = $details = $error = "";

$my_id = "";
if ($_SESSION["user_id"]) {
    $my_id = $_SESSION["user_id"];
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    //sanitizing the input
    $desiredId = test_input($_GET["article_id"]);

    if (!is_numeric($desiredId)) {
        echo "Invalid ID. Please enter a number.";
        exit;
    }

    // Parse and process
    $parsedId = intval($desiredId);
    if ($parsedId < 0) {
        echo "Id cannot be negative.";
        exit;
    }

    // Prepare the SQL statement with placeholders
    $sql = "SELECT * FROM blog WHERE id = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);


    // Bind the parameter
    $stmt->bind_param("i", $parsedId);

    // Execute the statement
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = test_input($_POST["user_id"]);
    $title = test_input($_POST["title"]);
    $details = test_input($_POST["details"]);
    $article_id = test_input($_POST["article_id"]);

    if ($_FILES["image"]["name"]) {

        $image = uploadImage($_FILES["image"], "../../../assets/images/blog/uploads/", $user_id);

        if ($image) {
            // Prepare the SQL statement with placeholders
            $sql = "UPDATE blog SET title = ?, image_url = ?, details = ? WHERE id = ? AND user_id = ?";

            // Create a prepared statement
            $stmt = $conn->prepare($sql);

            // Bind parameters to the statement
            $stmt->bind_param("sssii", $title, $image, $details, $article_id, $user_id);

            // Execute the statement

            try {
                $stmt->execute();
                $error = "Record updated successfully";
                header("Location: ../");
                exit;
            } catch (Exception $e) {
                $error = "Error: " . $stmt->error;
                //echo "Error: " . $stmt->error;
            }

        } else {
            $error = "Error uploading image";
        }
    }else{
        $sql = "UPDATE blog SET title = ?, details = ? WHERE id = ? AND user_id = ?";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the statement
        $stmt->bind_param("ssii", $title, $details, $article_id, $user_id);

        // Execute the statement

        try {
            $stmt->execute();
            $error = "Record updated successfully";
            header("Location: ../");
            exit;
        } catch (Exception $e) {
            $error = "Error: " . $stmt->error;
            //echo "Error: " . $stmt->error;
        }

    }

    // echo $_FILES["image"]["name"];
    // echo $_FILES["image"]["size"];
    // echo json_encode($_FILES["image"]);



}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function uploadImage($file, $path, $user_id)
{

    $target_dir = $path;
    $target_file = $target_dir . $user_id . "_" . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    // if ($file["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        return false;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return false;
        }
    }

}

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../../output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="../../../assets/images/logo_logo 1.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>TY Logistics Park FZE</title>
    <meta name="description" content="TY Logistics Park FZE." />
</head>

<body>
    <section class="h-screen flex flex-row">
        <div class="w-1/4">
            <div class="w-full flex justify-center">
                <img src="../../../assets/images/logo_logo 1.png" loading="lazy" alt="Logo"
                    class="w-36 h-14 hidden lg:flex" />
            </div>
            <a href="../../" class="w-full flex justify-center bg-gray-200 py-4 hover:bg-yellow-300" id="activate_user">
                <h2 class="font-semibold text-lg">Users</h2>
            </a>
            <a href="../" class="w-full flex justify-center mt-1 bg-yellow-300 py-4" id="activate_blog">
                <h2 class="font-semibold text-lg">Blogs</h2>
            </a>
            <div class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-yellow-300 py-4">
                <h2 class="font-semibold text-lg">Logout</h2>
            </div>
        </div>

        <div class="grow bg-yellow-300 justify-center flex overflow-y-auto pt-8">


            <!--blog-->

            <div class="w-3/4" id="blog_div">
                <!-- Add Blog-->
                <div class="w-full h-fit p-4 bg-white flex flex-col gap-4" id="blog_form">
                    <div class="w-full flex justify-between items-center">
                        <div class="w-full">
                            <h1 class="font-semibold text-2xl text-center">Add Blog</h1>
                        </div>
                    </div>


                    <?php if ($error === "New record created successfully") {
                        echo "<div class='w-full bg-green-200 text-green-700 p-4 text-center'>New record created successfully</div>";
                    } else if ($error === "") {

                    } else {
                        echo "<div class='w-full bg-red-200 text-red-700 p-4 text-center'>$error</div>";
                    }

                    if ($result->num_rows > 0) {
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                //  echo "id: " . $row["user_id"] . " - Title: " . $row["title"] . " " . $row["details"] . "<br>";
                    
                                $title = $row["title"];
                                $details = $row["details"];
                                $img_url = $row["image_url"];
                                $article_id = $row["id"];


                                echo "
                                <form enctype='multipart/form-data' class='w-full flex flex-col justify-center items-center gap-4'
                                    method='POST' action='./'>
                                    <input type='text' name='user_id' value='$my_id' hidden />
                                    <input type='text' name='article_id' value='$article_id' hidden />
                                    <div class='w-full flex flex-col gap-2'>
                                        <input type='text' id='title' name='title' class='bg-gray-200 py-2 pl-4 rounded-md'
                                            placeholder='Enter blog title' value='$title' />
                                    </div>
            
                                    <div class='h-96 w-full bg-gray-200 relative' style='background-image: url(\"$img_url\");background-size: cover;background-position: center;background-repeat: no-repeat' id='blog_img_div'>
                                        <input type='file' id='blog_image' name='image' accept='image/png, image/gif, image/jpeg'
                                            class='bg-gray-200 py-2 pl-4 rounded-md absolute top-0 h-full w-full opacity-0'
                                            placeholder='Enter user first name' />
                                        <div class='w-full h-full flex flex-col justify-center items-center'>
                                            <i class='fa-solid fa-camera text-dark_background' style='font-size: 4rem'></i>
                                            <h1>Click to select blog image</h1>
                                        </div>
                                    </div>
            
                                    <div class='w-full flex flex-col gap-2'>
                                        <textarea placeholder='Add blog details' name='details' id='details'
                                            class='bg-gray-200 h-60 py-2 pl-4 rounded-md'>$details</textarea>
                                    </div>
            
                                    <div class='w-full flex justify-center gap-2'>
                                        <button type='submit'
                                            class='bg-dark_background mt-4 px-4 text-white h-10 rounded-md w-fit hover:bg-yellow-300 hover:text-dark_text_para'>
                                            Update blog
                                        </button>
            

                                        <a href='../'
                                        class='bg-gray-200 mt-4 px-4 text-black h-10 rounded-md w-fit hover:bg-yellow-300 flex justify-center items-center'>
                                        View all blogs
                                    </a>
                                    </div>
                                </form>";

                            }
                        } else {
                            echo "0 results";
                        }
                    }



                    ?>





                </div>
                <!-- Add Blog-->
            </div>

            <!--end blog-->
        </div>
    </section>

    <script src="../../../js/dashboard/controller.js"></script>
</body>

</html>