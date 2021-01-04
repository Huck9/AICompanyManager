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
        $role = $_POST['account'];
        session_start();
        $_SESSION['name'] = $login;
        $_SESSION['role'] = $role;
        header("location: panel.html");
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

