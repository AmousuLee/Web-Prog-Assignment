// echo "<script src='../assets/js/alertmsg.js'></script>";

/*Add Category Process*/
function badCategoryAdded(){
    alert("Similiar category already exist!");
    window.location = '../home_admin.php';
}

function successCategoryAdded(){
    alert("Category successfully added!");
    window.location = '../home_admin.php';
}   

function badInput(){
    alert("Input Form Not Complete!");
    window.location = '../home_admin.php';
}   

/*Delete Registered Event*/
function successRemovedRegisteredEvent(){
    alert("Registration Successfully Removed!");
    window.location = '../profile_user.php';
}
function failRemovedRegisteredEvent(){
    alert("Remove Failed!");
    window.location = '../profile_user.php';
}

/*Admin Search */
function badUserSearchAdmin(){
    alert("Name Doesn't Exist!");
    window.location = '../home_admin.php';
}

/*Admin Login */
function badAdminLogin(){
    alert("Incorrect Username or Password. Please try again!");
    window.location = '../admin/loginAdmin.php';
}

function badAdminInput(){
    alert("Input Form Not Complete!");
    window.location = '../admin/loginAdmin.php';
}  

/*Admin delete user */
function adminDeleteUserSuccess(){
    alert("User Successfully Removed!");
    window.location = '../admin/home_admin.php';
}
function adminDeleteUserFail(){
    alert("Remove Failed!");
    window.location = '../admin/home_admin.php';
}

/*User Register Event */
function badUserEventUsername(){
    alert("Name Doesn't Exist.");
    window.location = '../registerEvent.php';
}

function successUserRegisterEvent(){
    alert("You have successfully register for the event!")
    window.location = '../registerEvent.php';
}

function noCategory(){
    alert("Please select one of the category!")
    window.location = '../registerEvent.php';
}

function notLogin(){
    alert("Look Like you haven't login yet. Please login/register to join the event!")
    window.location = '../login.php';
}

function failUserAlreadyReg(){
    alert("You already registered for an event! You only can join 1 event.")
    window.location = '../registerEvent.php';
}