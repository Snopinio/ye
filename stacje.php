</html>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najtańsze paliwo</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <div id="kontener">
        <div id="lewastrona">
            <div id="logo">
                <img src="jasper.jpg" alt="logo">
            </div>
            <input type="text" id="station" placeholder="Wpisz nazwę stacji">

            <label for="city">Miasto</label>
            <select id="city">
                <option value="">Wybierz miasto</option>
                <option value="Warszawa">Warszawa</option>
                <option value="Kraków">Kraków</option>
                <option value="Gdańsk">Gdańsk</option>
                <option value="Wrocław">Wrocław</option>
                <option value="Poznań">Poznań</option>
            </select>
            <div id="filtry">
                    <form method="post" action="stacja.php">
                        <label for="min_price">Cena minimalna:</label>
                        <input type="number" step="0.01" name="min_price" id="min_price"
                            value="<?php echo $min_price; ?>">
                        <label for="max_price">Cena maksymalna:</label>
                        <input type="number" step="0.01" name="max_price" id="max_price"
                            value="<?php echo $max_price; ?>">
                        <input type="submit">
                    </form>
            </div>

        </div>
        <div id="szukanie">
            <?php
    $baza = new mysqli('localhost', 'root', '', 'stacjepaliw');
        $q = "SELECT sp.nazwa AS nazwa_stacji, sp.cena_paliwa AS cena, a.miasto AS miasto, a.ulica AS ulica, a.numer AS numer_budynku FROM stacje_paliw sp JOIN adresy a ON sp.adres = a.id;";
        $result = mysqli_query($baza, $q);
        while ($row = mysqli_fetch_array($result)) {
            echo '<p>' . $row['nazwa_stacji'] . ' - ' . $row['cena'] . ' PLN, adres: ' . $row['miasto'] . ', ' . $row['ulica'] . ' ' . $row['numer_budynku'] . '</p>';
        }
    $baza->close();
    ?>
        </div>
    </div>

</body>

</html>