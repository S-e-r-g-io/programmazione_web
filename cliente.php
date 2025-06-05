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
    <input type="text" id="nome" name="nome">
    <label>Cognome</label>
    <input type="text" id="cognome" name="cognome">
    <label>Codice Fiscale</label>
    <input type="text" id="codice_fiscale" name="cf">
    <label>Data di nascita</label>
    <input type="date" id="data_nascita" name="dataNas">
    <label>Indirizzo</label>
    <input type="text" id="indirizzo" name="indirizzo">
    <label>Numero di telefono</label>
    <input type="tel" id="telefono" name="tel">
    <label>Email</label>
    <input type="email" id="email" name="email">
    <input type="submit" value="Invia">
    </form>

    <?php
    if (count($_POST) == 0 || ($_POST["nome"] == "" && $_POST["cognome"] == "" && $_POST["cf"] == "" && $_POST["dataNas"] == ""
        && $_POST["indirizzo"] == "" && $_POST["tel"] == "" && $_POST["email"] == "")) {
        ?>
        <p> Nessun risultato. </p>
        <?php
    } else {
        $query = "SELECT * FROM Cliente WHERE 1=1";
        if (!empty($_POST["nome"])) {
            $query .= " AND nome LIKE '%" . $_POST["nome"] . "%'";
        }
        if (!empty($_POST["cognome"])) {
            $query .= " AND cognome LIKE '%" . $_POST["cognome"] . "%'";
        }
        if (!empty($_POST["cf"])) {
            $query .= " AND cf LIKE '%" . $_POST["cf"] . "%'";
        }
        if (!empty($_POST["indirizzo"])) {
            $query .= " AND indirizzo LIKE '%" . $_POST["indirizzo"] . "%'";
        }
        if (!empty($_POST["tel"])) {
            $query .= " AND tel LIKE '%" . $_POST["tel"] . "%'";
        }
        if (!empty($_POST["email"])) {
            $query .= " AND email LIKE '%" . $_POST["email"] . "%'";
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
                    <th>cognome</th>
                    <th>codice fiscale</th>
                    <th>data di nascita</th>
                    <th>indirizzo</th>
                    <th>numero di telefono</th>
                    <th>email</th>
                </tr>";

                $i = 0;
                foreach ($result as $riga) {
                    $i++;
                    $classRiga = ($i % 2 == 0) ? 'class="rigaPari"' : 'class="rigaDispari"';
                    echo "<tr $classRiga>
                    <td>{$riga['codice']}</td>
                    <td>{$riga['nome']}</td>
                    <td>{$riga['cognome']}</td>
                    <td>{$riga['cf']}</td>
                    <td>{$riga['dataNas']}</td>
                    <td>{$riga['indirizzo']}</td>
                    <td>{$riga['tel']}</td>
                    <td>{$riga['email']}</td>
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