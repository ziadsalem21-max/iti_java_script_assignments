const images = [
  "imgs/Picture (122).jpg",
  "imgs/Picture (24).jpg",
  "imgs/Picture (28).jpg",
  "imgs/Picture (3).jpeg"
];

let index = 0;
let slider = document.getElementById("slider");
let interval;

function showSlide(i) {
  index = (i + images.length) % images.length;
  slider.src = images[index];
}
function nextSlide() {
  showSlide(index + 1);
}
function prevSlide() {
  showSlide(index - 1);
}
function startSlider() {
  stopSlider();
  interval = setInterval(nextSlide, 2000);
}
function stopSlider() {
  clearInterval(interval);
}

const toggleBtn = document.getElementById("toggleMode");
toggleBtn.addEventListener("click", () => {
  document.body.classList.toggle("dark");
  if (document.body.classList.contains("dark")) {
    toggleBtn.textContent = "☀ Light Mode";
  } else {
    toggleBtn.textContent = "🌙 Dark Mode";
  }
});
