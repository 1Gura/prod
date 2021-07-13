<?php
require_once '../templates/header.php';
$emailNotValid = checkRegularEmail($_POST['email']);
$passwordNotValid = checkRegularEmail($_POST['password']);
if (!empty($_POST) && !$emailNotValid) {
    authorize(
        $_POST['email'],
        $_POST['password']
    );
}
?>
    <main class="page-authorization">
        <h1 class="h h--1">Авторизация</h1>
        <form class="custom-form" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <?php if ($emailNotValid) { ?>
                <div class="custom-form__input--error">Неккоректный логин!</div>
            <?php } ?>
            <input type="email" placeholder="email" name="email" class="custom-form__input"
                   value="<?= $_POST['email'] ?>" required="">
            <!--            --><?php //if ($passwordNotValid) { ?>
            <!--                <div class="custom-form__input--error">Неккоректный пароль! Минимальная длина 6!</div>-->
            <!--            --><?php //} ?>
            <input type="password" placeholder="пароль" name="password" minlength="6" value="<?= $_POST['password'] ?>"
                   class="custom-form__input" required="">
            <button class="button" type="submit">Войти в личный кабинет</button>
        </form>
    </main>

<?php
require_once '../templates/footer.php'
?>