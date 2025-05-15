document.addEventListener('DOMContentLoaded', () => {
  const modalExcluir = document.getElementById('modalExcluir');
  const fecharExcluir = document.getElementById('fecharExcluir');
  const confirmarExclusao = document.getElementById('confirmarExclusao');

  window.abrirModalExcluir = function (postId) {
    modalExcluir.style.display = 'block';
    confirmarExclusao.dataset.id = postId;
  };

  fecharExcluir.onclick = () => {
    modalExcluir.style.display = 'none';
  };

  confirmarExclusao.onclick = () => {
    const id = confirmarExclusao.dataset.id;

    // Simulação de exclusão:
    const sucesso = true;

    if (sucesso) {
      alert(`Post ID ${id} excluído com sucesso.`);
      modalExcluir.style.display = 'none';
    } else {
      alert('Erro ao excluir o post.');
    }
  };

});