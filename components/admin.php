<?php
require_once '../templates/header.php';
require_once '../logic/logic.php'
?>
<h1>Админка</h1>
<div>
    Пользователь : <?=$_SESSION['user']['name']?>
</div>
<div>
    email : <?=$_SESSION['user']['email']?>
</div>
<div>
    Роли : <?=implode(',', ($_SESSION['user']['roles']))?>
</div>
<?php
require_once '../templates/footer.php'
?>
