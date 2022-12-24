$(document).ready(function(){
    // $(".formlistmenu").each(function(){
        
    // });
    $('#AddrForm1').on('submit',function(e){
        e.preventDefault();
        var addr=$('#cadd1').val();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                addr: addr,
                Address: true
            },
            success:function(data){
                $('#mainbox1').hide();
                $('#mainbox2').show();
            }
        });
    });
    $('#AddrForm2').on('submit',function(e){
        e.preventDefault();
        var addr=$('#cadd2').val();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                addr: addr,
                Address: true
            },
            success:function(data){
                $('#mainbox1').hide();
                $('#mainbox2').show();
            }
        });
    });
    $('#AddrForm3').on('submit',function(e){
        e.preventDefault();
        var addr=$('#cadd3').val();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                addr: addr,
                Address: true
            },
            success:function(data){
                $('#mainbox1').hide();
                $('#mainbox2').show();
            }
        });
    });
    

    $('#cardForm1').on('submit',function(e){
        e.preventDefault();
        var card=$('#choosecard1').val();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                card: card,
                Creditcard: true
            },
            success:function(){
                window.location ='orderlist.php'
            }
        });
    });
    $('#cardForm2').on('submit',function(e){
        e.preventDefault();
        var card=$('#choosecard2').val();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                card: card,
                Creditcard: true
            },
            success:function(){
                window.location ='orderlist.php'
            }
        });
    });
    $('#cardForm3').on('submit',function(e){
        e.preventDefault();
        var card=$('#choosecard3').val();
        $.ajax({
            type: 'POST',
            url: 'orderAJAX.php',
            data: {
                card: card,
                Creditcard: true
            },
            success:function(){
                window.location ='orderlist.php'
            }
        });
    });
    // $('#pqnt').change(function(){
    //     var qnt=$('#pqnt').val();
    //     console.log(qnt);
    //     $.ajax({
    //         type: 'POST',
    //         url: 'orderAJAX.php',
    //         data: {
    //             qnt: qnt,
    //             Price: true
    //         },
    //         success:function(data){
                
    //         }
    //     });
    // });

    // $('#paymentOptForm').on('submit',function(e){
    //     e.preventDefault();
    //     var payment=$('#payment').val();
    //     $.ajax({
    //         type: 'POST',
    //         url: 'orderAJAX.php',
    //         data: {
    //             payment: payment,
    //             Pmethod: true
    //         },
    //         success:function(data){
    //             if(data=='yes'){
    //                 $('#mainbox3').hide();
    //                 $('#mainbox4').show();
    //             }
    //             else{
    //                 window.location ="orderlist.php";
    //             }
    //         }
    //     });
    // });
    // $("#payment").change(function(){
    //     alert($('#payment').val())
    // })
});