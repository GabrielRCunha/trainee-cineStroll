const image = document.getElementById('imgEditar');
const inputImg = document.getElementById('inputImgEditar');
inputImg.onchange = function(){
    image.src = URL.createObjectURL(inputImg.files[0]);
}

function modalEditar(){
    let modalEditar = document.getElementsByClassName('containerEditar');
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

/*function handleImageChange(event, postId, currentImage) {
    const input = event.target;
    const imgPreview = document.getElementById(`imgEditar${currentImage}`);
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            imgPreview.src = e.target.result;
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

// Adicionar event listeners para todos os inputs de imagem
document.addEventListener('DOMContentLoaded', function() {
        const inputImgEditar<?= $post->id ?> = document.getElementById('inputImgEditar<?= $post->id ?>');
        if (inputImgEditar<?= $post->id ?>) {
            inputImgEditar<?= $post->id ?>.addEventListener('change', function(event) {
                handleImageChange(event, <?= $post->id ?>, '<?= $post->image ?>');
            });
        }
});*/



