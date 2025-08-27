( (window) => {
    function throttle(fn, delay) {
        let t = 0;
        return function (...args) {
            let now = Date.now();
            if (now - t >= delay) {
                fn.apply(this, args);
                t = now;
            }
        };
    }

    
    const updateParallax = () => {
        const parallaxImages = document.querySelectorAll(".logovo-parallax");
        const maxParallaxIntensity = 64;

        parallaxImages.forEach(figure => {
            const rect = figure.getBoundingClientRect();
            // Only apply effect when figure is in view
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                const img = figure.querySelector("img");
                if (!img) return;

                // Image's actual height (may not be fully visible)
                const imageHeight = img.naturalHeight / img.naturalWidth * img.offsetWidth;

                // Compute max offset the image can move without revealing gaps
                const maxTranslate = Math.min(Math.max(0, imageHeight - rect.height), maxParallaxIntensity);

                // Normalize scroll ratio (0 when at top of viewport, 1 when at bottom)
                const scrollRatio = rect.top / window.innerHeight;
                const scrollAmount = scrollRatio * -maxTranslate;

                figure.querySelector('img').style.transform = `translate3d(0, ${scrollAmount}px, 0)`;
            }
        });
    };

    const onScroll = throttle(updateParallax, 1_000 / 60);

    window.addEventListener("scroll", onScroll);
    window.addEventListener("resize", onScroll);
    document.querySelectorAll(".logovo-parallax").forEach(img => img.addEventListener("load", onScroll));

    updateParallax();
})(window);