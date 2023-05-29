/* TODO: inserite il codice JavaScript necessario a completare il MHW! */

let Mappa={};
let flag1=false;
let flag2=false;
let flag3=false;

const boxes = document.querySelectorAll(".choice-grid div");
for(let box of boxes){
    if (box.dataset.questionId === 'one'){
    box.addEventListener('click', onClick);
    }
    if (box.dataset.questionId === 'two'){
        box.addEventListener('click', onClick2);
    }
    if (box.dataset.questionId === 'three'){
        box.addEventListener('click', onClick3);
    }
}




function onClick(event){
    const images = event.currentTarget.querySelector(".checkbox");
    const blocco = event.currentTarget;
    const container = document.querySelectorAll('[data-question-id="one"]');
    for (let item of container){
        item.classList.add("notchoise");
        item.classList.remove("choise");
        item.querySelector(".checkbox").src = './images/unchecked.png';
    }
    images.src = './images/checked.png';
    blocco.classList.add("choise");
    blocco.classList.remove("notchoise");
    flag1=true;
    Mappa[blocco.dataset.questionId]=blocco.dataset.choiceId;
    if (Controllastato()){
        const container = document.querySelectorAll(".choice-grid div");
        for(let item of container){
    
            item.removeEventListener('click', onClick);
            item.removeEventListener('click', onClick2);
            item.removeEventListener('click', onClick3);
        }
        risultato();
    }
   

}
function onClick2(event){
    const images = event.currentTarget.querySelector(".checkbox");
    const blocco = event.currentTarget;
    const container = document.querySelectorAll('[data-question-id="two"]');
    for (let item of container){
        item.classList.add("notchoise");
        item.classList.remove("choise");
        item.querySelector(".checkbox").src = './images/unchecked.png';
    }
    images.src = './images/checked.png';
    blocco.classList.add("choise");
    blocco.classList.remove("notchoise");
    flag2=true;
    Mappa[blocco.dataset.questionId]=blocco.dataset.choiceId;
    if (Controllastato()){
        const container = document.querySelectorAll(".choice-grid div");
        for(let item of container){
    
            item.removeEventListener('click', onClick);
            item.removeEventListener('click', onClick2);
            item.removeEventListener('click', onClick3);

        }
        risultato();
    }
   
}
function onClick3(event){
    const images = event.currentTarget.querySelector(".checkbox");
    const blocco = event.currentTarget;
    const container = document.querySelectorAll('[data-question-id="three"]');
    for (let item of container){
        item.classList.add("notchoise");
        item.classList.remove("choise");
        item.querySelector(".checkbox").src = './images/unchecked.png';
    }
    images.src = './images/checked.png';
    blocco.classList.add("choise");
    blocco.classList.remove("notchoise");
    flag3=true;
    Mappa[blocco.dataset.questionId]=blocco.dataset.choiceId;
    if (Controllastato()){
    const container = document.querySelectorAll(".choice-grid div");
    
    for(let item of container){
        item.removeEventListener('click', onClick);
        item.removeEventListener('click', onClick2);
        item.removeEventListener('click', onClick3);
    }
    risultato();
}

}

function Controllastato(){
if(flag1===true && flag2===true && flag3===true){
  return true;
}
}

function risultato(){

const blocco= document.querySelector('article');
const div= document.createElement('div');
const h1= document.createElement('h1');
const p= document.createElement('p');
const button= document.createElement('button');

blocco.appendChild(div);
div.classList.add('risultato');
button.textContent='Ricomincia il test';
const id1=Mappa['one'];
const id2=Mappa['two'];
const id3=Mappa['three'];

if( id2 === id3 ){
h1.textContent=RESULTS_MAP[id2]['title'];
p.textContent=RESULTS_MAP[id2]['contents'];
}
else
 {
    h1.textContent=RESULTS_MAP[id1]['title'];
    p.textContent=RESULTS_MAP[id1]['contents'];

 }
div.appendChild(h1);
div.appendChild(p);
div.appendChild(button);

button.addEventListener('click', ricomincia);

}


function ricomincia(){
    window.scrollTo(0, 0);
    flag1=false;
    flag2=false;
    flag3=false;
    const boxes = document.querySelectorAll(".choice-grid div");
    for(let box of boxes){
        box.classList.remove("notchoise");
        box.classList.remove("choise");
        box.querySelector(".checkbox").src = './images/unchecked.png';
}
const contenitore = document.querySelectorAll(".choice-grid div");
for(let item of contenitore){
    if (item.dataset.questionId === 'one'){
    item.addEventListener('click', onClick);
    }
    if (item.dataset.questionId === 'two'){
        item.addEventListener('click', onClick2);
    }
    if (item.dataset.questionId === 'three'){
        item.addEventListener('click', onClick3);
    }
}

const blocco= document.querySelector('.risultato');
blocco.remove();


}
