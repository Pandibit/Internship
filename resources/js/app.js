import "./bootstrap";
import $ from 'jquery';
import "flowbite";
import Swiper from "swiper";
import {Navigation, Pagination, Autoplay} from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import {DataTable} from "simple-datatables";

const productsSwiper = new Swiper(".productsSwiper", {
    modules: [Navigation, Pagination, Autoplay],

    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next.products-swiper",
        prevEl: ".swiper-button-prev.products-swiper",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        300: {
            slidesPerView: 1
        },
        440: {
            slidesPerView: 2,
            spaceBetween: 5
        },
        // when window width is >= 480px
        670: {
            slidesPerView: 3,
            spaceBetween: 5
        },
        // when window width is >= 640px
        1024: {
            slidesPerView: 4,
            spaceBetween: 5
        }
    }
});
const categorySwiper = new Swiper(".categorySwiper", {
    modules: [Navigation, Pagination, Autoplay],
    slidesPerView: 4,
    navigation: {
        nextEl: ".swiper-button-next.category-swiper",
        prevEl: ".swiper-button-prev.category-swiper",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: true,
    loop: true,
    breakpoints: {
        300: {
            slidesPerView: 1
        },
        420: {
            slidesPerView: 2,
            spaceBetween: 5
        },
        // when window width is >= 480px
        540: {
            slidesPerView: 3,
            spaceBetween: 5
        },
        // when window width is >= 640px
        1024: {
            slidesPerView: 4,
            spaceBetween: 5
        }
    }
});
const panelSwiper = new Swiper(".panelSwiper", {
    modules: [Autoplay, Navigation, Pagination],
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    speed: 700,
    loop: true,
    pagination: {
        el: ".swiper-pagination.first-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next.first-next",
        prevEl: ".swiper-button-prev.first-prev",
    },
    grabCursor: true,
});









