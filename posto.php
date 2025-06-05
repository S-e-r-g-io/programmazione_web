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
        
        $query = "SELECT * FROM Posto";
        try {
            $result = $conn->query($query);
        } catch (PDOException $e) {
            echo "DB error on query: " . $e->getMessage();
            $error = true;
        }
            if (!$error) {
            if ($result->rowCount() > 0) {
                echo "  <div id='table-container'>
                    <table>
                <tr>
                    <th>numero progressivo</th>
                    <th>sala</th>
                    <th>data</th>
                    <th>ora</th>
                </tr>";

                $i = 0;
                foreach ($result as $riga) {
                    $i++;
                    $classRiga = ($i % 2 == 0) ? 'class="rigaPari"' : 'class="rigaDispari"';
                    echo "<tr $classRiga>
                    <td>{$riga['nProg']}</td>
                    <td>{$riga['sala']}</td>
                    <td>{$riga['data']}</td>
                    <td>{$riga['ora']}</td>
                  </tr>";
                }

                echo "</table>
                    </div>";
            }
            } 
        include 'footer.html'?>
</body>

</html>