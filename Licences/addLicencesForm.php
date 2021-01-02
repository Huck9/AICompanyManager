<?php
require_once("../config.php");

?>
    <form method="post" action="addLicence.php">
        Nazwa:<input type="text" name="Nazwa"><br>
        Klucz seryjny:<input type="number" name="KluczSeryjny"><br>
        Data zakupu: <input type="date" name="DataZakupu"><br>
        Id faktury: <input type="text" name="IdFaktury"><br>
        Ważność wsparcia<input type="date" name="WaznoscWsparcia"><br>
        Ważność licencji<input type="date" name="WaznoscLicencji"><br>
        Czy jest bezterminowo<input type="text" name="Bezterminowo"><br>
        Obecny posiadacz<input type="number" name="Uzytkownik"><br>
        Notatki<input type="text" name="Notatki"><br>
        <input type="submit">
    </form>
<?php