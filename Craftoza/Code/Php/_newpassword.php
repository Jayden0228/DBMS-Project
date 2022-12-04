<img id="back" src="Images/Back.png" alt="">
<div class="box center" style="top:22vh;">
    <span class="arrow" onclick="displayNone('npwd')">&#8592;</span>
    <img src="Images/Logo.png" alt="Craftoza" class="center logo">
    <p class="head bolder">NEW PASSWORD</p>
    <form action="" method="post" class="center2" onsubmit="return validateNewPswd(this)">
        <label for="Password" class="bolder">New Password</label><br>
        <input type="password" name="Password" class="inp">
        <br><br>
        <label for="CPassword" class="bolder">Confirm Password</label><br>
        <input type="password" name="CPassword" class="inp">
        <br><br>
        <input type="submit" value="SUBMIT" class="button2">
        <br><br><br><br>
    </form>
</div>