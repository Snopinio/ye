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
                    <form method="post" action="stacja.php">
                    <label for="zakres-ceny"><h1>Zakres cenowy</h1></label>
                    <div id="ceny-min">
                        <span>Cena od: <span id="min-price-display">1.00</span> PLN</span>
                    </div>
                    <input type="range" id="min-price" min="1.00" max="9.99" value="1.00" step="0.01" oninput="updatePriceDisplay()">

                    <input type="range" id="max-price" min="1.00" max="9.99" value="9.99" step="0.01" oninput="updatePriceDisplay()">
                    <div id="ceny-max">
                        <span>Cena do: <span id="max-price-display">9.99</span> PLN</span>
                    </div>
                    <button type="button" onclick="resetFilters()">RESET</button>
                    <button type="button" onclick="search()">SZUKAJ</button>
                    </form>
            </div>
        </div>
        <div id="szukanie">
        
        </div>
    </div>
    <script>

        
    </script>
</body>
<script src="suwaki.js"></script>
</html>