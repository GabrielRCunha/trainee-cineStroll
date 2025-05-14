const image = document.getElementById('imgEditar');
const inputImg = document.getElementById('inputImgEditar');
inputImg.onchange = function(){
    image.src = URL.createObjectURL(inputImg.files[0]);
}

function modalEditar(){
    let modalEditar = document.getElementById('modalEdit');
    modalEditar.style.display = 'block';    
}