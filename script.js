"use strict";

//diferentes elementos de la página
const welcome = document.querySelector(".welcome-popup");
const overlay = document.querySelector(".overlay");
const sms = document.querySelector(".sms");
const carritoBox = document.querySelector(".carrito");
const carritoLink = document.querySelector(".carrito-link");
const carritoItem = document.querySelector(".carritoItem");
const carritoTotal = document.querySelector(".carritoTotal");

const closeModel = () => {
  console.log("cerrando welcome");
  welcome.classList.add("hidden");
  overlay.classList.add("hidden");
  sms.classList.add("hidden");
  carritoBox.classList.add("hidden");
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

const verCarritoFunc = () => {
  carritoBox.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const updateCarrito = (nombreProducto, precioProducto) => {
  console.log("adding item to carrito!");
  if (typeof Storage !== "undefined") {
    if (localStorage.carritoCount) {
      localStorage.carritoCount = Number(localStorage.carritoCount) + 1;
    } else {
      localStorage.carritoCount = 1;
    }
    var existingEntries = JSON.parse(localStorage.getItem("allEntries"));
    if (existingEntries == null) existingEntries = [];
    var entry = { Producto: nombreProducto, Precio: precioProducto };
    localStorage.total =
      parseInt(localStorage.total) + parseInt(precioProducto);
    localStorage.setItem("entry", JSON.stringify(entry));
    // Save allEntries back to local storage
    existingEntries.push(entry);
    localStorage.setItem("allEntries", JSON.stringify(existingEntries));
    carritoItem.innerHTML += `<p>${nombreProducto} : ${precioProducto} <a href="javascript:void(0);"><img src="./imagenes/delete.png" alt="carrito" class="social-media"></a><p/>`;
    carritoTotal.innerHTML = `<p>Total: ${localStorage.total}$<p/>`;
    console.log(localStorage.existingEntries);
    console.log(localStorage.total);
  } else {
    // Sorry! No Web Storage support..
  }
  carritoLink.innerHTML =
    '<img src="./imagenes/shopping-cart.png" alt="carrito" class="social-media" onclick="verCarritoFunc()">' +
    localStorage.carritoCount;
};

const checkCarrito = () => {
  if (typeof Storage !== "undefined") {
    if (localStorage.carritoCount) {
      carritoLink.innerHTML =
        '<img src="./imagenes/shopping-cart.png" alt="carrito" class="social-media">' +
        localStorage.carritoCount;
    } else {
      localStorage.carritoCount = 0;
      localStorage.total = 0;
      localStorage.carritoItems = [];
    }
  } else {
    // Sorry! No Web Storage support..
  }
};

checkCarrito();
