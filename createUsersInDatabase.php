<?php

require_once("config.php");
global $config;

try {

    $pdo = new PDO($config['dsn'], $config['username'], $config['password']);

    $usersPESEL = array("90110997361", "91052945827", "75092344644", "98102854355", "90052165929", "01292042189",
        "03231975992", "89092612122", "50011086784", "63062483684");

    $usersName = array("Piotrek", "Kacper", "Kamil", "Robert", "Geralt", "Krzysztof", "Norbert", "Damian",
        "Marcin", "Jakub", "Antoni", "Krystian", "Anastazja", "Filip", "Magdalena");

    $usersSurname = array("Nowak", "Kowalski", "Malysz", "Kubica", "Riv", "Sauć", "Gierczak", "Ziaja", "Majkut",
        "Turewicz", "Gonciarz", "Kamski", "Mała", "Hajzer", "Ogórek");

    $usersPassword = array("possession", "mobile", "staircase", "deviation", "negative", "tradition", "member", "curl",
        "lost", "prisoner");

    $role = array("pracownik", "audytor");

    $stm = $pdo->prepare("INSERT INTO users (PESEL, userName, userSurname, login, password, account) 
    VALUES (?, ?, ?, ?, ?, ?)");

    $pdo->beginTransaction();

    for ($i = 0; $i < count($usersPESEL); $i++) {
        $rand = array_rand($role);
        $stm->bindValue(1, $usersPESEL[$i]);
        $stm->bindValue(2, $usersName[$i]);
        $stm->bindValue(3, $usersSurname[$i]);
        $stm->bindValue(4, substr($usersName[$i], 0, 3) . substr($usersSurname[$i], 0, 3));
        $stm->bindValue(5, md5($usersPassword[$i]));
        $stm->bindValue(6, $role[$rand]);
        $stm->execute();
    }

// ADMIN

    $stm->bindValue(1, "ADMIN");
    $stm->bindValue(2, "admin");
    $stm->bindValue(3, "admin");
    $stm->bindValue(4, "admin");
    $stm->bindValue(5, md5("root"));
    $stm->bindValue(6, "admin");
    $stm->execute();

    $pdo->commit();

} catch (PDOException $e) {
    print $e->getMessage();
    die();
}

?>