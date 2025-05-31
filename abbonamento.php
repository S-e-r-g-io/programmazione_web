<!DOCTYPE html>
<html>

<head> 
    <?php
        include 'head.html';
    ?>
</head>

<body>

    <?php
        include 'titolo.html';
        include 'nav.html';
    ?>

    <form name="Caselle" method="post" action="goldgyme.html">
        <label>Cliente</label>
        <input type="text" name="Cliente" value="" size="10" maxlenght="20">
        <label>Inizio</label>
        <input type="text" name="Inizio" value="" size="10" maxlenght="20">
        <label>Fine</label>
        <input type="text" name="fine" value="" size="10" maxlenght="20">
        <label>Prezzo</label>
        <input type="text" name="prezzo" value="" size="10" maxlenght="20">
        <button class="my-button">Invia</button>
        <button class="my-button">Reset</button>


    </form>

    <footer>
        Progetto PW
    </footer>

</body>

</html>