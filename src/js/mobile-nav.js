document.addEventListener("DOMContentLoaded", () => {
  document
    .querySelector(".mobile-nav__toggle")
    .addEventListener("click", () => {
      document.querySelector(".mobile-nav").classList.toggle("hidden");

      const isHidden = document
        .querySelector(".mobile-nav")
        .classList.contains("hidden");

      if (isHidden) {
        document.querySelector(".main-body").classList.remove("hidden");
        document.querySelector(".footer-ext").classList.remove("hidden");
      } else {
        document.querySelector(".main-body").classList.add("hidden");
        document.querySelector(".footer-ext").classList.add("hidden");
      }
    });


});
