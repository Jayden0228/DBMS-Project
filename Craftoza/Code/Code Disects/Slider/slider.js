function plusSlides(n){
    showSlide(i+=n)
}
function currentSlide(n){
    showSlide(i=n)
}
function showSlide(n){
    slide = document.getElementsByClassName("image")
    dot = document.getElementsByClassName("dot")
    if(n>slide.length){
        i=1;
    }
    if(n<1){
        i=slide.length;
    }
    for (j = 0; j < slide.length; j++) {
        slide[j].style.display = "none";
    }
    for (j = 0; j < dot.length; j++) {
        dot[j].className = dot[j].className.replace(" active","");
    }
    slide[i-1].style.display = "block";
    dot[i-1].className += " active";
}

var i=1;
showSlide(i)
