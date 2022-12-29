$(document).ready(function(){
    $('#AddressUpdate1').on('submit',function(e){
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
                if(data=="Update"){
                    $('#AddFormBox').show();
                    $('#AddFormBox').load('Php/_addressform.php');
                }
            }
        });
    });
    $('#AddressForm').on('submit',function(e){
        e.preventDefault();
        var hfno=$('#hfno').val();
        var wname=$('#wname').val();
        var villcity=$('#villcity').val();
        var taluka=$('#taluka').val();
        var state=$('#state').val();
        var pcode=$('#pcode').val();
        // console.log($('#updateaddr').val());
        // console.log($('#updateaddr').val());
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
                    location.reload();
                    $('#AddFormBox').hide();
                }
            }
        });
    });
});