
var AboutCNT=0;
var FLAG1=1;
var FLAG2=0;
var FLAG3=0;
setInterval(function f(){

    if(AboutCNT==0&&FLAG1==1)
    {
     
        document.getElementById('45TDF').innerHTML="More than 170+ Authentic Goan Products";

        AboutCNT=1; 
    
    }
    if(AboutCNT==1 && FLAG2==1){
    
        document.getElementById('45TDF').innerHTML="Over 70+ Businesses all over Goa";

        AboutCNT=2; 
    
    }
    if (AboutCNT==2 && FLAG3==1)
    {
    
        document.getElementById('45TDF').innerHTML="Happy New Year Craftoza Fam!";

        AboutCNT=0; 
    }

    if(AboutCNT==1){FLAG1=0;FLAG2=1;FLAG3=0;}
    if(AboutCNT==2){FLAG1=0;FLAG2=0;FLAG3=1;}
    if(AboutCNT==0){FLAG1=1;FLAG2=0;FLAG3=0;}

},6000);