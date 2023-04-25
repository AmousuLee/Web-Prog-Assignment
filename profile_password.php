<div class="input-box">
    <span class="details">Password</span>
    <input type="password" name="password" id="P" placeholder="Enter your old password"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
    required>
</div>
<div class="input-box">
    <span class="details">Confirm Password</span>
    <input type="password" name="CP" id="CP" placeholder="Confirm your new password" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
    required>
</div>