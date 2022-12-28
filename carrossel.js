function atualizado() {
    alert('Evento atualizado')
}

// ATRAÇÕES
const controls = document.querySelectorAll(".control");
let currentItem = 0;
const item = document.querySelectorAll(".item");
const maxItem = item.length;

controls.forEach((control) => {
control.addEventListener("click", (e) => {
    isLeft = e.target.classList.contains("arrow-left");
    console.log("Control clicked", isLeft)

    if (isLeft) {
    currentItem -= 1;
    } else {
    currentItem += 1;
    }

    if (currentItem >= maxItem) {
    currentItem = 0;
    }

    if (currentItem < 0) {
    currentItem = maxItem - 1;
    }

    item.forEach((item) => item.classList.remove("current-item"));

    item[currentItem].scrollIntoView({
    behavior: "smooth",
    inline: "center",
    block: "nearest"
    });

    item[currentItem].classList.add("current-item");
});
});

