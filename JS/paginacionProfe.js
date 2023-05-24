const 
$botonS1=document.querySelector('.botonS1'),
$botonS2=document.querySelector('.botonS2'),
$botonS3=document.querySelector('.botonS3'),
$botonA1=document.querySelector('.botonA1'),
$botonA2=document.querySelector('.botonA2'),
$botonA3=document.querySelector('.botonA3');



var x=1;
document.addEventListener('click', e=>{
    if(e.target=== $botonS1){       
            document.getElementById("contenido1").classList.remove("active");
            document.getElementById("contenido1").classList.add("left");
            document.getElementById("contenido2").classList.add("active");
            document.getElementById("opcion1").classList.remove("active");
            document.getElementById("opcion2").classList.add("active");
            
    }
    if(e.target=== $botonS2){
        console.log("entre");
        document.getElementById("contenido2").classList.remove("active");
        document.getElementById("contenido2").classList.add("left");
        document.getElementById("contenido3").classList.add("active");
        document.getElementById("opcion2").classList.remove("active");
        document.getElementById("opcion3").classList.add("active");
    }
    if(e.target=== $botonS3){
        console.log("entre");
        document.getElementById("contenido3").classList.remove("active");
        document.getElementById("contenido3").classList.add("left");
        document.getElementById("contenido4").classList.add("active");
        document.getElementById("opcion3").classList.remove("active");
        document.getElementById("opcion4").classList.add("active");
    }
    if(e.target===$botonA1){
        document.getElementById("contenido2").classList.remove("active");
        document.getElementById("contenido1").classList.remove("left");
        document.getElementById("contenido1").classList.add("active");
        document.getElementById("opcion2").classList.remove("active");
        document.getElementById("opcion1").classList.add("active");
    }
    if(e.target===$botonA2){
        document.getElementById("contenido3").classList.remove("active");
        document.getElementById("contenido2").classList.remove("left");
        document.getElementById("contenido2").classList.add("active");
        document.getElementById("opcion3").classList.remove("active");
        document.getElementById("opcion2").classList.add("active");
    }
    if(e.target===$botonA3){
        document.getElementById("contenido4").classList.remove("active");
        document.getElementById("contenido3").classList.remove("left");
        document.getElementById("contenido3").classList.add("active");
        document.getElementById("opcion4").classList.remove("active");
        document.getElementById("opcion3").classList.add("active");
    }
});