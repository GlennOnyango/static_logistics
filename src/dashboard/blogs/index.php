<!DOCTYPE html>
<html lang="en">

<?php

include '../../php/config/db_connection.php';


session_start();


if (!$_SESSION["user_id"]) {
    header("Location: ../../admin/");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Prepare the SQL statement with placeholders
    $sql = "SELECT * FROM blog ORDER BY date_time ASC";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    $result = $conn->query($sql);

}


?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../output.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/png" href="../../assets/images/logo_logo 1.png" />

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
                <img src="../../assets/images/logo_logo 1.png" loading="lazy" alt="Logo"
                    class="w-36 h-14 hidden lg:flex" />
            </div>
            <a href="../" class="w-full flex justify-center py-4 bg-gray-200 hover:bg-light_blue_background">
                <h2 class="font-semibold text-lg">Users</h2>
            </a>
            <a href="./" class="w-full flex justify-center mt-1 bg-light_blue_background py-4">
                <h2 class="font-semibold text-lg">Blogs</h2>
            </a>
            <div class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-light_blue_background py-4 cursor-pointer"
                id="logout">
                <h2 class="font-semibold text-lg">Logout</h2>
            </div>
        </div>

        <div class="w-3/4 bg-light_blue_background grid grid-cols-3 text-white text-5xl overflow-y-auto p-4 gap-4">

            <div class="col-span-3 flex flex-row justify-between h-fit mb-4">
                <h1 class="text-4xl font-[350] ">Blogs</h1>
                <a href="./create" class="bg-dark_background text-xl py-2 px-4 rounded-lg">Add Blog</a>
            </div>

            <?php
            if ($result->num_rows > 0) {
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        //  echo "id: " . $row["user_id"] . " - Title: " . $row["title"] . " " . $row["details"] . "<br>";
            
                        $title = $row["title"];
                        $details = $row["details"];
                        $img_url = $row["image_url"];
                        $article_id = $row["id"];


                        //remove the first 3 characters from the image url
                        $img_url = substr($img_url, 3);


                        echo " 
            <div class='col-span-3 h-[50vh] md:col-span-1 transition ease-in-out delay-150 hover:-translate-y-1
                hover:scale-110 duration-300'>
                <a href='./edit?article_id=$article_id'>
                    <div class='h-full flex items-end py-12 pl-16' style='background-image: url(\"$img_url\");background-size: cover;background-position: center;background-repeat: no-repeat'>
                        <h2 class=' text-4xl font-[350]'>$title</h2>
                    </div>
                </a>
            </div>
";
                    }
                } else {
                    echo "0 results";
                }
            }
            ?>


        </div>
    </section>

    <script src="../../js/dashboard/controller.js"></script>
    <script src="../../js/dashboard/logout.js"></script>
</body>

</html>