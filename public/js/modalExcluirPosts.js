// Controle do Modal de Exclusão
function modalExcluirP(postId) {
  document.getElementById("modalExcluir").style.display = "block";
  document.getElementById("excluir").dataset.id = postId;
}

function fecharModalExcluir() {
  document.getElementById("modalExcluir").style.display = "none";
}

function confirmarExclusao() {
  const id = document.getElementById("excluir").dataset.id;

  // Simulação de exclusão
  alert(`Publicação ID ${id} excluída com sucesso.`);
  fecharModalExcluir();
}


document.querySelectorAll(".apagar").forEach(botao => {
  botao.addEventListener("click", event => {
    const postId = event.target.closest("tr").querySelector(".id").textContent;
    modalExcluirP(postId);
  });
});
