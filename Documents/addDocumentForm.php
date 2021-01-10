<?php
require_once("../config.php");
template_header("Add Document");
?>
    <form method="post" action="addDocument.php" enctype="multipart/form-data">
        Numer Dokumentu:<input type="text" name="IdDocument"><br>
        Data<input type="date" name="documentDate"><br>
        Notatki<input type="text" name="notes"><br>
        <input type="file" name="file" size="50"><br>
        <input type="submit">
    </form>
<?php
template_footer();
