<?php

require "db.php";

?>

<?php if( isset($_SESSION['logged_user']) ): ?>
    Авторизован!<br>
    Рады Видеть Вас, <?php echo $_SESSION['logged_user']->login; ?>!
    <hr>
    <a href="kabinet.php">Войти в личный кабинет</a><br>
    <a href="logout.php">Выйти</a>
<?php else : ?>
    Вы не авторизованы!<br>
    <a href="/login.php">Авторизоваться</a><br>
    <a href="/signup.php">Регистрация</a>
<?php endif; ?>
