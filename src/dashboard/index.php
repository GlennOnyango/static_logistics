<!DOCTYPE html>
<html lang="en">

<?php

include '../php/config/db_connection.php';


session_start();


if (!$_SESSION["user_id"]) {
  header("Location: ../admin/");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  // Prepare the SQL statement with placeholders
  $sql = "SELECT * FROM users";

  // Create a prepared statement
  $stmt = $conn->prepare($sql);

  $result = $conn->query($sql);


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
        <img src="../assets/images/logo_logo 1.png" loading="lazy" alt="Logo" class="w-36 h-14 hidden lg:flex" />
      </div>
      <a href="./" class="w-full flex justify-center py-4 bg-yellow-300">
        <h2 class="font-semibold text-lg">Users</h2>
      </a>
      <a href="./blogs/" class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-yellow-300 py-4">
        <h2 class="font-semibold text-lg">Blogs</h2>
      </a>
      <div class="w-full flex justify-center mt-1 bg-gray-200 hover:bg-yellow-300 py-4 cursor-pointer" id="logout">
        <h2 class="font-semibold text-lg">Logout</h2>
      </div>
    </div>

    <div class="grow bg-yellow-300 justify-center flex overflow-y-auto pt-8">
      <div class="w-1/2" id="user_div">
        <!-- user table-->
        <div class="w-fit p-4 bg-white flex flex-col" id="user_table">
          <div class="w-full flex justify-between items-center">
            <div class="w-1/2">
              <h1 class="font-semibold text-2xl">Users</h1>
            </div>
            <div class="w-1/2 flex justify-end">
              <a href="./add-user/" class="bg-gray-200 hover:bg-yellow-300 py-2 px-4 rounded-lg">
                Add User
              </a>
            </div>
          </div>
          <div class="w-full flex justify-center items-center">
            <table class="border-collapse border border-slate-500 mt-8">
              <thead>
                <tr class="border-b-2 border-gray-300">
                  <th class="text-2xl text-start border py-2 px-4 border-slate-600">
                    Email
                  </th>
                  <th class="text-2xl text-start border py-2 px-4 border-slate-600">
                    First Name
                  </th>
                  <th class="text-2xl text-start border py-2 px-4 border-slate-600">
                    Last Name
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                  <td class='text-lg border border-slate-700 py-2 px-4'>
                    " . $row["email"] . "
                  </td>
                  <td class='text-lg border border-slate-700 py-2 px-4'>
                    " . $row["first_name"] . "
                  </td>
                  <td class='text-lg border border-slate-700 py-2 px-4'>
                    " . $row["last_name"] . "
                  </td>

                </tr>
                ";
                  }
                } else {
                  echo "0 results";
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
        <!-- user table-->
      </div>

    </div>
  </section>

  <script src="../js/dashboard/controller.js"></script>
  <script src="../js/dashboard/logout.js"></script>
</body>

</html>