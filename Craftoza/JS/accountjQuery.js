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
    











    $('.NewCardButton').click(function(){
        $('#CardFormBox').show();
    });
});