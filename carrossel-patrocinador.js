const controles = document.querySelectorAll('.controle');
let foco = 0;
const catalogoPatrocinador = document.querySelectorAll('.catalogoPatrocinador');
const maxCatalago = catalogoPatrocinador.length;

controles.forEach(controle => {
    controle.addEventListener('click', () => {
        const eEsquerda = controle.classList.contains('esquerda');

        if(eEsquerda) {
            foco -= 1;
        } else {
            foco += 1;
        }

        if(foco >= maxCatalago) {
            foco = 0;
        }

        if(foco < 0 ) {
            foco = maxCatalago - 1;
        }

        catalogoPatrocinador.forEach(catalogoPatrocinador => catalogoPatrocinador.classList.remove('foco'));

        catalogoPatrocinador[foco].scrollIntoView({
            inline: "center",
            behavior: "smooth",
            block: "nearest"

        });

        catalogoPatrocinador[foco].classList.add('foco');

        console.log('controle cliked', eEsquerda, foco);
    })
});