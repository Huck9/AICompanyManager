<?php
require_once("../config.php");
global $config;

$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
$stmt = $pdo->query("SELECT * FROM Documents");
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

template_header("Read Document");
?>
    <button><a href="addDocumentForm.php" class="add">Dodaj dokument</a></button>
    <table>
        <thead>
        <tr class="category">
            <td>Id Dokumentu</td>
            <td>Data Dokumentu</td>
            <td>Notatki</td>
            <td>Nazwa Pliku</td>
            <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                <td>Opcja</td>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($documents as $document): ?>
            <tr class="type">
                <td><?= $document['IdDocument'] ?></td>
                <td><?= $document['documentDate'] ?></td>
                <td><?= $document['notes'] ?></td>
                <td><a href="../uploadFiles/uploads/<?= $document['fileName'] ?>"
                       class="dont-break-out"><?= $document['fileName'] ?></td>
                <td class="actions">
                    <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pracownik"  ) : ?>
                        <a href="updateDocumentForm.php?id=<?= $document['IdDocument'] ?>" class="edit"><i
                                    class='fas fa-edit' style='font-size:24px'></i></a>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] == "admin") : ?>
                        <a href="deleteDocument.php?id=<?= $document['IdDocument'] ?>" class="delete"><i
                                    class='fas fa-trash-alt' style='font-size:24px'></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


<?php

template_footer();