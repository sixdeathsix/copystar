let viewport = document.getElementById("viewport").offsetWidth
let btnNext = document.getElementById("next")
let btnPrev = document.getElementById("prev")
let slider = document.querySelector("div.slider")
let index = 0

function next() {
  if (index < 4) { 
    index++
  } else {
    index = 0
  }
  slider.style.left = -index * viewport + "px"
}

function prev() {
  if (index > 0) {
    index--;
  } else { 
    index = 4;
  }
  slider.style.left = -index * viewport + "px"
}

window.addEventListener('DOMContentLoaded', () => setInterval(() => next(), 3500))
 
btnNext.addEventListener("click", () => next())
 
btnPrev.addEventListener("click", () => prev())