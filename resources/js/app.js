import "./bootstrap";

// Mobile Menu
const menuBtn = document.getElementById("menu-btn");
const mobileMenu = document.getElementById("mobile-menu");
const closeMenu = document.getElementById("close-menu");

menuBtn.addEventListener("click", () => {
    mobileMenu.classList.remove("hidden");
});

closeMenu.addEventListener("click", () => {
    mobileMenu.classList.add("hidden");
});

// Swiper
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1, // Default 1 card untuk mobile
    spaceBetween: 20, // Jarak antar card
    loop: true, // Mengulang otomatis setelah akhir
    autoplay: {
        delay: 3000, // Geser otomatis setiap 3 detik
        disableOnInteraction: false, // Tetap berjalan meskipun ada interaksi
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        768: {
            slidesPerView: 2, // 2 card di tablet
        },
        1024: {
            slidesPerView: 3, // 3 card di desktop
        }
    },
});
