<?php



require_once("../config.php");
template_header("Add Document");

if (isset($_SESSION) && isset($_SESSION['name'])) {
    //echo "Current user: {$_SESSION['name']}";
?>
    <div class="container">
        <div class="left"></div>
        <form method="post" action="addDocument.php" enctype="multipart/form-data">
            <div class="inputs">
                Numer Dokumentu: <input type="text" name="IdDocument" class="standardInput"><br>
                Data: <input type="date" name="documentDate" class="standardInput"><br>
                Notatki: <input type="text" name="notes" class="standardInput"><br>
                <input type="file" name="file" size="50"><br>
                <input type="submit" class="submitInput">
            </div>
        </form>
        <div class="right"></div>
    </div>
<?php
template_footer();
} else {
    echo "No session started.";
}
