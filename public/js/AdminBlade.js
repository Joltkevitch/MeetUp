window.onload=function(){
    
    
  var tds=$("td");
    
    
    if(tds.text()== "1"){
        tds.parent().css("background","linear-gradient(to right,  rgba(20,60,20,0.8),rgba(50,120,50,0.8) );")
    }
    else{
        tds.parent().css("background","linear-gradient(to right,  rgba(60,20,20,0.8),rgba(120,50,50,0.8) );")
    }
    
    
};