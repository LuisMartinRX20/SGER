const 
$botonpadre=document.querySelector('.padre'),
$botonpersonal=document.querySelector('.personal'),
$botonficha=document.querySelector('.ficha');

      
      console.log("Hello world!");
var x=1;
document.addEventListener('click', e=>{
    if(e.target=== $botonpersonal){
        if(x=1){
            x=2;
            document.getElementById("usuario1").classList.add("left");
            document.getElementById("usuario2").classList.add("active");
            document.getElementById("bpadre").classList.remove("active");
            document.getElementById("bpersonal").classList.add("active");
        }
        if(x=3){
            x=2;
            document.getElementById("usuario2").classList.remove("left");
            document.getElementById("usuario2").classList.add("active");
            document.getElementById("usuario3").classList.remove("active");
            document.getElementById("bficha").classList.remove("active");
            document.getElementById("bpersonal").classList.add("active");
        }
              
    }
    if(e.target=== $botonficha){
        if(x=1){
            document.getElementById("usuario1").classList.add("left");
            document.getElementById("usuario2").classList.add("left");
            document.getElementById("usuario3").classList.add("active");  
            document.getElementById("bpadre").classList.remove("active");
            document.getElementById("bficha").classList.add("active");
        }
        if(x=2){
            x=3;
        document.getElementById("usuario2").classList.remove("active");  
        document.getElementById("usuario2").classList.add("left");
        document.getElementById("usuario3").classList.add("active"); 
        document.getElementById("bpersonal").classList.remove("active");
        document.getElementById("bficha").classList.add("active");
 
        }
        
    }

    if(e.target=== $botonpadre){
        if(x=2){
            x=1;
            document.getElementById("usuario2").classList.remove("active");
            document.getElementById("usuario1").classList.remove("left");
            document.getElementById("bpersonal").classList.remove("active");
            document.getElementById("bpadre").classList.add("active");

        }
        if(x=3)
        {
            x=1;
            document.getElementById("usuario1").classList.remove("left");
            document.getElementById("usuario2").classList.remove("left");
            document.getElementById("usuario3").classList.remove("active");
            document.getElementById("bficha").classList.remove("active");
            document.getElementById("bpadre").classList.add("active");

        }
       
        
    }
    
    
    
});