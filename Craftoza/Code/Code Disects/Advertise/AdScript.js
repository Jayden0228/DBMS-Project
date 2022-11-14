// document.getElementById('LINE1').innerHTML="BIG";
// document.getElementById('LINE2').innerHTML="CHRISTMAS";
// document.getElementById('LINE3').innerHTML="LLOYD";
// document.getElementById('LINE4').innerHTML="Get discounts upto 50%";

var count=0;
const ADVERTISEcontentBEFORE_LINE=["BIG","CHRISTMAS","BAZAAR","Get discounts upto 50%"];
const ADVERTISEcontentAFTER_LINE=["SEASHELL","UNION","GOA","30 Unique Art Pieces"];
setInterval(function AdUpdate(){
    if(count==0)
    {
        document.getElementById('LINE1').innerHTML=ADVERTISEcontentBEFORE_LINE[0];
        document.getElementById('LINE2').innerHTML=ADVERTISEcontentBEFORE_LINE[1];
        document.getElementById('LINE3').innerHTML=ADVERTISEcontentBEFORE_LINE[2];
        document.getElementById('LINE4').innerHTML=ADVERTISEcontentBEFORE_LINE[3];
        count=1;
    }

    else if(count==1){
        document.getElementById('LINE1').innerHTML= ADVERTISEcontentAFTER_LINE[0];
        document.getElementById('LINE2').innerHTML= ADVERTISEcontentAFTER_LINE[1];
        document.getElementById('LINE3').innerHTML= ADVERTISEcontentAFTER_LINE[2];
        document.getElementById('LINE4').innerHTML= ADVERTISEcontentAFTER_LINE[3];
        count=0;
    }

}, 5000);