
var AboutCNT=0;
var FLAG1=1;
var FLAG2=0;
var FLAG3=0;
setInterval(function f(){

    if(AboutCNT==0&&FLAG1==1)
    {
     
        document.getElementById('aboutUstext1').style.color="#fa4141fe";
        document.getElementById('aboutUstext2').style.color="#3c91ecfe";
        document.getElementById('aboutUstext3').style.color="#ffe951fe";
        AboutCNT=1; 
    
    }
    if(AboutCNT==1 && FLAG2==1){
    
        document.getElementById('aboutUstext1').style.color="#ffe951fe";
        document.getElementById('aboutUstext2').style.color="#fa4141fe";
        document.getElementById('aboutUstext3').style.color="#3c91ecfe";
        AboutCNT=2; 
    
    }
    if (AboutCNT==2 && FLAG3==1)
    {
    
        document.getElementById('aboutUstext1').style.color="#3c91ecfe";
        document.getElementById('aboutUstext2').style.color="#fa4141fe";
        document.getElementById('aboutUstext3').style.color="#ffe951fe";
        AboutCNT=0; 
    }

    if(AboutCNT==1){FLAG1=0;FLAG2=1;FLAG3=0;}
    if(AboutCNT==2){FLAG1=0;FLAG2=0;FLAG3=1;}
    if(AboutCNT==0){FLAG1=1;FLAG2=0;FLAG3=0;}

},3000);