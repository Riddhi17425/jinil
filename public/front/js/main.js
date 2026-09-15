// header

window.addEventListener("scroll", function () {
    const header = document.querySelector(".sticky-header");

    if (window.scrollY > 50) {
        header.classList.add("sticky-active");
    } else {
        header.classList.remove("sticky-active");
    }
});

// ================= HAMBURGER MENU =================
document.querySelector(".menu-toggle").addEventListener("click", function () {
    this.classList.toggle("active");
});

// ================= MOBILE DROPDOWN MENU =================
function initHeaderMenus() {
    // Function to close all dropdowns except the specified one
    function closeAllDropdowns(except = null) {
        document.querySelectorAll(".has-dropdown.open").forEach((openDropdown) => {
            if (openDropdown !== except) {
                openDropdown.classList.remove("open");
            }
        });
    }

    // Handle dropdown clicks (Products, Services, Resources)
    document.querySelectorAll(".has-dropdown > a").forEach((toggleLink) => {
        toggleLink.addEventListener("click", function (event) {
            // Only handle on mobile screens
            if (window.innerWidth > 991) return;
            
            event.preventDefault();
            event.stopPropagation();

            const parent = this.closest(".has-dropdown");
            if (!parent) return;

            const isOpen = parent.classList.contains("open");
            
            if (!isOpen) {
                closeAllDropdowns(parent);
            }
            parent.classList.toggle("open");
        });
    });

    // Handle sub-dropdown clicks on mobile: link redirects to category page, arrow toggles accordion
    document.querySelectorAll(".has-submenu").forEach((submenuItem) => {
        const catLink = submenuItem.querySelector(".category-menu-link");
        const arrow = submenuItem.querySelector(".submenu-arrow");

        if (arrow) {
            arrow.addEventListener("click", function (event) {
                if (window.innerWidth > 991) return;

                event.preventDefault();
                event.stopPropagation();

                // Close other open sibling submenus
                const parentDropdown = submenuItem.closest(".dropdown-menu");
                if (parentDropdown) {
                    parentDropdown.querySelectorAll(".has-submenu.open").forEach((sibling) => {
                        if (sibling !== submenuItem) {
                            sibling.classList.remove("open");
                        }
                    });
                }

                submenuItem.classList.toggle("open");
            });
        }

        if (catLink) {
            catLink.addEventListener("click", function (event) {
                if (window.innerWidth > 991) return;

                // If the user clicked the rounded arrow, prevent default link navigation
                if (event.target.closest(".submenu-arrow")) {
                    event.preventDefault();
                    event.stopPropagation();
                    return;
                }

                // If user clicked the category title/link text, let it naturally redirect
            });
        }
    });

    // Close dropdowns when clicking outside
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".has-dropdown")) {
            closeAllDropdowns();
            document.querySelectorAll(".has-submenu.open").forEach((el) => {
                el.classList.remove("open");
            });
        }
    });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initHeaderMenus);
} else {
    initHeaderMenus();
}
// ================= SLICK SLIDERS =================
$(document).ready(function () {
    if ($(".desire_slider").length) {
        $(".desire_slider").slick({
            dots: true,
            arrows: false,
            centerMode: true,
            centerPadding: "10%",
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        centerPadding: "40px",
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: "0px",
                    },
                },
            ],
        });
    }

    if ($(".corporate_slider").length) {
        $(".corporate_slider").slick({
            slidesToShow: 3,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 2500,
        });
    }

    //   if ($(".hero_slider").length) {
    //     $(".hero_slider").slick({
    //         slidesToShow: 1,
    //         arrows: false,
    //         dots: false,
    //         autoplay: true,
    //         fade:true,
    //         autoplaySpeed: 3500,
    //     });
    // }

    if ($(".cor_kits_slider").length) {
        $(".cor_kits_slider").slick({
            slidesToShow: 1,
            arrows: false,
            dots: true,
            autoplay: true,
            autoplaySpeed: 2500,
        });
    }

    
});

 $(".hero_slider").slick({
            slidesToShow: 1,
            arrows: false,
            dots: false,
            autoplay: true,
            fade:true,
            autoplaySpeed: 3500,
        });

   $(".industry_detals_grid").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: $(".prev_arrow"),
            nextArrow: $(".next_arrow"),
            autoplay: false,
            dots: false,
            infinite: true,
            speed: 600,

            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

// set CSS var to header height so fixed header does not overlap content
(function () {
    function updateHeaderHeight() {
        const header = document.querySelector("header");
        if (!header) return;
        const h = header.offsetHeight;
        document.documentElement.style.setProperty("--header-height", h + "px");
    }

    // basic debounce
    function debounce(fn, wait) {
        let t;
        return function () {
            clearTimeout(t);
            t = setTimeout(fn, wait);
        };
    }

    updateHeaderHeight();
    window.addEventListener("resize", debounce(updateHeaderHeight, 150));
})();

// ================= COUNTERS (animate when visible) =================
(function () {
    const counterSection = document.querySelector(".counter");
    if (!counterSection) return;

    const counters = counterSection.querySelectorAll(".count");
    let started = false;

    function animateCounter(el, target, duration = 2000) {
        const startTime = performance.now();

        function step(now) {
            const progress = Math.min((now - startTime) / duration, 1);
            el.textContent = Math.floor(progress * target);
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = target;
        }

        requestAnimationFrame(step);
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting && !started) {
                    started = true;
                    counters.forEach((el) => {
                        const t = parseInt(el.getAttribute("data-target"), 10);
                        if (Number.isFinite(t)) animateCounter(el, t, 2000);
                    });
                    obs.unobserve(counterSection);
                }
            });
        },
        { threshold: 0.3 },
    );

    observer.observe(counterSection);
})();
