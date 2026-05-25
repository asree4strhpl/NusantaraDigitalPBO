document.addEventListener("DOMContentLoaded", function () {
    
    // 1. Loading Animation Fade Out
    const loader = document.getElementById("loader");
    if (loader) {
        window.addEventListener("load", function () {
            loader.style.opacity = "0";
            setTimeout(() => {
                loader.style.display = "none";
            }, 600); // Sinkron dengan durasi transisi CSS
        });
    }

    // 2. Smooth Sticky Navbar Transparent to Solid Blur
    const navbar = document.querySelector(".premium-navbar");
    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });

    // 3. Horizontal Scroll Track Dragging (Opsional untuk Desktop)
    const track = document.querySelector('.horizontal-scroll-container');
    let isDown = false;
    let startX;
    let scrollLeft;

    if (track) {
        track.addEventListener('mousedown', (e) => {
            isDown = true;
            track.style.cursor = 'grabbing';
            startX = e.pageX - track.offsetLeft;
            scrollLeft = track.scrollLeft;
        });
        track.addEventListener('mouseleave', () => {
            isDown = false;
            track.style.cursor = 'grab';
        });
        track.addEventListener('mouseup', () => {
            isDown = false;
            track.style.cursor = 'grab';
        });
        track.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - track.offsetLeft;
            const walk = (x - startX) * 2; // Kecepatan scroll geser
            track.scrollLeft = scrollLeft - walk;
        });
    }
});