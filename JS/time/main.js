
let timeElement = document.getElementsByClassName('time')[0];


let copyrightElement = document.querySelector('strong');


function updateTime() {
    let date = new Date();
    let hrs = date.getHours();
    let mins = date.getMinutes();
    let secs = date.getSeconds();

    let hrsStr = hrs < 10 ? '0' + hrs : hrs;
    let minsStr = mins < 10 ? '0' + mins : mins;
    let secsStr = secs < 10 ? '0' + secs : secs;

    let timeInsert = hrsStr + ':' + minsStr + ':' + secsStr;


    timeElement.innerHTML = timeInsert;

    let progress = document.getElementById('progress');
    let pourcentage_h5 = document.querySelector('h5');



    let pourcent = (secs / 60) * 100;
    pourcent = parseInt(pourcent);
    pourcentage_h5.innerHTML = pourcent + '%';
    progress.style.width = pourcent + '%';

    let year = date.getFullYear();
    copyrightElement.innerHTML = "© " + year;
  
}

// Call updateTime initially
updateTime();


setInterval(updateTime, 1000);
