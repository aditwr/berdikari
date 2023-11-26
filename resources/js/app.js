import "./bootstrap";

import * as te from "tw-elements";

// import swiper bundle with all modules installed
import Swiper from "swiper/bundle";
// import styles bundle
import "swiper/css/bundle";
// make Swiper available globally
window.Swiper = Swiper;

// window.Swal = require("sweetalert2");
import Swal from "sweetalert2";
window.Swal = Swal;
// import { Datepicker, Input, initTE } from "tw-elements";
// initTE({ Datepicker, Input });

window.onload = function () {
    const swiper = new Swiper(".swiper", {
        spaceBetween: 24,
        slidesPerView: 1,
        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        speed: 300,
        loop: false,
        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: false,
        // },

        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 28,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 24,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 24,
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 24,
            },
            1536: {
                slidesPerView: 4,
                spaceBetween: 24,
            },
        },
    });
};
