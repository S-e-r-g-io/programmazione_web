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
    include 'connect.php';
    ?>

    <form name="caselle" method="post">
        <label>Nome</label>
        <input type="text" name="Nome" value="">
        <label>Codice</label>
        <input type="text" name="Codice" value="">
        <label>Tema</label>
        <input type="text" name="Tema" value="">
        <label>Dimensione (mq)</label>
        <input type="text" name="mq" value="">
        <input type="submit" value="invia">
    </form>

    <?php
    if (count($_POST) == 0 || ($_POST["Nome"] == "" && $_POST["Codice"] == "" && $_POST["Tema"] == "" && $_POST["mq"] == "")) {
        ?>
        <p> Nessun risultato. </p>
        <?php
    } else {
        $query = "SELECT * FROM Sala WHERE 1=1";
        if (!empty($_POST["Nome"])) {
            $query .= " AND Nome LIKE '%" . $_POST["Nome"] . "%'";
        }
        if (!empty($_POST["Codice"])) {
            $query .= " AND Codice = " . (int) $_POST["Codice"] . "";
        }
        if (!empty($_POST["Tema"])) {
            $query .= " AND Tema LIKE '%" . $_POST["Tema"] . "%'";
        }
        if (!empty($_POST["mq"])) {
            $query .= " AND mq = " . (int) $_POST["mq"] . "";
        }
        try {
            $result = $conn->query($query);
        } catch (PDOException $e) {
            echo "DB error on query: " . $e->getMessage();
            $error = true;
        }
        if (!$error) {
            if ($result->rowCount() > 0) {
                echo " <div id='table-container'>
                <table>
                <tr>
                    <th>codice</th>
                    <th>nome</th>
                    <th>tema</th>
                    <th>mq</th>
                </tr>";

                $i = 0;
                foreach ($result as $riga) {
                    $i++;
                    $classRiga = ($i % 2 == 0) ? 'class="rigaPari"' : 'class="rigaDispari"';
                    echo "<tr $classRiga>
                    <td>{$riga['codice']}</td>
                    <td>{$riga['nome']}</td>
                    <td>{$riga['tema']}</td>
                    <td>{$riga['mq']}</td>
                  </tr>";
                }

                echo "</table>
                </div>";
            } else {
                echo "<p>Nessun risultato.</p>";
            }
        }
    } 
    include 'footer.html'?>
</body>
</html>