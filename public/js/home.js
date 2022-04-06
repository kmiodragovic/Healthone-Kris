//array of news
const news = ["Kom langs de bar voor een RedBull en een verse chocolate protein bar.",
"Nieuwe smaak van Redbull Watermelone.",
"Redbull The White Edition is nu 1 + 1 !"]

//logo
const logo = "<img src='../img/rb_logo.jpg' width='50px' style='margin:0 8px'/>";
let tickerText = "";
//looping through the news array
for(let i=0; i<news.length; i++){
  tickerText+=news[i];
  //adds the logo in between news items
  if(i!=news.length-1){
    tickerText+=logo;
  }
}

document.querySelector("#scroll").innerHTML = tickerText;