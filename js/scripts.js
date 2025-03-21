let index = 0;
        function showNextImage() {
            const images = document.querySelectorAll('.carousel img');
            images.forEach((img, i) => {
                img.style.transform = `translateX(-${index * 100}%)`;
            });
            index = (index + 1) % images.length;
        }
        setInterval(showNextImage, 3000);