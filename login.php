<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>System faktur</title>
    <link rel="stylesheet" href="main_site.css">

</head>

<div id="container_v1">

    <div id="top">
        <h1> M&M – Company Manager </h1>
    </div>

    <div id="container_v2">

        <div id="left"></div>

        <div id="login_panel">

            <form method="POST" action="#">

                <div class="input_div">
                    Login:
                    <input type="text" name="login" class="css-input" id="login">

                </div>

                <div class="input_div">
                    Hasło:
                    <input type="password" name="password" class="css-input" id="password">

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

$dom = new DOMDocument();
$dom->loadHTML("index.html");

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'id15055529_company');

if (isset($_POST['sign'])) {

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE login='$login' AND password='$password' ";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run) > 0) {
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

