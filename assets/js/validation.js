function passwordValidation()
{
    // local var declr. - val init from elem
    let P = document.getElementById("P").value;
    let CP = document.getElementById("CP").value;

    // if P is not litereally equal to CP
    if (P !== CP)
    {
        document.getElementById("P").value = "";
        document.getElementById("CP").value = "";
        alert("Password and Confirm Password not match!");
        return false;
    }
    else
    {
        return true;
    }
}
