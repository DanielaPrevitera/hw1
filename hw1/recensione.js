const container = document.getElementById('results');

function search(event){

    const form_data = new FormData(document.querySelector("#search form"));
    console.log(form_data.get('search'));
    
    //fetch a file php
    fetch('recensione.php?q='+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(onJson_movie);
    
    //visualizzo i contenuti
    container.innerHTML = '';

    event.preventDefault();
}

function searchResponse(response)
{
    console.log(response);
    return response.json();
}

function onJson_movie(json){
    console.log("ricevuto");
    console.log(json);
    const container = document.getElementById('results');
    container.innerHTML = '';
    let num=json.total_results;
    console.log(num);

if(num>=40){
    num=40;
}
    for(i=0; i<num;i++)
    {   const autore=json.results[i].author_details.name;
        const contenuto=json.results[i].content;
        const data_uscita=json.results[i].created_at;
        const div = document.createElement('div');
        div.classList.add('recensione-item');
        const caption = document.createElement('h1');
        caption.textContent = contenuto;
        const caption2 = document.createElement('span');
        caption2.textContent = autore;
        const data=document.createElement('p');
        data.textContent= data_uscita;
        div.appendChild(caption2);
        div.appendChild(caption);
        div.appendChild(data);
        container.appendChild(div);
   

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


