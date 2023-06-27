let body = document.querySelector('body');
let imgElement = document.querySelector('.img');
let copyrightElement = document.querySelector('strong');
let isChanging = false;


let date = new Date();
let year = date.getFullYear();
copyrightElement.innerHTML = "© " + year;

function change() {

    if(isChanging) {
        
        return; //break code

    }
    
    isChanging = true;  

    //light
    if (imgElement.src.endsWith('light.png')) { 
    
        imgElement.src = 'assets/dark.png';
        body.style.backgroundColor = '#151515';
    
    //dark    
    } else {

        imgElement.src = 'assets/light.png';
        body.style.backgroundColor = '#eee';
    
    }
    
    //audio
    let audio = document.getElementById('audio');
    audio.play();

    //sleep 0.7 seconds
    setTimeout(function() {

        isChanging = false;

    }, 700);
}

//switch
function Switch(imgElement) {
    
    change();

}

