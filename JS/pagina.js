const $boton2=document.querySelector('.personal'),
      $funcion1=document.querySelector('.usuario'),
      $funcion2=document.querySelector('.usuario1');
      console.log("Hello world!");
var x=0;
document.addEventListener('click', e=>{
    if(e.target=== $boton2 && x!=2){
        x=2;
        console.log("entre");
        $funcion1.classList.toggle('left');
        console.log("Hello world!");
        $funcion2.classList.toggle('active');
       
    }
});