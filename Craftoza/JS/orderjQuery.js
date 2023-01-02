$(document).ready(function(){
    $('#wallet').click(function(){
        $('#mainbox5').show();
        $('#mainbox3').hide();
        $('#ConfirmButton').show();
        $('#ConfirmMsg').show();
        $('#ConfirmMsg').html("<b>Payment Method: Wallet..</b> Click on the below button to Confirm the order and Pay");
    });
    $('#netbank').click(function(){
        $('#mainbox5').show();
        $('#mainbox3').hide();
        $('#ConfirmButton').show();
        $('#ConfirmMsg').show();
        $('#ConfirmMsg').html("<b>Payment Method: Net Banking..</b> Click on the below button to Confirm the order and Pay");
    });
    $('#cod').click(function(){
        $('#mainbox5').show();
        $('#mainbox3').hide();
        $('#ConfirmButton').show();
        $('#ConfirmMsg').show();
        $('#ConfirmMsg').html("<b>Payment Method: Cash On Delivery..</b> Click on the below button to Confirm the order");
    });

    
    $('.NewAddressButton').click(function(){
        $('#AddFormBox').show();
    });
    $('.NewCardButton').click(function(){
        $('#CardFormBox').show();
    });


    $('form[id^="AddressChoice"]').on('submit',function(e){
        e.preventDefault();
        var hno=this.firstElementChild.value;
        console.log(hno);
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                addr: hno,
                Address: true
            },
            success:function(data){
                location.reload();  
            }
        });
    });

    

    $('form[id^="CardChoice"]').on('submit',function(e){
        e.preventDefault();
        var card=this.firstElementChild.value;
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                card: card,
                CreditCard: true
            },
            success:function(data){
                // window.location ='orderlist.php'
                // location.reload();
                $('#mainbox5').show();
                $('#mainbox3').hide();
                $('#mainbox4').hide();
                $('#ConfirmButton').show();
                $('#ConfirmMsg').show();
                $('#ConfirmMsg').html("<b>Payment Method: Credit Card..</b> Click on the below button to Confirm the order and Pay");
            }
        });
    });
    

    $('#AddressChangeForm').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                ChangeAddr: true
            },
            success:function(data){
                location.reload();
            }
        });
    });
    
});