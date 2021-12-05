"use strict";

//diferentes elementos de la página
const welcome = document.querySelector(".welcome-popup");
const overlay = document.querySelector(".overlay");
const contactButton = document.getElementById("contactanos");

const closeModel = () => {
  console.log("cerrando welcome");
  welcome.classList.add("hidden");
  overlay.classList.add("hidden");
};

overlay.addEventListener("click", closeModel);

document.addEventListener("keydown", (e) => {
  if (e.key === "Escape" && !welcome.classList.contains("hidden")) {
    closeModel();
  }
});

const contact = () => {
  welcome.classList.remove("hidden");
  overlay.classList.remove("hidden");
};
