document.addEventListener("DOMContentLoaded", function () {
    const carrossel = document.querySelector(".carrossel");
    let index = 0;
    
    function rolarCarrossel() {
        index++;
        if (index >= carrossel.children.length) {
            index = 0;
        }
        carrossel.style.transform = `translateX(-${index * 100}%)`;
    }
    
    setInterval(rolarCarrossel, 3000); // Troca a imagem a cada 3 segundos
});
