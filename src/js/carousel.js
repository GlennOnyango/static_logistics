const img_ids = ["world_class", "wms_operations", "free_zone", "last_mile"];

document.addEventListener("DOMContentLoaded", () => {
  let Idx = 0;
  const img_section = document.querySelector("#img_section");
  for (const child of img_section.children) {
    if (child.classList.contains("relative")) {
      Idx = img_ids.indexOf(child.id);
    }
  }

  let timeInterval = 5000;

  let intervalfn = () => {
    if (Idx < 3) {
      document.querySelector(`#${img_ids[Idx]}`).classList.add("hidden");
      document.querySelector(`#${img_ids[Idx]}`).classList.remove("relative");

      Idx += 1;
    } else {
      document.querySelector(`#${img_ids[Idx]}`).classList.add("hidden");
      document.querySelector(`#${img_ids[Idx]}`).classList.remove("relative");

      Idx = 0;
    }

    document.querySelector(`#${img_ids[Idx]}`).classList.add("relative");
    document.querySelector(`#${img_ids[Idx]}`).classList.remove("hidden");
  };

  let carousel_time = setInterval(intervalfn, timeInterval);

  document.querySelectorAll("#next").forEach((e) => {
    e.addEventListener("click", (e) => {
      if (Idx < 3) {
        document.querySelector(`#${img_ids[Idx]}`).classList.add("hidden");
        document.querySelector(`#${img_ids[Idx]}`).classList.remove("relative");

        Idx += 1;
      } else {
        document.querySelector(`#${img_ids[Idx]}`).classList.add("hidden");
        document.querySelector(`#${img_ids[Idx]}`).classList.remove("relative");

        Idx = 0;
      }

      document.querySelector(`#${img_ids[Idx]}`).classList.add("relative");
      document.querySelector(`#${img_ids[Idx]}`).classList.remove("hidden");

      clearInterval(carousel_time);
      carousel_time = setInterval(intervalfn, timeInterval);
    });
  });

  document.querySelectorAll("#advert_presser").forEach((e) => {
    e.addEventListener("click", (e) => {
      img_ids.forEach((id) => {
        if (id === "world_class") {
          document.querySelector(`#world_class`).classList.add("relative");
          document.querySelector(`#world_class`).classList.remove("hidden");
        } else {
          document.querySelector(`#${id}`).classList.add("hidden");
          document.querySelector(`#${id}`).classList.remove("relative");
        }
      });

      Idx = 0;

      clearInterval(carousel_time);
      carousel_time = setInterval(intervalfn, timeInterval);
    });
  });

  document.querySelectorAll("#kind_background_presser").forEach((e) => {
    e.addEventListener("click", (e) => {
      img_ids.forEach((id) => {
        if (id === "wms_operations") {
          document.querySelector(`#wms_operations`).classList.add("relative");
          document.querySelector(`#wms_operations`).classList.remove("hidden");
        } else {
          document.querySelector(`#${id}`).classList.add("hidden");
          document.querySelector(`#${id}`).classList.remove("relative");
        }
      });

      Idx = 1;

      clearInterval(carousel_time);
      carousel_time = setInterval(intervalfn, timeInterval);
    });
  });

  document.querySelectorAll("#blog_background_presser").forEach((e) => {
    e.addEventListener("click", (e) => {
      img_ids.forEach((id) => {
        if (id === "free_zone") {
          document.querySelector(`#free_zone`).classList.add("relative");
          document.querySelector(`#free_zone`).classList.remove("hidden");
        } else {
          document.querySelector(`#${id}`).classList.add("hidden");
          document.querySelector(`#${id}`).classList.remove("relative");
        }
      });

      Idx = 2;

      clearInterval(carousel_time);
      carousel_time = setInterval(intervalfn, timeInterval);
    });
  });

  document.querySelectorAll("#about_us_background_presser").forEach((e) => {
    e.addEventListener("click", (e) => {
      img_ids.forEach((id) => {
        if (id === "last_mile") {
          document.querySelector(`#last_mile`).classList.add("relative");
          document.querySelector(`#last_mile`).classList.remove("hidden");
        } else {
          document.querySelector(`#${id}`).classList.add("hidden");
          document.querySelector(`#${id}`).classList.remove("relative");
        }
      });

      Idx = 3;

      clearInterval(carousel_time);
      carousel_time = setInterval(intervalfn, timeInterval);
    });
  });
});
