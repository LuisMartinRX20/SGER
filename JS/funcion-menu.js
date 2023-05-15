let listElemnts = document.querySelectorAll('.list_button--click-1')

listElemnts.forEach(listElement => {
    listElement.addEventListener('click',()=>{
        
        var a = listElement.classList.toggle('arrow');

        if(a == true){
            let mostrar = document.getElementById("m1");
            mostrar.style.display = "block";
        }else{
            var mostrar = document.getElementById("m1");
            mostrar.style.display = "none";
        }
    })
})

let listElemnts1 = document.querySelectorAll('.list_button--click-2')

listElemnts1.forEach(listElement => {
    listElement.addEventListener('click',()=>{
        
        var a = listElement.classList.toggle('arrow');

        if(a == true){
            let mostrar = document.getElementById("m2");
            mostrar.style.display = "block";
        }else{
            var mostrar = document.getElementById("m2");
            mostrar.style.display = "none";
        }
    })
})


let listElemnts3 = document.querySelectorAll('.list_button--click-3')

listElemnts3.forEach(listElement => {
    listElement.addEventListener('click',()=>{
        
        var a = listElement.classList.toggle('arrow');

        if(a == true){
            let mostrar = document.getElementById("m3");
            mostrar.style.display = "block";
        }else{
            var mostrar = document.getElementById("m3");
            mostrar.style.display = "none";
        }
    })
})

