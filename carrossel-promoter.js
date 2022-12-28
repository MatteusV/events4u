const contro = document.querySelectorAll('.control_promoter');
let focoPromoter = 0;
const catalogoPromoter = document.querySelectorAll('.catalogo_promoter');
const maxCatalagoPromoter = catalogoPromoter.length;

contro.forEach(control_promoter => {
    control_promoter.addEventListener('click', () => {
        const eLeft = control_promoter.classList.contains('left');

        if(eLeft) {
            focoPromoter -= 1;
        } else {
            focoPromoter += 1;
        }

        if(focoPromoter >= maxCatalagoPromoter) {
            focoPromoter = 0;
        }

        if(focoPromoter < 0 ) {
            focoPromoter = maxCatalagoPromoter - 1;
        }

        catalogoPromoter.forEach(catalogoPromoter => catalogoPromoter.classList.remove('focoPromoter'));

        catalogoPromoter[focoPromoter].scrollIntoView({
            inline: "center",
            behavior: "smooth",
            block: "nearest"

        });

        catalogoPromoter[focoPromoter].classList.add('focoPromoter');

        console.log('controle cliked', eLeft, focoPromoter);
    })
});