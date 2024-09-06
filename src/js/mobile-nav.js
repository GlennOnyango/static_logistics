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
        document.querySelector("#img_section").classList.remove("hidden");
        document.querySelector(".footer-ext").classList.remove("hidden");
      } else {
        document.querySelector(".main-body").classList.add("hidden");
        document.querySelector("#img_section").classList.add("hidden");
        document.querySelector(".footer-ext").classList.add("hidden");
      }
    });
});



window.addEventListener('scroll', function() {
  const navbar = document.querySelector('.nav_section');
  if (window.scrollY > 0) {
    navbar.classList.add('fixed');   
    navbar.classList.add('top-0');
    navbar.classList.add('left-0');
    navbar.classList.add('w-screen');
    navbar.classList.add('z-50');

  } else {
    navbar.classList.remove('fixed');   
    navbar.classList.remove('top-0');
    navbar.classList.remove('left-0');
    navbar.classList.remove('w-screen');
    navbar.classList.remove('z-50');
  }
});