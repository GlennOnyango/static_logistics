<!DOCTYPE html>
<html lang="en">


<?php

include '../php/config/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  // Prepare the SQL statement with placeholders
  $sql = "SELECT * FROM blog";

  // Create a prepared statement
  $stmt = $conn->prepare($sql);

  $result = $conn->query($sql);

}


?>


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../output.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/png" href="../assets/images/logo_logo 1.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>TY Logistics Park FZE</title>
</head>

<body>
  <header class="bg-third_tile_about text-dark_text_para flex flex-row justify-between px-4 sm:px-12 py-4">
    <div class="flex justify-center items-center lg:hidden">
      <button class="text-dark_text_para flex h-fit mobile-nav__toggle">
        <i class="fas fa-bars text-2xl"></i>
      </button>
    </div>

    <img src="../assets/images/logo_logo 1.png" loading="lazy" alt="Logo" class="w-36 h-14 hidden lg:flex" />
    <nav class="leading-12 hidden lg:flex">
      <ul class="flex justify-center gap-8">
        <li>
          <a href="../">Home</a>
        </li>
        <li>
          <a href="../about-us/">About Us</a>
        </li>
        <li>
          <a href="../solutions/">Our Solutions</a>
        </li>
        <li>
          <a href="../free-zone-grade-a-facilities/">Free Zone Grade-A Facilities</a>
        </li>

        <li>
          <a href="./">Blog</a>
        </li>
      </ul>
    </nav>

    <div class="flex items-center">
      <a class="contact-btn bg-gray_background text-white flex flex-row justify-center items-center gap-4 px-4 py-2 w-fit h-fit text-dark_text_para rounded-xl transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
        href="../contact-us/">Contact Us

        <svg width="20" height="16" viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M29.7071 8.70711C30.0976 8.31659 30.0976 7.68342 29.7071 7.2929L23.3431 0.928934C22.9526 0.53841 22.3195 0.53841 21.9289 0.928934C21.5384 1.31946 21.5384 1.95262 21.9289 2.34315L27.5858 8L21.9289 13.6569C21.5384 14.0474 21.5384 14.6805 21.9289 15.0711C22.3195 15.4616 22.9526 15.4616 23.3431 15.0711L29.7071 8.70711ZM-8.74228e-08 9L29 9L29 7L8.74228e-08 7L-8.74228e-08 9Z"
            fill="white" />
        </svg>
      </a>
    </div>
  </header>

  <section class="bg-third_tile_about text-dark_text_para h-screen px-4 mobile-nav hidden">
    <ul class="space-y-4">
      <li>
        <a href="../">Home</a>
      </li>
      <li>
        <a href="../about-us/">About Us</a>
      </li>
      <li>
        <a href="../solutions/">Our Solutions</a>
      </li>
      <li>
        <a href="../free-zone-grade-a-facilities/">Free Zone Grade-A Facilities</a>
      </li>

      <li>
        <a href="./">Blog</a>
      </li>
    </ul>
  </section>

  <main class="main-body">
    <section class="p-4">
      <h1 class="text-center text-dark_text_para text-3xl">
        Get to learn how the Nigerian contract logistics landscape is
        evolving.
      </h1>
    </section>

    <!-- Image and advert -->
    <section class="min-h-[70vh] blog_background">
      <div class="px-10 md:px-24 lg:px-36 xl:px-48 py-14 flex items-end min-h-[inherit] advert_div">
        <h1 class="text-5xl font-bold text-white col-span-2 text-start">
          Pioneering a new contract logistics standard in the Nigerian & West
          African Market.
        </h1>
      </div>
    </section>

    <!-- Blogs grid-->
    <section class="min-h-[70vh] grid grid-cols-3 text-white text-5xl">


      <?php
      if ($result->num_rows > 0) {
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            //  echo "id: " . $row["user_id"] . " - Title: " . $row["title"] . " " . $row["details"] . "<br>";
            $title = $row["title"];
            $img_url = $row["image_url"];
            $article_id = $row["id"];


            //remove the first 3 characters from the image url
            $img_url = substr($img_url, 6);



            echo "<div
        class='col-span-3 h-[50vh] md:col-span-1 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300'>
        <a href='./article?article_id=$article_id'>
          <div class='h-full flex items-end py-12 pl-16' style='background-image: url(\"$img_url\");background-size: cover;background-position: center;background-repeat: no-repeat'>
            <h2 class='text-4xl font-[350]'>$title</h2>
          </div>
        </a>
      </div>";
          }
        } else {
          echo "0 results";
        }
      }
      ?>





    </section>

    <!--Image cards-->

    <section class="min-h-[80vh] bg-dark_background grid grid-cols-2 grid-rows-3 md:grid-rows-2">
      <div class="col-span-2 md:col-span-1 row-span-1 about_us_card_background">
        <a href="../about-us/" class="flex justify-center items-center images_card_div h-full">
          <h2 class="text-4xl font-bold text-white">About Us</h2>
          <button class="px-4 sm:pt-2 text-white w-fit h-fit">
            <img src="../assets/images/Arrow 2.png" alt="Direction" class="h-4" />
          </button>
        </a>
      </div>
      <div class="col-span-2 md:col-span-1 row-span-1 md:row-span-2 contact_us_card_background">
        <a href="../contact-us/" class="flex justify-center items-center images_card_div h-full">
          <h2 class="text-4xl font-bold text-white">Contact Us</h2>
          <button class="px-4 sm:pt-2 text-white w-fit h-fit">
            <img src="../assets/images/Arrow 2.png" alt="Direction" class="h-4" />
          </button>
        </a>
      </div>
      <div class="col-span-2 md:col-span-1 row-span-1 free_zone_card_background">
        <a href="../free-zone-grade-a-facilities/" class="flex justify-center items-center images_card_div h-full px-8">
          <h2 class="text-4xl font-bold text-white">
            Free Zone Grade-A Facilities
          </h2>

          <button class="px-4 sm:pt-2 text-white w-fit h-fit">
            <img src="../assets/images/Arrow 2.png" alt="Direction" class="h-4" />
          </button>
        </a>
      </div>
    </section>
  </main>

  <footer
    class="bg-light_blue_background flex flex-col sm:flex-row gap-4 justify-between px-10 lg:px-44 py-16 footer-ext">
    <div class="flex flex-col">
      <img src="../assets/images/Logo white_logo copy_logo copy 1.png" alt="Logo" class="h-14 mb-8" loading="lazy" />
      <h5 class="text-white text-start text-base font-normal">
        TY Logistics Park FZE
      </h5>

      <h5 class="text-white text-start text-base font-normal">
        Copyright 2024
      </h5>
    </div>

    <div>
      <ul class="gap-2">
        <li>
          <a href="../" class="text-white text-base font-normal">Home</a>
        </li>
        <li>
          <a href="../about-us/" class="text-white text-base font-normal">About Us</a>
        </li>
        <li>
          <a href="../solutions/" class="text-white text-base font-normal">Our Solutions</a>
        </li>
        <li>
          <a href="../free-zone-grade-a-facilities/" class="text-white text-base font-normal">Grade-A Facilities</a>
        </li>
      </ul>
    </div>

    <div class="flex flex-col">
      <ul class="gap-2 mb-12">
        <li>
          <a href="../contact-us/" class="text-white text-base font-normal">Contact Us</a>
        </li>
        <li>
          <a href="../faqs/" class="text-white text-base font-normal">FAQs</a>
        </li>
        <li>
          <a href="./" class="text-white text-base font-normal">Blog</a>
        </li>
      </ul>
      <div class="flex flex-row gap-4 mb-10">
        <img src="../assets/vectors/xVector.png" alt="Phone" class="h-8" loading="lazy" />
        <img src="../assets/vectors/lVector.png" alt="Phone" class="h-8" loading="lazy" />
      </div>
    </div>

    <div class="flex flex-col">
      <h5 class="text-white text-start text-base font-bold">
        Group Company:
      </h5>
      <h5 class="text-white text-start text-base mb-6 font-bold">
        Nal Comet shipping
      </h5>

      <h5 class="text-white text-start text-base font-normal">
        Cookie & Privacy Policy
      </h5>
    </div>
  </footer>

  <script src="../js/mobile-nav.js"></script>
</body>

</html>