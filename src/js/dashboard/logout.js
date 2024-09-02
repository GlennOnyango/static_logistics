document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#logout").addEventListener("click", () => {
    // Make an AJAX request to the PHP script
    var xhr = new XMLHttpRequest();

    let path = document.location.pathname;
    let origin = document.location.origin;
    let pathArray = path.split("/");

    if (origin.includes("localhost")) {
      if (pathArray.includes("src")) {
        xhr.open(
          "GET",
          origin + "/static_logistics/src/php/config/clear_session.php",
          true
        ); // Replace "clear_session.php" with the actual path to your PHP script
      } else {
        xhr.open(
          "GET",
          origin + "/static_logistics/php/config/clear_session.php",
          true
        ); // Replace "clear_session.php" with the actual path to your PHP script
      }
    } else {
      xhr.open("GET", origin + "/php/config/clear_session.php", true); // Replace "clear_session.php" with the actual path to your PHP script
    }

    xhr.send();

    // Optionally, handle the response from the server
    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log("Session cleared successfully");
        // Redirect to the desired page or perform other actions

        if (origin.includes("localhost")) {
          if (pathArray.includes("src")) {
            window.location.replace("/static_logistics/src/admin/");
          } else {
            window.location.replace("/static_logistics/admin/");
          }
        } else {
          window.location.replace("/admin/");
        }
      } else {
        console.error("Error clearing session");
      }
    };
  });
});
