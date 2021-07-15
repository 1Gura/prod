<?php
session_start();
function authorize($login,$password) {
    $user = getUser($login, $password);
    if($user) {
        $userId =$user['id'];
        $roles = getRoles($userId);
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['name'] = $user['name'];
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['roles'] = $roles;
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: /components/admin.php');
        exit();
    }
    $_SESSION['email'] = $login;
    $_SESSION['password'] = $password;
    header('Location: /components/authorization.php?error=error');
    exit();
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
