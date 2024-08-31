<!DOCTYPE html>
<html lang="en">

<?php

include '../../php/config/db_connection.php';

session_start();


if (!$_SESSION["user_id"]) {
  header("Location: ../../admin/");
  exit;
}

// define variables and set to empty values
$email = $first_name = $last_name = $password = $error = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = test_input($_POST["email"]);
  $first_name = test_input($_POST["first_name"]);
  $last_name = test_input($_POST["last_name"]);
  $password = test_input($_POST["password"]);

  //salt and hash the password
  $password = password_hash($password, PASSWORD_DEFAULT);


  // Prepare the SQL statement with placeholders
  $sql = "INSERT INTO users (email, first_name, last_name, password) VALUES (?, ?, ?, ?)";

  // Create a prepared statement
  $stmt = $conn->prepare($sql);

  // Bind parameters to the statement
  $stmt->bind_param("ssss", $email, $first_name, $last_name, $password);

  // Execute the statement

  try {
    $stmt->execute();
    $error = "New record created successfully";
  } catch (Exception $e) {
    $error = "Error: " . $stmt->error;
    //echo "Error: " . $stmt->error;
  }


  // Close the statement and connection
  $stmt->close();
  $conn->close();

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
        <img src="../../assets/images/logo_logo 1.png" loading="lazy" alt="Logo" class="w-36 h-14 hidden lg:flex" />
      </div>
      <a href="../" class="w-full flex justify-center py-4 bg-yellow-300">
        <h2 class="font-semibold text-lg">Users</h2>
      </a>
      <a href="../blog/" class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-yellow-300 py-4">
        <h2 class="font-semibold text-lg">Blogs</h2>
      </a>
      <div class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-yellow-300 py-4">
        <h2 class="font-semibold text-lg">Logout</h2>
      </div>
    </div>

    <div class="grow bg-yellow-300 justify-center flex overflow-y-auto pt-8">
      <div class="w-1/2" id="user_div">

        <?php if ($error === "New record created successfully") {
          echo "<div class='w-full bg-green-200 text-green-700 p-4 text-center'>New record created successfully</div>";
        } else if ($error === "") {

        } else {
          echo "<div class='w-full bg-red-200 text-red-700 p-4 text-center'>$error</div>";
        }

        ?>

        <!-- Add User-->
        <div class="w-full h-fit p-4 bg-white flex flex-col" id="user_form">
          <div class="w-full flex justify-between items-center">
            <div class="w-full">
              <h1 class="font-semibold text-2xl text-center">Add user</h1>
            </div>
          </div>
          <form class="w-full flex flex-col justify-center items-center gap-2" action="./" method="POST">
            <div class="w-full flex flex-col gap-2">
              <label for="email" class="text-start">Email</label>
              <input type="text" id="email" name="email" class="bg-gray-200 py-2 pl-4 rounded-md"
                placeholder="Enter user email" />
            </div>
            <div class="w-full flex flex-col gap-2">
              <label for="email" class="text-start">First Name</label>
              <input type="text" id="first_name" name="first_name" class="bg-gray-200 py-2 pl-4 rounded-md"
                placeholder="Enter user first name" />
            </div>
            <div class="w-full flex flex-col gap-2">
              <label for="email" class="text-start">Last Name</label>
              <input type="text" id="last_name" name="last_name" class="bg-gray-200 py-2 pl-4 rounded-md"
                placeholder="Enter user last name" />
            </div>

            <div class="w-full flex flex-col gap-2">
              <label for="email" class="text-start">Password</label>
              <input type="password" id="password" name="password" class="bg-gray-200 py-2 pl-4 rounded-md"
                placeholder="Enter first time password" />
            </div>
            <div class="w-full flex justify-center gap-2">
              <button type="submit"
                class="bg-dark_background mt-4 px-4 text-white h-10 rounded-md w-fit hover:bg-yellow-300 hover:text-dark_text_para">
                Add user
              </button>

              <a href="../" type="button"
                class="bg-gray-200 mt-4 px-4 text-black h-10 rounded-md flex items-center w-fit hover:bg-yellow-300">
                View all users
              </a>
            </div>
          </form>
        </div>
        <!-- Add user-->
      </div>

    </div>
  </section>

  <script src="../js/dashboard/controller.js"></script>
</body>

</html>