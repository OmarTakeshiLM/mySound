btnFileAudio.addEventListener('click', () => {
    inputFileAudio.click();
});

inputFileAudio.addEventListener('change', () => {
    console.log(inputFileAudio.value.split(/(\\|\/)/g).pop());
    inputTitulo.value = inputFileAudio.value.split(/(\\|\/)/g).pop().split('.')[0];
});

btnImage.addEventListener('click', () => {
    inputImage.click();
});

inputImage.addEventListener('change', () => {
    let reader = new FileReader();
    
    reader.onloadend = function () {
        // containerImage.style.backgroundImage = `url('${reader.result}');`;
        containerImage.src = reader.result;
        console.log(reader.result);
    }    

    if (inputImage.files[0]) {
        reader.readAsDataURL(inputImage.files[0]);
    } else {
        containerImage.src = "";
    }
});