const container = document.getElementById('results');

function search(event){

    const form_data = new FormData(document.querySelector("#search form"));
    console.log(form_data.get('search'));
    
    //fetch a file php
    fetch('cerca.php?q='+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(onJson_movie);
        
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
        const titolo=dati.querySelector('h1').textContent;
      
      
        fetch('rimuovi_serie.php?titolo=' + titolo).then(Risposta).then(see);
      }

function cuorepieno(event){
    const heart= event.currentTarget;
    heart.src="./heart-fill.svg";
    heart.removeEventListener("click",cuorepieno);
    heart.addEventListener("click", cuorevuoto);
    const dati= event.currentTarget.parentNode.parentNode;
    const descrizione=dati.querySelector('span').textContent;
    const titolo=dati.querySelector('h1').textContent;
    const immagine=dati.querySelector('img').src;
    console.log(immagine);



    fetch('salva_serie.php?descrizione=' +descrizione +'&titolo=' +titolo +'&immagine=' +immagine).then(Risposta).then(see);
    

}
function Risposta(response){
    console.log(response);
    return response.json();
    }

    function see(json){
    console.log(json);
    if(json.ok){
        alert("Serie aggiunta alla watchlist");
      }
      else alert("Serie rimossa dalla watchlist");
    }


function onJson_movie(json){
    console.log("ricevuto");
    console.log(json);
    
    const container = document.getElementById('results');
    container.innerHTML = '';
    
    const result = json.results[0];
    const title = result.original_name;
    const riassunto = result.overview;
    const votazione=result.vote_average;
    const selected_image = result.backdrop_path;
    const data= result.first_air_date;
    const album = document.createElement('div');
    album.classList.add('attori');
    const overview=document.createElement('div');
    overview.classList.add('attori');
    // Creiamo l'immagine
    const img = document.createElement('img');
    img.src = 'https://www.themoviedb.org/t/p/original'+selected_image;
    const like= document.createElement("img");
    like.src = './heart.svg';
    const like_container=document.createElement('div');
    like_container.classList.add('like');
    like_container.appendChild(like);
    const caption = document.createElement('h1');
    caption.textContent = title;
    const caption2 = document.createElement('span');
    caption2.textContent = riassunto;
    const voto=document.createElement('p');
    voto.textContent= votazione;
    const uscita=document.createElement('p');
    uscita.textContent=data;
    // Aggiungiamo immagine e didascalia al div
    album.appendChild(img);
    album.appendChild(caption);
    album.appendChild(caption2);
    album.appendChild(voto);
    album.appendChild(uscita);
    album.appendChild(like_container);
    // Aggiungiamo il div alla libreria
    container.appendChild(album);
    like.addEventListener("click", cuorepieno);
    window.scrollTo(top,450);
        
        
   
        img.addEventListener('click', apriModale);
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


