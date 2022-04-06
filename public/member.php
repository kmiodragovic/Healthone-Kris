<?php
global $params;

if(!isMember()){
    logout();
    header("Location: /home");
} else {
    switch ($params[2]) {
        // When home is selected in the menu it wil be directed to this case
        case 'home':
            include_once "../templates/member/home.php";
            break;
        // When profile is selected in the menu it wil be directed to this case
        case 'profile':
            include_once "../Templates/member/profile.php";
            break;
        // When editprofile is selected on the profile.php it wil be directed to this case
        case 'editprofile':
            $titleSuffix = ' | Profile';

            if(isset($_POST['profile'])){
                $result = changeProfile();
                if ($result === true) {
                    header("Location: /member/profile");
                } else {
                    $message = "Niet alle velden zijn correct ingvuld!";
                    include_once "../Templates/member/editprofile.php";
                }
                break;
            } else {
                include_once "../Templates/member/editprofile.php";
            }
            break;
        // When changepassword is selected on the profile.php it wil be directed to this case
        case 'changepassword':
            $titleSuffix = ' | Password';
            include_once "../Templates/member/changepassword.php";
            break;
        // When logout is selected in the menu it wil be directed to this case
        case 'logout':
            $titleSuffix = ' | Home';
            logout();
            header("Location: /home");
            break;
        default:
            include_once "../templates/member/home.php";
            break;
    }
}