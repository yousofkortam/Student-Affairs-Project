import "./bootstrap";
import "../sass/app.scss";
import.meta.glob(["../imgs/**"]);

import * as bootstrap from "bootstrap";

window.addEventListener("load", function () {
    document
        .querySelectorAll(".sidebar-dropdown > a")
        .forEach(function (element) {
            element.addEventListener("click", function () {
                const sidebarSubmenu = this.nextElementSibling;

                document
                    .querySelectorAll(".sidebar-submenu")
                    .forEach(function (submenu) {
                        if (submenu !== sidebarSubmenu) {
                            submenu.style.display = "none";
                        }
                    });

                if (this.parentNode.classList.contains("active")) {
                    document
                        .querySelectorAll(".sidebar-submenu")
                        .forEach(function (submenu) {
                            if (submenu === sidebarSubmenu) {
                                submenu.style.display = "none";
                            }
                        });
                    document
                        .querySelectorAll(".sidebar-dropdown")
                        .forEach(function (dropdown) {
                            dropdown.classList.remove("active");
                        });
                    this.parentNode.classList.remove("active");
                } else {
                    document
                        .querySelectorAll(".sidebar-dropdown")
                        .forEach(function (dropdown) {
                            dropdown.classList.remove("active");
                        });
                    sidebarSubmenu.style.display = "block";
                    this.parentNode.classList.add("active");
                }
            });
        });

    document
        .querySelector("#close-sidebar")
        .addEventListener("click", function () {
            document.querySelector(".page-wrapper").classList.remove("toggled");
        });

    document
        .querySelector("#show-sidebar")
        .addEventListener("click", function () {
            document.querySelector(".page-wrapper").classList.add("toggled");
        });
});
