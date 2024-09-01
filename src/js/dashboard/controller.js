document.addEventListener("DOMContentLoaded", () => {
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
