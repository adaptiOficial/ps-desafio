function openPage(link) {
    window.open(link, "_blank").focus();
}
const btnsVisualizar = document.querySelectorAll(".btn-visualizar");

btnsVisualizar.forEach((btnVisualizar) => {
    btnVisualizar.addEventListener("click", () => {
        const infoProduto = btnVisualizar.closest(".info-produto");
        const descricaoProduto = infoProduto.querySelector(".descricao");

        if (descricaoProduto.style.display === "none") {
            descricaoProduto.style.display = "block";
            btnVisualizar.innerText = "OCULTAR DESCRIÇÃO";
        } else {
            descricaoProduto.style.display = "none";
            btnVisualizar.innerText = "VISUALIZAR DESCRIÇÃO";
        }
    });
});

const switchBtn = document.querySelector(".switch");
const contentTotal = document.getElementById("content-total");
const originalColor = "rgb(229, 229, 247)";

switchBtn.addEventListener("click", () => {
    contentTotal.style.backgroundColor =
        contentTotal.style.backgroundColor === originalColor
            ? "#212121"
            : originalColor;
});
