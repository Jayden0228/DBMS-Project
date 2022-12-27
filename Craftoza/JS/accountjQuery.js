$(document).ready(function(){
    $('#AddressFormButton1').on('submit',function(e){
        e.preventDefault();
        var email=$('#email').val();
        var password=$('#psw').val();
        $.ajax({
            type: 'POST',
            url: 'loginvalidate.php',
            data: {
                Email: email,
                Password: password,
                Login: true
            },
            success:function(data){
                if(data=='no')
                {
                    $('#errmsg').css('display','block');
                    $('#errmsg').html('** Incorrect Email Or Password **');
                }
                else{
                    $('#errmsg').css('display','none');
                    location.reload();
                }
            }
        });
    });
});