function showImage(choice) {
    const img = document.getElementById("selectedImage");
    img.src = '../images/' + choice + '.png';
    img.style.display = 'block';
}

const images = document.querySelectorAll("input[name=imageChoice]");

images.forEach(element => {
    element.addEventListener("click", ()=>{
        showImage(element.value)
    })
});