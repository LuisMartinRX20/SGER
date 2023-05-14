let listElemnts = document.querySelectorAll('.list_button--click')

listElemnts.forEach(listElement => {
    listElement.addEventListener('click',()=>{
        
        listElement.classList.toggle('arrow');

        let height =  0;
        let menu = listElement.nextElementSibling;
        if(menu.clientHeight == "0" ){
            height=menu.scrollHeight;
        }
        console.log(menu.scrollHeight);
        menu.style.height = `${height}px`;
    })
})