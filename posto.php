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

    <form id="filter" name="caselle" method="post" action="goldengym.html">
        <label>Sala</label>
        <input type="text" name="Sala" value="">
        <label>Data</label>
        <input type="text" name="Data" value="">
        <label>Ora</label>
        <input type="text" name="Ora" value="">
    </form>
    <button>
        aggiungi
    </button>
    <button>
        cancella
    </button>
    <button>
        invia
    </button>
    <footer id="footer">
        Questo è il footer
    </footer>
</body>

</html>