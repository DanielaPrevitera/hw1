const overlay = document.getElementById("overlay");
overlay.classList.add("hidden");



function fetchAttori() {
        fetch("fetch_attori.php").then(fetchResponse).then(fetchAttoriJson);
}

function fetchSerie(){
  fetch("fetch_serie.php").then(fetchResponse2).then(fetchSerieJson);
}
function fetchResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}
function fetchResponse2(response) {
  if (!response.ok) {return null};
  return response.json();
}

function fetchSerieJson(json) {
  console.log("Fetching...");
  console.log(json);
  const container2 = document.getElementById('lista');
  container2.innerHTML = '';
  const num=json.length;

  for (i=0; i<num; i++) {
      const titolo=json[i].content.titolo;
      const descrizione=json[i].content.descrizione;
     
      
      const img= document.createElement("img");
      img.src = json[i].content.immagine;
      
     
      
      const like_container=document.createElement('div');
      like_container.classList.add('like');
      const like= document.createElement("img");
      like.src="./heart-fill.svg";
      like_container.appendChild(like);

      const div = document.createElement('div');
      div.classList.add('attori');
      const caption = document.createElement('h1');
      caption.textContent = titolo;
      const caption2 = document.createElement('span');
      caption2.textContent = descrizione;
     
   
      div.appendChild(caption); 
      div.appendChild(img);
      div.appendChild(caption2);
      
      
      container2.appendChild(div);
      div.appendChild(like_container);
      like.addEventListener("click", vuoto);
      window.scrollTo(top,450);
      }
      
}

function pieno(event){
  const heart= event.currentTarget;
  heart.src="./heart-fill.svg";
  heart.removeEventListener("click",pieno);
  heart.addEventListener("click",vuoto);
  const dati= event.currentTarget.parentNode.parentNode;
    const descrizione=dati.querySelector('span').textContent;
    const titolo=dati.querySelector('h1').textContent;
    const immagine=dati.querySelector('img').src;
    console.log(immagine);



    fetch('salva_serie.php?descrizione=' +descrizione +'&titolo=' +titolo +'&immagine=' +immagine).then(Risposta).then(sii);

}



function vuoto(event){
  const heart= event.currentTarget;
  heart.src="./heart.svg";
  heart.removeEventListener("click",vuoto);
  heart.addEventListener("click",pieno);
  const dati= event.currentTarget.parentNode.parentNode;
  const titolo=dati.querySelector('h1').textContent;


  fetch('rimuovi_serie.php?titolo=' + titolo).then(Risposta).then(sii);
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
  function sii(json){
    console.log(json);

    if(json.ok){
      alert("Serie aggiunta alla watchlist");
    }
    else alert("Serie rimossa dalla watchlist");
    }

function fetchAttoriJson(json) {
    console.log("Fetching...");
    console.log(json);
    
    const container = document.getElementById('results');
    container.innerHTML = '';
    const num=json.length;

    for (i=0; i<num; i++) {
        const attore=json[i].content.attore;
        const personaggio=json[i].content.personaggio;
       
        
        const img= document.createElement("img");
        img.src = json[i].content.immagine;
        
        const like_container=document.createElement('div');
        like_container.classList.add('like');
        const like= document.createElement("img");
        like.src="./heart-fill.svg";
        like_container.appendChild(like);
   
        const div = document.createElement('div');
        div.classList.add('attori');
        const caption = document.createElement('h1');
        caption.textContent = attore;
        const caption2 = document.createElement('span');
        caption2.textContent = personaggio;
       
    
        div.appendChild(caption2);
        div.appendChild(img);
        div.appendChild(caption);
        div.appendChild(like_container);
        
        container.appendChild(div);
        like.addEventListener("click", cuorevuoto);
        window.scrollTo(top,450);
        }
        
}




fetchAttori();
fetchSerie();