import "./bootstrap";

import * as te from "tw-elements";

import Swiper from "swiper/bundle";

import { Datepicker, Input, initTE } from "tw-elements";
initTE({ Datepicker, Input });

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
                slidesPerView: 3,
                spaceBetween: 12,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 12,
            },
            1280: {
                slidesPerView: 4,
                spaceBetween: 24,
            },
            1536: {
                slidesPerView: 5,
                spaceBetween: 24,
            },
        },
    });
};
