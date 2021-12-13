"use strict";

//diferentes elementos de la página
const welcome = document.querySelector(".welcome-popup");
const overlay = document.querySelector(".overlay");
const sms = document.querySelector(".sms");
const quienesSomos = document.querySelector(".quienesSomos");
const carritoBox = document.querySelector(".carrito");
const carritoLink = document.querySelector(".carrito-link");
const carritoItem = document.querySelector(".carritoItem");
const carritoTotal = document.querySelector(".carritoTotal");
const applicarDescuentoBttn = document.querySelector(".SMSBttn");
const ejecutarCompraBttn = document.querySelector("#ejecutarCompraBttn");
const login = document.querySelector(".login");

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}

const closeModel = () => {
  console.log("cerrando welcome");
  welcome.classList.add("hidden");
  overlay.classList.add("hidden");
  sms.classList.add("hidden");
  carritoBox.classList.add("hidden");
  quienesSomos.classList.add("hidden");
  login.classList.add("hidden");
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

const verQuienesSomosFunc = () => {
  quienesSomos.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const loginFunc = () => {
  login.classList.remove("hidden");
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
    var id = getRandomInt(999999999);
    var entry = { ID: id, Producto: nombreProducto, Precio: precioProducto };
    localStorage.total =
      parseInt(localStorage.total) + parseInt(precioProducto);
    localStorage.setItem("entry", JSON.stringify(entry));
    // Save allEntries back to local storage
    existingEntries.push(entry);
    localStorage.setItem("allEntries", JSON.stringify(existingEntries));
    carritoItem.innerHTML += `<p class=${id}>${nombreProducto} : ${precioProducto} <a href="javascript:void(0);"><img src="./imagenes/delete.png" alt="carrito" class="social-media deleteBttn ${id}" onclick="deleteItem(${id})"></a><p/>`;
    carritoTotal.innerHTML = `<p>Total: ${localStorage.total}$<p/>`;
    console.log(localStorage.allEntries);
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
        '<img src="./imagenes/shopping-cart.png" alt="carrito" class="social-media" onclick="verCarritoFunc()">' +
        localStorage.carritoCount;
      var existingEntries = JSON.parse(localStorage.getItem("allEntries"));
      if (existingEntries == null) existingEntries = [];
      for (let i = 0; i < existingEntries.length; i++) {
        carritoItem.innerHTML += `<p class=${existingEntries[i]["ID"]}>${existingEntries[i]["Producto"]} : ${existingEntries[i]["Precio"]} <a href="javascript:void(0);"><img src="./imagenes/delete.png" alt="carrito" class="social-media deleteBttn ${existingEntries[i]["ID"]}" onclick="deleteItem(${existingEntries[i]["ID"]})"></a><p/>`;
      }
      carritoTotal.innerHTML = `<p>Total: ${localStorage.total}$<p/>`;
    } else {
      localStorage.carritoCount = 0;
      localStorage.total = 0;
      localStorage.carritoItems = [];
    }
  } else {
    // Sorry! No Web Storage support..
  }
};

const deleteItem = (id) => {
  var existingEntries = JSON.parse(localStorage.getItem("allEntries"));
  for (let i = 0; i < existingEntries.length; i++) {
    if (existingEntries[i]["ID"] == id) {
      localStorage.total =
        localStorage.total - parseInt(existingEntries[i]["Precio"]);
      existingEntries.splice(i, 1);
      if (localStorage.carritoCount) {
        localStorage.carritoCount = Number(localStorage.carritoCount) - 1;
      } else {
        localStorage.carritoCount = 0;
      }
    }
  }
  localStorage.setItem("allEntries", JSON.stringify(existingEntries));
  carritoItem.innerHTML = "";
  for (let i = 0; i < existingEntries.length; i++) {
    carritoItem.innerHTML += `<p class=${existingEntries[i]["ID"]}>${existingEntries[i]["Producto"]} : ${existingEntries[i]["Precio"]} <a href="javascript:void(0);"><img src="./imagenes/delete.png" alt="carrito" class="social-media deleteBttn ${existingEntries[i]["ID"]}" onclick="deleteItem(${existingEntries[i]["ID"]})"></a><p/>`;
  }
  carritoTotal.innerHTML = `<p>Total: ${localStorage.total}$<p/>`;
  carritoLink.innerHTML =
    '<img src="./imagenes/shopping-cart.png" alt="carrito" class="social-media" onclick="verCarritoFunc()">' +
    localStorage.carritoCount;
};

const checkDiscount = () => {
  var smsCode = document.getElementById("smscode").value;
  console.log(smsCode);

  var check = $.ajax({
    url: "checkDiscount.php",
    type: "POST",
    // dataType: "json",
    data: { smsCode: smsCode },
    success: function (response) {
      console.log(response);
      if (response !== "0 results") {
        console.log("Apply discount");
        var total = parseFloat(localStorage.total);
        var descuento = parseFloat(response);
        localStorage.total = total - total * (descuento / 100);
        console.log(localStorage.total);
        carritoTotal.innerHTML = `<p>Total: ${localStorage.total}$<p/>`;
      }
    },
  });
};

const ejecutarCompra = () => {
  var smsCode = document.getElementById("smscode").value;
  var carritoItems = document.querySelector(".carritoItem").innerText;
  var correo = document.getElementById("email").value;
  var total = document.querySelector(".carritoTotal").innerText;

  console.log(smsCode);
  console.log(carritoItems);
  console.log(correo);
  console.log(total);

  $.ajax({
    url: "ejecutarCompra.php",
    type: "POST",
    // dataType: "json",
    data: {
      smsCode: smsCode,
      carritoItems: carritoItems,
      correo: correo,
      total: total,
    },
    success: function (response) {
      console.log(response);
    },
  });

  window.localStorage.clear();
  closeModel();
  checkCarrito();
  carritoItem.innerHTML = "";
  carritoTotal.innerHTML = `<p>Total: ${localStorage.total}$<p/>`;
  carritoLink.innerHTML =
    '<img src="./imagenes/shopping-cart.png" alt="carrito" class="social-media" onclick="verCarritoFunc()">' +
    localStorage.carritoCount;
};

applicarDescuentoBttn.addEventListener("click", checkDiscount);
ejecutarCompraBttn.addEventListener("click", ejecutarCompra);

checkCarrito();
