$(document).ready(function(){
    $(".formlistmenu").each(function(){
        
    });
    $('#AddrForm').on('submit',function(e){
        e.preventDefault();
        var addr=$('#cadd').val();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                addr: addr,
                Address: true
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
                // displayNone('#mainbox1');
                // displayBlock('#mainbox2');
                $('#mainbox1').hide();
                $('#mainbox2').show();
            }
        });
    });
});