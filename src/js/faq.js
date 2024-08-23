document.addEventListener("DOMContentLoaded", () => {
  //document.querySelector("#faq_arrow").addEventListener("click", (e) => {});

  document.querySelectorAll("#faq_arrow").forEach((e) => {
    e.addEventListener("click", (svg) => {
      const myParent = svg.target.parentNode;

      myParent.nextElementSibling.classList.toggle("hidden");
    });
  });
});
