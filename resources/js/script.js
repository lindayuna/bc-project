//Navbar Fixed
window.onscroll = function () {
  const header = document.querySelector("header");
  const fixedNAV = header.offsetTop;
  if (window.pageYOffset > fixedNAV) {
    header.classList.add("navbar-fixed");
  } else {
    header.classList.remove("navbar-fixed");
  }
};

//Hamberger Menu
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("hamburger-active");
  navMenu.classList.toggle("hidden");
});

const selftcareBtn = document.getElementById("selftcareButton");
const selftcareMenu = document.getElementById("selftcareMenu");

const sadariBtn = document.getElementById("sadariButton");
const sadariMenu = document.getElementById("sadariMenu");

// Toggle Sadari submenu on click (all device, or limit to mobile if mau)
sadariBtn.onclick = (e) => {
  e.preventDefault();
  e.stopPropagation();
  sadariMenu.classList.toggle("invisible");
  sadariMenu.classList.toggle("opacity-0");
};

// Optional: close Sadari submenu when click outside
window.addEventListener("click", () => {
  sadariMenu.classList.add("invisible", "opacity-0");
});
sadariMenu.onclick = (e) => e.stopPropagation();

// Carousel
const carouselInner = document.getElementById("carousel-inner");
const totalSlides = carouselInner.children.length;
let currentSlide = 0;

document.getElementById("prev-news").onclick = function () {
  currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
  carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;
};
document.getElementById("next-news").onclick = function () {
  currentSlide = (currentSlide + 1) % totalSlides;
  carouselInner.style.transform = `translateX(-${currentSlide * 100}%)`;
};

// // Toggle submenu on click for mobile
//   document.addEventListener('DOMContentLoaded', function () {
//     const selftcareMenu = document.getElementById('selftcare-menu');
//     const dropdown = selftcareMenu.querySelector('ul');
//     selftcareMenu.querySelector('a').addEventListener('click', function (e) {
//       if (window.innerWidth < 1024) { // Tailwind's lg breakpoint
//         e.preventDefault();
//         dropdown.classList.toggle('invisible');
//         dropdown.classList.toggle('opacity-0');
//         dropdown.classList.toggle('opacity-100');
//         dropdown.classList.toggle('visible');
//       }
//     });
//   });
