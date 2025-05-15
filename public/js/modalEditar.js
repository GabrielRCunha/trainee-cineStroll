const image = document.getElementById('imgEditar');
const inputImg = document.getElementById('inputImgEditar');
inputImg.onchange = function(){
    image.src = URL.createObjectURL(inputImg.files[0]);
}

function modalEditar(){
    let modalEditar = document.getElementById('modalEdit');
    modalEditar.style.display = 'block';     
}

document.addEventListener('DOMContentLoaded', () => {
  const inputImg = document.getElementById('inputImgEditar');
  const imgPreview = document.getElementById('imgEditar');
  const modalEdit = document.getElementById('modalEdit');
  const fecharBtn = document.getElementById('fecharEditar');
  const salvarBtn = document.getElementById('salvarEdicao');

  inputImg.onchange = () => {
    imgPreview.src = URL.createObjectURL(inputImg.files[0]);
  };

  window.abrirModalEditar = function (post) {
    modalEdit.style.display = 'block';
    document.getElementById('tituloEditar').value = post.titulo;
    document.getElementById('descricaoEditar').value = post.descricao;
    document.getElementById('autorEditar').value = post.autor;
    document.getElementById('dataEditar').value = post.data;
    imgPreview.src = post.imagem || '/public/assets/Logo_sem_fundo.png';
  };

  fecharBtn.onclick = () => {
    modalEdit.style.display = 'none';
  };

  salvarBtn.onclick = () => {
  
    const sucesso = true;


  };
});
