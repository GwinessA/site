<?php
require "db.php";

$data = $_POST;

if( isset($data['do_login']) )
{
    $errors = array();
    $user = R::findOne('users', 'email = ?', array($data['email']) );
    if( $user )
    {
        //логин существует 
        if( password_verify($data['password'], $user->password) ) {
                //всё хорошо, логиним пользователя
            $_SESSION['logged_user'] = $user;
            echo '<div style="color: green;">Вы авторизованы!<br/>Можете перейти на <a href="/">главную страницу!</a>!</div><hr>';
        } else
        {
            $errors[] = 'Пароль введён неверно!';
        }
    } else
    {
        $errors[] = 'Пользователь с таким e-mail не найден!';
    }

    if( ! empty($errors) )
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}

?>

<form action="login.php" method="POST">

<p>
        <p><strong>E-mail please</strong>:</p>
        <input type="text" name="email" value="<?php echo @$data['email']; ?>">
    </p>


    <p>
        <p><strong>Пароль please</strong>:</p>
        <input type="password" name="password" value="<?php echo @$data['password']; ?>">
    </p>

    <p>
        <button type="submit" name="do_login">Войти!</button>
    </p>
</form>