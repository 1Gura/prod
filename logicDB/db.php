<?php
const host = 'localhost';
const user = 'root';
const password = 'root';
const database = 'kurs';

function connectDB() {
    static $connect;
    if(null === $connect) {
        $connect = mysqli_connect(host,user,password,database);
    }
    return $connect;
}

function getUser($login, $password)
{
    $connect = connectDb();
    $login = mysqli_real_escape_string($connect, $login);
    $result = mysqli_query($connect, "select * from users u where u.email = '$login' limit 1");
    $passwordBD = '';
    $user = mysqli_fetch_assoc($result);

    mysqli_close($connect);
    if (password_verify($password, $user['password'])) {
        var_dump('Успех!');
        return $user;
    }
    return false;
}

