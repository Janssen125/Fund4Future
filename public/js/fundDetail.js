document.addEventListener("DOMContentLoaded", function () {
    if (typeof window.bootstrap === 'undefined') {
        console.error("Bootstrap is not loaded!");
        return;
    }

    document.querySelectorAll('.carousel').forEach(carousel => {
        let bsCarousel = new window.bootstrap.Carousel(carousel);

        carousel.querySelectorAll(".carousel-video").forEach(video => {
            video.addEventListener("play", function () {
                bsCarousel.pause();
            });

            video.addEventListener("pause", function () {
                bsCarousel.cycle();
            });

            video.addEventListener("ended", function () {
                bsCarousel.cycle();
            });
        });
    });
});