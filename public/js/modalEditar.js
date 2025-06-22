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

function erroInputVazioEditar(
    event,
    imgId, imgErro,
    tituloId, tituloErro,
    anoId, anoErro,
    diretorId, diretorErro,
    notaId, notaErro,
    conteudoId, conteudoErro,
    formId
) {
    event.preventDefault();

    let erro = false;

    // A validação da imagem na edição é um pouco diferente.
    // Se o usuário não selecionar uma nova imagem, a imagem atual será mantida,
    // então a validação aqui é mais sobre o input de file em si.
    const imagemInput = document.getElementById(imgId);
    if (imagemInput && imagemInput.files.length === 0 && !document.getElementById(formId).querySelector('input[name="fotoAtual"]').value) {
        mostrarErro(imgErro, "Selecione uma imagem.");
        erro = true;
    }

    const titulo = document.getElementById(tituloId).value.trim();
    if (titulo === "") {
        mostrarErro(tituloErro, "Preencha o título.");
        erro = true;
    }

    const ano = document.getElementById(anoId).value.trim();
    if (ano === "") {
        mostrarErro(anoErro, "Preencha o ano.");
        erro = true;
    } else if (parseInt(ano) < 1800 || parseInt(ano) > 2025) {
        mostrarErro(anoErro, "Ano deve ser entre 1800 e 2025.");
        erro = true;
    }

    const diretor = document.getElementById(diretorId).value.trim();
    if (diretor === "") {
        mostrarErro(diretorErro, "Preencha o diretor.");
        erro = true;
    }

    const nota = document.getElementById(notaId).value.trim();
    if (nota === "") {
        mostrarErro(notaErro, "Preencha a nota.");
        erro = true;
    } else if (parseFloat(nota) < 0 || parseFloat(nota) > 10) {
        mostrarErro(notaErro, "Nota deve ser entre 0 e 10.");
        erro = true;
    }

    const conteudo = document.getElementById(conteudoId).value.trim();
    if (conteudo === "") {
        mostrarErro(conteudoErro, "Preencha o conteúdo.");
        erro = true;
    }

    if (!erro) {
        document.getElementById(formId).submit();
    }
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



