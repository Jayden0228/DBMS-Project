$(document).ready(function(){
    $('form[id^="AddressUpdate"]').on('submit',function(e){
        e.preventDefault();
        var hno=this.firstElementChild.value;
        console.log(hno);
        $.ajax({
            type: 'POST',
            url: 'accountAJAX.php',
            data: {
                AddrHno: hno,
                uaddr: true
            },
            success:function(data){
                if(data==hno){
                    location.reload();
                }
            }
        });
    });

    $('#AddressFormU').on('submit',function(e){
        e.preventDefault();
        var hfno=$('#hfno1').val();
        var wname=$('#wname1').val();
        var villcity=$('#villcity1').val();
        var taluka=$('#taluka1').val();
        var state=$('#state1').val();
        var pcode=$('#pcode1').val();

        $.ajax({
            type: 'POST',
            url: 'accountAJAX.php',
            data: {
                hfno:hfno,
                wname:wname,
                villcity:villcity,
                taluka:taluka,
                state:state,
                pcode:pcode,
                updateaddr: true
            },
            success:function(data){
                if(data=="Updated"){
                    window.location="address.php";
                }
                if(data=="NotUpdated"){
                    console.log(data);
                    location.reload();
                }
            }
        });
    });

    $('.NewAddressButton').click(function(){
        $('#AddFormBox').show();
    });



    //Credit card Logic
    $('form[id^="CardUpdate"]').on('submit',function(e){
        e.preventDefault();
        var cdno=this.firstElementChild.value;
        console.log(cdno);
        $.ajax({
            type: 'POST',
            url: 'accountAJAX.php',
            data: {
                cdno: cdno,
                ucard: true
            },
            success:function(data){
                if(data==cdno){
                    location.reload();
                }
            }
        });
    });

    $('#CreditFormU').on('submit',function(e){
        e.preventDefault();

        var cardno=$('#cardno1').val();
        var cvv=$('#cvv1').val();
        var exptdate=$('#exptdate1').val();
        var clabel=$('#clabel1').val();

        $.ajax({
            type: 'POST',
            url: 'accountAJAX.php',
            data: {
                cardno:cardno,
                cvv:cvv,
                exptdate:exptdate,
                clabel:clabel,
                updatecard: true
            },
            success:function(data){
                if(data=="Updated"){
                    window.location="credit.php";
                }
                if(data=="NotUpdated"){
                    console.log(data);
                    location.reload();
                }
            }
        });
    });

    $('.NewCardButton').click(function(){
        $('#CardFormBox').show();
    });
});