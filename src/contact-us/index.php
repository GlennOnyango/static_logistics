<!DOCTYPE html>
<html lang="en">

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $company = test_input($_POST["company"]);
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $phone = test_input($_POST["phone"]);
  $subject = test_input($_POST["subject"]);
  $message = test_input($_POST["message"]);

  // send email
  $to = "nmgasa5c3th7@p3plzcpnl505463.prod.phx3.secureserver.net";
  $subject = "Contact Us";
  $txt = "Company: $company\nName: $name\nPhone: $phone\nEmail: $email\nSubject: $subject\nMessage: $message";
  $headers = "From: $email";
  mail($to, $subject, $txt, $headers);

  // if (mail($to, $subject, $message, $headers)) {
  //   echo "Email sent successfully";
  // } else {
  //   echo "Email not sent";
  // }

}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
  <header class="bg-third_tile_about text-dark_text_para flex flex-row justify-between px-4 sm:px-12 py-4 nav_section">
    <div class="flex justify-center items-center lg:hidden">
      <button class="text-dark_text_para flex h-fit mobile-nav__toggle">
        <i class="fas fa-bars text-2xl"></i>
      </button>
    </div>


    <a href="../" class="flex items-center gap-4">

      <img src="../assets/images/logo_logo 1.png" loading="lazy" alt="Logo" class="w-36 h-14 hidden lg:flex" />
    </a>
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
          <a href="../blog/">Blog</a>
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
        <a href="../blog/">Blog</a>
      </li>
    </ul>
  </section>

  <main class="main-body">
    <!-- Image and advert -->
    <section class="min-h-[45vh]">

      <div class="min-h-[inherit] w-full bg-gray-200 relative">
        <div class="px-10 md:px-24 lg:px-36 xl:px-48 flex items-center min-h-[inherit] hero_overlay">
          <h1 class="text-5xl font-bold z-50 text-white col-span-3 lg:col-span-2 text-start carousel_text">
            Contact Us
          </h1>
        </div>
        <img src="../../assets/images/home/World class Free Zone Contract Logistics in Nigeria & West Africa.jpg"
          id="blog_img" class="h-full w-full object-cover absolute top-0 opacity-70" alt="About us Hero" />
      </div>


    </section>

    <!--Leave us a Message-->

    <!--Free Zone Operations-->

    <section class="px-10 md:px-24 lg:px-36 xl:px-48 py-12">
      <section class="min-h-[55vh] bg-gray_background text-white grid grid-cols-2 p-4 md:p-12">
        <form class="col-span-2 grid grid-cols-3" method="POST" action="./">
          <h1 class="text-5xl font-bold text-center mb-10 col-span-3">
            Leave us a Message
          </h1>

          <label for="company"
            class="text-xl font-medium text-start md:text-end h-12 col-span-3 md:col-span-1 leading-10 pr-10">
            Company
          </label>
          <input type="text" id="company" name="company" required
            class="h-12 rounded-md col-span-3 md:col-span-2 mb-4 px-4 text-dark_background" />

          <label for="name"
            class="text-xl font-medium text-start md:text-end h-12 col-span-3 md:col-span-1 leading-10 pr-10">
            Name
          </label>
          <input type="text" id="name" name="name" required
            class="h-12 rounded-md col-span-3 md:col-span-2 mb-4 px-4 text-dark_background" />

          <label for="email"
            class="text-xl font-medium text-start md:text-end h-12 col-span-3 md:col-span-1 leading-10 pr-10">
            Email
          </label>
          <input type="email" id="email" name="email" required
            class="h-12 rounded-md col-span-3 md:col-span-2 mb-4 px-4 text-dark_background" />

          <label for="phone"
            class="text-xl font-medium text-start md:text-end h-12 col-span-3 md:col-span-1 leading-10 pr-10">
            Phone Number
          </label>
          <input type="phone" id="phone" name="phone" required
            class="h-12 rounded-md col-span-3 md:col-span-2 mb-4 px-4 text-dark_background" />


          <label for="subject"
            class="text-xl font-medium text-start md:text-end h-12 col-span-3 md:col-span-1 leading-10 pr-10">
            Subject Request
          </label>
          <select name="subject" id="subject" required
            class="h-12 rounded-md col-span-3 md:col-span-2 mb-4 px-4 text-dark_background">
            <option value="Contract Logistics & Free Zone Solution">Contract Logistics & Free Zone Solution</option>
            <option value="Transport & Distribution Solution">Transport & Distribution Solution</option>
            <option value="Other Request (Specify in message)">Other Request (Specify in message)</option>
          </select>

          <label for="message"
            class="text-xl font-medium text-start md:text-end h-12 col-span-3 md:col-span-1 leading-10 pr-10">
            Message
          </label>
          <textarea name="message" id="message" required
            class="h-48 rounded-md col-span-3 md:col-span-2 mb-4 p-4 text-dark_background">  </textarea>

          <button type="submit"
            class="bg-blue_background text-2xl font-semibold px-4 py-2 border-4 w-fit h-fit rounded-md md:col-start-2 md:col-span-2 col-span-3 mt-4 mb-12">
            Send Message
          </button>

          <ul class="space-y-4 md:col-start-2 col-span-3 md:col-span-2">
            <li class="flex flex-row gap-4">
              <svg width="30" height="30" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M7.54637 7.79999H33.3839C35.8214 7.79999 37.0499 8.95049 37.0499 11.2905V27.7095C37.0499 30.03 35.8214 31.2 33.3839 31.2H7.54637C5.10887 31.2 3.88037 30.03 3.88037 27.7095V11.2905C3.88037 8.95049 5.10887 7.79999 7.54637 7.79999ZM20.4554 24.57L33.5984 13.7865C34.0664 13.3965 34.4369 12.4995 33.8519 11.7C33.2864 10.9005 32.2529 10.881 31.5704 11.3685L20.4554 18.8955L9.35987 11.3685C8.67737 10.881 7.64387 10.9005 7.07837 11.7C6.49337 12.4995 6.86387 13.3965 7.33187 13.7865L20.4554 24.57Z"
                  fill="white" />
              </svg>

              <span class="text-2xl font-normal">xyz@ty....com</span>
            </li>
            <li class="flex flex-row gap-4">
              <svg width="30" height="30" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M38.5 21.5C38.5 19.1472 38.0474 16.8174 37.1679 14.6436C36.2884 12.4699 34.9994 10.4948 33.3744 8.83104C31.7493 7.16733 29.8202 5.8476 27.697 4.9472C25.5738 4.0468 23.2981 3.58337 21 3.58337V7.16671C23.7688 7.16664 26.4755 8.00714 28.7778 9.58193C31.08 11.1567 32.8745 13.3951 33.9343 16.014C34.638 17.7532 35.0001 19.6174 35 21.5H38.5ZM3.5 17.9167V8.95837C3.5 8.48319 3.68437 8.02748 4.01256 7.69147C4.34075 7.35547 4.78587 7.16671 5.25 7.16671H14C14.4641 7.16671 14.9092 7.35547 15.2374 7.69147C15.5656 8.02748 15.75 8.48319 15.75 8.95837V16.125C15.75 16.6002 15.5656 17.0559 15.2374 17.3919C14.9092 17.7279 14.4641 17.9167 14 17.9167H10.5C10.5 21.7181 11.975 25.3639 14.6005 28.0519C17.226 30.7399 20.787 32.25 24.5 32.25V28.6667C24.5 28.1915 24.6844 27.7358 25.0126 27.3998C25.3408 27.0638 25.7859 26.875 26.25 26.875H33.25C33.7141 26.875 34.1593 27.0638 34.4874 27.3998C34.8156 27.7358 35 28.1915 35 28.6667V37.625C35 38.1002 34.8156 38.5559 34.4874 38.8919C34.1593 39.2279 33.7141 39.4167 33.25 39.4167H24.5C12.9028 39.4167 3.5 29.7901 3.5 17.9167Z"
                  fill="white" />
                <path
                  d="M30.7002 17.3863C31.2281 18.6905 31.4998 20.0883 31.5 21.5H28.35C28.35 19.5042 27.5756 17.5902 26.1972 16.179C24.8188 14.7678 22.9493 13.975 21 13.975V10.75C23.0766 10.7501 25.1066 11.3807 26.8332 12.5619C28.5599 13.7432 29.9056 15.4221 30.7002 17.3863Z"
                  fill="white" />
              </svg>
              <span class="text-2xl font-normal">+34 123 456 789</span>
            </li>

            <li class="flex flex-row gap-4">
              <svg width="30" height="30" viewBox="0 0 26 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M13 17.125C11.8397 17.125 10.7269 16.6641 9.90641 15.8436C9.08594 15.0231 8.625 13.9103 8.625 12.75C8.625 11.5897 9.08594 10.4769 9.90641 9.65641C10.7269 8.83594 11.8397 8.375 13 8.375C14.1603 8.375 15.2731 8.83594 16.0936 9.65641C16.9141 10.4769 17.375 11.5897 17.375 12.75C17.375 13.3245 17.2618 13.8934 17.042 14.4242C16.8221 14.955 16.4998 15.4373 16.0936 15.8436C15.6873 16.2498 15.205 16.5721 14.6742 16.792C14.1434 17.0118 13.5745 17.125 13 17.125ZM13 0.5C9.7511 0.5 6.63526 1.79062 4.33794 4.08794C2.04062 6.38526 0.75 9.5011 0.75 12.75C0.75 21.9375 13 35.5 13 35.5C13 35.5 25.25 21.9375 25.25 12.75C25.25 9.5011 23.9594 6.38526 21.6621 4.08794C19.3647 1.79062 16.2489 0.5 13 0.5Z"
                  fill="white" />
              </svg>
              <span class="text-2xl font-normal">
                TY Logistics Park FZE, Alaro City, Lekki Free Zone</span>
            </li>
          </ul>
        </form>

        <div class="col-span-2 grid grid-cols-3 mt-12">
          <img src="../assets/images/contact_us/contact us map.jpg" alt="Nigeria" loading="lazy"
            class="col-span-3 w-full" />
        </div>
      </section>
    </section>

    <!--Image cards-->

    <section class="min-h-[80vh] bg-dark_background grid grid-cols-2 grid-rows-3 md:grid-rows-2">
      <div class="col-span-2 md:col-span-1 row-span-1 about_us_card_background">
        <a href="../solutions/" class="flex justify-center items-center images_card_div h-full">
          <h2 class="text-4xl font-bold text-white">Our Solutions</h2>
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
        <a href="../about-us/" class="flex justify-center items-center images_card_div h-full px-8">
          <h2 class="text-4xl font-bold text-white">About Us</h2>

          <button class="px-4 sm:pt-2 text-white w-fit h-fit">
            <img src="../assets/images/Arrow 2.png" alt="Direction" class="h-4" />
          </button>
        </a>
      </div>
    </section>
  </main>

  <footer
    class="bg-light_blue_background flex flex-col sm:flex-row gap-4 justify-between px-10 lg:px-44 py-16 footer-ext">
    <a href="../" class="flex flex-col">
      <img src="../assets/images/Logo white_logo copy_logo copy 1.png" alt="Logo" class="h-14 mb-8" loading="lazy" />
      <h5 class="text-white text-start text-base font-normal">
        TY Logistics Park FZE
      </h5>

      <h5 class="text-white text-start text-base font-normal">
        Copyright 2024
      </h5>
    </a>

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
          <a href="./" class="text-white text-base font-normal">Contact Us</a>
        </li>
        <li>
          <a href="../faqs/" class="text-white text-base font-normal">FAQs</a>
        </li>
        <li>
          <a href="../blog/" class="text-white text-base font-normal">Blog</a>
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
      <a href="https://nalcomet.com/" target="_blank" class="text-white text-start text-base mb-6 font-bold">
        Nal Comet shipping
      </a>

      <a href="../cookie-policy/" class="text-white text-start text-base font-normal">
        Cookie & Privacy Policy
      </a>
    </div>
  </footer>

  <script src="../js/mobile-nav.js"></script>
</body>

</html>