const container = document.getElementById('results');

function search(event){

    const form_data = new FormData(document.querySelector("#search form"));
    console.log(form_data.get('search'));
    
    //fetch a file php
    fetch('galleria.php?q='+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(onJson_movie);
        
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
    container.className = 'immagini';
    const risultati=json.backdrops;
    let num=risultati.length;
    console.log(num);

if(num>=40){
    num=40;
}
    for(i=0; i<num;i++)
    {
        const selected_image = risultati[i].file_path;
        const div = document.createElement('div');
        div.classList.add('gallery-item');
        const img= document.createElement("img");
        img.src = 'https://www.themoviedb.org/t/p/original'+selected_image;
    
        div.appendChild(img);

        container.appendChild(div);
        //modale al click
        img.addEventListener('click', apriModale);
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


