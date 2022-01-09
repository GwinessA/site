<?php

require "db.php";

?>
<?php if( isset($_SESSION['logged_user']) ) : ?>
    Приветсвуем вас, <?php echo $_SESSION['logged_user']->login; ?> <br> 
<br>
    <?php
$data = $_POST;
if (isset($data['change_login'])) {
    $errors = array();
    if ($data['new_login'] == '') {
        $errors[] = 'Введите новое ФИО:';
    }
    if ($data['new_login'] == $_SESSION['login']->login) {
        $errors[] = 'Нельзя изменить своё ФИО на текущее!';
    }
    if (empty($errors)) {

    }else {
        echo array_shift($errors);
    }
}
    ?>

Ваш E-mail: <?php echo $_SESSION['logged_user']->email; ?><br>
Серия вашего паспорта: <?php echo $_SESSION['logged_user']->passport; ?><br>
Номер вашего паспорта: <?php echo $_SESSION['logged_user']->passport_2; ?><br>





<a href="/index.php">На глвную</a>
<?php endif; ?>