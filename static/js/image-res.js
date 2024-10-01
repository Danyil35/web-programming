const imgs = document.querySelectorAll("#image");
imgs.forEach(element => {
    const initWidth = element.clientWidth;
    element.addEventListener("mouseover", ()=>{
        element.style.width=initWidth+ 200 + 'px';
    })
    element.addEventListener("mouseout", ()=>{
        element.style.width=initWidth + "px";
    })
});