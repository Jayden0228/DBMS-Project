<img id="back" src="Images/Back.png" alt="">
<div class="box center" style="top:23vh;">
    <span class="arrow" onclick="displayNone('fpwd')">&#8592;</span>
    <img src="Images/Logo.png" alt="Craftoza" class="center logo">
    <p class="head bolder" style="font-size: x-large;">FORGOT PASSWORD?</p>
    <form action="" method="post" class="center2" onsubmit="return validateFgtpwd(this)"><br>
        <label for="Email">Email</label><br>
        <input type="email" id="email" name="Email" class="inp" required><br><br>
        <input type="submit" value="GET OTP" class="button2"><br><br>
    </form>
    <p style="font-size: 14px; padding-bottom: 40px; padding-left: 75px;"><span onclick="displayNone('fpwd');displayBlock('login')">Back to Log In?</span></p>
</div>