var ADno2=0;
const CRAFTOZA_LINE=["C","CR","CRA","CRAF","CRAFT","CRAFTO","CRAFTOZ","CRAFTOZA"];


setInterval(function AdUpdate(){
  
    
        document.getElementById('DeliveryAdFont2').innerHTML=CRAFTOZA_LINE[ADno2];
        ADno2++;
    
        if(ADno2 ==8)
         {
         
            setTimeout(() => {
            }, 10000);
            ADno2=0;
         }
       
       
    

}, 300);