const radios = document.querySelectorAll('input[type="radio"]');
const projetos = document.querySelectorAll('.projeto-img');

// Resetando a borda ao clicar em uma nova imagem
radios.forEach(radio => {
    radio.addEventListener('change', () => {
        projetos.forEach(img => {
            img.style.borderColor = 'transparent'; // Reseta borda das imagens
        });
        radio.nextElementSibling.style.borderColor = '#28a745'; // Define borda verde para a selecionada
    });
});
