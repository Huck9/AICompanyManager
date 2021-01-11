<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>System faktur</title>
    <link rel="stylesheet" href="main_site.css">

</head>

<div id="container_v1">

    <div id="container_v2">

        <div id="left"></div>

        <div id="login_panel">

            <form action="index.php" method="POST">

                <div id="login-header">
                    <h1> M&M <br> Company Manager </h1>
                </div>

                <div class="input_div">
                    <p><input type="text" name="login" class="css-input" id="login" placeholder="login"></p>

                </div>

                <div class="input_div">
                    <p><input type="password" name="password" class="css-input" id="password" placeholder="password"></p>

                </div>

                <div>
                    <p></p>
                    <input type="submit" name="sign" id="sign_in" class="myButton" value="Zaloguj">
                    <p id="error"></p>
                </div>

            </form>

        </div>

        <div id="right"></div>

    </div>

    <div id="bottom"></div>

</div>

</body>

</html>

<?php

require_once("config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);

if (isset($_POST['sign'])) {

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $stm = $pdo->query("SELECT * FROM users WHERE login='$login' AND password='$password' ");
    $user = $stm->fetch();

    if ($user > 0) {
        $role = $user['account'];
        session_start();
        $_SESSION['name'] = $login;
        $_SESSION['role'] = $role;
        header("location: panel.php");
        echo "Udalo sie zalogowac";
    } else {
        ?>
        <script type="text/javascript">
            document.getElementById("error").innerHTML = "<?php echo "Zły login lub hasło" ?>";
        </script>
        <?php
    }
}

?>

