const carousel_ids = [
  "kind_background",
  "blog_background",
  "about_us_background",
  "advert",
];

const carousel_ids_object = {
  kind_background: {
    title:
      "Free Zone Logistics Hub: Gate Way to Nigeria and the West African Region",
  },
  blog_background: {
    title: "First of its Kind in Nigeria and West Africa.",
  },
  about_us_background: {
    title: "We are a TY Holding’s contract logistics flagship business",
  },
  advert: {
    title: "World class Free Zone Contract Logistics in Nigeria & West Africa.",
  },
};

document.addEventListener("DOMContentLoaded", () => {
  let timeInterval = 5000;
  let intervalfn = () => {
    let id_item = document.querySelector(".carsouel_div").id;
    let current_idx = carousel_ids.indexOf(id_item);

    if (current_idx < 3) {
      current_idx += 1;
    } else {
      current_idx = 0;
    }

    document.querySelector(".carsouel_div").id = carousel_ids[current_idx];
    //update text
    document.querySelector(".carousel_text").textContent =
      carousel_ids_object[carousel_ids[current_idx]].title;

    change_vector(`${carousel_ids[current_idx]}_presser`);
  };

  let carousel_time = setInterval(intervalfn, timeInterval);

  //change vector fill
  change_vector = (current_id) => {
    document.querySelectorAll(".vector_change").forEach((e) => {
      if (current_id === e.id) {
        //update vector color
        document.querySelector(`#${e.id}`).classList.remove("fill-white");

        document.querySelector(`#${e.id}`).classList.add("fill-blue-500");
      } else {
        //update vector color
        document.querySelector(`#${e.id}`).classList.remove("fill-blue");

        document.querySelector(`#${e.id}`).classList.add("fill-white");
      }
    });
  };

  const kind_background_presser = document.querySelector(
    "#kind_background_presser"
  );

  const blog_background_presser = document.querySelector(
    "#blog_background_presser"
  );

  const about_us_background_presser = document.querySelector(
    "#about_us_background_presser"
  );

  const advert_presser = document.querySelector("#advert_presser");

  //circle button control
  advert_presser.addEventListener("click", (e) => {
    document.querySelector(".carsouel_div").id = "advert";
    //update text
    document.querySelector(".carousel_text").textContent =
      carousel_ids_object.advert.title;

    change_vector("advert_presser");

    clearInterval(carousel_time);
    carousel_time = setInterval(intervalfn, timeInterval);
  });

  kind_background_presser.addEventListener("click", (e) => {
    document.querySelector(".carsouel_div").id = "kind_background";
    //update text
    document.querySelector(".carousel_text").textContent =
      carousel_ids_object.kind_background.title;

    change_vector("kind_background_presser");

    clearInterval(carousel_time);
    carousel_time = setInterval(intervalfn, timeInterval);
  });

  blog_background_presser.addEventListener("click", (e) => {
    document.querySelector(".carsouel_div").id = "blog_background";
    //update text
    document.querySelector(".carousel_text").textContent =
      carousel_ids_object.blog_background.title;

    change_vector("blog_background_presser");

    clearInterval(carousel_time);
    carousel_time = setInterval(intervalfn, timeInterval);
  });

  about_us_background_presser.addEventListener("click", (e) => {
    document.querySelector(".carsouel_div").id = "about_us_background";
    //update text
    document.querySelector(".carousel_text").textContent =
      carousel_ids_object.about_us_background.title;

    change_vector("about_us_background_presser");

    clearInterval(carousel_time);
    carousel_time = setInterval(intervalfn, timeInterval);
  });

  document.querySelector("#next").addEventListener("click", () => {
    let id_item = document.querySelector(".carsouel_div").id;
    let current_idx = carousel_ids.indexOf(id_item);

    if (current_idx < 3) {
      current_idx += 1;
    } else {
      current_idx = 0;
    }

    document.querySelector(".carsouel_div").id = carousel_ids[current_idx];
    //update text
    document.querySelector(".carousel_text").textContent =
      carousel_ids_object[carousel_ids[current_idx]].title;

    clearInterval(carousel_time);
    carousel_time = setInterval(intervalfn, timeInterval);
  });
});
