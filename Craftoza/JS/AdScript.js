var ADno=0;
var ADVERTISEcontentBEFORE_LINE=["BIG","CHRISTMAS","BAZAAR","Get discounts upto 50%"];
var ADVERTISEcontentAFTER_LINE=["SEASHELL","UNION","GOA","30 Unique Art Pieces"];


setInterval(function AdUpdate(){
    if(ADno==0)
    {
        document.getElementById('LINE1').innerHTML=ADVERTISEcontentBEFORE_LINE[0];
        document.getElementById('LINE2').innerHTML=ADVERTISEcontentBEFORE_LINE[1];
        document.getElementById('LINE3').innerHTML=ADVERTISEcontentBEFORE_LINE[2];
        document.getElementById('LINE4').innerHTML=ADVERTISEcontentBEFORE_LINE[3];
        ADno=1;
    }

    else if(ADno==1){
        document.getElementById('LINE1').innerHTML= ADVERTISEcontentAFTER_LINE[0];
        document.getElementById('LINE2').innerHTML= ADVERTISEcontentAFTER_LINE[1];
        document.getElementById('LINE3').innerHTML= ADVERTISEcontentAFTER_LINE[2];
        document.getElementById('LINE4').innerHTML= ADVERTISEcontentAFTER_LINE[3];
        ADno=0;
    }

}, 5000);