const readButton = document.getElementById("readBtn");
const stopButton = document.getElementById("stopBtn");
const textInput = document.getElementById("text-to-read");
var text = textInput.innerText;

readButton.addEventListener("click",()=>
{
          const ulterance = new SpeechSynthesisUtterance(text);
          ulterance.rate = 1    ;
          speechSynthesis.speak(ulterance);
          //speechSynthesis.lang = 'fr-FR';
          speechSynthesis.voice = voices[0];
          speechSynthesis.voiceURI = 'native';
});
          
stopButton.addEventListener("click",()=>
{      
     speechSynthesis.cancel()
});