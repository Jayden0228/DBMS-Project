<img id="back" src="Images/Back.png" alt="">
<div class="box center">
    <span class="arrow" onclick="displayNone('signup')">&#8592;</span>
    <img src="Images/Logo.png"alt="Craftoza" class="center logo">
    <p class="head bolder">SIGNUP</p>
    <form action="" method="post" class="center2" onsubmit="return validateSignup(this)">
        <label for="Email">Email</label><br>
        <input type="email" name="Email" value="" class="inp" requried><br><br>
        <label for="Password" class="bolder">Password</label><br>
        <input type="password" id="ipwd" name="Password"  value="" class="inp" requried><br><br>
        <label for="ConfirmPassword"class="bolder">Confirm Password</label><br>
        <input type="password" name="CPassword" value="" class="inp" requried><br><br>
        <input type="submit" value="SIGNUP" class="button2"><br><br>
    </form>
        <p style="font-size: 14px; padding-bottom: 40px;">Already have an Account? <span style="font-size: 14px; display: inline-block;" onclick="displayNone('signup');displayBlock('login')">LOG IN</span></p>
</div>