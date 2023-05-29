const container = document.getElementById('results');

function search(event){

    const form_data = new FormData(document.querySelector("#search form"));
    console.log(form_data.get('search'));
    
    //fetch a file php
    fetch('attore.php?q='+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(onJson_movie);
        

    //visualizzo i contenuti
    container.innerHTML = '';

    event.preventDefault();
}

function searchResponse(response)
{
    console.log(response);
    return response.json();
}

function cuorevuoto(event){
    const heart= event.currentTarget;
    heart.src="./heart.svg";
    heart.removeEventListener("click",cuorevuoto);
    heart.addEventListener("click",cuorepieno);
    const dati= event.currentTarget.parentNode.parentNode;
    const attore=dati.querySelector('h1').textContent;


    fetch('rimuovi_attore.php?attore=' + attore).then(Risposta).then(see);
}


function cuorepieno(event){
    const heart= event.currentTarget;
    heart.src="./heart-fill.svg";
    heart.removeEventListener("click",cuorepieno);
    heart.addEventListener("click",cuorevuoto);
    const dati= event.currentTarget.parentNode.parentNode;
    const personaggio=dati.querySelector('span').textContent;
    const attore=dati.querySelector('h1').textContent;
    const immagine=dati.querySelector('img').src;
    console.log(immagine);



    fetch('salva_attore.php?personaggio=' +personaggio +'&attore=' +attore +'&immagine=' +immagine).then(Risposta).then(see);
    

}


function Risposta(response){
console.log(response);
return response.json();


}
function see(json){
    console.log(json);
    if(json.ok){
      alert("Attore aggiunto ai preferiti");
    }
    else alert("Attore rimosso dai preferiti");
    }

function onJson_movie(json){
    console.log("ricevuto");
    console.log(json);
    const container = document.getElementById('results');
    container.innerHTML = '';
    const risultati=json.cast;
    let num=risultati.length;
    console.log(num);
          
if(num>=20){
    num=20;
}
    for(i=0; i<num;i++)
    {   const attore=risultati[i].name;
        const personaggio=risultati[i].character;
        const popularity=risultati[i].popularity;
        const selected_image=risultati[i].profile_path;
        const img= document.createElement("img");
        img.src = 'https://www.themoviedb.org/t/p/original'+selected_image;
        const like= document.createElement("img");
        like.src = './heart.svg';
        const like_container=document.createElement('div');
        like_container.classList.add('like');
        const div = document.createElement('div');
        div.classList.add('attori');
        const caption = document.createElement('h1');
        caption.textContent = attore;
        const caption2 = document.createElement('span');
        caption2.textContent = personaggio;
        const popo=document.createElement('p');
        popo.textContent= "Followers: " +popularity;
       

    
        like_container.appendChild(like);
        div.appendChild(caption2);
        div.appendChild(img);
        div.appendChild(caption);
        div.appendChild(popo);
        div.appendChild(like_container);
        
        container.appendChild(div);
        
        img.addEventListener('click', apriModale);
        like.addEventListener("click", cuorepieno);
        window.scrollTo(top,500);
    }
}



function apriModale(event) {
    const modale = document.getElementById('modale');
	
	const image = document.createElement('img');
	
	image.id = 'immagine_post';
	
	image.src = event.currentTarget.src;
	
	modale.appendChild(image);
	
	modale.classList.remove('hidden');
    modale.addEventListener('click',chiudiModale);
	
	document.body.classList.add('no-scroll');


    modale.style.top=window.pageYOffset + "px";
    



}


function chiudiModale() {
	
		//aggiungo la classe hidden 
		modale.classList.add('hidden');
		//prendo il riferimento dell'immagine dentro la modale
		img = modale.querySelector('img');
		//e la rimuovo 
		//cancello il contenuto della modale
        modale.innerHTML = '';
		modale.classList.add('hidden');
		document.body.classList.remove('no-scroll');
	
		//riabilito lo scroll
	
}




const cerca = document.querySelector("form");
const errore = document.getElementById("errore");

cerca.addEventListener("submit",search);


