function loggedAsUser(bool)
{
    if(bool=='f'){
        alert("Look Like you havent login to your account. You must login/register an account to register for the event!");
        window.location = './login.php';
        return false;
    }else{
        return true;
    }
}
