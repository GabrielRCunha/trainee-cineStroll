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
});

  inputImg.onchange = () => {
    imgPreview.src = URL.createObjectURL(inputImg.files[0]);
  };

function abrirModal(idModal){
  document.getElementById(idModal).style.display = "block";
}

function fecharModalEdit(idModal){
  document.getElementById(idModal).style.display = "none";
}



