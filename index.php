<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najtańsze paliwo</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body onload="updatePriceDisplay()">
<script src="suwaki.js"></script>

    <div id="kontener">
        <div id="lewastrona">
            <div id="logo">
                <img src="jasper.jpg" alt="logo">
            </div>
            <form action="stacje.php" method="post">
                <button type="submit">WSZYTSKIIE STACJE</button>
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
                <form action="index.php" method="post">
                    <label for="zakres-ceny">
                        <h1>Zakres cenowy</h1>
                    </label>
                    <div id="ceny-min">
                        <span>Cena od: <span id="min-price-display">1.00</span> PLN</span>
                    </div>
                    <input type="range" name="min-price" id="min-price" min="1.00" max="9.99" value="1.00" step="0.01" oninput="updatePriceDisplay()">

                    <input type="range" name="max-price" id="max-price" min="1.00" max="9.99" value="9.99" step="0.01" oninput="updatePriceDisplay()">
                    <div id="ceny-max">
                        <span>Cena do: <span id="max-price-display">9.99</span> PLN</span>
                    </div>
                    <button type="button" onclick="resetFilters()">RESET</button>
                    <button type="submit" onclick="search()">SZUKAJ</button>
                </form>
            </div>
        </div>
        <div id="szukanie">
            <?php

            $conn = new mysqli('localhost', 'root', '', 'stacjepaliw');

            // Pobranie wartości ceny z formularza
            if (isset($_POST['max-price'])) {
                $cena = (float)$_POST['max-price'];
                echo "Otrzymana cena z formularza: " . $cena . " PLN<br>";
            } else {
                die("Brak ustawionej wartości ceny.");
            }

            // Zapytanie SQL do bazy danych
            $sql = "SELECT stacje_paliw.nazwa, adresy.miasto, adresy.ulica, adresy.numer, stacje_paliw.cena_paliwa 
        FROM stacje_paliw 
        JOIN adresy ON stacje_paliw.adres = adresy.id 
        WHERE stacje_paliw.cena_paliwa <= ?";

            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Błąd przygotowania zapytania: " . $conn->error);
            }

            $stmt->bind_param("d", $cena);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result === false) {
                die("Błąd wykonania zapytania: " . $conn->error);
            }

            // Wyświetlanie wyników
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "Stacja: " . $row["nazwa"] . " - " . $row["miasto"] . ", " . $row["ulica"] . " " . $row["numer"] . " - Cena: " . $row["cena_paliwa"] . " PLN<br>";
                }
            } else {
                echo "Brak stacji spełniających kryteria.<br>";
            }

            $stmt->close();
            $conn->close();


            ?>
        </div>
    </div>
</body>

</html>