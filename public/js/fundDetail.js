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

    const fundNowButton = document.getElementById('fundNowButton');
    const fundAmountInputs = document.querySelectorAll('input[name="fundAmount"]');

    fundAmountInputs.forEach(input => {
        input.addEventListener('change', function () {
            if (this.checked) {
                fundNowButton.disabled = false;
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('fundModal');
        modal.addEventListener('show.bs.modal', function () {
            modal.style.zIndex = '1055'; // Ensure modal is above the backdrop
        });
    });
});