//burger
const burger = document.getElementById('nav-burger');
let burgerState = 0;

burger.addEventListener('click',()=>{
    if(burgerState === 0){
        burgerState=1;
        burger.classList.remove('closed')
        burger.classList.add('opened')
    }else{
        burgerState=0;
        burger.classList.add('closed')
        burger.classList.remove('opened')
    }
});
