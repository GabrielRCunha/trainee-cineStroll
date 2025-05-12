const image = document.getElementById('imgEditar');
const inputImg = document.getElementById('inputImgEditar');
inputImg.onchange = function(){
    image.src = URL.createObjectURL(inputImg.files[0]);
}