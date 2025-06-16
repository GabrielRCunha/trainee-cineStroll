

function abrirModalExcluir(idModal) {
  document.getElementById(idModal).style.display = 'block';
}

function fecharModalExcluir(idModal) {
  document.getElementById(idModal).style.display = "none";
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

document.querySelector('.overlay').addEventListener('click', function () {
  const modais = document.querySelector('.tude');
  modais.classList.remove('ativo');
  this.classList.remove('ativo');
});
