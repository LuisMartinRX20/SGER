const 
$botonpadre=document.querySelector('.padre'),
$botonpersonal=document.querySelector('.personal'),
$botonficha=document.querySelector('.ficha'),
$iniciopadre=document.querySelector('.usuario1'),
$iniciopersonal=document.querySelector('.usuario2'),
$inicioficha=document.querySelector('.usuario3'),
$funcionbotonpersonal=document.querySelector('.personal'),
$funcionbotonpadre=document.querySelector('.padre'),
$funcionbotonficha=document.querySelector('.ficha');

      
      console.log("Hello world!");
var x=0;
document.addEventListener('click', e=>{
    if(e.target=== $botonpersonal && x!=2){
        x=2;
        console.log("entre");
        $iniciopersonal.classList.toggle('active');
        $iniciopadre.classList.toggle('left');        
       
        console.log("Hello world!");
        
       
    }
    if(e.target=== $botonficha && x!=3){
        x=3;
        $iniciopersonal.classList.toggle('left');
        $inicioficha.classList.toggle('active');
    }
    if(e.target=== $botonpersonal && x!=1){
        
    }
    
    
    
});