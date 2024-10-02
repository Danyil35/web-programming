const elements = document.querySelectorAll("nav>ul>li>a")

elements.forEach(element => {
    element.addEventListener("mouseover", ()=>{
        element.style.color='olive';
    })
    element.addEventListener("mouseout", ()=>{
        element.style.color='lightgray';
    })
});