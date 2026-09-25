<?php
function checkLogin($u, $p, $users) {
    foreach($users as $user) {
        if ($u == $user['username'])
            if(password_verify($p,$user['password'])){
                return $user;
            }
    }
    return false; // return 0;
}

function checkMail($mail){
    if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
    return true;
    }
    return false;
}
?>