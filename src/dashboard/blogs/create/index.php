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
$user_id = $title = $image = $details = $error = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = test_input($_POST["user_id"]);
    $title = test_input($_POST["title"]);
    $details = test_input($_POST["details"]);

    $image = uploadImage($_FILES["image"], "../../../assets/images/blog/uploads/", $user_id);

    if ($image) {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO blog (user_id, title, image_url, details) VALUES (?, ?, ?, ?)";

        // Create a prepared statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the statement
        $stmt->bind_param("isss", $user_id, $title, $image, $details);

        // Execute the statement

        try {
            $stmt->execute();
            $error = "New record created successfully";

            header("Location: ../");
            exit;

        } catch (Exception $e) {
            $error = "Error: " . $stmt->error;
            //echo "Error: " . $stmt->error;
        }

    } else {
        $error = "Error uploading image";
    }


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

            <div class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-yellow-300 py-4 cursor-pointer"
                id="logout">
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

                    ?>



                    <form enctype="multipart/form-data" class="w-full flex flex-col justify-center items-center gap-4"
                        method="POST" action="./">
                        <input type="text" hidden name="user_id" value="" />
                        <?php

                        if ($_SESSION["user_id"]) {
                            $my_id = $_SESSION["user_id"];
                            echo "<input type='text' name='user_id' value='$my_id' hidden />";
                        }
                        ?>
                        <div class="w-full flex flex-col gap-2">
                            <input type="text" id="title" name="title" required class="bg-gray-200 py-2 pl-4 rounded-md"
                                placeholder="Enter blog title" />
                        </div>

                        <div class="h-96 w-full bg-gray-200 relative" id="blog_img_div">
                            <input type="file" id="blog_image" name="image" required accept="image/png, image/gif, image/jpeg"
                                class="bg-gray-200 py-2 pl-4 rounded-md absolute top-0 h-full w-full opacity-0"
                                placeholder="Enter user first name" />
                            <div class="w-full h-full flex flex-col justify-center items-center">
                                <i class="fa-solid fa-camera text-dark_background" style="font-size: 4rem"></i>
                                <h1>Click to select blog image</h1>
                            </div>
                        </div>

                        <div class="w-full flex flex-col gap-2">
                            <textarea placeholder="Add blog details" name="details" required id="details"
                                class="bg-gray-200 h-60 py-2 pl-4 rounded-md"></textarea>
                        </div>

                        <div class="w-full flex justify-center gap-2">
                            <button type="submit"
                                class="bg-dark_background mt-4 px-4 text-white h-10 rounded-md w-fit hover:bg-yellow-300 hover:text-dark_text_para">
                                Create blog
                            </button>

                            <a href="../"
                                class="bg-gray-200 mt-4 px-4 text-black h-10 rounded-md w-fit hover:bg-yellow-300 flex justify-center items-center">
                                View all blogs
                            </a>
                        </div>
                    </form>
                </div>
                <!-- Add Blog-->
            </div>

            <!--end blog-->
        </div>
    </section>

    <script src="../../../js/dashboard/controller.js"></script>
    <script src="../../../js/dashboard/logout.js"></script>
</body>

</html>