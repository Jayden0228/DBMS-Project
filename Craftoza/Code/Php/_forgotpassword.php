<img id="back" src="Images/Back.png" alt="">
<div class="box center" style="top:23vh;">
    <span class="arrow" onclick="displayNone('fpwd')">&#8592;</span>
    <img src="Images/Logo.png" alt="Craftoza" class="center logo">
    <p class="head bolder" style="font-size: x-large;">FORGOT PASSWORD?</p>
    

    <!-- onsubmit="return validateFgtpwd(this)" -->
    <form action="index.php" method="post" class="center2" ><br>
        <label for="Email">Email</label><br>
        <input type="email" id="email1" name="Email1" class="inp" required><br><br>
        <input type="submit" value="GET OTP" class="button2"  onclick="return clickButton();"><br><br><!-- name="forgotpwd" -->
    </form>
    <p style="font-size: 14px; padding-bottom: 40px; padding-left: 75px;"><span onclick="displayNone('fpwd');displayBlock('login')">Back to Log In?</span></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
function clickButton(){
    var email=document.getElementById('email1').value;
    $.ajax({
        type:"post",
        url:"server_action.php",
        data: 
        {  
           'Email1' :email
        },
        cache:false,
        success: function (html) 
        {
           alert('Data Send');
           $('#msg').html(html);
        }
    });
    displayNone('fpwd');
    displayBlock('gotp');
    return false;
 }
</script>