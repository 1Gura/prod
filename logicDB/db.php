<?php
const host = 'localhost';
const user = 'root';
const password = 'root';
const database = 'kurs';

function connectDB()
{
//    static $connect;
//    if (null === $connect) {
        $connect = mysqli_connect(host, user, password, database);
//    }
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
        return $user;
    }
    return false;
}

function getRoles(int $userId)
{
    $connect = connectDB();
    $roles = [];
    $result = mysqli_query($connect, "
        select distinct r.role from users u
        inner join roles_has_users ru on '$userId' = ru.users_id
        inner join roles r on ru.roles_id = r.id
    ");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $roles[] = $row['role'];
        }
        return $roles;
    }
    return false;
}

