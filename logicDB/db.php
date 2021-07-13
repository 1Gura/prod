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

function getUser($login, $password) {
    $connect = connectDB();
    $login = 'ilya@mail.com';
    $user = mysqli_query($connect,
        "select * from users u where u.email like '$login' limit 1"
    );
    $result = mysqli_fetch_assoc($user);
    var_dump($result['password']);
    var_dump(password_verify(password, $result['password']));
    if (password_verify(password, $result['password'])) return $result;
    return false;
}

