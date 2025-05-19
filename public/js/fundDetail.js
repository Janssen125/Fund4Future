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
    const customAmountInput = document.getElementById('customAmount');

    fundAmountInputs.forEach(input => {
        input.addEventListener('change', function () {
            if (this.checked) {
                fundNowButton.disabled = false;
            }
        });
    });
    if(customAmountInput) {

        customAmountInput.addEventListener('input', function () {
            if (this.value && parseInt(this.value) >= 10000) {
                fundNowButton.disabled = false;
                fundAmountInputs.forEach(input => input.checked = false);
        } else {
            fundNowButton.disabled = true;
        }
    });
}

    const shareButton = document.getElementById('shareButton');
    const linkToCopy = shareButton.getAttribute('data-link');

    shareButton.addEventListener('click', function () {

        navigator.clipboard.writeText(linkToCopy).then(() => {
            shareButton.textContent = "Copied to clipboard!";

            setTimeout(() => {
                shareButton.textContent = "Share";
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
        });
    });
});
