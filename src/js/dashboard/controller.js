document.addEventListener("DOMContentLoaded", () => {
  // document.querySelector("#cancel").addEventListener("click", () => {
  //   document.querySelector("#user_form").classList.add("hidden");
  //   document.querySelector("#user_table").classList.remove("hidden");
  // });

  // document
  //   .querySelector("#show_add_user_form")
  //   .addEventListener("click", () => {
  //     document.querySelector("#user_form").classList.remove("hidden");
  //     document.querySelector("#user_table").classList.add("hidden");
  //   });

  //activation

  // document.querySelector("#activate_user").addEventListener("click", () => {
  //   document.querySelector("#user_div").classList.remove("hidden");
  //   document.querySelector("#blog_div").classList.add("hidden");
  // });

  // document.querySelector("#activate_blog").addEventListener("click", () => {
  //   document.querySelector("#blog_div").classList.remove("hidden");
  //   document.querySelector("#user_div").classList.add("hidden");
  // });

  //check if blog image is uploaded
  document.querySelector("#blog_image").addEventListener("change", (e) => {
    const file = e.target.files[0];

    console.log(file);

    //add selected image as background image to blog_img_div
    const reader = new FileReader();
    reader.onload = function () {
      document.querySelector(
        "#blog_img_div"
      ).style.backgroundImage = `url(${reader.result})`;

      //set no repeat and cover
      document.querySelector("#blog_img_div").style.backgroundSize = "cover";
      document.querySelector("#blog_img_div").style.backgroundRepeat =
        "no-repeat";
      document.querySelector("#blog_img_div").style.backgroundPosition =
        "center";
    };

    reader.readAsDataURL(file);
  });
});
