$(document).ready(function(){
    $('#AddressFormButton2').on('submit',function(e){
        e.preventDefault();
        var hno=$('#AddrHno').val();
        var password=$('#psw').val();
        $.ajax({
            type: 'POST',
            url: 'accountAJAX.php',
            data: {
                AddrHno: hno,
                uaddr: true
            },
            success:function(data){
                // if(data=='no')
                // {
                //     $('#errmsg').css('display','block');
                //     $('#errmsg').html('** Incorrect Email Or Password **');
                // }
                // else{
                //     $('#errmsg').css('display','none');
                //     location.reload();
                // }
            }
        });
    });
});