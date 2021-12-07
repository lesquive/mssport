"use strict";

//diferentes elementos de la página
const welcome = document.querySelector(".welcome-popup");
const overlay = document.querySelector(".overlay");
const sms = document.querySelector(".sms");

const closeModel = () => {
  console.log("cerrando welcome");
  welcome.classList.add("hidden");
  overlay.classList.add("hidden");
  sms.classList.add("hidden");
};

overlay.addEventListener("click", closeModel);

document.addEventListener("keydown", (e) => {
  console.log(e.key);
  if (e.key == "Escape") {
    closeModel();
  }
});

const contact = () => {
  welcome.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const smsFunc = () => {
  sms.classList.remove("hidden");
  overlay.classList.remove("hidden");
};
