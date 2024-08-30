<!DOCTYPE html>
<html lang="en">

<?php

include '../php/config/db_connection.php';

session_start();

// define variables and set to empty values
$email = $password = $error = "";

print_r(count($_SESSION));



if (count($_SESSION) > 0) {
  if ($_SESSION["user_id"]) {
    header("Location: ../dashboard/");
    exit;
  }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = test_input($_POST['email']);
  $password = test_input($_POST['password']);

  // Prepare the statement
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");

  // Bind parameters
  $stmt->bind_param("s", $email);

  // Execute the statement
  $stmt->execute();

  // Get the result set
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {

    $stored_email = $stored_id = $stored_passengers = "";

    while ($row = $result->fetch_assoc()) {
      // Process the results
      $stored_id = $row["id"];
      $stored_email = $row["email"];
      $storedHash = $row["password"];

    }

    if (password_verify($password, $storedHash)) {
      $_SESSION["user_id"] = $stored_id;

      $_SESSION["user_email"] = $stored_email;
      header("Location: ../dashboard/");
      exit;
    } else {
      $error = "Invalid credentials";
    }
  } else {
    $error = "User not found";
  }

  // Close the statement
  $stmt->close();
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" type="image/png" href="../assets/images/logo_logo 1.png" />
  <title>TY Logistics Park FZE</title>
  <meta name="description" content="TY Logistics Park FZE." />
</head>

<body>
  <section class="h-screen flex flex-col">
    <div class="grow-0">
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
              <a href="./">Home</a>
            </li>
            <li>
              <a href="./about-us/">About Us</a>
            </li>
            <li>
              <a href="./solutions/">Our Solutions</a>
            </li>
            <li>
              <a href="./free-zone-grade-a-facilities/">Free Zone Grade-A Facilities</a>
            </li>

            <li>
              <a href="./blog/">Blog</a>
            </li>
          </ul>
        </nav>

        <div class="flex items-center">
          <a class="contact-btn bg-gray_background text-white flex flex-row justify-center items-center gap-4 px-4 py-2 w-fit h-fit text-dark_text_para rounded-xl transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"
            href="./contact-us/">Contact Us

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
            <a href="./">Home</a>
          </li>
          <li>
            <a href="./about-us/">About Us</a>
          </li>
          <li>
            <a href="./solutions/">Our Solutions</a>
          </li>
          <li>
            <a href="./free-zone-grade-a-facilities/">Free Zone Grade-A Facilities</a>
          </li>

          <li>
            <a href="./blog/">Blog</a>
          </li>
        </ul>
      </section>
    </div>
    <div class="grow bg-yellow-300 justify-center items-center flex flex-col ">

      <form method="post" action="./" class="bg-white w-1/3 px-4  ">

        <?php if ($error === "") {

        } else {
          echo "<div class='w-full mt-2 bg-red-200 text-red-700 p-4 text-center'>$error</div>";
        }

        ?>


        <h1 class="text-center text-4xl font-bold py-8">Welcome to TY Logistics Park FZE</h1>
        <div class="w-full flex flex-col gap-2">
          <label for="email" class="text-start ">Email </label>
          <input type="email" id="email" name="email" required class="bg-gray-200  py-2  pl-4 rounded-md"
            placeholder="Enter your email">
        </div>
        <div class="w-full flex flex-col gap-2">
          <label for="password" class="text-start mt-4">Password </label>
          <input type="password" id="password" required name="password" class="bg-gray-200 py-2 pl-4 rounded-md"
            placeholder="**********">
        </div>
        <div class="flex justify-center mb-4">
          <button type="submit" class="bg-dark_background mt-4 px-4 text-white h-10 rounded-md w-fit">Login</button>
        </div>
      </form>
    </div>
  </section>


  <script src="../js/mobile-nav.js"></script>
</body>

</html>