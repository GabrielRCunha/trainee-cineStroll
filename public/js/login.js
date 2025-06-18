function mostrarSenha(idIcone, idText){
    const icone = document.getElementById(idIcone)
    const text = document.getElementById(idText)
    if(text.type === 'password'){
        text.setAttribute('type', 'text')
        icone.classList.replace('bi-eye', 'bi-eye-slash')
    }
    else{
        text.setAttribute('type', 'password')
        icone.classList.replace('bi-eye-slash', 'bi-eye')
    }
}

window.addEventListener("DOMContentLoaded", () => {
        const mensagem = document.getElementById("msgErroLogin");

        if (mensagem && mensagem.innerText !== "") {
            setTimeout(() => {
                    mensagem.style.display = "none";
                }, 3000);
        }
    });