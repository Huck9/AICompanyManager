<?php
require_once("../config.php");
template_header("Add Invoice");
?>
    <div class="container">
        <div class="left"></div>
    <form method="post" action="addLicence.php">
        <div class="inputs">
        Nazwa: <input type="text" name="Nazwa" class="standardInput"><br>
        Klucz seryjny: <input type="number" name="KluczSeryjny" class="standardInput"><br>
        Data zakupu: <input type="date" name="DataZakupu" class="standardInput"><br>
        Id faktury: <input type="text" name="IdFaktury" class="standardInput"><br>
        Ważność wsparcia: <input type="date" name="WaznoscWsparcia" class="standardInput"><br>
        Ważność licencji: <input type="date" name="WaznoscLicencji" class="standardInput"><br>
        Czy jest bezterminowo: <input type="text" name="Bezterminowo" class="standardInput"><br>
        Obecny posiadacz: <input type="number" name="Uzytkownik" class="standardInput"><br>
        Notatki: <input type="text" name="Notatki" class="standardInput"><br>
        <input type="submit" class="submitInput">
        </div>
    </form>
        <div class="right"></div>
    </div>

<?php