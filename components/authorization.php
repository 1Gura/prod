<?php
session_start();
if(!empty($_SESSION) && $_SESSION['user']) {
    header('Location: /components/admin.php');
    exit();
}
require $_SERVER['DOCUMENT_ROOT'] . '/logicDB/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/logic/logic.php';
$emailNotValid = checkRegularEmail($_POST['email']);
$passwordNotValid = checkRegularEmail($_POST['password']);
if (!empty($_POST) && !$emailNotValid) {
    authorize(
        $_POST['email'],
        $_POST['password']
    );
}
require_once '../templates/header.php';
?>
    <main class="page-authorization">
        <?php if (!empty($_GET) && $_GET['ok']) { ?>
            <h2 class="">Вы зашли успешно!</h2>
        <?php } else if(!empty($_GET) && $_GET['error']) { ?>
            <h2>Логин или пароль введены с ошибкой!</h2>
        <?php } ?>
        <h1 class="h h--1">Авторизация</h1>
        <form class="custom-form" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <?php if ($emailNotValid) { ?>
                <div class="custom-form__input--error">Неккоректный логин!</div>
            <?php } ?>
            <input type="email" placeholder="email" name="email" class="custom-form__input"
                   value="<?= $_SESSION['email'] ?>" required="">
                        <?php if ($passwordNotValid) { ?>
                            <div class="custom-form__input--error">Неккоректный пароль! Минимальная длина 6!</div>
                        <?php } ?>
            <input type="password" placeholder="пароль" name="password" minlength="6" value="<?= $_SESSION['password'] ?>"
                   class="custom-form__input" required="">
            <button class="button" type="submit">Войти в личный кабинет</button>
        </form>
    </main>

<?php
require_once '../templates/footer.php'
?>