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
        session_start();
        header("location: panel.html");
    } else {
        ?>
        <script type="text/javascript">
            document.getElementById("error").innerHTML = "<?php echo "Zły login lub hasło" ?>";
        </script>
        <?php
    }
}

?>

