<?php
function authorize($login,$password) {
   $user = getUser($login, $password);
   var_dump($user);
}

function checkRegularEmail($email): bool
{
    if (isset($email)) {
        if (!preg_match('/^[a-z]([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i', $email)) {
            return true;
        }
    }
    return false;
}

function checkRegularPassword($password): bool
{
    if (isset($password)) {
        if (!preg_match('/[0-9a-zA-Z!@#$%^&*]{6,}/', $password)) {
            return true;
        }
    }
    return false;

}