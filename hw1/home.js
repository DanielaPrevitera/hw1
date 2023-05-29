const overlay = document.getElementById("overlay");

document.querySelector("#search form").addEventListener("submit", search);

function jsonMoviedb(json) {
  // svuoto i risultati
  console.log(json);
  const container = document.getElementById('results');
  container.innerHTML = '';
  container.className = 'spotify';
  const results = json.results;
  let num=results.length;
  console.log(num);
  if(num>10){
    num=10;
  }
  for(i=0; i<num; i++){
  const title = results[i].original_name;
  const riassunto = results[i].overview;
  const votazione=results[i].vote_average;
  const selected_image = results[i].backdrop_path;
  const data= results[i].first_air_date;
  // Creiamo il div che conterrà immagine e didascalia
  const album = document.createElement('div');
  album.classList.add('album');
  
  // Creiamo l'immagine
  const img = document.createElement('img');
  img.src = 'https://www.themoviedb.org/t/p/original'+selected_image;
  
  // Creiamo la didascalia
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
  // Aggiungiamo il div alla libreria
  container.appendChild(album);
 // container.appendChild(overview);
 img.addEventListener('click', apriModale);
}
}



function search(event){
  const form_data = new FormData(document.querySelector("#search form"));
  // Mando le specifiche della richiesta alla pagina PHP, che prepara la richiesta e la inoltra
  fetch("popular.php?q="+encodeURIComponent(form_data.get('search'))).then(searchResponse).then(jsonMoviedb);
  // Evito che la pagina venga ricaricata
  event.preventDefault();
}


function searchResponse(response){
    console.log(response);
    return response.json();
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