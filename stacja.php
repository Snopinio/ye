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
            <form action="stacje.php" method="post">
                <button type="submit">WSZYTSKIE STACJE</button>
            </form>
            <input type="text" id="stacja" placeholder="Wpisz nazwę stacji">

            <label for="miasto">Miasto</label>
            <select id="miasto">
                <option value="Warszawa">Warszawa</option>
                <option value="Kraków">Kraków</option>
                <option value="Gdańsk">Gdańsk</option>
                <option value="Wrocław">Wrocław</option>
                <option value="Poznań">Poznań</option>
            </select>

            <div id="filtry">
                <form id="filter-form">
                    <form method="post" action="stacja.php">
                        <label for="min_price">Cena minimalna:</label>
                        <input type="number" step="0.01" name="min_price" id="min_price"
                            value="<?php echo $min_price; ?>">
                        <label for="max_price">Cena maksymalna:</label>
                        <input type="number" step="0.01" name="max_price" id="max_price"
                            value="<?php echo $max_price; ?>">
                        <input type="submit">
            </div>
        </div>
        <div id="szukanie">
        <?php

            $baza = new mysqli('localhost', 'root', '', 'stacjepaliw');

            // Przechwycenie wartości z formularza
            $station = isset($_GET['stacja']) ? $_GET['stacja'] : '';
            $city = isset($_GET['miasto']) ? $_GET['miasto'] : '';
            $min_price = isset($_GET['min_price']) ? (float)$_GET['min_price'] : 0;
            $max_price = isset($_GET['max_price']) ? (float)$_GET['max_price'] : PHP_INT_MAX;

            $q = "SELECT sp.nazwa AS nazwa_stacji, sp.cena_paliwa AS cena, a.miasto AS miasto, a.ulica AS ulica, a.numer AS numer
                  FROM stacje_paliw sp 
                  JOIN adresy a ON sp.adres = a.id 
                  WHERE sp.nazwa LIKE ? AND a.miasto LIKE ? AND sp.cena_paliwa BETWEEN ? AND ?";
                

            $baza->close();
        ?>
        </div>
    </div>
</body>

</html>



