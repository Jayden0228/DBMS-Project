<img id="back" src="Images/Back.png" alt="">
<div class="box center">
    <span class="arrow" onclick="displayNone('login')">&#8592;</span>
    <img src="Images/Logo.png" alt="Craftoza" class="center logo">
    <p class="head bolder">LOGIN</p>
    <form action="index.php" method="post" class="center2" onsubmit="return validateLogin(this)">
        <label for="Email">Email</label><br>
        <input type="email" name="Email" value="" class="inp" required><br><br>
        <label for="Password">Password</label><br>
        <input type="password" id="psw" name="Password" class="inp" required><br><br>
        <input type="submit" value="LOGIN" class="button2">
        <p style="font-size: 14px; padding-left: 75px;"><span onclick="displayNone('login');displayBlock('fpwd')">Forgot Password?</span></p><br><br>
    </form>
    <p style="font-size: 14px; padding-bottom: 40px;">Need an Account? <span style="font-size: 14px;"onclick="displayNone('login');displayBlock('signup')">SIGN UP</span></p>
</div>