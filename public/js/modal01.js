const tela = document.querySelector('.fundoModal');

function abrirModal(idModal){
    document.getElementById(idModal).style.display = 'flex';
    tela.style.display = 'block';
}

function fecharModal(idModal, event, inputNome, inputEmail, inputSenha){
    event.preventDefault();
    document.getElementById(idModal).style.display = 'none';
    tela.style.display = 'none';
    document.getElementById(inputEmail).value = '';
    document.getElementById(inputNome).value = '';
    document.getElementById(inputSenha).value = '';
}

function fecharModalAberto(classModais, event){
    const modais = document.querySelectorAll(classModais);
    modais.forEach(element => {
        if(element.style.display === 'flex'){
            fecharModal(element.id, event)
        }
    });
}

function mostrarSenha(idIcone, idInput){
    const icone = document.getElementById(idIcone);
    const input = document.getElementById(idInput);
    
    if(input.type === 'password'){
        input.setAttribute('type', 'text');
        icone.classList.replace('bi-eye', 'bi-eye-slash');
    }
    else{
        input.setAttribute('type', 'password');
        icone.classList.replace('bi-eye-slash', 'bi-eye');
    }
}

const imagem = document.getElementById('imgPerfil');
const imgInput = document.getElementById('imgInput');
const imgBotao = document.querySelector('.imgBtn');
const imgBotaoDesfazer = document.getElementById('botaoDesfazerFoto')

imgInput.onchange = function(){
    imagem.src = URL.createObjectURL(imgInput.files[0]);
    imagem.style.display = 'block';
    imgBotao.style.display = 'none';
    imgBotaoDesfazer.style.display = 'block'
}

function desfazerFoto(event){

    event.preventDefault();
    imgInput.value = '';
    imagem.src = '';
    imagem.style.display = 'none';
    imgBotao.style.display = 'block';
    imgBotaoDesfazer.style.display = 'none';
}
 function mostrarImagemSelecionada(event, idImagem) {
    const input = event.target;
    const img = document.getElementById(idImagem);

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            img.src = e.target.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function checarCampos(idForm, idAvisoNome, idAvisoEmail, idAvisoSenha, idAvisoImg,
                     idNomeInput, idEmailInput, idSenhaInput, idImgInput, classAvisos, idModal, event){
    event.preventDefault();

    const nome = document.getElementById(idNomeInput).value;
    const email = document.getElementById(idEmailInput).value;
    const senha = document.getElementById(idSenhaInput).value;
    const img = document.getElementById(idImgInput).files[0];
    const avisos = document.querySelectorAll(classAvisos);

    let valid = true;

    if (!nome) {
        const erroNome = document.getElementById(idAvisoNome);
        erroNome.style.display = 'block';
        valid = false;
    }

    if (!email) {
        const erroEmail = document.getElementById(idAvisoEmail);
        erroEmail.style.display = 'block';
        valid = false;
    }

    if (!senha) {
        const erroSenha = document.getElementById(idAvisoSenha);
        erroSenha.style.display = 'block';
        valid = false;
    }

    if(!img){
        const erroImg = document.getElementById(idAvisoImg);
        erroImg.style.display = 'block';
        valid = false;
    }

    if (!valid){
        setTimeout(() => {
        avisos.forEach(aviso => {
            aviso.style.display = 'none';
        })
    }, 2500);
    
    return;

    }

    const formulario = document.getElementById(idForm);
    formulario.submit();
    formulario.reset();
    desfazerFoto();

    fecharModal(idModal);

}